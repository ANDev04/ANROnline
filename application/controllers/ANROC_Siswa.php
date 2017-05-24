<?php
class ANROC_Siswa extends CI_Controller{
    function index(){
        $data['title']="ANROnline | DATA SISWA";
        $data['resource']=$this->ANRO_Model->read("anr_siswa")->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Siswa/ANROV_Siswa",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function profile($id_siswa){
        $data['resource']=$this->ANRO_Model->read("anr_siswa",array('id_siswa'=>$id_siswa))->result();
        foreach($data['resource'] as $res){
            $nama=$res->Nama_Siswa;
        }
        $data['title']="ANROnline | ".$nama;
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Siswa/ANROV_Profile",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function create(){
        $data['title']="ANROnline | Tambah Data Siswa";
        $data['resource']=$this->ANRO_Model->read("ANR_Kelas")->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Siswa/ANROV_addSiswa",$data);
        $this->load->view("ANROV_Footer",$data);
    }
     function edit($id_siswa){
        $data['title']="ANROnline | Edit Data Siswa";
        $data['resource']=$this->ANRO_Model->read("anr_siswa",array('id_siswa'=>$id_siswa))->result();
        $data['kelas']=$this->ANRO_Model->read("ANR_Kelas")->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Siswa/ANROV_editSiswa",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function save(){
        if($this->input->post("type")=="insert"){
            $data=array(
                'ID_Siswa'=>'',
                'NIS'=>$this->input->post('NIS'),
                'NISN'=>$this->input->post('NISN'),
                'nama_siswa'=>$this->input->post('Nama_Siswa'),
                'jenis_kelamin'=>$this->input->post('Jenis_Kelamin'),
                'tempat_lahir'=>$this->input->post('Tempat_Lahir'),
                'tanggal_lahir'=>$this->input->post('Tanggal_Lahir'),
                'agama'=>$this->input->post('Agama'),
                'kelas'=>$this->input->post('Kelas'),
                'no_telp'=>$this->input->post('No_Telp'),
                'alamat'=>$this->input->post('Alamat'),
                'status'=>$this->input->post('Status')
            );
            $this->ANRO_Model->create("ANR_Siswa",$data);
        }
        else if($this->input->post("type")=="update"){
            $where=array("id_siswa"=>$this->input->post("id_siswa"));
            $data=array(
                'NIS'=>$this->input->post('NIS'),
                'NISN'=>$this->input->post('NISN'),
                'nama_siswa'=>$this->input->post('Nama_Siswa'),
                'jenis_kelamin'=>$this->input->post('Jenis_Kelamin'),
                'tempat_lahir'=>$this->input->post('Tempat_Lahir'),
                'tanggal_lahir'=>$this->input->post('Tanggal_Lahir'),
                'agama'=>$this->input->post('Agama'),
                'kelas'=>$this->input->post('Kelas'),
                'no_telp'=>$this->input->post('No_Telp'),
                'alamat'=>$this->input->post('Alamat'),
                'status'=>$this->input->post('Status')
            );
            $this->ANRO_Model->update($where,$data,"anr_siswa");
        }
        redirect("ANROC_Siswa/");
    }
    function hapus($id_siswa){
        $where=array('id_siswa'=>$id_siswa);
        $this->ANRO_Model->delete("anr_siswa",$where);
        redirect("ANROC_SISWA");
        
    }
}

?>