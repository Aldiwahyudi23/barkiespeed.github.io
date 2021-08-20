<?php
class Suplier extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_suplier');
		$this->load->model('m_identitas');
	}
	function index(){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
		$data['iden'] = $this->m_identitas->get_all_identitas();
		$data['data']=$this->m_suplier->tampil_suplier();
		$this->load->view('admin/master/v_suplier',$data);
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('dashboard');
    }
	}
	function tambah_suplier(){
	if($this->session->userdata('akses')=='1'  ||$this->session->userdata('akses')=='2'){
		$nama=$this->input->post('nama');
		$perusahaan=$this->input->post('perusahaan');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_suplier->simpan_suplier($nama,$perusahaan,$alamat,$notelp);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/suplier');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/suplier');
    }
	}
	function tambah_suplier_pembelian(){
	if($this->session->userdata('akses')=='1'  ||$this->session->userdata('akses')=='2'){
		$nama=$this->input->post('nama');
		$perusahaan=$this->input->post('perusahaan');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_suplier->simpan_suplier($nama,$perusahaan,$alamat,$notelp);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/pembelian');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/suplier');
    }
	}
	function edit_suplier(){
	if($this->session->userdata('akses')=='1'  ||$this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$perusahaan=$this->input->post('perusahaan');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_suplier->update_suplier($kode,$nama,$perusahaan,$alamat,$notelp);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/suplier');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/suplier');
    }
	}
	function hapus_suplier(){
	if($this->session->userdata('akses')=='1'  ||$this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$this->m_suplier->hapus_suplier($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/suplier');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/suplier');
    }
	}
}