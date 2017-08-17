<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ANROC_Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
       
    }
    function index(){
        if($this->session->username != null){
            redirect("Beranda");
        }
        else{
            $this->load->view("Auth/ANROV_Login");
        }
    }
    function hapus($id){
        if($this->session->username == null){
            redirect("ANROC_Auth");
        }else{
            $where=array('id_auth'=>$id);
            $this->ANRO_Model->delete("anr_auth",$where);
            redirect("ANROC_Auth/akun");
        }
        
    }
    function register(){
        if($this->session->username == null){
            redirect("ANROC_Auth");
        }else{
            $data['title']="ANROnline | Regitrasi";
            $this->load->view("ANROV_Header",$data);
            $this->load->view("Auth/ANROV_Register");
            $this->load->view("ANROV_Footer");
        }
        
    }
    function ganti(){
        $pass = $this->input->post('password');
        $old = $this->input->post('con_password_lama');
        $data=array(
            'password'=> md5($pass)
        );
        $where=array(
            'password'=>md5($old),
            'email'=>$this->input->post('email')
        );
        $this->ANRO_Model->update($where,$data,"anr_auth");
        redirect('Beranda');
    }
    function forgotpass(){
        $this->load->view("Auth/ANROV_Reset");
    }
    function forcereset(){
        $data['title']="ANROnline | Ganti Password";
         if($this->session->username == null){
            redirect("ANROC_Auth");
        }else{
            $this->load->view("ANROV_Header",$data);
            $this->load->view("Auth/ANROV_Change",$data);
            $this->load->view("ANROV_Footer");
        }
    }
    function reset(){
        $email = $this->input->post('email');
        $encrypted_email = md5($email);
        $this->load->library('email');
        $config = array();
        $config['charset'] = 'utf-8';
        $config['useragent'] = 'Codeigniter';
        $config['protocol']= "smtp";
        $config['mailtype']= "html";
        $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
        $config['smtp_port']= "465";
        $config['smtp_timeout']= "400";
        $config['smtp_user']= "anraport.online@gmail.com"; // isi dengan email kamu
        $config['smtp_pass']= "ANROnline123"; // isi dengan password kamu
        $config['crlf']="\r\n"; 
        $config['newline']="\r\n"; 
        $config['wordwrap'] = TRUE;
        //memanggil library email dan set konfigurasi untuk pengiriman email

        $this->email->initialize($config);
        //konfigurasi pengiriman
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject("Reset Password");
        $this->email->message(
         "Request Reset Password, Silahkan Klik Link dibawah ini<br><br>".
          site_url("ANROC_Auth/forcereset/".$encrypted_email)
        );

        if($this->email->send())
        {
           echo "Berhasil melakukan reset password, silahkan cek email";
        }else
        {
           echo "Gagal";
        }

        echo "<br><br><a href='".site_url("ANROC_Auth")."'>Kembali ke Menu Login</a>";
    }
    function daftar(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $data = array(
            'username' => $username,
            'password' => md5($password),
            'nama' => $nama,
            'email' => $email,
            'aktif' => 0
        );
        $id = $this->ANRO_Model->create("anr_auth",$data);
        redirect("ANROC_Auth/Akun");
    }
    public function verification($key)
    {
        $this->ANRO_Model->update(array("md5(id_auth)"=>$key),array('aktif'=>1),"anr_auth");
        echo "Selamat kamu telah memverifikasi akun kamu";
        echo "<br><br><a href='".site_url("ANROC_Auth/")."'>Kembali ke Menu Login</a>";
    }
    function auth(){
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $word = md5($pass);
        $where="(username = '".$this->db->escape_str($username)."' OR email = '".$this->db->escape_str($username)."') AND password = '".$this->db->escape_str($word)."'";
        $cek = $this->ANRO_Model->read("anr_auth",$where);
        if($cek->num_rows() > 0){
            foreach($cek->result() as $res){
                $nama= $res->nama;
                $email= $res->e-mail;
                $data_session = array(
                'username' => $username,
                'nama' =>  $nama,
                'email' => $email
            );
            $this->session->set_userdata($data_session); 
            redirect("Beranda");
            }
        }else{  
            redirect("ANROC_Auth?error=1");
       }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect("ANROC_Auth/");
    }
    function akun(){
        $data['title'] = "ANROnline | Akun";
        $data['resource'] = $this->ANRO_Model->read("anr_auth")->result();
        $this->load->view("ANROV_Header", $data);
        $this->load->view("Auth/ANROV_Akun", $data);
        $this->load->view("ANROV_Footer", $data);
    }
}