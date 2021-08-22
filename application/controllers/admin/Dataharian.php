<?php
class Dataharian extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
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
	function index() {
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_customer->get_all_customer_active();
			$x['data1'] = $this->m_customer->get_all_customer_active5();
			$this->load->view('admin/dataharian/v_customer', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('Dashboard');
		}
		}
		function pelanggan($nofak) {
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
				$x['data'] = $this->m_customer->get_all_customer_masuk3($nofak);
				$x['iden'] = $this->m_identitas->get_all_identitas();
				$x['data1'] = $this->m_customer->get_all_customer_active2($nofak);
				$x['data3'] = $this->m_barang->tampil_barang();
				$this->load->view('admin/dataharian/pelanggan', $x);
			}else{
				echo $this->session->set_flashdata('msg', 'danger');
				redirect('Dashboard');
			}
			}
		public function slugify($string) {
			//remove prepositions
			$preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the');
			$pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
			$string = preg_replace($pattern, '', $string);
	
			// replace non letter or digits by -
			$string = preg_replace('~[^\\pL\d]+~u', '-', $string);
	
			// trim
			$string = trim($string, '-');
	
			// transliterate
			//$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
	
			// lowercase
			$string = strtolower($string);
	
			// remove unwanted characters
			$string = preg_replace('~[^-\w]+~', '', $string);
	
			if (empty($string)) {
				return 'n-a';
			}
	
			return $string;
		}
		function simpan_customer() {
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$nama_customer = strip_tags($this->input->post('xnama_customer'));
			$slug = $this->slugify($nama_customer);
			$nofak=$this->m_customer->get_nofak();
			$this->session->set_userdata('nofak',$nofak);
			$keluhan = $this->input->post('xkeluhan');
			$mulai = $this->input->post('xmulai');
			$selesai = $this->input->post('xselesai');
			$alamat = $this->input->post('xalamat');
			$keterangan = 'masuk';
			$level = '0';
			$nohp = $this->input->post('xnohp');
			$nopol = $this->input->post('xnopol');
			$kode1 = $this->input->post('kode1');
			$kode3 = $this->input->post('kode3');
			$kendaraan = $this->input->post('xkendaraan');
			$type = $this->input->post('xtype');
			$km = $this->input->post('xkm');
			$password = '123456';
			$this->m_customer->simpan_customer($nofak,$nama_customer, $keluhan, $mulai, $selesai, $alamat, $keterangan, $level, $nohp, $nopol, $kode1, $kode3, $kendaraan, $type, $km, $password,$slug);
			echo $this->session->set_flashdata('msg', 'success');
			redirect('admin/dataharian');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/dataharian');
		}
		}
	
		function update_customer() {
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$nofak = strip_tags($this->input->post('nofak'));
			$ket = $this->input->post('xket');
			$this->m_penjualan->update_jual($ket, $nofak);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin/dataharian');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/dataharian');
		}
		}
		function update_finis() {
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
			$nofak = strip_tags($this->input->post('nofak'));
			$ket = 'bayar';
			$this->m_customer->update_finis($ket, $nofak);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin/dataharian');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/dataharian');
		}
		}
	
		function hapus_customer() {
			if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$kode = strip_tags($this->input->post('kode'));
			$this->m_customer->hapus_customer($kode);
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin/dataharian');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/dataharian');
		}
	}


		//input

	function input(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
		$data['iden'] = $this->m_identitas->get_all_identitas();
		$data['data']=$this->m_barang->tampil_barang();
		$data['data1']=$this->m_service->tampil_service();
		$data['sup'] = $this->m_customer->get_all_customer_active();
		$this->load->view('admin/dataharian/v_input',$data);
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/dataharian/input');
    }
	}
	function get_barang(){

		$x['iden'] = $this->m_identitas->get_all_identitas();
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/v_detail_barang_jual_grosir',$x);

	}
	function add_to_cart(){
		$kobar=$this->input->post('kode_brg');
		$produk=$this->m_barang->get_barang($kobar);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['barang_satuan'],
               'harpok'   => $i['barang_harpok'],
               'price'    => str_replace(",", "", $this->input->post('harjul'))-$this->input->post('diskon'),
               'disc'     => $this->input->post('diskon'),
               'qty'      => $this->input->post('qty'),
               'amount'	  => str_replace(",", "", $this->input->post('harjul')),
			   'kode'   => $i['kode']
            );
	if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kobar=$this->input->post('kode_brg');
			$qty=$this->input->post('qty');
			if($id==$kobar){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	}
		redirect('admin/dataharian/input');

	}
	function add_to_cart_jasa(){
		$kobar=$this->input->post('kode_brg');
		$produk=$this->m_service->get_service($kobar);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['service_id'],
               'name'     => $i['service_nama'],
               'satuan'   => $i['service_satuan'],
               'harpok'   => $i['service_harpok'],
               'price'    => str_replace(",", "", $this->input->post('harjul'))-$this->input->post('diskon'),
               'disc'     => $this->input->post('diskon'),
               'qty'      => $this->input->post('qty'),
               'amount'	  => str_replace(",", "", $this->input->post('harjul')),
			   'kode'   => $i['kode']
            );
	if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kobar=$this->input->post('kode_brg');
			$qty=$this->input->post('qty');
			if($id==$kobar){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	}
		redirect('admin/dataharian/input');

	}
	function remove(){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/dataharian/input');
	}
	function simpan_penjualan_grosir(){


				$nofak=$this->input->post('nofak');
				$order_proses=$this->m_penjualan->simpan_penjualan_grosir1($nofak);
				if($order_proses){
					$this->cart->destroy();
					//$this->session->unset_userdata('nofak');
					$this->session->unset_userdata('tglfak');
					$this->session->unset_userdata('suplier');
					$this->session->unset_userdata('customer');
					echo $this->session->set_flashdata('msg', 'success');
					redirect('admin/dataharian/input');
				}else{
					redirect('admin/dataharian/input');
				}
	}
	function edit_jual($id) {
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data1'] = $this->m_penjualan->get_servce($id);
			$this->load->view('admin/dataharian/edit', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('Dashboard');
		}
		}
	function edit(){

				if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2' || $this->session->userdata('akses')=='3'){
					$kode = htmlspecialchars($this->input->post('nofak', TRUE), ENT_QUOTES);
					$data = $this->m_customer->get_by_kode($kode);
					$row = $data->row_array();
					$nofak = $row['nofak'];

					$kode=$this->input->post('kode');
					$ket=$this->input->post('ket');
					$status=$this->input->post('status');
					$this->m_penjualan->update_jual($kode,$ket,$status);
	
					echo $this->session->set_flashdata('msg', 'success');
					redirect('admin/dataharian/pelanggan/'. $nofak);
				}else{
					redirect('admin/dashboard/');
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
function hapus($id){
	if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
		$this->m_barang->hapus($id);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/dataharian');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/barang');
    }
	}
function hapus_jual(){
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'||$this->session->userdata('akses')=='3'){
			$kode = htmlspecialchars($this->input->post('nofak', TRUE), ENT_QUOTES);
			$data = $this->m_customer->get_by_kode($kode);
			$row = $data->row_array();
			$nofak = $row['nofak'];

			$kode=$this->input->post('kode');
			$this->m_penjualan->hapus_jual($kode);
			
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/dataharian/pelanggan/'.$nofak);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/barang');
		}
		}

}