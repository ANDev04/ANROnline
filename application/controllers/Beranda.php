<?php
    class Beranda extends CI_Controller{
        function index(){
            $data['title']="ANROnline | Selamat Datang di ANROnline";
            $this->load->view("ANROV_Header",$data);
            $this->load->view("ANROV_Beranda",$data);
            $this->load->view("ANROV_footer",$data);
        }
    }
?>