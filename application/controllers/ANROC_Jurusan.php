<?php
class ANROC_Jurusan extends CI_Controller{
    function index(){
        $data['title']="ANROnline | Jurusan";
        $this->load->view("ANROV_Header.php",$data);
        $this->load->view("Jurusan/ANROV_Menu.php");
        $this->load->view("ANROV_Footer.php",$data);
    }
    function Program_Keahlian(){
        $data['title']="ANROnline | Data Program Keahlian";
        $data['resource']=$this->ANRO_Model->read("anr_program_keahlian")->result();
        $this->load->view("ANROV_Header.php",$data);
        $this->load->view("Jurusan/ANROV_Program_Keahlian.php",$data);
        $this->load->view("ANROV_Footer.php",$data);
    }
    function Paket_Keahlian(){
        $data['title']="ANROnline | Data Paket Keahlian";
        $data['resource']=$this->ANRO_Model->read("anr_paket_keahlian")->result();
        $this->load->view("ANROV_Header.php",$data);
        $this->load->view("Jurusan/ANROV_Paket_Keahlian.php",$data);
        $this->load->view("ANROV_Footer.php",$data);
    }
}
?>