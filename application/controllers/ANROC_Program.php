<?php 
    class ANROC_Program extends CI_Controller{
        function __construct(){
            parent:: __construct();
            if($this->session->username == null){
                redirect("ANROC_Auth");
            }
        }
        function create(){
            $data['title']="ANROnline | Tambah Data Program Keahlian";
            $this->load->view("ANROV_Header",$data);
            $this->load->view("Jurusan/ANROV_addProgram",$data);
            $this->load->view("ANROV_Footer",$data);

        }
        function edit($id){
            $data['title']="ANROnline | Edit Data Paket Keahlian";
            $data['resource']=$this->ANRO_Model->read("ANR_program_keahlian",array('id_program_keahlian'=>$id))->result();
            $this->load->view("ANROV_Header",$data);
            $this->load->view("Jurusan/ANROV_editProgram",$data);
            $this->load->view("ANROV_Footer",$data);
        }
        function save(){
            if($this->input->post("type")=="insert"){
                foreach($this->input->post('program_keahlian') as $pro){
                    if($pro != ""){
                        $data=array(
                            'program_keahlian'=>$pro
                        );
                        $this->ANRO_Model->create("anr_program_keahlian",$data);
                    }
                }
            }
            else if($this->input->post("type")=="update"){
                $where=array("id_program_keahlian"=>$this->input->post("id_program_keahlian"));
                $data=array(
                    'program_keahlian'=>$this->input->post('program_keahlian')
                );
                $this->ANRO_Model->update($where,$data,"anr_program_keahlian");
            }
            redirect("ANROC_Jurusan/Program_Keahlian");
        }
        function hapus($id){
            $where=array('id_program_keahlian'=>$id);
            $this->ANRO_Model->delete("anr_program_keahlian",$where);
            redirect("ANROC_Jurusan/Program_Keahlian");
        }     
    }
?>