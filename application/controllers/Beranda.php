<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */

class Beranda extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_artikel');
		$this->load->model('m_statis');
		$this->load->model('m_pengumuman');
		$this->load->model('m_slider');
		$this->load->model('m_potensi');
		$this->load->model('m_pengunjung');
		$this->load->model('m_galeri');
		$this->load->model('m_identitas');
		$this->load->model('m_socmed');
		$this->load->model('m_instagram');
		$this->load->model('m_identitas');

		$this->m_pengunjung->count_visitor();
	}
	function index() {
		$x['ber_pertama'] = $this->m_artikel->get_artikel_pertama();
		$x['artikel'] = $this->m_artikel->get_artikel_home();
		$x['statis'] = $this->m_statis->get_all_deskripsi();
		$x['pengumuman'] = $this->m_pengumuman->get_pengumuman_home();
		$x['slider'] = $this->m_slider->get_slider();
		$x['potensi'] = $this->m_potensi->get_potensi1();
		$x['galeri'] = $this->m_galeri->get_galeri_home();
		$x['identitas'] = $this->m_identitas->get_all_identitas();
		$x['socmed'] = $this->m_socmed->get_all_socmed();
		$x['ig'] = $this->m_instagram->get_all_instagram();
		$x['iden'] = $this->m_identitas->get_all_identitas();

		$this->load->view('beranda', $x);
	}
	function info() {
		$x['allkate'] = $this->m_kategori->get_all_kategori();
		$x['pengumumanterbaru'] = $this->m_pengumuman->get_pengumuman_terbaru();
		$x['populer'] = $this->m_artikel->get_artikel_populer();
		$x['artikelterbaru'] = $this->m_artikel->get_artikel_terbaru();
		$x['statis'] = $this->m_statis->get_all_deskripsi();
		$x['ig'] = $this->m_instagram->get_all_instagram();
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$this->load->view('deskripsi', $x);
	}

}
