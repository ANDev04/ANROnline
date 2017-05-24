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
         
        $config['upload_path'] = './asset/temp/'; 
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload', $config);
         
        if(! $this->upload->do_upload('file')){
            $this->upload->display_errors();
        }
        
        $data = $this->upload->data();
        $inputFileName = './asset/temp/'.$data['file_name'];
        
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
            if($table == "anr_siswa"){
                $direct = "ANROC_Siswa";
            }
            else if($table == "anr_kelas"){
                $direct = "ANROC_Kelas";        
            }
            else if($table == "anr_guru"){
                $direct = "ANROC_Guru";
            }
            else if($table == "anr_mapel"){
                $direct = "ANROC_Mapel";
            }
            else if($table == "anr_nilai"){
                $direct = "ANROC_Nilai";
            }
            else{
                redirect(base_url("ANROC_Beranda");
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