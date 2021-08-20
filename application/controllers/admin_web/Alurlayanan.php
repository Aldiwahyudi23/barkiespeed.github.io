<?php
class Alurlayanan extends CI_Controller {
	private $kode = 6, $data;
	function __construct() {

		parent::__construct();
		$this->data = array(
			'judul' => $this->input->post('xjudul'),
			'isi' => $this->input->post('xisi'),
		);
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
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_statis->get_all_alurlayanan();
			$this->load->view('admin_web/v_alurlayanan', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/barang');
		}
	}

	function update_alurlayanan() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			// var_dump($this->data);
			// var_dump($this->kode);
			$this->m_statis->update_alurlayanan($this->data, $this->kode);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin_web/alurlayanan');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/barang');
		}
	}

}
