<?php
class ANROC_Kelas extends CI_Controller{
    function index(){
        $halaman=$this->input->get('per_page');
        $kelas=$this->input->get('kelas');
        $key=$this->input->get('key');
        $tahun_ajar=$this->input->get('tahun_ajar');
        $tingkat_kelas=$this->input->get('kelas');
        if(empty($halaman)){
            $halaman=0;
        }
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        if(!empty($tahun_ajar)){
            $ajaran=explode("/",$tahun_ajar);
        }
        $where=array();
        if(!empty($kelas)){
            array_push($where,"Tingkat_Kelas='".$this->db->escape_str($tingkat_kelas)."'");
        }
        if(!empty($ajaran)){
            array_push($where,"Tahun_Masuk='".$this->db->escape_str($ajaran[0])."'");
            array_push($where,"Tahun_Keluar='".$this->db->escape_str($ajaran[1])."'");
        }
        $settings['total_rows'] = $this->ANRO_Model->page("anr_kelas",null,null,$where,$key)->num_rows();
        $settings['base_url']= base_url('ANROC_Kelas/?key='.$key.'&?kelas='.$kelas);
        $settings['per_page']=10;
        $settings['uri_segment']=3;
        
        $settings['first_link'] = '<i class="material-icons">first_page</i>';
        $settings['last_link'] = '<i class="material-icons">last_page</i>';
        $settings['next_link'] = '<i class="material-icons">chevron_right</i>';
        $settings['prev_link'] = '<i class="material-icons">chevron_left</i>';
        
        $this->pagination->initialize($settings);   
        $data['title']="ANROnline | DATA KELAS";
        $data['resource']=$this->ANRO_Model->page("anr_kelas",$settings['per_page'],$halaman,$where,$key);
        $data['tahun_ajaran']=$this->ANRO_Model->get_ajaran("anr_kelas","Tahun_Masuk, Tahun_Keluar");
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
        $this->ANRO_Model->delete("anr_siswa_kelas",$where);
        redirect("ANROC_Kelas");
        
    }
    function jurusan(){
        if($this->input->post('tingkat_kelas')=="X"){
            $resource = $this->ANRO_Model->read("anr_program_keahlian")->result();
            echo '<option selected value="Pilih" disabled selected>Pilih Jurusan</option>';
            foreach ($resource as $res){
                echo '<option value="'.$res->program_keahlian.'">'.$res->program_keahlian.'</option>'; 
            }
        }else{
            $resource = $this->ANRO_Model->read("anr_paket_keahlian")->result();
            echo '<option selected value="Pilih" disabled selected>Pilih Jurusan</option>';
            foreach ($resource as $res){
                echo '<option>'.$res->paket_keahlian.'</option>'; 
            }
        }
    }
    function Cek_Kelas(){
        $nama_kelas = $this->input->post("jurusan")."-".$this->input->post("nomer");
        $cek=$this->ANRO_Model->read("ANR_Kelas",array("Nama_Kelas"=>$nama_kelas, 'Tahun_Masuk'=>$this->input->post("tahun_masuk"), 'Tahun_Keluar'=>$this->input->post("tahun_keluar")))->num_rows();
        if($cek>0){
            $angka = "";
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