<?php
class Komentar extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_kategori');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->db->query("SELECT tb_komentar.*,tb_artikel.judul,tb_artikel.slug FROM tb_komentar JOIN tb_artikel ON artikelid=tb_artikel.id ORDER BY tb_komentar.id DESC");
			$this->load->view('admin_web/v_komentar', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/dashboard');
		}
	}

	function publish() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = htmlspecialchars($this->uri->segment(4), ENT_QUOTES);
			$this->db->query("UPDATE tb_komentar SET status='1' WHERE id='$kode'");
			echo $this->session->set_flashdata('msg', 'success');
			redirect('admin_web/komentar');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/komentar');
		}
	}

	function reply() {
		$komentar_id = htmlspecialchars($this->input->post('komenid'), ENT_QUOTES);
		$nama = $this->session->userdata('nama');
		$tulisan_id = htmlspecialchars($this->input->post('postid'), ENT_QUOTES);
		$komentar = nl2br(htmlspecialchars($this->input->post('komentar', TRUE), ENT_QUOTES));
		$data = array(
			'nama' => $nama,
			'email' => '',
			'isi' => $komentar,
			'status' => 1,
			'tampil' => 1,
			'artikelid' => $tulisan_id,
			'parent' => $komentar_id,
		);
		// var_dump($data);
		$this->db->insert('tb_komentar', $data);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin_web/komentar');
	}

	function hapus() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$kode = $this->input->post('kode');
			$this->db->delete('tb_komentar', array('id' => $kode));
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin_web/komentar');
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin_web/komentar');
		}
	}
}
