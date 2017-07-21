<?php
class ANROC_Jurusan extends CI_Controller{
    function index(){
        $data['title']="ANROnline | Jurusan";
        $this->load->view("ANROV_Header.php",$data);
        $this->load->view("Jurusan/ANROV_Menu.php");
        $this->load->view("ANROV_Footer.php",$data);
    }
    function Program_Keahlian(){
        $key=$this->input->get("key");
        $halaman=$this->input->get("per_page");
        if(empty($halaman)){
            $halaman=0;
        }
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $this->ANRO_Model->page("anr_program_keahlian",NULL,NULL,NULL,$key)->num_rows();
        $settings['base_url']= base_url('ANROC_Jurusan/Program_Keahlian/?key='.$key);
        $settings['per_page']=10;
        $settings['uri_segment']=3;
        $data['jurusan']=$this->ANRO_Model->read("anr_program_keahlian")->result();
        $this->pagination->initialize($settings);   
        
        
        $data['title']="ANROnline | Data Program Keahlian";
        $data['resource']=$this->ANRO_Model->page("anr_program_keahlian",$settings['total_rows'],$halaman,null,$key)->result();
        $this->load->view("ANROV_Header.php",$data);
        $this->load->view("Jurusan/ANROV_Program_Keahlian.php",$data);
        $this->load->view("ANROV_Footer.php",$data);
    }
    function Paket_Keahlian(){
        $key=$this->input->get("key");
        $halaman=$this->input->get("per_page");
        $program=$this->input->get("program");
        $where=array();
        if(!empty($program)){
            array_push($where,"anr_program_keahlian.id_program_keahlian='".$program."'");
        }
        if(empty($halaman)){
            $halaman=0;
        }
        $data['title']="ANROnline | Data Paket Keahlian";
        
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $this->ANRO_Model->page("anr_paket_keahlian",NULL,NULL,$where,$key)->num_rows();
        $settings['base_url']= base_url('ANROC_Jurusan/Paket_Keahlian/?key='.$key.'&program='.$program);
        $settings['per_page']=10;
        $settings['uri_segment']=3;
        $data['jurusan']=$this->ANRO_Model->read("anr_program_keahlian")->result();
        $this->pagination->initialize($settings);   
        $data['resource']=$this->ANRO_Model->page("anr_paket_keahlian",$settings['per_page'],$halaman,$where,$key)->result();
        
        $this->load->view("ANROV_Header.php",$data);
        $this->load->view("Jurusan/ANROV_Paket_Keahlian.php",$data);
        $this->load->view("ANROV_Footer.php",$data);
    }
}
?>