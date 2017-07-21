<?php
class ANROC_Siswa extends CI_Controller{
    function index(){
        $key=$this->input->get('key');
        $kelas=$this->input->get('kelas');
        $halaman=$this->input->get('per_page');
        $status=$this->input->get('status');
        $jenis_kelamin=$this->input->get('jk');
        $where=array();
        if($kelas != null || $jenis_kelamin != null || $status != null){
            if($kelas != null){
                array_push($where, "Kelas ='".$this->db->escape_str($kelas)."'");
            }
            if($jenis_kelamin != null){
                array_push($where, "Jenis_Kelamin ='".$this->db->escape_str($jenis_kelamin)."'");
            }
            if($status != null){
                array_push($where, "Status ='".$this->db->escape_str($status)."'");
            }
            
        }
        if(empty($halaman)){
            $halaman=0;
        }
        $data['title']= "ANROnline | Data Siswa";
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $this->ANRO_Model->page("anr_siswa",NULL,NULL,$where,$key)->num_rows();
        $settings['base_url']= base_url('ANROC_Siswa/?key='.$key.'&kelas='.$kelas);
        $settings['per_page']=35;
        $settings['uri_segment']=3;
        
        $settings['first_link'] = '<i class="material-icons">first_page</i>';
        $settings['last_link'] = '<i class="material-icons">last_page</i>';
        $settings['next_link'] = '<i class="material-icons">chevron_right</i>';
        $settings['prev_link'] = '<i class="material-icons">chevron_left</i>';
      
        $this->pagination->initialize($settings);   
        $data['resource']=$this->ANRO_Model->page("anr_siswa",$settings['per_page'],$halaman,$where,$key)->result();
        
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Siswa/ANROV_Siswa",$data);
        $this->load->view("ANROV_Footer");    
    }
    function page(){
        $key=$this->input->get('key');
        $kelas=$this->input->get('kelas');
        $halaman=$this->input->get('per_page');
        if(empty($halaman)){
            $halaman=0;
        }
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['total_rows'] = $this->ANRO_Model->page("anr_siswa",NULL,NULL,$kelas,$key)->num_rows();
        $settings['base_url']= base_url('ANROC_Siswa/?key='.$key.'&kelas='.$kelas);
        $settings['per_page']=35;
        $settings['uri_segment']=3;
        $this->pagination->initialize($settings);   
        $resource=$this->ANRO_Model->page("anr_siswa",$settings['per_page'],$halaman,$kelas,$key)->result();
           
        echo "<thead>";
            echo "<tr>";
                echo "<th>NIS/NISN</th>";
                echo "<th>Nama Siswa</th>";
                echo "<th>Jenis Kelamin</th>";
                echo "<th>Kelas</td>";
                echo "<th colspan='2'>Aksi</th>";
            echo "</tr>";
            echo "<tr>";
                echo "<th><div class='input-field'><input id='search' type='search' required><label class='label-icon' for='search'><i class='material-icons' id='go'>search</i></label><i class='material-icons' onclick='$('#search').val('')'>close</i></div></th>";
                echo "<th colspan=5><select name='tingkat_kelas' id='tingkat_kelas'><option value='Semua'>Semua Tingkat</option><option value='X'>Tingkat X</option><option value='XI'>Tingkat XI</option><option value='XII'>Tingkat XII</option></select></th>";
            echo "</tr>";
        
        foreach($resource as $isi){
            $jk;
            if($isi->Jenis_Kelamin=="L"){
                $jk="Laki-Laki";
            }
            else{
                $jk="Perempuan";
            }
            echo "<tr>";
                echo "<td>".$isi->NIS."/".$isi->NISN."</td>";
                echo "<td>".$isi->Nama_Siswa."</td>";
                echo "<td>".$jk."</td>";
                echo "<td>".$isi->Kelas."</td>";
                echo "<td><a href=".base_url("ANROC_Siswa/Edit/$isi->ID_SISWA")."><i class='material-icons'>edit</i></a></td>";
                echo "<td><a href=".base_url("ANROC_Siswa/Hapus/$isi->ID_SISWA")."onclick='return confirm('Apakah Anda yakin ingin menghapus data?')'><i class='material-icons'>delete</i></a></td>";
            echo "</tr>";
        }
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
    function tingkat_kelas(){
        $tingkat_kelas=$_POST['kelas'];
        if($tingkat_kelas=="Semua"){
            $isi_table=$this->ANRO_Model->read("anr_siswa")->result();
        }else{
            $isi_table=$this->ANRO_Model->read("anr_siswa",array("Kelas"=>$tingkat_kelas))->result();
            }
            foreach($isi_table as $isi){
                $jk;
                if($isi->Jenis_Kelamin=="L"){
                    $jk="Laki-Laki";
                }
                else{
                    $jk="Perempuan";
                }
                echo "<tr>";
                    echo "<td>".$isi->NIS."/".$isi->NISN."</td>";
                    echo "<td>".$isi->Nama_Siswa."</td>";
                    echo "<td>".$jk."</td>";
                    echo "<td>".$isi->Kelas."</td>";
                    echo "<td><a href=".base_url("ANROC_Siswa/Edit/$isi->ID_SISWA")."><i class='material-icons'>edit</i></a></td>";
                    echo "<td><a href=".base_url("ANROC_Siswa/Hapus/$isi->ID_SISWA")."onclick='return confirm('Apakah Anda yakin ingin menghapus data?')'><i class='material-icons'>delete</i></a></td>";
                echo "</tr>";
        }
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