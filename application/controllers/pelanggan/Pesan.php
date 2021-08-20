<?php
class Pesan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('on') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_customer');
		$this->load->model('m_identitas');
	}
	
	function index(){
		if($this->session->userdata('akses')=='4'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$this->load->view('pelanggan/chat',$x);
		}else{
			echo $this->session->set_flashdata('msg','Akun Anda belum aktif Segera aktifkan ke admin bengkel');
			redirect('pelanggan/login');
		}
		}


}