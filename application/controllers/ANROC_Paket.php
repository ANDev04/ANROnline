<?php 
    class ANROC_Paket extends CI_Controller{
        function __construct(){
            parent:: __construct();
            if($this->session->username == null){
                redirect("ANROC_Auth");
            }
        }
        function create(){
            $data['title']="ANROnline | Tambah Data Paket Keahlian";
            $data['resource']=$this->ANRO_Model->read("anr_program_keahlian")->result() ;
            $this->load->view("ANROV_Header",$data);
            $this->load->view("Jurusan/ANROV_addPaket",$data);
            $this->load->view("ANROV_Footer",$data);

        }
        function edit($id){
            $data['title']="ANROnline | Edit Data Paket Keahlian";
            $data['resource']=$this->ANRO_Model->read("anr_paket_keahlian",array('id_paket_keahlian'=>$id))->result();
            $data['program']=$this->ANRO_Model->read("ANR_program_keahlian")->result();
            $this->load->view("ANROV_Header",$data);
            $this->load->view("Jurusan/ANROV_editPaket",$data);
            $this->load->view("ANROV_Footer",$data);
        }
        function save(){
            if($this->input->post("type")=="insert"){
                $data=array(
                    'id_program_keahlian'=>$this->input->post('id_program_keahlian'),
                    'paket_keahlian'=>$this->input->post('paket_keahlian')
                );
                $this->ANRO_Model->create("anr_paket_keahlian",$data);
            }
            else if($this->input->post("type")=="update"){
                $where=array("id_paket_keahlian"=>$this->input->post("id_paket_keahlian"));
                $data=array(
                    'id_program_keahlian'=>$this->input->post('id_program_keahlian'),
                    'paket_keahlian'=>$this->input->post('paket_keahlian')
                );
                $this->ANRO_Model->update($where,$data,"anr_paket_keahlian");
            }
            redirect("ANROC_Jurusan/Paket_Keahlian");
        }
        function hapus($id){
            $where=array('id_paket_keahlian'=>$id);
            $this->ANRO_Model->delete("anr_paket_keahlian",$where);
            redirect("ANROC_Jurusan/Paket_Keahlian");
        }     
    }
?>