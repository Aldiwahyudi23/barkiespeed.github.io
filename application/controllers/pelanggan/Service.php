<?php
class Service extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('on') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_service');
		$this->load->model('m_suplier');
		$this->load->model('m_customer');
		$this->load->model('m_penjualan');
		$this->load->model('m_identitas');
	}

		function nofaktur($nofak) {
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='4'){
				$x['iden'] = $this->m_identitas->get_all_identitas();
				$x['data'] = $this->m_customer->get_all_customer_masuk3($nofak);
				$x['data1'] = $this->m_customer->get_all_customer_active2($nofak);
				$x['data3'] = $this->m_barang->tampil_barang();
				$this->load->view('pelanggan/service', $x);
			}else{
				echo $this->session->set_flashdata('msg', 'danger');
				redirect('pelanggan/Dashboard');
			}
			}
			function data($nopol) {
				if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='4'){
					$x['iden'] = $this->m_identitas->get_all_identitas();
					$x['data'] = $this->m_customer->get_all_customer_masuk4($nopol);
					$x['data1'] = $this->m_customer->get_all_customer_active3($nopol);
					$this->load->view('pelanggan/data', $x);
				}else{
					echo $this->session->set_flashdata('msg', 'danger');
					redirect('/pelanggan/Dashboard');
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
		redirect('admin/dataharian/input');
    }
}

}