<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ANROC_Mapel extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $halaman=$this->input->get('per_page');
        if(empty($halaman)){
            $halaman=0;
        }
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $this->ANRO_Model->page("anr_mapel")->num_rows();
        $settings['base_url']= base_url('ANROC_Mapel/');
        $settings['per_page']=10;
        $settings['uri_segment']=3;
        
        $settings['first_link'] = '<i class="material-icons">skip_previous</i>';
        $settings['last_link'] = '<i class="material-icons">skip_next</i>';
        $settings['next_link'] = '<i class="material-icons">chevron_right</i>';
        $settings['prev_link'] = '<i class="material-icons">chevron_left</i>';
        
        $this->pagination->initialize($settings);  
        $data['title'] = "ANROnline | Data Mata Pelajaran";
        $data['resource'] = $this->ANRO_Model->page("anr_mapel",$settings['per_page'],$halaman)->result();
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
                'KKM' => $this->input->post('kkm')
            );
            $this->ANRO_Model->create("anr_mapel", $data);
        }
        else if($type == "update"){
            $kode_mapel = array('Kode_Mapel' => $this->input->post('kode_mapel'));
            $data = array(
                'Nama_Mapel' => $this->input->post('nama'),
                'KKM' => $this->input->post('kkm')                  
            );
            $this->ANRO_Model->update($kode_mapel, $data, "anr_mapel");
        }
        redirect(base_url("ANROC_Mapel"));
    }
    function view($Kode_Mapel){
        $data['resource']=$this->ANRO_Model->read("anr_mapel",array("Kode_Mapel" => $Kode_Mapel))->row_array();
        $data['guru']=$this->ANRO_Model->read("anr_guru_mapel",array("anr_mapel.Kode_Mapel" => $Kode_Mapel));
        $data['title']="ANROnline | Data Mapel";
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Mapel/ANROV_DataMapel",$data);
        $this->load->view("ANROV_Footer",$data); 
    }
}