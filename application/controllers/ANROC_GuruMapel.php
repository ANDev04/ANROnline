<?php
    class ANROC_GuruMapel extends CI_Controller{
        function __construct(){
            parent:: __construct();
            if($this->session->username == null){
                redirect("ANROC_Auth");
            }
        }
        function index(){
            $data['title']="ANROnline | Data Guru yang Mengajar";
            $data['resource']=$this->ANRO_Model->read("anr_guru_mapel")->result();
            $this->load->view("ANROV_Header",$data);
            $this->load->view("Guru_Mapel/ANROV_GuruMapel",$data);
            $this->load->view("ANROV_Footer",$data);
        }
        function create($Kode_Mapel=''){
            if(empty($Kode_Mapel)){
                redirect("ANROC_Mapel");
            }else{
                $data['title']="ANROnline | Tambah Guru Mengajar";
                $data['resource']=$this->ANRO_Model->read("anr_guru",array('Status'=>"Aktif"));
                $data['mapel']=$this->ANRO_Model->read("anr_mapel",array('Kode_Mapel'=>$Kode_Mapel))->result();
                foreach($data['mapel'] as $mapel){
                    $data['Kode_Mapel']=$mapel->Kode_Mapel;
                    $data['Nama_Mapel']=$mapel->Nama_Mapel;
                }
                $data['banyak']=$this->ANRO_Model->read("anr_guru_mapel",array('anr_guru_mapel.Kode_Mapel'=>$Kode_Mapel))->num_rows();
                $this->load->view("ANROV_Header",$data);
                $this->load->view("Guru_Mapel/ANROV_addGuruMapel",$data);
                $this->load->view("ANROV_Footer",$data);
            }
        }
        function tambah($Kode_Mapel){
            $data=array(
                "kode_mapel"=>$Kode_Mapel,
                "id_guru"=>$this->input->post("id_guru")
            );
            $this->ANRO_Model->create("anr_guru_mapel",$data);
            echo "Success";
        }
        function hapus($Kode_Mapel){
            $sql = $this->ANRO_Model->delete("anr_guru_mapel",array("id_guru"=>$this->input->post("id_guru"),"kode_mapel"=>$Kode_Mapel));
            if($sql){
                echo "Success";
            }else{
                echo "Gagal";
            }
            
        }
        
    }