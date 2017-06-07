<?php
class ANRO_Model extends CI_Model{
    public function create($table,$data){
        $this->db->insert($table,$data);
    }
    public function read($table, $where=""){
        if($table=="anr_nilai"){
            $this->db->select('*');
            $this->db->order_by('Mapel' ,'DESC');    
            $this->db->from('anr_nilai');
            if(!empty($where)){
                $this->db->where($where);
            }
            $this->db->join('anr_siswa', 'anr_siswa.ID_SISWA = anr_nilai.Siswa');
            $this->db->join('anr_kelas', 'anr_kelas.Kode_Kelas = anr_nilai.Kelas');
            $this->db->join('anr_mapel', 'anr_mapel.Kode_Mapel = anr_nilai.Mapel');
            $query = $this->db->get();
            return $query;
        }else if($table=="anr_paket_keahlian"){
            $this->db->select('*');
            $this->db->from('anr_paket_keahlian');
            if(!empty($where)){
                $this->db->where($where);
            }
            $this->db->join('anr_program_keahlian', 'anr_program_keahlian.id_program_keahlian = anr_paket_keahlian.id_program_keahlian');
            $query = $this->db->get();
            return $query;    
        }else if($table=="anr_mapel"){
            $this->db->select('*');
            $this->db->from('anr_mapel');
            if(!empty($where)){
                $this->db->where($where);
            }
            $this->db->join('anr_guru', 'anr_guru.ID_Guru = anr_mapel.Guru');
            $query = $this->db->get();
            return $query;    
        }else if($table=="anr_siswa_kelas"){
            $this->db->select('*');
            $this->db->from('anr_siswa_kelas');
            if(!empty($where)){
                $this->db->where($where);
            }
            $this->db->join('anr_siswa', 'anr_siswa.ID_Siswa = anr_siswa_kelas.ID_Siswa');
            $this->db->join('anr_kelas', 'anr_kelas.Kode_Kelas = anr_siswa_kelas.Kode_Kelas');
            $query = $this->db->get();
            return $query;    
        }else{
            if(!empty($where)){
                return $this->db->get_where($table, $where);    
            }
            else{
                return $this->db->get($table);
            }
        }
    }
    public function delete($table,$where){
        $del=$this->db->delete($table,$where);
        if($del){
        return true;
        }else{
            return false;
        }
    }
    public function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function search($table,$data){
        $this->db->like($data);
        return $this->db->get($table);
        
    }
    public function CKode($table, $data, $awal){
        $banyak = $this->db->get($table)->num_rows();
        if($banyak<10){
            $awal=$awal."00";
        }
        else if($banyak<100){
            $awal=$awal."0";
        }
        $kodejadi=$awal.$banyak;
        return $kodejadi;  
    }
    
    function insertExel($table, $data, $banyak){
        if($this->db->insert($table, $data)){
            return $banyak;
        }else{
            return $banyak += 1;
        }
    }
    
    function readNilai($where){
        $this->db->select('GROUP_CONCAT(Mapel SEPARATOR ",") AS Mapel, GROUP_CONCAT(Jenis_Nilai SEPARATOR ",") AS Jenis_Nilai, GROUP_CONCAT(Nilai SEPARATOR ",") AS Nilai_Siswa');
        $this->db->from('anr_nilai');
        $this->db->where($where);
        return $this->db->get();
    }
}