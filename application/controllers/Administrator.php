<?php
class Administrator extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('mlogin');
        $this->load->model('m_identitas');
    }
    function index(){
        $x['iden'] = $this->m_identitas->get_all_identitas();
        $x['judul']="Silahkan Masuk..!";
        $this->load->view('admin/v_login',$x);
    }
    function cekuser(){
        $username=strip_tags(str_replace("'", "",$this->input->post('username',TRUE)));
        $password=strip_tags(str_replace("'", "",$this->input->post('password',TRUE)));
        $u=$username;
        $p=$password;
        $cadmin=$this->mlogin->cekadmin($u,$p);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['level']=='1')
            $this->session->set_userdata('akses','1');
            $idadmin=$xcadmin['id'];
            $nama=$xcadmin['nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$nama);
         if($xcadmin['level']=='3'){
             $this->session->set_userdata('akses','3');
             $idadmin=$xcadmin['id'];
             $nama=$xcadmin['nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$nama);
         } //Front Office
         if($xcadmin['level']=='2'){
             $this->session->set_userdata('akses','2');
             $idadmin=$xcadmin['id'];
             $nama=$xcadmin['nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$nama);
         } //Front Office
           
         
         
        }
        
        if($this->session->userdata('masuk')==true){
            redirect('administrator/berhasillogin');
        }else{
            redirect('administrator/gagallogin');
        }
    }
        function berhasillogin(){
            redirect('dashboard');
        }
        function gagallogin(){
            $url=base_url('administrator');
            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('administrator');
            redirect($url);
        }
}