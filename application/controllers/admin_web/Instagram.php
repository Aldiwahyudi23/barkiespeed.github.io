<?php
class Instagram extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_instagram');
		$this->load->model('m_identitas');
		$this->load->library('upload');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_instagram->get_all_instagram();
			$this->load->view('admin_web/v_instagram', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/barang');
		}
	}

	function update_instagram() {
		
		$data = array();
		$data['userid'] = $this->input->post('xuserid');
		$data['client'] = $this->input->post('xclient');
		$data['accestoken'] = $this->input->post('xtoken');
		$result = $this->m_instagram->update_idn($data);
		if ($result) {
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin_web/instagram');
		} else {
			echo $this->session->set_flashdata('msg', 'warning');
			redirect('admin_web/instagram');
		}

	}
}