<?php
class ANROC_Siswa extends CI_Controller{
    function index(){
        $page=$this->input->get('per_page');
        $batas=2; //jlh data yang ditampilkan per halaman
        if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
           $offset = 0;
        else:
           $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        endif;
 
        $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
        $config['base_url'] = base_url().'ANROC_Siswa/?';   //url yang muncul ketika tombol pada paging diklik
        $config['total_rows'] = $this->ANRO_Model->read("anr_siswa")->num_rows(); // jlh total barang
        $config['per_page'] = $batas; //batas sesuai dengan variabel batas
 
        $config['uri_segment'] = $page; //merupakan posisi pagination dalam url pada kesempatan ini saya menggunakan method get untuk menentukan posisi pada url yaitu per_page
 
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
 
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
 
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
 
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
 
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
 
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['jlhpage']=$page;
        $data['title'] = 'ANROnline | Data Siswa'; //judul title
        $data['resource'] = $this->ANRO_Model->page("anr_siswa",$batas,$offset)->result(); //query model semua barang
        $this->load->view("ANROV_Header",$data);
        $this->load->view('Siswa/ANROV_Siswa',$data);
        $this->load->view("ANROV_Footer",$data);
    }
    public function cari()
    {
        $key= $this->input->get('key'); //method get key
        $page=$this->input->get('per_page');  //method get per_page
        $kelas="";
        if($this->input->get('kelas')!=""){
            $kelas=$this->input->get('kelas');
        }
        $where=array('kelas'=>$kelas);
        $search=array(
            'nis'=> $key,
            'nisn'=> $key,
            'nama_siswa'=> $key
        ); //array pencarian yang akan dibawa ke model
        $id=$key;
        $batas=5; //jlh data yang ditampilkan per halaman
        if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
           $offset = 0;
        else:
           $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        endif;
 
        $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
        $config['base_url'] = base_url().'ANROC_Siswa/cari  ?key='.$key.'&kelas='.$kelas;   //url yang muncul ketika tombol pada paging diklik
        $config['total_rows'] = $this->ANRO_Model->search("anr_siswa",$search)->num_rows();// jlh total barang
        $config['per_page'] = $batas; //batas sesuai dengan variabel batas
 
        $config['uri_segment'] = $page; //merupakan posisi pagination dalam url pada kesempatan ini saya menggunakan method get untuk menentukan posisi pada url yaitu per_page
 
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
 
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
 
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
 
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
 
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
 
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['paging']=$this->pagination->create_links();
        $data['jlhpage']=$page;
 
        $data['title'] = 'ANROnline | Data Siswa'; //judul title
        $data['resource'] = $this->ANRO_Model->page("anr_siswa",$batas,$offset,$kelas,$id)->result(); //query model semua barang
 
        $this->load->view("ANROV_Header",$data);
        $this->load->view('Siswa/ANROV_Siswa',$data);
        $this->load->view("ANROV_Footer",$data);
 
    }
       
    function profile($id_siswa){
        $data['resource']=$this->ANRO_Model->read("anr_siswa",array('id_siswa'=>$id_siswa))->result();
        $data['kelas']= $this->ANRO_Model->read("anr_siswa_kelas",array('anr_siswa.id_siswa'=>$id_siswa))->result();
        foreach($data['resource'] as $res){
            $nama=$res->Nama_Siswa;
            $data["ID_Siswa"]=$id_siswa;
        }
        $data['title']="ANROnline | ".$nama;
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Siswa/ANROV_Profile",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function create(){
        $data['title']="ANROnline | Tambah Data Siswa";
        $data['resource']=$this->ANRO_Model->read("ANR_Kelas")->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Siswa/ANROV_addSiswa",$data);
        $this->load->view("ANROV_Footer",$data);
    }
     function edit($id_siswa){
        $data['title']="ANROnline | Edit Data Siswa";
        $data['resource']=$this->ANRO_Model->read("anr_siswa",array('id_siswa'=>$id_siswa))->result();
        $data['kelas']=$this->ANRO_Model->read("ANR_Kelas")->result();
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Siswa/ANROV_editSiswa",$data);
        $this->load->view("ANROV_Footer",$data);
    }
    function save(){
        if($this->input->post("type")=="insert"){
            $cek = $this->ANRO_Model->read("anr_siswa", array('NIS' => $this->input->post('NIS'), 'NISN'=>$this->input->post('NISN')))->num_rows();
            if(!$cek > 0){
                $data=array(
                    'NIS'=>$this->input->post('NIS'),
                    'NISN'=>$this->input->post('NISN'),
                    'nama_siswa'=>$this->input->post('Nama_Siswa'),
                    'jenis_kelamin'=>$this->input->post('Jenis_Kelamin'),
                    'tempat_lahir'=>$this->input->post('Tempat_Lahir'),
                    'tanggal_lahir'=>$this->input->post('Tanggal_Lahir'),
                    'agama'=>$this->input->post('Agama'),
                    'kelas'=>$this->input->post('Kelas'),
                    'no_telp'=>$this->input->post('No_Telp'),
                    'alamat'=>$this->input->post('Alamat'),
                    'status'=>$this->input->post('Status')
                );
                $this->ANRO_Model->create("ANR_Siswa",$data);
                $siswa=$this->ANRO_Model->read("anr_siswa",$data)->result();
                foreach($siswa as $sis){
                    $tahun_masuk=$sis->tahun_masuk;
                    $tahun_keluar=$sis->tahun_keluar;
                }
            }
            
        }
        else if($this->input->post("type")=="update"){
            $where=array("id_siswa"=>$this->input->post("id_siswa"));
            $data=array(
                'NIS'=>$this->input->post('NIS'),
                'NISN'=>$this->input->post('NISN'),
                'nama_siswa'=>$this->input->post('Nama_Siswa'),
                'jenis_kelamin'=>$this->input->post('Jenis_Kelamin'),
                'tempat_lahir'=>$this->input->post('Tempat_Lahir'),
                'tanggal_lahir'=>$this->input->post('Tanggal_Lahir'),
                'agama'=>$this->input->post('Agama'),
                'kelas'=>$this->input->post('Kelas'),
                'no_telp'=>$this->input->post('No_Telp'),
                'alamat'=>$this->input->post('Alamat'),
                'status'=>$this->input->post('Status')
            );
            $this->ANRO_Model->update($where,$data,"anr_siswa");
        }
        redirect("ANROC_Siswa/");
    }
    function hapus($id_siswa){
        $where=array('id_siswa'=>$id_siswa);
        $this->ANRO_Model->delete("anr_siswa",$where);
        $where1=array('Siswa'=>$id_siswa);
        $this->ANRO_Model->delete("anr_nilai",$where1);
        redirect("ANROC_SISWA");
        
    }
}

?>