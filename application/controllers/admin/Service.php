<?php
class service extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kate');
		$this->load->model('m_service');
		$this->load->model('m_satuan');
		$this->load->model('m_laporan');
		$this->load->model('m_identitas');
	}

	function index(){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='3'){
		$data['iden'] = $this->m_identitas->get_all_identitas();
		$data['data']=$this->m_service->tampil_service();
		$data['kat']=$this->m_kate->tampil_kategori();
		$data['kat2']=$this->m_kate->tampil_kategori();
		$data['data2']=$this->m_satuan->tampil_satuan();
		$this->load->view('admin/master/v_service',$data);
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('dashboard');
    }
	}
	function tambah_service(){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
		$kobar=$this->m_service->get_kobar();
		$nabar=$this->input->post('nabar');
		$harpok='0';
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$this->m_service->simpan_service($kobar,$nabar,$harfok,$harjul_grosir);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/service');
	}else{
       echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/service');
    }
	}
	function edit_service(){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2' ){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$this->m_service->update_service($kobar,$nabar,$harjul_grosir);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/service');
	}else{
       echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/service');
    }
	}
	function hapus_service(){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$this->m_service->hapus_service($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/service');
	}else{
       echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/service');
    }
	}
}
