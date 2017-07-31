<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ANROC_Exel extends CI_Controller{
    
    function save(){
        $fileName = $_FILES['file']['name'];
         
        $config['upload_path'] = './assets/'; 
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xlsm|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload', $config);
         
        if(! $this->upload->do_upload('file')){
            echo $this->upload->display_errors();
            redirect(base_url("ANROV_Beranda"."?messenger=1"));
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
        
        $sheet = $objPHPExcel->getSheet(1);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $banyak = 0;
        $total = 0;
        $table = $this->input->post('table');
        if($table == "anr_siswa"){ $direct = "ANROC_Siswa"; }
        else if($table == "anr_kelas"){ $direct = "ANROC_Kelas"; }
        else if($table == "anr_guru"){ $direct = "ANROC_Guru"; }
        else if($table == "anr_mapel"){ $direct = "ANROC_Mapel"; }
        else if($table == "anr_program_keahlian"){ $direct = "ANROC_Jurusan/Program_Keahlian"; }
        else if($table == "anr_paket_keahlian"){ $direct = "ANROC_Jurusan/Paket_Keahlian"; }
        else if($table == "anr_config"){ $direct = "ANROC_PDF/config"; }
        else if($table == "anr_nilai"){ $direct = "ANROC_Nilai"; }
        
        for ($row = 2; $row <= $highestRow; $row++){   
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $this->db->db_debug = false;
            
            if($rowData[0][0] != ""){
                if($table == "anr_siswa"){
                    $cek = $this->ANRO_Model->read("anr_siswa", array('NIS' => $rowData[0][0]))->num_rows();
                    if(!$cek > 0){
                        $cek = $this->ANRO_Model->read("anr_siswa", array('NISN' => $rowData[0][1]))->num_rows();
                        if(!$cek > 0){
                            if($rowData[0][5] != ""){
                                $tl = explode("/", $rowData[0][5]);
                                $data = array(
                                    'NIS' => $rowData[0][0], 
                                    'NISN' => $rowData[0][1], 
                                    'Nama_Siswa' => $rowData[0][2], 
                                    'Jenis_Kelamin' => $rowData[0][3], 
                                    'Tempat_Lahir' => $rowData[0][4],
                                    'Tanggal_Lahir' => $tl[2]."-".$tl[1]."-".$tl[0],
                                    'Agama' => $rowData[0][6],
                                    'Kelas' => $rowData[0][7],
                                    'No_Telp' => $rowData[0][8],
                                    'Alamat' => $rowData[0][9],
                                    'Status' => $rowData[0][10]
                                );
                                $banyak = $this->ANRO_Model->insertExel("anr_siswa", $data, $banyak);
                            }
                            else{
                                $banyak++;  
                            }
                        }else{
                            $banyak++;
                        }
                    }else{
                        $banyak++;
                    }
                }
                else if($table == "anr_kelas"){
                    $par = explode("-", $rowData[0][1]);
                    if($rowData[0][0] == "X"){
                        $cek = $this->ANRO_Model->read("anr_program_keahlian", array('program_keahlian' => $par[0]))->num_rows();
                    }else if($rowData[0][0] == "XI" || $rowData[0][0] == "XII"){
                        $cek = $this->ANRO_Model->read("anr_paket_keahlian", array('paket_keahlian' => $par[0]))->num_rows();
                    }
                    if($cek > 0){
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
                        }else{
                            $banyak++;
                        }
                    }else{
                        $banyak++;
                    }    
                }
                else if($table == "anr_guru"){
                    $cek = $this->ANRO_Model->read("anr_guru", array('NIP' => $rowData[0][0]))->num_rows();
                    if(!$cek > 0){
                        $cek = $this->ANRO_Model->read("anr_guru", array('NUPTK' => $rowData[0][1]))->num_rows();
                        if(!$cek > 0){
                            $data = array(
                                'NIP' => $rowData[0][0], 
                                'NUPTK' => $rowData[0][1],
                                'Nama_Guru' => $rowData[0][2],
                                'Jenis_Kelamin' => $rowData[0][3],
                                'Status' => $rowData[0][4]
                            );
                            $banyak = $this->ANRO_Model->insertExel("anr_guru", $data, $banyak);
                        }else{
                            $banyak++;
                        }
                    }else{
                        $banyak++;
                    }
                }
                else if($table == "anr_mapel"){
                    $kode = $this->ANRO_Model->CKode("anr_mapel", "Kode_Mapel", "M");
                    $cek = $this->ANRO_Model->read("anr_mapel", array('Nama_Mapel' => $rowData[0][0]))->num_rows();
                    if(!$cek > 0){
                        $data = array(
                            'Kode_Mapel' => $kode,
                            'Nama_Mapel' => $rowData[0][0],
                            'KKM' => $rowData[0][1]
                        );
                        $banyak = $this->ANRO_Model->insertExel("anr_mapel", $data, $banyak);
                    }else{
                        $banyak++;
                    }
                }
                else if($table == "anr_program_keahlian"){
                    $cek = $this->ANRO_Model->read("anr_program_keahlian", array('program_keahlian' => $rowData[0][0]))->num_rows();
                    if(!$cek > 0){
                        $data = array(
                            'program_keahlian' => $rowData[0][0]
                        );
                        $banyak = $this->ANRO_Model->insertExel("anr_program_keahlian", $data, $banyak);
                    }else{
                        $banyak++;
                    }
                }
                else if($table == "anr_paket_keahlian"){
                    $cek = $this->ANRO_Model->read("anr_program_keahlian", array('program_keahlian' => $rowData[0][0]))->num_rows();
                    if($cek > 0){
                        $pro = $this->ANRO_Model->read("anr_program_keahlian", array('program_keahlian' => $rowData[0][0]))->row_array();
                        $cek = $this->ANRO_Model->read("anr_paket_keahlian", array('paket_keahlian' => $rowData[0][1]))->num_rows();
                        if(!$cek > 0){
                            $data = array(
                                'id_program_keahlian' => $pro['id_program_keahlian'],
                                'paket_keahlian' => $rowData[0][1]
                            );
                            $banyak = $this->ANRO_Model->insertExel("anr_paket_keahlian", $data, $banyak);
                        }else{
                            $banyak++;
                        }
                    }else{
                        $banyak++;
                    }
                }
                else if($table == "anr_config"){
                    if($rowData[0][1] == "Footer"){
                        $jenis = "F";
                    }
                    else if($rowData[0][1] == "Header"){
                        $jenis = "H";
                    }
                    $kode = $this->ANRO_Model->CKode("anr_config", "ID_Config", $jenis);
                    $cek = $this->ANRO_Model->read("anr_config", array('Nama' => $rowData[0][0]))->num_rows();
                    if(!$cek > 0){
                        $data = array(
                            'ID_Config' => $kode,
                            'Nama' => $rowData[0][0],
                            'Tipe' => $rowData[0][1],
                            'Isi' => $rowData[0][2]
                        );
                        $banyak = $this->ANRO_Model->insertExel("anr_config", $data, $banyak);
                    }else{
                        $banyak++;
                    }
                }
                else if($table == "anr_nilai"){
                    $siswa = explode("/", $rowData[0][0]);
                    $cek = $this->ANRO_Model->read("anr_siswa", array('NIS' => $siswa[0], 'NISN' => $siswa[1]))->num_rows();
                    if($cek > 0){
                        $cek = $this->ANRO_Model->read("anr_mapel", array('Nama_Mapel' => $rowData[0][1]))->num_rows();
                        if($cek > 0){
                            $kelas = explode("-", $rowData[0][3]);
                            $tahun = explode("/", $rowData[0][4]);
                            $cek = $this->ANRO_Model->read("anr_kelas", array('Tingkat_Kelas' => $kelas[0], 'Nama_Kelas' => $kelas[1]."-".$kelas[2], 'Tahun_Masuk' => $tahun[0], 'Tahun_Keluar' => $tahun[1]))->num_rows();
                            if($cek > 0){
                                $siswa = $this->ANRO_Model->read("anr_siswa", array('NIS' => $siswa[0], 'NISN' => $siswa[1]))->row_array();
                                $mapel = $this->ANRO_Model->read("anr_mapel", array('Nama_Mapel' => $rowData[0][1]))->row_array();
                                $kelas = $this->ANRO_Model->read("anr_kelas", array('Tingkat_Kelas' => $kelas[0], 'Nama_Kelas' => $kelas[1]."-".$kelas[2], 'Tahun_Masuk' => $tahun[0], 'Tahun_Keluar' => $tahun[1]))->row_array();
                                $cek = $this->ANRO_Model->read("anr_nilai", array('Siswa' => $siswa['ID_SISWA'], 'Mapel' => $mapel['Kode_Mapel'], 'anr_nilai.Kelas' => $kelas['Kode_Kelas'], 'Semester' => $rowData[0][5]))->num_rows();
                                if(!$cek > 0){
                                    $data = array(
                                        'Siswa' => $siswa['ID_SISWA'],
                                        'Mapel' => $mapel['Kode_Mapel'],
                                        'Jenis_Nilai' => $rowData[0][2],
                                        'Kelas' => $kelas['Kode_Kelas'],
                                        'Semester' => $rowData[0][5],
                                        'Nilai' => $rowData[0][6]
                                    );
                                    $banyak = $this->ANRO_Model->insertExel("anr_nilai", $data, $banyak);
                                }else{
                                    $banyak++;
                                }
                            }else{
                                $banyak++;
                            }
                        }else{
                            $banyak++;
                        }
                    }else{
                        $banyak++;
                    }
                }
                $total++;
            }
            
        }
        
        unlink($inputFileName);
        redirect(base_url($direct."?success=".($total-$banyak)."&&error=".$banyak));
    }
}