<?php
class Deskripsi extends CI_Controller {
	private $kode = 1;
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_statis');
		$this->load->library('upload');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['data'] = $this->m_statis->get_all_deskripsi();
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$this->load->view('admin_web/v_deskripsi', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/dashboard');
		}
	}

	function update_deskripsi() {
		$config['upload_path'] = './assets/images/deskripsi/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if ($this->upload->do_upload('filefoto')) {
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/images/deskripsi/' . $gbr['file_name'];
			$config['create_thumb'] = FALSE;
			$config['quality'] = '60%';
			$config['width'] = 500;
			$config['height'] = '1';
			$config['maintain_ratio'] = TRUE;
			$config['master_dim'] = 'width';
			$config['new_image'] = './assets/images/deskripsi/' . $gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$data['gambar'] = $gbr['file_name'];
			$data['judul'] = $this->input->post('xjudul');
			$data['isi'] = $this->input->post('xisi');
			$images = $this->input->post('gambar');
			$path = './assets/images/deskripsi/' . $images;
			if (file_exists($path)) {
				unlink($path);
			}
			// var_dump($data);
			// var_dump($this->kode);
			$this->m_statis->update_deskripsi($data, $this->kode);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin_web/deskripsi');

		} else {

			$data['judul'] = $this->input->post('xjudul');
			$data['isi'] = $this->input->post('xisi');
			// var_dump($data);
			// var_dump($this->kode);
			$this->m_statis->update_deskripsi($data, $this->kode);
			echo $this->session->set_flashdata('msg', 'info1');
			redirect('admin_web/deskripsi');
		}

	}
}