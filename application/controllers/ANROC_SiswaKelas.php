<?php
    class ANROC_SiswaKelas extends CI_Controller{
        function __construct(){
            parent:: __construct();
            if($this->session->username == null){
                redirect("ANROC_Auth");
            }
        }
        function index(){
            $data['title']="ANROnline | Data Siswa Yang Terdaftar di Kelas";
            $data['resource']=$this->ANRO_Model->read("anr_siswa_kelas")->result();
            $this->load->view("ANROV_Header",$data);
            $this->load->view("Siswa_Kelas/ANROV_SiswaKelas",$data);
            $this->load->view("ANROV_Footer",$data);
        }
        function create($Kode_Kelas=''){
            if(empty($Kode_Kelas)){
                redirect("ANROC_Kelas");
            }else{
                $data['title']="ANROnline | Mendaftarkan Siswa Ke Kelas";
                $data['resource']=$this->ANRO_Model->read("anr_siswa",array('Status'=>"Aktif"));
                $data['kelas']=$this->ANRO_Model->read("anr_kelas",array('Kode_Kelas'=>$Kode_Kelas))->result();
                foreach($data['kelas'] as $kelas){
                    $data['Kode_Kelas']=$kelas->Kode_Kelas;
                    $data['Nama_Kelas']=$kelas->Tingkat_Kelas.'-'.$kelas->Nama_Kelas;
                    $data['kuota']=$kelas->Kuota;
                }
                $data['banyak']=$this->ANRO_Model->read("anr_siswa_kelas",array('anr_siswa_kelas.Kode_Kelas'=>$Kode_Kelas))->num_rows();
                if($data['banyak'] <= $data['kuota']){
                    $this->load->view("ANROV_Header",$data);
                    $this->load->view("Siswa_Kelas/ANROV_addSiswaKelas",$data);
                    $this->load->view("ANROV_Footer",$data);
                }else{
                     redirect("ANROC_Kelas/kelas/".$data['Kode_Kelas']);
                }
            }
        }
        function tambah($Kode_Kelas){
            $data=array(
                "Kode_Kelas"=>$Kode_Kelas,
                "ID_Siswa"=>$this->input->post("ID_Siswa")
            );
            $this->ANRO_Model->create("anr_siswa_kelas",$data);
            echo "Success";
        }
        function hapus($Kode_Kelas){
            $sql = $this->ANRO_Model->delete("anr_siswa_kelas",array("ID_SISWA"=>$this->input->post("ID_Siswa"),"Kode_Kelas"=>$Kode_Kelas));
            if($sql){
                echo "Success";
            }else{
                echo "Gagal";
            }
            
        }
        
    }
?>