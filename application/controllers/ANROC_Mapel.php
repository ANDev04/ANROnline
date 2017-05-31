<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ANROC_Mapel extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $data['title'] = "ANROnline | Data Mata Pelajaran";
        $data['resource'] = $this->ANRO_Model->read("anr_mapel")->result();
        $this->load->view("ANROV_Header", $data);
        $this->load->view("Mapel/ANROV_Mapel", $data);
        $this->load->view("ANROV_Footer", $data);
    }
    
    public function create(){
        $data['title'] = "ANROnline | Tambah Data Mata Pelajaran";
        $data['kode'] = $this->ANRO_Model->CKode("anr_mapel", "Kode_mapel", "M");
        $data['resource'] = $this->ANRO_Model->read("anr_guru", array('Status' => "Aktif"))->result();
        $this->load->view("ANROV_Header", $data);
        $this->load->view("Mapel/ANROV_AddMapel", $data);
        $this->load->view("ANROV_Footer", $data);
    }
    
    public function edit(){
        $kode_mapel = array('Kode_Mapel' => $this->uri->segment(3));
        $data['title'] = "ANROnline | Ubah Data Mata Pelajaran";
        $data['resource'] = $this->ANRO_Model->read("anr_mapel", $kode_mapel)->row_array();
        $data['guru'] = $this->ANRO_Model->read("anr_guru", array('Status' => "Aktif"))->result();
        $this->load->view("ANROV_Header", $data);
        $this->load->view("Mapel/ANROV_UpMapel", $data);
        $this->load->view("ANROV_Footer", $data);
    }
    
    public function delete(){
        $kode_mapel = array('Kode_mapel' => $this->uri->segment(3));
        $cek = $this->ANRO_Model->read("anr_nilai", array('Mapel' => $this->uri->segment(3)))->num_rows();
        if(!$cek>0){
            $this->ANRO_Model->delete("anr_mapel", $kode_mapel);
        }
        redirect(base_url("ANROC_Mapel"));
    }
    
    public function save(){
        $type = $this->input->post('type');
        if($type == "insert"){
            $data = array(
                'Kode_Mapel' => $this->input->post('kode_mapel'),
                'Nama_Mapel' => $this->input->post('nama'),
                'KKM' => $this->input->post('kkm'),
                'Guru' => $this->input->post('guru')
            );
            $this->ANRO_Model->create("anr_mapel", $data);
        }
        else if($type == "update"){
            $kode_mapel = array('Kode_Mapel' => $this->input->post('kode_mapel'));
            $data = array(
                'Nama_Mapel' => $this->input->post('nama'),
                'KKM' => $this->input->post('kkm'),
                'Guru' => $this->input->post('guru')                  
            );
            $this->ANRO_Model->update($kode_mapel, $data, "anr_mapel");
        }
        redirect(base_url("ANROC_Mapel"));
    }
}