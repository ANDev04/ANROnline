<?php
class ANRO_Model extends CI_Model{
    public function create($table,$data){
        $this->db->insert($table,$data);
    }
    public function read($table, $where=""){
        if($table=="anr_siswa"){
            $this->db->select('*');
            $this->db->from('anr_siswa');
            if(!empty($where)){
                $this->db->where($where);
            }
<<<<<<< HEAD
            $this->db->join('anr_kelas', 'anr_kelas.kode_kelas = anr_siswa.kelas');
=======
            $this->db->join('anr_kelas', 'anr_kelas.Kode_Kelas = anr_siswa.kelas');
            $query = $this->db->get();
            return $query;
        }
        else if($table=="anr_nilai"){
            $this->db->select('*');
            $this->db->from('anr_nilai');
            if(!empty($where)){
                $this->db->where($where);
            }
            $this->db->join('anr_siswa', 'anr_siswa.ID_SISWA = anr_nilai.Siswa');
            $this->db->join('anr_kelas', 'anr_kelas.Kode_Kelas = anr_nilai.Kelas');
            $this->db->join('anr_mapel', 'anr_mapel.Kode_Mapel = anr_nilai.Mapel');
>>>>>>> 2cd9fe7f9926d122260c2fded9a5fbda494cd5da
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
        $this->db->delete($table,$where);
    }
    public function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
<<<<<<< HEAD
    public function search($table,$data){
        $this->db->like($data);
        return $this->db->get($table);
        
    }
=======
    
>>>>>>> 2cd9fe7f9926d122260c2fded9a5fbda494cd5da
    public function CKode($table, $data, $awal){
        $this->db->select('RIGHT('.$table.'.'.$data.',1) as kode', FALSE);
        $this->db->order_by($data,'DESC');    
        $this->db->limit(1);     
        $query = $this->db->get($table);
        if($query->num_rows() <> 0){  
            $data = $query->row();      
            $kode = intval($data->kode) + 1;     
        }
        else{       
            $kode = 1;     
        }
        if($kode<10){
            $param=3;
        }else if($kode>=10 && $kode<100){
            $param=2;
        }else{
            $param=1;
        }
        $kodemax = str_pad($kode, $param, '0',STR_PAD_LEFT);  
        $kodejadi = $awal.$kodemax;     
        return $kodejadi;  
    }
}