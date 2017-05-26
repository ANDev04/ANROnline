<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ANROC_PDF extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['title'] = "ANROnline | PDF";
        $data['siswa'] = $this->ANRO_Model->read("anr_siswa")->result();
        $data['kelas'] = $this->ANRO_Model->read("anr_kelas")->result();
        $data['header'] = $this->ANRO_Model->read("anr_config", array('Tipe' => "header"))->result();
        $data['footer'] = $this->ANRO_Model->read("anr_config", array('Tipe' => "footer"))->result();
        $this->load->view("ANROV_Header", $data);
        $this->load->view('PDF/ANROV_PDF', $data);
        $this->load->view("ANROV_Footer", $data);
    }
    function PDF(){
        $this->load->helper(array('dompdf', 'file'));

        $data['siswa'] = $this->ANRO_Model->read("anr_siswa", array('ID_SISWA' => $this->input->post('id_siswa')))->row_array();
        $data['kelas'] = $this->ANRO_Model->read("anr_kelas", array('Kode_Kelas' => $this->input->post('kode_kelas')))->row_array();
        $data['header'] = $this->ANRO_Model->read("anr_config", array('ID_Config' => $this->input->post('header')))->row_array();
        $data['footer'] = $this->ANRO_Model->read("anr_config", array('ID_Config' => $this->input->post('footer')))->row_array();
        $data['nilai'] = $this->ANRO_Model->readNilai(array('Siswa' => $this->input->post('id_siswa'), 'Kelas' => $this->input->post('kode_kelas'), 'Semester' => $this->input->post('semester')))->result();
        $data['semester'] = $this->input->post('semester');
        $cek = $this->ANRO_Model->readNilai(array('Siswa' => $this->input->post('id_siswa'), 'Kelas' => $this->input->post('kode_kelas'), 'Semester' => $this->input->post('Semester')))->num_rows();

        $html = $this->load->view('PDF/ANROV_Raport', $data, true);

        $filename = 'Raport Siswa ';
        $paper = 'A4';
        $orientation = 'potrait';

        if(!$cek>0){
            pdf_create($html, $filename, $paper, $orientation);
        }
        else{
            redirect(base_url("ANROC_PDF"));
        }
    }
    public function config(){
        $data['title'] = "ANROnline | Konfigurasi PDF";
        $data['resource'] = $this->ANRO_Model->read("anr_config")->result();
        $this->load->view("ANROV_Header", $data);
        $this->load->view("PDF/ANROV_ConfigPDF", $data);
        $this->load->view("ANROV_Footer", $data);
    }
    function create(){
        $data['title'] = "ANROnline | Tambah Konfigurasi PDF";
        $this->load->view("ANROV_Header", $data);
        $this->load->view("PDF/ANROV_AddConfigPDF", $data);
        $this->load->view("ANROV_Footer", $data);
    }
    function edit(){
        $data['title'] = "ANROnline | Perbarui Konfigurasi PDF";
        $id = array('ID_Config' => $this->uri->segment(3));
        $data['resource'] = $this->ANRO_Model->read("anr_config", $id)->row_array();
        $this->load->view("ANROV_Header", $data);
        $this->load->view("PDF/ANROV_UpConfigPDF", $data);
        $this->load->view("ANROV_Footer", $data);
    }
    function delete(){
        $id = array('ID_Config' => $this->uri->segment(3));
        $this->ANRO_Model->delete("anr_config", $id);
        redirect(base_url("ANROC_PDF/config"));
    }
    function save(){
        if($this->input->post('tipe') == "Footer"){
            $jenis = "F";
        }
        else if($this->input->post('tipe') == "Header"){
            $jenis = "H";
        }
        $id = $this->ANRO_Model->CKode("anr_config", "ID_Config", $jenis);
        $type = $this->input->post('type');
        if($type == "insert"){
            $data = array(
                'ID_Config' => $id,
                'Nama' => $this->input->post('nama'),
                'Tipe' => $this->input->post('tipe'),
                'Isi' => $this->input->post('isi')
            );
            $this->ANRO_Model->create("anr_config", $data);
        }
        else if($type == "update"){
            $id = array('ID_Config' => $this->input->post('id'));
            $data = array(
                'Isi' => $this->input->post('isi')
            );
            $this->ANRO_Model->update($id, $data, "anr_config");
        }
        redirect(base_url("ANROC_PDF/config"));
    }
}