<?php
class ANROC_Kelas extends CI_Controller{
    function index(){
        $data['title']="ANROnline | DATA KELAS";
        $data['resource']=$this->ANRO_Model->read("ANR_Kelas");
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Kelas/ANROV_Kelas",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function create(){
        $data['title']="ANROnline | Tambah Data Kelas";
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Kelas/ANROV_addKelas",$data);
        $this->load->view("ANROV_Footer",$data);
        
    }
    function edit($kode_kelas){
        $data['title']="ANROnline | Edit Data Kelas";
        $data['resource']=$this->ANRO_Model->read("ANR_Kelas",array('kode_kelas'=>$kode_kelas));
        $data['program']=$this->ANRO_Model->read("ANR_Program_Keahlian")->result();
        $data['paket']=$this->ANRO_Model->read("ANR_Program_Keahlian")->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Kelas/ANROV_editKelas",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function save(){
        if($this->input->post("type")=="insert"){
            $kode_kelas= $this->ANRO_Model->CKode("ANR_Kelas","kode_kelas","K");
            $data=array(
                'kode_kelas'=>$kode_kelas,
                'tingkat_kelas'=>$this->input->post('tingkat_kelas'),
                'nama_kelas'=>$this->input->post('jurusan').'-'.$this->input->post('nomer'),
                'kuota'=>$this->input->post('kuota'),
                'tahun_masuk'=>$this->input->post('tahun_masuk'),
                'tahun_keluar'=>$this->input->post('tahun_keluar')
            );
            $this->ANRO_Model->create("ANR_Kelas",$data);
        }
        else if($this->input->post("type")=="update"){
            $where=array("kode_kelas"=>$this->input->post("kode_kelas"));
            $data=array(
                'tingkat_kelas'=>$this->input->post('tingkat_kelas'),
                'nama_kelas'=>$this->input->post('jurusan').'-'.$this->input->post('nomer'),
                'kuota'=>$this->input->post('kuota'),
                'tahun_masuk'=>$this->input->post('tahun_masuk'),
                'tahun_keluar'=>$this->input->post('tahun_keluar')
            );
            $this->ANRO_Model->update($where,$data,"ANR_Kelas");
        }
        redirect("ANROC_Kelas/");
    }
    function hapus($kode_kelas){
        $where=array('kode_kelas'=>$kode_kelas);
        $this->ANRO_Model->delete("ANR_Kelas",$where);
        redirect("ANROC_Kelas");
        
    }
    function jurusan(){
        if($this->input->post('tingkat_kelas')=="X"){
            $resource = $this->ANRO_Model->read("anr_program_keahlian")->result();
            echo '<option selected value="Pilih" disabled> Pilih Jurusan</option>';
            foreach ($resource as $res){
            echo '<option value="'.$res->program_keahlian.'">'.$res->program_keahlian.'</option>'; 
            }
        }else{
            $resource = $this->ANRO_Model->read("anr_paket_keahlian")->result();
            echo '<option selected value="Pilih" disabled> Pilih Jurusan</option>';
            foreach ($resource as $res){
            echo '<option>'.$res->paket_keahlian.'</option>'; 
            }
        }
    }
    function Cek_Kelas(){
        $nama_kelas = $this->input->post("jurusan")."-".$this->input->post("nomer");
        $cek=$this->ANRO_Model->read("ANR_Kelas",array("Nama_Kelas"=>$nama_kelas))->num_rows();
        if($cek>0){
            $angka = $this->input->post("nomer") + 1;
            echo $angka;
        }
        else{
            echo $this->input->post("nomer");        
        }
    }
    function Kelas($Kode_Kelas){
        $data['resource']=$this->ANRO_Model->read("anr_kelas",array("Kode_Kelas" => $Kode_Kelas))->result();
        $data['siswa']=$this->ANRO_Model->read("anr_siswa_kelas",array("anr_kelas.Kode_Kelas" => $Kode_Kelas));
        $data['title']="ANROnline | Data Kelas";
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Kelas/ANROV_DataKelas",$data);
        $this->load->view("ANROV_Footer",$data); 
    }
}
?>