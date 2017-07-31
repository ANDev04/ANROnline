<?php
class ANROC_Auth extends CI_Controller{
    function index(){
        $this->load->view("Auth/ANROV_Login");
    }
    function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek=$this->ANRO_Model->read("anr_auth",array("username='$username' AND password='$password' OR email='$username' AND password='$password'"));
        if($cek->num_rows()>0){
            foreach($cek->result() as $res){
                $sessi=array(
                    'username'  => $res->username,
                    'email'     => $res->email,
                    'nama' => $res->nama
                );
            redirect("Beranda");
            }
        }else{
            echo "Password Salah";
        }

        
    }
    function register(){
        $data['title']="ANROnline | Daftar";
        $this->load->view("ANROV_Header",$data);
        $this->load->view("Auth/ANROV_Register");
        $this->load->view("ANROV_Footer");
    }
    function daftar(){
         //passing post data dari view
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
  
    //memasukan ke array
    $data = array(
     'username' => $username,
     'password' => $password,
     'nama' => $nama,
     'email' => $email,
     'aktif' => 0
     );
    //tambahkan akun ke database
    $id = $this->ANRO_Model->create("anr_auth",$data);
  
    //enkripsi id
    $encrypted_id = md5($id);
  
    $this->load->library('email');
    $config = array();
    $config['charset'] = 'utf-8';
    $config['useragent'] = 'Codeigniter';
    $config['protocol']= "smtp";
    $config['mailtype']= "html";
    $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
    $config['smtp_port']= "465";
    $config['smtp_timeout']= "400";
    $config['smtp_user']= "arifnurdiansyah92@gmail.com"; // isi dengan email kamu
    $config['smtp_pass']= "naonweh123"; // isi dengan password kamu
    $config['crlf']="\r\n"; 
    $config['newline']="\r\n"; 
    $config['wordwrap'] = TRUE;
    //memanggil library email dan set konfigurasi untuk pengiriman email
   
    $this->email->initialize($config);
    //konfigurasi pengiriman
    $this->email->from($config['smtp_user']);
    $this->email->to($email);
    $this->email->subject("Verifikasi Akun");
    $this->email->message(
     "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
      site_url("ANROC_Auth/verification/$encrypted_id")
    );
  
    if($this->email->send())
    {
       echo "Berhasil melakukan registrasi, silahkan cek email kamu";
    }else
    {
       echo "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email";
    }
  
    echo "<br><br><a href='".site_url("ANROC_Auth/")."'>Kembali ke Menu Login</a>";
    }
    function verification($key){
        $data = array(
            'aktif' => 1
        );
        $where=array(
            'md5(id_auth)' => $key
        );
        $this->ANRO_Model->Update($where,$data,"anr_auth");
        echo "Selamat kamu telah memverifikasi akun kamu";
        echo "<br><br><a href='".site_url("ANROC_Auth")."'>Kembali ke Menu Login</a>";
    }
}

?>