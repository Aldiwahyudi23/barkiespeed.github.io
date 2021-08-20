<?php
class Waktu extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_waktu');
		$this->load->library('upload');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['data'] = $this->m_waktu->get_all_waktu();
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$this->load->view('admin_web/v_waktu', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/dashboard');
		}
	}

	function simpan_waktu() {
		$hari = strip_tags($this->input->post('xhari'));
		$jam = strip_tags($this->input->post('xjam'));
		$this->m_waktu->simpan_waktu($hari, $jam);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin_web/waktu');
	}

	function update_waktu() {
		$kode = strip_tags($this->input->post('kode'));
		$hari = strip_tags($this->input->post('xhari'));
		$jam = strip_tags($this->input->post('xjam'));
		$this->m_waktu->update_waktu($kode, $hari, $jam);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin_web/waktu');
	}
	function hapus_waktu() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = strip_tags($this->input->post('kode'));
			$this->m_waktu->hapus_waktu($kode);
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin_web/waktu');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/waktu');
		}
	}

}
