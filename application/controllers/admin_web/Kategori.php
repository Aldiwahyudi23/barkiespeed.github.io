<?php
class Kategori extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_kategori');
		$this->load->library('upload');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_kategori->get_all_kategori();
			$this->load->view('admin_web/v_kategori', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/dashboard');
		}
	}

	function simpan_kategori() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kategori = strip_tags($this->input->post('xkategori'));
			$this->m_kategori->simpan_kategori($kategori);
			echo $this->session->set_flashdata('msg', 'success');
			redirect('admin_web/kategori');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/kategori');
		}
	}

	function update_kategori() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = strip_tags($this->input->post('kode'));
			$kategori = strip_tags($this->input->post('xkategori'));
			$this->m_kategori->update_kategori($kode, $kategori);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin_web/kategori');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/kategori');
		}
	}
	function hapus_kategori() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = strip_tags($this->input->post('kode'));
			$this->m_kategori->hapus_kategori($kode);
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin_web/kategori');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/kategori');
		}
	}

}
