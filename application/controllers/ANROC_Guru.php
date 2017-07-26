<?php
class ANROC_Guru extends CI_Controller{
    function index(){
        $halaman=$this->input->get('per_page');
        $key=$this->input->get('key');
        $status=$this->input->get('status');
        $jenis_kelamin=$this->input->get('jk');
        if(empty($halaman)){
            $halaman=0;
        }
        $where=array();
        if($jenis_kelamin != null || $status != null){
            if($jenis_kelamin != null){
                array_push($where, "Jenis_Kelamin ='".$this->db->escape_str($jenis_kelamin)."'");
            }
            if($status != null){
                array_push($where, "Status ='".$this->db->escape_str($status)."'");
            }
            
        }
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $this->ANRO_Model->page("anr_guru",NULL,NULL,$where,$key)->num_rows();
        $settings['base_url']= base_url('ANROC_Guru/');
        $settings['per_page']=10;
        $settings['uri_segment']=3;
        
        $settings['first_link'] = '<i class="material-icons">first_page</i>';
        $settings['last_link'] = '<i class="material-icons">last_page</i>';
        $settings['next_link'] = '<i class="material-icons">chevron_right</i>';
        $settings['prev_link'] = '<i class="material-icons">chevron_left</i>';
        
        $this->pagination->initialize($settings);   
        $data['title']="ANROnline | DATA Guru";
        $data['resource']=$this->ANRO_Model->page("anr_guru",$settings['per_page'],$halaman,$where,$key)->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Guru/ANROV_Guru",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function profile($id){
        $data['resource']=$this->ANRO_Model->read("anr_guru",array('id_guru'=>$id))->result();
        foreach($data['resource'] as $res){
            $nama=$res->Nama_Guru;
        }
        $data['mapel']=$this->ANRO_Model->read("anr_guru_mapel",array('anr_guru_mapel.id_guru'=>$id))->result();
        $data['title']="ANROnline | ".$nama;
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Guru/ANROV_Profile",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function create(){
        $data['title']="ANROnline | Tambah Data Guru";
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Guru/ANROV_addGuru",$data);
        $this->load->view("ANROV_Footer",$data);
    }
     function edit($id_guru){
        $data['title']="ANROnline | Edit Data Guru";
        $data['resource']=$this->ANRO_Model->read("anr_guru",array('id_guru'=>$id_guru))->result();
        $data['kelas']=$this->ANRO_Model->read("ANR_Kelas")->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Guru/ANROV_editGuru",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function save(){
        if($this->input->post("type")=="insert"){
            $data=array(
                'NIP'=>$this->input->post('NIP'),
                'NUPTK'=>$this->input->post('NUPTK'),
                'nama_guru'=>$this->input->post('Nama_Guru'),
                'jenis_kelamin'=>$this->input->post('Jenis_Kelamin'),
                'status'=>$this->input->post('Status')
            );
            $this->ANRO_Model->create("anr_guru",$data);
        }
        else if($this->input->post("type")=="update"){
            $where=array("id_guru"=>$this->input->post("id_guru"));
            $data=array(
                'NIP'=>$this->input->post('NIP'),
                'NUPTK'=>$this->input->post('NUPTK'),
                'nama_guru'=>$this->input->post('Nama_Guru'),
                'jenis_kelamin'=>$this->input->post('Jenis_Kelamin'),
                'status'=>$this->input->post('Status')
            );
            $this->ANRO_Model->update($where,$data,"anr_guru");
        }
        redirect("ANROC_Guru/");
    }
    function hapus($id_guru){
        $where=array("id_guru"=>$id_guru);
        $this->ANRO_Model->delete("anr_guru",$where);
        $this->ANRO_Model->delete("anr_guru_mapel",$where);
        redirect("ANROC_Guru");
        
    }
}

?>