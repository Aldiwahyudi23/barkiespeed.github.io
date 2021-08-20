<?php
class Inbox extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_kontak');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$this->m_kontak->update_status_kontak();
			$x['data'] = $this->m_kontak->get_all_inbox();
			$this->load->view('admin_web/v_inbox', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/dashboard');
		}
	}

	function hapus_inbox() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = $this->input->post('kode');
			$this->m_kontak->hapus_kontak($kode);
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin_web/inbox');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/inbox');
		}
	}
}