<?php
class Transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
		};
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_customer');
		$this->load->model('m_penjualan');
		$this->load->model('m_identitas');
		$this->load->model('m_laporan');
		$this->load->model('m_kate');
		$this->load->library('upload');
	}

	function index() {
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='3'){
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data1'] = $this->m_customer->get_all_customer_active();
		$x['data'] = $this->m_customer->get_all_customer_selesai();
		$this->load->view('admin/transaksi/v_service', $x);
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('Dashboard');
    }
	}
	function service($nofak) {
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='3'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_customer->get_all_customer_masuk3($nofak);
			$x['data1'] = $this->m_customer->get_all_customer_active2($nofak);
			$this->load->view('admin/transaksi/tra_service', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('Dashboard');
		}
		}

		function simpan_penjualan_grosir(){
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
				$total=$this->input->post('total');
				$nofak=$this->input->post('nofak');
				$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
				$kembalian=$jml_uang-$total;
				if(!empty($total) && !empty($jml_uang)){
					if($jml_uang < $total){
						echo $this->session->set_flashdata('msg','jumlah');
						redirect('admin/transaksi/');
					}else{
						$this->m_penjualan->simpan_penjualan_service($nofak,$total,$jml_uang,$kembalian);
						$this->session->unset_userdata('tglfak');
						$this->session->unset_userdata('suplier');
						$x['iden'] = $this->m_identitas->get_all_identitas();
						$x['data'] = $this->m_customer->get_all_customer_masuk3($nofak);
				$x['data1'] = $this->m_customer->get_all_customer_active2($nofak);
				$x['data3'] = $this->m_barang->tampil_barang();
						echo $this->session->set_flashdata('msg', 'success');
						$this->load->view('admin/alert/alert_sukses_bayar',$x);
						}
					
					
				}else{
					echo $this->session->set_flashdata('msg', 'warning');
					redirect('admin/transaksi');
				}
		
			}else{
				echo $this->session->set_flashdata('msg', 'danger');
				redirect('Dashboard');
			}
			}

		function cetak_faktur_grosir(){
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
				$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data']=$this->m_penjualan->cetak_faktur();
			$this->load->view('admin/laporan/v_faktur_grosir',$x);
			//$this->session->unset_userdata('nofak');
		
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/transaksi');
		}
	}
		function cetak_faktur_bayar($nofak){
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
				$x['iden'] = $this->m_identitas->get_all_identitas();
				$x['data'] = $this->m_customer->get_all_customer_masuk3($nofak);
				$x['data1'] = $this->m_customer->get_all_customer_active2($nofak);
				$x['data4'] = $this->m_customer->get_all_customer_act($nofak);
				$x['data3'] = $this->m_barang->tampil_barang();
			$this->load->view('admin/laporan/v_faktur_bayar',$x);
			//$this->session->unset_userdata('nofak');
		
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/transaksi');
		}
	}

	////////// Data Hasil Transaksi//////////

	function data_penjualan(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['jual_bln']=$this->m_laporan->get_bulan_jual();
			$x['jual_thn']=$this->m_laporan->get_tahun_jual();
		$x['data']=$this->m_laporan->get_data_penjualan();
		$x['jml']=$this->m_laporan->get_total_penjualan();
		$this->load->view('admin/data/v_lap_penjualan',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/data');
    }
	}
	function data_pembelian(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['jual_bln']=$this->m_laporan->get_bulan_beli();
			$x['jual_thn']=$this->m_laporan->get_tahun_beli();
		$x['data']=$this->m_laporan->get_data_pembelian();
		$x['jml']=$this->m_laporan->get_total_pembelian();
		$this->load->view('admin/data/v_lap_pembelian',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/data');
    }
	}

	//penjualan//
	function penjualan_pertanggal(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$tanggal=$this->input->post('tgl');
		$x['dat']=$this->m_barang->tampil_barang();
		$x['kat']=$this->m_kate->tampil_kategori();
		$x['jual_bln']=$this->m_laporan->get_bulan_jual();
		$x['jual_thn']=$this->m_laporan->get_tahun_jual();
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal);
		$this->load->view('admin/data/v_lap_jual_pertanggal',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/data');
    }
	}
	function penjualan_perbulan(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$bulan=$this->input->post('bln');
		$x['jual_bln']=$this->m_laporan->get_bulan_jual();
		$x['jual_thn']=$this->m_laporan->get_tahun_jual();
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
		$this->load->view('admin/data/v_lap_jual_perbulan',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/data');
    }
	}
	function penjualan_pertahun(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$tahun=$this->input->post('thn');
		$x['jual_bln']=$this->m_laporan->get_bulan_jual();
		$x['jual_thn']=$this->m_laporan->get_tahun_jual();
		$x['jml']=$this->m_laporan->get_total_jual_pertahun($tahun);
		$x['data']=$this->m_laporan->get_jual_pertahun($tahun);
		$this->load->view('admin/data/v_lap_jual_pertahun',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/data');
    }
	}

	// pembelian//
	function pembelian_pertanggal(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$tanggal=$this->input->post('tgl');
			$x['dat']=$this->m_barang->tampil_barang();
			$x['kat']=$this->m_kate->tampil_kategori();
			$x['jual_bln']=$this->m_laporan->get_bulan_jual();
			$x['jual_thn']=$this->m_laporan->get_tahun_jual();
		$x['jml']=$this->m_laporan->get_data__total_beli_pertanggal($tanggal);
		$x['data']=$this->m_laporan->get_data_beli_pertanggal($tanggal);
		$this->load->view('admin/data/v_lap_beli_pertanggal',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/data');
    }
	}
	function pembelian_perbulan(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$bulan=$this->input->post('bln');
		$x['beli_bln']=$this->m_laporan->get_bulan_beli();
		$x['beli_thn']=$this->m_laporan->get_tahun_beli();
		$x['jml']=$this->m_laporan->get_total_beli_perbulan($bulan);
		$x['data']=$this->m_laporan->get_beli_perbulan($bulan);
		$this->load->view('admin/data/v_lap_beli_perbulan',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/data');
    }
	}
	function pembelian_pertahun(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$tahun=$this->input->post('thn');
		$x['beli_thn']=$this->m_laporan->get_tahun_beli();
		$x['jml']=$this->m_laporan->get_total_beli_pertahun($tahun);
		$x['data']=$this->m_laporan->get_beli_pertahun($tahun);
		$this->load->view('admin/data/v_lap_beli_pertahun',$x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/data');
    }
	}
}