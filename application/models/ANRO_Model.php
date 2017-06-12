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
        $this->db->select('RIGHT('.$table.'.'.$data.',3) as kode', FALSE);
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
        $kodemax = str_pad($kode, 3, '0',STR_PAD_LEFT);  
        $kodejadi = $awal.$kodemax;     
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
    public function datatables($dt){
                $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $sql  = "SELECT {$columns} FROM {$dt['table']}";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        // pengkondisian aksi seperti next, search dan limit
        $columnd = $dt['col-display'];
        $count_c = count($columnd);
        // search
        $search = $dt['search']['value'];
        /**
         * Search Global
         * pencarian global pada pojok kanan atas
         */
        $where = '';
        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                $where .= $columnd[$i] .' LIKE "%'. $search .'%"';
                
                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        
        /**
         * Search Individual Kolom
         * pencarian dibawah kolom
         */
        for ($i=0; $i < $count_c; $i++) { 
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }
        /**
         * pengecekan Form pencarian
         * pencarian aktif jika ada karakter masuk pada kolom pencarian.
         */
        if ($where != '') {
            $sql .= " WHERE " . $where;
            
        }
        
        // sorting
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        
        // limit
        $start  = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        
        $list = $this->db->query($sql);
        /**
         * convert to json
         */
        $option['draw']            = $dt['draw'];
        $option['recordsTotal']    = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();
        foreach ($list->result() as $row) {
        /**
         * custom gunakan
         * $option['data'][] = array(
         *                       $row->columnd[0],
         *                       $row->columnd[1],
         *                       $row->columnd[2],
         *                       $row->columnd[3],
         *                       $row->columnd[4],
         *                       .....
         *                     );
         */
           $rows = array();
           for ($i=0; $i < $count_c; $i++) { 
               $rows[] = $row->$columnd[$i];
           }
           $option['data'][] = $rows;
        }
        // eksekusi json
        echo json_encode($option);
    }
}