<?php
class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kate');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_pembelian');
		$this->load->model('m_penjualan');
		$this->load->model('m_laporan');
		$this->load->model('m_identitas');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
		$data['iden'] = $this->m_identitas->get_all_identitas();
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kate->tampil_kategori();
		$data['jual_bln']=$this->m_laporan->get_bulan_jual();
		$data['jual_thn']=$this->m_laporan->get_tahun_jual();
		$this->load->view('admin/v_laporan',$data);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('dashboard');
    }
	}
	function lap_stok_barang(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data']=$this->m_laporan->get_stok_barang();
		$this->load->view('admin/laporan/v_lap_stok_barang',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_data_barang(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data']=$this->m_laporan->get_data_barang();
		$this->load->view('admin/laporan/v_lap_barang',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_data_penjualan(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data']=$this->m_laporan->get_data_penjualan();
		$x['jml']=$this->m_laporan->get_total_penjualan();
		$this->load->view('admin/laporan/v_lap_penjualan',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_penjualan_pertanggal(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$tanggal=$this->input->post('tgl');
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal);
		$this->load->view('admin/laporan/v_lap_jual_pertanggal',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_penjualan_perbulan(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
		$this->load->view('admin/laporan/v_lap_jual_perbulan',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_penjualan_pertahun(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_laporan->get_total_jual_pertahun($tahun);
		$x['data']=$this->m_laporan->get_jual_pertahun($tahun);
		$this->load->view('admin/laporan/v_lap_jual_pertahun',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_laba_rugi(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_lap_laba_rugi($bulan);
		$x['data']=$this->m_laporan->get_lap_laba_rugi($bulan);
		$this->load->view('admin/laporan/v_lap_laba_rugi',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_data_pembelian(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data']=$this->m_laporan->get_data_pembelian();
		$x['jml']=$this->m_laporan->get_total_pembelian();
		$this->load->view('admin/laporan/v_lap_pembelian',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_pembelian_pertanggal(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$tanggal=$this->input->post('tgl');
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal);
		$this->load->view('admin/laporan/v_lap_jual_pertanggal',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_pembelian_perbulan(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_beli_perbulan($bulan);
		$x['data']=$this->m_laporan->get_beli_perbulan($bulan);
		$this->load->view('admin/laporan/v_lap_beli_perbulan',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_pembelian_pertahun(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_laporan->get_total_beli_pertahun($tahun);
		$x['data']=$this->m_laporan->get_beli_pertahun($tahun);
		$this->load->view('admin/laporan/v_lap_beli_pertahun',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/laporan');
    }
	}
	function lap_retur(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['data']=$this->m_barang->tampil_barang();
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['retur']=$this->m_pejualan->tampil_retur();
			$this->load->view('admin/laporan/v_lap_retur',$x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/laporan');
		}
		}
}