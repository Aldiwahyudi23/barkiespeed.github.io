<?php
class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_pengunjung');
	}
	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
				$x['iden'] = $this->m_identitas->get_all_identitas();
				$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
				$this->load->view('admin_web/v_dashboard', $x);
			}else{
				echo $this->session->set_flashdata('msg', 'danger');
				redirect('admin_web/dashboard');
			}

	}
	// public function get_unread_message($count) {
	// 	$data = $this->m_pengunjung->where()->num_rows();
	// 	echo json_encode($data);
	// }

}