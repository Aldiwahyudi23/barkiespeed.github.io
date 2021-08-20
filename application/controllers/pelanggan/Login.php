<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('mlogin');
        $this->load->model('m_identitas');
    }
    function index(){
        $x['iden'] = $this->m_identitas->get_all_identitas();
        $x['judul']="Silahkan Masuk..!";
        $this->load->view('pelanggan/v_login',$x);
    }
    function cekuser(){
        $username=strip_tags(stripslashes($this->input->post('username',TRUE)));
        $password=strip_tags(stripslashes($this->input->post('password',TRUE)));
        $u=$username;
        $p=$password;
        $cadmin=$this->mlogin->cekpelanggan($u,$p);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('on',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['level']=='4')
            $this->session->set_userdata('akses','4');
            $idadmin=$xcadmin['id'];
            $nama=$xcadmin['nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$nama);
         if($xcadmin['level']=='5'){
             $this->session->set_userdata('akses','5');
             $idadmin=$xcadmin['id'];
             $nama=$xcadmin['nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$nama);
         } //Front Office
         if($xcadmin['level']=='10'){
            $this->session->set_userdata('akses','2');
            $idadmin=$xcadmin['id'];
            $nama=$xcadmin['nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$nama);
         }
           
         
         
        }
        
        if($this->session->userdata('on')==true){
            redirect('pelanggan/login/berhasillogin');
        }else{
            redirect('pelanggan/login/gagallogin');
        }
    }
        function berhasillogin(){
            redirect('pelanggan/dashboard');
        }
        function gagallogin(){
            $url=base_url('pelanggan/login');
            echo $this->session->set_flashdata('msg','No Faktur Atau Password Salah');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('beranda');
            redirect($url);
        }
}