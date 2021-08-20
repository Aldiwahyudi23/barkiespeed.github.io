<?php
class Socmed extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_socmed');
		$this->load->library('upload');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_socmed->get_all_socmed();
			$this->load->view('admin_web/v_socmed', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/dashboard');
		}
	}

	function simpan_socmed() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$nama = strip_tags($this->input->post('xnama'));
			$url = strip_tags($this->input->post('xurl'));
			$icon = strip_tags($this->input->post('xicon'));
			$this->m_socmed->simpan_socmed($nama, $url, $icon);
			echo $this->session->set_flashdata('msg', 'success');
			redirect('admin_web/socmed');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/socmed');
		}
	}

	function update_socmed() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = strip_tags($this->input->post('kode'));
			$nama = strip_tags($this->input->post('xnama'));
			$url = strip_tags($this->input->post('xurl'));
			$icon = strip_tags($this->input->post('xicon'));
			$this->m_socmed->update_socmed($kode, $nama, $url, $icon);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin_web/socmed');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/socmed');
		}
	}
	function hapus_socmed() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = strip_tags($this->input->post('kode'));
			$this->m_socmed->hapus_socmed($kode);
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin_web/socmed');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/socmed');
		}
	}

}
