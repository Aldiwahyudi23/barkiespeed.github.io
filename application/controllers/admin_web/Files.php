<?php
class Files extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_files');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->helper('download');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_files->get_all_files();
			$this->load->view('admin_web/v_files', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/dashboard');
		}
	}

	function download() {
		$id = $this->uri->segment(4);
		$get_db = $this->m_files->get_file_byid($id);
		$q = $get_db->row_array();
		$file = $q['data'];
		$path = './assets/files/' . $file;
		$data = file_get_contents($path);
		$name = $file;

		force_download($name, $data);
		redirect('admin_web/files');
	}

	function simpan_file() {
		$config['upload_path'] = './assets/files/'; //path folder
		$config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|xlsx|xls'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				$file = $gbr['file_name'];
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$oleh = strip_tags($this->input->post('xoleh'));

				$this->m_files->simpan_file($judul, $deskripsi, $oleh, $file);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('admin_web/files');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin_web/files');
			}

		} else {
			redirect('admin_web/files');
		}

	}

	function update_file() {

		$config['upload_path'] = './assets/files/'; //path folder
		$config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|xlsx|xls'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				$file = $gbr['file_name'];
				$kode = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$oleh = strip_tags($this->input->post('xoleh'));
				$data = $this->input->post('file');
				$path = './assets/files/' . $data;
				unlink($path);
				$this->m_files->update_file($kode, $judul, $deskripsi, $oleh, $file);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin_web/files');

			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin_web/files');
			}

		} else {
			$kode = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$deskripsi = $this->input->post('xdeskripsi');
			$oleh = strip_tags($this->input->post('xoleh'));
			$this->m_files->update_file_tanpa_file($kode, $judul, $deskripsi, $oleh);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin_web/files');
		}

	}

	function hapus_file() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = $this->input->post('kode');
			$data = $this->input->post('file');
			$path = './assets/files/' . $data;
			unlink($path);
			$this->m_files->hapus_file($kode);
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin_web/files');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/files');
		}
	}

}