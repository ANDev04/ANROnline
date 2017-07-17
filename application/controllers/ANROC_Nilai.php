<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ANROC_Nilai extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $halaman=$this->input->get('per_page');
        $semester=$this->input->get('semester');
        $key=$this->input->get('key');
        $jenis_nilai=$this->input->get('jenis_nilai');
        if(empty($halaman)){
            $halaman=0;
        }
        $where=array();
        if(!empty($semester or !empty($jenis_nilai))){
            if($semester!=null){
                array_push($where,"Semester = '".$semester."'");
            }
            if($jenis_nilai!=null){
                array_push($where,"Jenis_Nilai = '".$jenis_nilai."'");
            }
        }
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $this->ANRO_Model->page("anr_nilai",null,null,$where,$key)->num_rows();
        $settings['base_url']= base_url('ANROC_Nilai/');
        $settings['per_page']=10;
        $settings['uri_segment']=3;
        
        $settings['first_link'] = '<i class="material-icons">first_page</i>';
        $settings['last_link'] = '<i class="material-icons">last_page</i>';
        $settings['next_link'] = '<i class="material-icons">chevron_right</i>';
        $settings['prev_link'] = '<i class="material-icons">chevron_left</i>';
        
        $this->pagination->initialize($settings);  
        $data['title'] = "ANROnline | Data Nilai";
        $data['resource'] = $this->ANRO_Model->page("anr_nilai",$settings['per_page'],$halaman,$where,$key)->result();
        $this->load->view("ANROV_Header", $data);
        $this->load->view("Nilai/ANROV_Nilai", $data);
        $this->load->view("ANROV_Footer", $data);
    }
    
    public function create(){
        $data['title'] = "ANROnline | Tambah Data Nilai";
        $data['siswa'] = $this->ANRO_Model->read("anr_siswa", array('Status' => "Aktif"))->result();
        $data['mapel'] = $this->ANRO_Model->read("anr_mapel")->result();
        $data['kelas'] = $this->ANRO_Model->read("anr_kelas")->result();
        $this->load->view("ANROV_Header", $data);
        $this->load->view("Nilai/ANROV_AddNilai", $data);
        $this->load->view("ANROV_Footer", $data);
    }
    
    public function edit(){
        $id = array('ID_NILAI' => $this->uri->segment(3));
        $data['title'] = "ANROnline | Ubah Data Nilai";
        $data['resource'] = $this->ANRO_Model->read("anr_nilai", $id)->row_array();
        $nilai = $this->ANRO_Model->read("anr_nilai", $id)->row_array();
        $data['siswa'] = $this->ANRO_Model->read("anr_siswa", array('ID_SISWA' => $nilai['Siswa']))->row_array();
        $data['mapel'] = $this->ANRO_Model->read("anr_mapel", array('Kode_Mapel' => $nilai['Mapel']))->row_array();
        $this->load->view("ANROV_Header", $data);
        $this->load->view("Nilai/ANROV_UpNilai", $data);
        $this->load->view("ANROV_Footer", $data);
    }
    
    public function delete(){
        $id_nilai = array('ID_NILAI' => $this->uri->segment(3));
        $this->ANRO_Model->delete("anr_nilai", $id_nilai);
        redirect(base_url("ANROC_Nilai"));
    }
    
    public function save(){
        $type = $this->input->post('type');
        if($type == "insert"){
            $cek = $this->ANRO_Model->read("anr_nilai", array('Siswa' => $this->input->post('siswa'), 'Mapel' => $this->input->post('mapel'), 'Jenis_Nilai' => $this->input->post('jenis_nilai'), 'anr_nilai.Kelas' => $this->input->post('kelas'), 'Semester' => $this->input->post('semester')))->num_rows();
            if(!$cek>0){
                $data = array(
                    'Siswa' => $this->input->post('siswa'),
                    'Mapel' => $this->input->post('mapel'),
                    'Jenis_Nilai' => $this->input->post('jenis_nilai'),
                    'Kelas' => $this->input->post('kelas'),
                    'Semester' => $this->input->post('semester'),
                    'Nilai' => $this->input->post('nilai')
                );
                $this->ANRO_Model->create("anr_nilai", $data);
            }
            else{
                
            }
        }
        else if($type == "update"){
            $id = array('ID_NILAI' => $this->input->post('id_nilai'));
            $data = array(
                'Semester' => $this->input->post('semester'),
                'Nilai' => $this->input->post('nilai')
            );
            $this->ANRO_Model->update($id, $data, "anr_nilai");
        }
        redirect(base_url("ANROC_Nilai"));
    }
    public function Cari_Kelas(){
        $resource = $this->ANRO_Model->read("anr_siswa_kelas",array("anr_siswa.ID_Siswa"=>$this->input->post("ID_Siswa")))->result();
        echo '<option value="Pilih" selected disabled>Pilih Kelas</option>';
        foreach ($resource as $res){
            echo '<option value="'.$res->Kode_Kelas.'">'.$res->Tingkat_Kelas.'-'.$res->Nama_Kelas.'</option>'; 
        }
    }
}