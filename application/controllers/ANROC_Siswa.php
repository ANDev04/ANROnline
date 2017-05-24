<?php
class ANROC_Siswa extends CI_Controller{
    function index(){
        $data['title']="ANROnline | DATA SISWA";
        $data['resource']=$this->ANRO_Model->read("ANR_Siswa")->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Siswa/ANROV_Siswa",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function profile($id_siswa){
        $data['resource']=$this->ANRO_Model->read("ANR_Siswa",array('id_siswa'=>$id_siswa))->row_array();
        $nama=$data['resource']['nama_siswa'];
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
}

?>