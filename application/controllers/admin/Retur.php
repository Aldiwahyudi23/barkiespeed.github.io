<?php
class Retur extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_penjualan');
		$this->load->model('m_identitas');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$data'iden'] = $this->m_identitas->get_all_identitas();
		$data['data']=$this->m_barang->tampil_barang();
		$data['retur']=$this->m_penjualan->tampil_retur();
		$this->load->view('admin/transaksi/v_retur',$data);
	}else{
        echo $this->session->flashdata('msg','danger');
		redirect('dashboard');
    }
	}


	function get_barang(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/transaksi/v_detail_barang_retur',$x);
	}else{
        echo $this->session->flashdata('msg','danger');
		redirect('admin/retur');
    
    }
	}

	function simpan_retur(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kode_brg');
		$nabar=$this->input->post('nabar');
		$satuan=$this->input->post('satuan');
		$harjul=str_replace(",", "", $this->input->post('harjul'));
		$qty=$this->input->post('qty');
		$keterangan=$this->input->post('keterangan');
		$this->m_penjualan->simpan_retur($kobar,$nabar,$satuan,$harjul,$qty,$keterangan);
		redirect('admin/retur');
	}else{
        echo $this->session->flashdata('msg','danger');
		redirect('admin/retur');
    }
	}

	function hapus_retur(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode=$this->uri->segment(4);
		$this->m_penjualan->hapus_retur($kode);
		redirect('admin/retur');
	}else{
        echo $this->session->flashdata('msg','danger');
		redirect('admin/retur');
    }
	}

}