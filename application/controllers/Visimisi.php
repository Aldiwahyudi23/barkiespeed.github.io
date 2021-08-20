<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */

class Visimisi extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_artikel');
		$this->load->model('m_kategori');
		$this->load->model('m_pengumuman');
		$this->load->model('m_statis');
		$this->load->model('m_pengunjung');
		$this->load->model('m_instagram');
		$this->load->model('m_identitas');
		$this->m_pengunjung->count_visitor();
	}
	function index() {

		$x['statis'] = $this->m_statis->get_all_visimisi();
		$x['allkate'] = $this->m_kategori->get_all_kategori();
		$x['pengumumanterbaru'] = $this->m_pengumuman->get_pengumuman_terbaru();
		$x['populer'] = $this->m_artikel->get_artikel_populer();
		$x['artikelterbaru'] = $this->m_artikel->get_artikel_terbaru();
		$x['ig'] = $this->m_instagram->get_all_instagram();
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$this->load->view('visimisi', $x);
	}

}
