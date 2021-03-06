<?php
class Artikel extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_kategori');
		$this->load->model('m_artikel');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_artikel->tampil_artikel();
			$this->load->view('admin_web/v_artikel', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/barang');
		}
	}
	function add_artikel() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['kat'] = $this->m_kategori->get_all_kategori();
			$this->load->view('admin_web/v_add_artikel', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/barang');
		}
	}
	function get_edit() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = $this->uri->segment(4);
			$x['data'] = $this->m_artikel->get_artikel_by_kode($kode);
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['kat'] = $this->m_kategori->get_all_kategori();
			$this->load->view('admin_web/v_edit_artikel', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/barang');
		}
	}
	//generate slug
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
// 		$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

		// lowercase
		$string = strtolower($string);

		// remove unwanted characters
		$string = preg_replace('~[^-\w]+~', '', $string);

		if (empty($string)) {
			return 'n-a';
		}

		return $string;
	}
	function simpan_artikel() {
			$config['upload_path'] = './assets/images/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	
			$this->upload->initialize($config);
			if (!empty($_FILES['filefoto']['name'])) {
				if ($this->upload->do_upload('filefoto')) {
					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/images/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '60%';
					$config['width'] = 710;
					$config['height'] = 460;
					$config['new_image'] = './assets/images/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
	
					$gambar = $gbr['file_name'];
					$judul = strip_tags($this->input->post('xjudul'));
					$isi = $this->input->post('xisi');
					$slug = $this->slugify($judul);
					$kategoriid = strip_tags($this->input->post('xkategori'));
					$kode = $this->session->userdata('idadmin');
					$user = $this->m_pengguna->get_pengguna_login($kode);
					$p = $user->row_array();
					$userid = $p['id'];
					$tanggal = date("Y-m-d H:i:s");
					$this->m_artikel->simpan_artikel($judul, $isi, $kategoriid, $userid, $gambar, $slug, $tanggal);
					echo $this->session->set_flashdata('msg', 'success');
					redirect('admin_web/artikel');
				} else {
					echo $this->session->set_flashdata('msg', 'warning');
					redirect('admin_web/artikel');
				}
	
			} else {
				redirect('admin_web/artikel');
		}

	}

	function update_artikel() {
			$config['upload_path'] = './assets/images/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	
			$this->upload->initialize($config);
			if (!empty($_FILES['filefoto']['name'])) {
				if ($this->upload->do_upload('filefoto')) {
					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/images/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '60%';
					$config['width'] = 710;
					$config['height'] = 460;
					$config['new_image'] = './assets/images/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$images = $this->input->post('gambar');
					$path = './assets/images/' . $images;
					if (file_exists($path)) {
						unlink($path);
					}
					$gambar = $gbr['file_name'];
					$id = $this->input->post('kode');
					$judul = strip_tags($this->input->post('xjudul'));
					$isi = $this->input->post('xisi');
					$slug = $this->slugify($judul);
					$kategoriid = strip_tags($this->input->post('xkategori'));
					$kode = $this->session->userdata('idadmin');
					$user = $this->m_pengguna->get_pengguna_login($kode);
					$p = $user->row_array();
					$userid = $p['id'];
					$tanggal = date("Y-m-d H:i:s");
					$this->m_artikel->update_artikel($id, $judul, $isi, $kategoriid, $userid, $gambar, $slug, $tanggal);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('admin_web/artikel');
	
				} else {
					echo $this->session->set_flashdata('msg', 'warning');
					redirect('admin_web/pengguna');
				}
	
			} else {
				$id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$isi = $this->input->post('xisi');
				$slug = $this->slugify($judul);
				$kategoriid = strip_tags($this->input->post('xkategori'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$userid = $p['id'];
				$tanggal1 = date("Y-m-d H:i:s");
				$this->m_artikel->update_artikel_tanpa_img($id, $judul, $isi, $kategoriid, $userid, $slug, $tanggal1);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin_web/artikel');
		
		}

	}

	function hapus_artikel() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = $this->input->post('kode');
			$gambar = $this->input->post('gambar');
			$path = './assets/images/' . $gambar;
			unlink($path);
			$this->m_artikel->hapus_artikel($kode);
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin_web/artikel');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/barang');
		}
	}

}
