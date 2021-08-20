<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('beranda');
            redirect($url);
        };
		$this->load->model('m_kate');
		$this->load->model('m_identitas');
	}
	function index(){
	if($this->session->userdata('akses')=='1'|| $this->session->userdata('akses')=='2'){
		$data['iden'] = $this->m_identitas->get_all_identitas();
		$data['data']=$this->m_kate->tampil_kategori();
		$this->load->view('admin/master/v_kategori',$data);
	}else{
        	echo $this->session->set_flashdata('msg', 'danger');
			redirect('dashboard');
    }
	}
	function tambah_kategori(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kat=$this->input->post('kategori');
		$this->m_kate->simpan_kategori($kat);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/kategori');
	}else{
        	echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/kategori');
    }
	}
	function edit_kategori(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$kat=$this->input->post('kategori');
		$this->m_kate->update_kategori($kode,$kat);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/kategori');
	}else{
        	echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/kategori');
    }
	}
	function hapus_kategori(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$this->m_kate->hapus_kategori($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/kategori');
	}else{
        	echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/kategori');
    }
	}
}