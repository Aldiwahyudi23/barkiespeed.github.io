<?php
class Identitas extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_identitas');
		$this->load->library('upload');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_identitas->get_all_identitas();
			$this->load->view('admin_web/v_identitas', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/dashboard');
		}
	}

	function update_identitas() {
		$data = array();
		$config['upload_path'] = './assetss/favicon/'; //path folder
		$config['allowed_types'] = 'jpg|png|ico'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$this->upload->initialize($config);
		// $this->load->library('upload', $config);
		$data['maps'] = $this->input->post('xmaps');
		$data['email'] = $this->input->post('xemail');
		$data['telepon'] = $this->input->post('xtelepon');
		$data['alamat'] = $this->input->post('xalamat');
		$images1 = $this->input->post('ff1');
		$images2 = $this->input->post('ff2');
		if ($this->upload->do_upload('brand')) {
			$fileData = $this->upload->data();
			$data['brand'] = $fileData['file_name'];
			$path1 = './assetss/favicon/' . $images1;
			if (file_exists($path1)) {
				unlink($path1);
			}
		}
		if ($this->upload->do_upload('favicon')) {
			$fileData = $this->upload->data();
			$data['favicon'] = $fileData['file_name'];
			$path2 = './assetss/favicon/' . $images2;
			if (file_exists($path2)) {
				unlink($path2);
			}
			// print_r($data);die;

		}

		$result = $this->m_identitas->update_idn($data);
		if ($result) {
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin_web/identitas');
		} else {
			echo $this->session->set_flashdata('msg', 'warning');
			redirect('admin_web/identitas');
		}

	}
}