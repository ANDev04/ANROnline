<?php
    class Beranda extends CI_Controller{
        function index(){
            $data["siswa"]=$this->ANRO_Model->read("anr_siswa")->num_rows();
            $data["pelajaran"]=$this->ANRO_Model->read("anr_mapel")->num_rows();
            $data["guru"]=$this->ANRO_Model->read("anr_guru")->num_rows();
            $data["kelas"]=$this->ANRO_Model->read("anr_kelas")->num_rows();
            $data['title']="ANROnline | Selamat Datang di ANROnline";
            $this->load->view("ANROV_Header",$data);
            $this->load->view("ANROV_Beranda",$data);
            $this->load->view("ANROV_footer",$data);
        }
    }
?>