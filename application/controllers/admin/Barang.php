<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kate');
		$this->load->model('m_barang');
		$this->load->model('m_satuan');
		$this->load->model('m_identitas');
	}
	function index(){
	if($this->session->userdata('akses')=='1'||$this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='3'){
		$data['iden'] = $this->m_identitas->get_all_identitas();
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kate->tampil_kategori();
		$data['kat2']=$this->m_kate->tampil_kategori();
		$data['data2']=$this->m_satuan->tampil_satuan();
		$this->load->view('admin/master/v_barang',$data);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('dashboard');
    }
	}
	
	function tambah_barang(){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
		$kobar=$this->m_barang->get_kobar();
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok);
		echo $this->session->flashdata('msg','success');
		redirect('admin/barang');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/barang');
    }
	}
	function tambah_barang_pembelian(){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
		$kobar=$this->m_barang->get_kobar();
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok);
		echo $this->session->flashdata('msg','success');
		redirect('admin/pembelian');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/pembelian');
    }
	}
	function edit_barang(){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_barang->update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/barang');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/barang');
    }
	}
	function hapus_barang(){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/barang');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/barang');
    }
	}
}