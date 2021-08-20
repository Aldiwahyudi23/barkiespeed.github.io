<?php
class Galeri extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_album');
		$this->load->model('m_galeri');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_galeri->get_all_galeri();
			$x['alb'] = $this->m_album->get_all_album();
			$this->load->view('admin_web/v_galeri', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/dashboard');
		}
	}

	function simpan_galeri() {
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
				$config['width'] = 500;
				$config['height'] = 400;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$judul = strip_tags($this->input->post('xjudul'));
				$album = strip_tags($this->input->post('xalbum'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['id'];
				$this->m_galeri->simpan_galeri($judul, $album, $user_id, $gambar);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('admin_web/galeri');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin_web/galeri');
			}

		} else {
			redirect('admin_web/galeri');
		}

	}

	function update_galeri() {

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
				$config['width'] = 500;
				$config['height'] = 400;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$galeri_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$album = strip_tags($this->input->post('xalbum'));
				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				unlink($path);
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['id'];
				$this->m_galeri->update_galeri($galeri_id, $judul, $album, $user_id, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin_web/galeri');

			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin_web/galeri');
			}

		} else {
			$galeri_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$album = strip_tags($this->input->post('xalbum'));
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['id'];
			$this->m_galeri->update_galeri_tanpa_img($galeri_id, $judul, $album, $user_id);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin_web/galeri');
		}

	}

	function hapus_galeri() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = $this->input->post('kode');
			$album = $this->input->post('album');
			$gambar = $this->input->post('gambar');
			$path = './assets/images/' . $gambar;
			unlink($path);
			$this->m_galeri->hapus_galeri($kode, $album);
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin_web/galeri');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/galeri');
		}
	}

}