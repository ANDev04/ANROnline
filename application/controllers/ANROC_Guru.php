<?php
class ANROC_Guru extends CI_Controller{
    function index(){
        $data['title']="ANROnline | DATA Guru";
        $data['resource']=$this->ANRO_Model->read("anr_guru")->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Guru/ANROV_Guru",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function profile($id){
        $data['resource']=$this->ANRO_Model->read("anr_guru",array('id_guru'=>$id))->result();
        foreach($data['resource'] as $res){
            $nama=$res->Nama_Guru;
        }
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
        redirect("ANROC_Guru");
        
    }
}

?>