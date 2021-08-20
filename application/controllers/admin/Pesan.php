<?php
class Pesan extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_kategori');
		$this->load->model('m_pesan');
		$this->load->model('m_customer');
	}

	function index() {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->db->query("SELECT * FROM tb_customer JOIN tb_pesan ON tb_customer.id=tb_pesan.artikelid ORDER BY tb_customer.id DESC");
			$x['data1'] = $this->db->query("SELECT * FROM tb_customer  ORDER BY tb_customer.id DESC");
			$this->load->view('admin/pesan', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/dashboard');
		}
	}
	function detail($id) {
		if($this->session->userdata('akses')=='1' ||$this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_pesan->get_all_pesan($id);
			$x['data1'] = $this->m_customer->get_all_customer_masuk($id);
			$x['show_pesan'] = $this->m_pesan->show_pesan_by_id($id);
			$this->load->view('admin/detail_pesan', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('admin/dashboard');
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
