<?php
class Satuan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_satuan');
		$this->load->model('m_identitas');
	}
	function index(){
	if($this->session->userdata('akses')=='1'||$this->session->userdata('akses')=='2'){
		$data['iden'] = $this->m_identitas->get_all_identitas();
		$data['data']=$this->m_satuan->tampil_satuan();
		$this->load->view('admin/master/v_satuan',$data);
	}else{
        echo $this->session->flashdata('msg','danger');
		redirect('dashboard');
    }
	}
	function tambah_satuan(){
	if($this->session->userdata('akses')=='1'||$this->session->userdata('akses')=='2'){
		$kat=$this->input->post('satuan');
		$this->m_satuan->simpan_satuan($kat);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/satuan');
	}else{
        echo $this->session->flashdata('msg','danger');
		redirect('admin/satuan');
    }
	}
	function edit_satuan(){
	if($this->session->userdata('akses')=='1'||$this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$kat=$this->input->post('satuan');
		$this->m_satuan->update_satuan($kode,$kat);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/satuan');
	}else{
        echo $this->session->flashdata('msg','danger');
		redirect('admin/satuan');
    }
	}
	function hapus_satuan(){
	if($this->session->userdata('akses')=='1'||$this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$this->m_satuan->hapus_satuan($kode);
		echo $this->session->set_flashdata('msg', 'seccess-hapus');
		redirect('admin/satuan');
	}else{
        echo $this->session->flashdata('msg','danger');
		redirect('admin/satuan');
    }
	}
}