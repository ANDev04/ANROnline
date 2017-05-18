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
}