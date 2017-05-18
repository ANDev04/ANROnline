<?php
class ANRO_Model extends CI_Model{
    public function create($table,$data){
        $this->db->insert($table,$data);
    }
    public function read($table, $where){
        if(!empty($where)){
            return $this->db->get_where($table, $where);    
        }
        else{
            return $this->db->get($table);
        }
    }
    public function delete($table,$where){
        $this->db->delete($table,$where);
    }
    public function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    
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
        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
        $kodejadi = $awal.$kodemax;     
        return $kodejadi;  
    }
}