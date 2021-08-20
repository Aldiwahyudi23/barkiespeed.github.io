<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_customer');
		$this->load->model('m_identitas');
	}
	
	function index(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_customer->get_all_customer_active();
			$this->load->view('admin/v_index',$x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('dashboard');
		}
		}
		public function peringatan() {
			$this->load->view('notification/success');
			echo "<meta http-equiv='refresh' content='2,URL=index'>";
		}

}