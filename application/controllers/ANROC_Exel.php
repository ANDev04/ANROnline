<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ANROC_Exel extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    public function import($table=""){
        if(!empty($table)){
            $data['title'] = "ANROnline | Import Data";
            $data['table'] = $table;
            $this->load->view("ANROV_Header", $data);
            $this->load->view('Exel/ANROV_Exel', $data);
            $this->load->view("ANROV_Footer", $data);
        }else{
            redirect(base_url("ANROC_Beranda"));
        }
    }
    function save(){
        $fileName = $_FILES['file']['name'];
         
        $config['upload_path'] = './assets/'; 
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload', $config);
         
        if(! $this->upload->do_upload('file')){
            $this->upload->display_errors();
        }
        
        $data = $this->upload->data();
        $inputFileName = './assets/'.$data['file_name'];
        
        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $banyak = 0;
        $table = $this->input->post('table');
        
        for ($row = 2; $row <= $highestRow; $row++){   
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $this->db->db_debug = false;
            if($table == "anr_siswa"){
                $direct = "ANROC_Siswa";   
                $cek1 = $this->ANRO_Model->read("anr_kelas", array('Kode_Kelas' => $rowData[0][7]))->num_rows();
                $cek2 = $this->ANRO_Model->read("anr_siswa", array('NIS' => $rowData[0][0], 'NISN' => $rowData[0][1]))->num_rows();
                if(!$cek1 > 0 && !$cek2 > 0){
                    $data = array(
                        'NIS' => $rowData[0][0], 
                        'NISN' => $rowData[0][1], 
                        'Nama_Siswa' => $rowData[0][2], 
                        'Jenis_Kelamin' => $rowData[0][3], 
                        'Tempat_Lahir' => $rowData[0][4],
                        'Tanggal_Lahir' => $rowData[0][5],
                        'Agama' => $rowData[0][6],
                        'Kelas' => $rowData[0][7],
                        'No_Telp' => $rowData[0][9],
                        'Alamat' => $rowData[0][10],
                        'Status' => $rowData[0][11]
                    );
                    $banyak = $this->ANRO_Model->insertExel("anr_siswa", $data, $banyak);
                }
            }
            else if($table == "anr_kelas"){
                $direct = "ANROC_Kelas";    
                $kode = $this->ANRO_Model->CKode("anr_kelas", "Kode_Kelas", "K");
                $cek = $this->ANRO_Model->read("anr_kelas", array('Tingkat_Kelas' => $rowData[0][0], 'Nama_Kelas' => $rowData[0][1], 'Tahun_Masuk' => $rowData[0][3], 'Tahun_Keluar' => $rowData[0][4]))->num_rows();
                if(!$cek > 0){
                    $data = array(
                        'Kode_Kelas' => $kode,
                        'Tingkat_Kelas' => $rowData[0][0], 
                        'Nama_Kelas' => $rowData[0][1], 
                        'Kuota' => $rowData[0][2], 
                        'Tahun_Masuk' => $rowData[0][3], 
                        'Tahun_Keluar' => $rowData[0][4]
                    );
                    $banyak = $this->ANRO_Model->insertExel("anr_kelas", $data, $banyak);
                }    
            }
            else if($table == "anr_guru"){
                $direct = "ANROC_Guru";
                $cek = $this->ANRO_Model->read("anr_kelas", array('NIP' => $rowData[0][0], 'NUPTK' => $rowData[0][1]))->num_rows();
                if(!$cek > 0){
                    $data = array(
                        'NIP' => $rowData[0][0], 
                        'NUPTK' => $rowData[0][1],
                        'Nama_Guru' => $rowData[0][2],
                        'Jenis_Kelamin' => $rowData[0][3],
                        'Status' => $rowData[0][4]
                    );
                    $banyak = $this->ANRO_Model->insertExel("anr_guru", $data, $banyak);
                }
            }
            else if($table == "anr_mapel"){
                $direct = "ANROC_Mapel";
                $kode = $this->ANRO_Model->CKode("anr_mapel", "Kode_Mapel", "M");
                $cek = $this->ANRO_Model->read("anr_mapel", array('Nama_Mapel' => $rowData[0][0]))->num_rows();
                if(!$cek > 0){
                    $data = array(
                        'Kode_Mapel' => $kode,
                        'Nama_Mapel' => $rowData[0][0],
                        'KKM' => $rowData[0][1],
                        'Guru' => $rowData[0][2]
                    );
                    $banyak = $this->ANRO_Model->insertExel("anr_mapel", $data, $banyak);
                }
            }
            else if($table == "anr_siswa"){
                
            }
            else{
                redirect(base_url("ANROC_Beranda"));
            }
        }
        unlink($inputFileName);
        if(!$banyak > 0){
            redirect(base_url($direct));
        }else{
            redirect(base_url($direct."?error=".$banyak));
        }
    }
}