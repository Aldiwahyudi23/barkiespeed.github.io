<?php
class Dashboard extends CI_Controller{
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
		if($this->session->userdata('akses')=='4' || $this->session->userdata('akses')=='5' || $this->session->userdata('akses')=='1'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_customer->get_all_customer_active();
			$this->load->view('pelanggan/v_index',$x);
		}else{
			echo $this->session->set_flashdata('msg','Akun Anda belum aktif Segera aktifkan ke admin bengkel');
			redirect('pelanggan/login');
		}
		}


}