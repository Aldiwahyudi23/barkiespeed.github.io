<?php
class M_pesan extends CI_Model {
	function get_pesan() {
		$hsl = $this->db->query("SELECT tb_pesan.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_pesan ORDER BY tanggal DESC");
		return $hsl;
	}
	function tampil_pesan() {
		$hsl = $this->db->query("SELECT tb_pesan.id, tb_pesan.judul, tb_pesan.tanggal, tb_pesan.isi, tb_pesan.tayang,tb_pesan.slug,tb_pesan.gambar,tb_kategori.nama as kategori ,tbl_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_pesan INNER JOIN tb_kategori on tb_pesan.kategoriid = tb_kategori.id INNER join tbl_user on tb_pesan.userid = tbl_user.id ORDER BY tanggal DESC");
		return $hsl;
	}

	function simpan_pesan($judul, $isi, $kategoriid, $userid, $gambar, $slug, $tanggal) {
		$hsl = $this->db->query("insert into tb_pesan(judul,isi,kategoriid,userid,gambar,slug,tanggal) values ('$judul','$isi','$kategoriid','$userid','$gambar','$slug','$tanggal')");
		return $hsl;
	}
	function hapus_pesan($kode) {
		$hsl = $this->db->query("delete from tb_pesan where id='$kode'");
		return $hsl;
	}
	function get_pesan_terbaru() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y %h:%i") AS tanggal1');
		$this->db->from('tb_pesan');
		$this->db->join('tbl_user', 'tbl_user.id = tb_pesan.userid', 'INNER');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(3);
		$hsl = $this->db->get();

		return $hsl;
	}
	function cari_pesan($keyword) {
		$hsl = $this->db->query("SELECT tb_pesan.id, tb_pesan.isi, tb_pesan.tanggal, tb_pesan.isi, tb_pesan.tayang,tb_pesan.slug,tb_pesan.gambar,tb_kategori.nama as kategori ,tbl_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_pesan INNER JOIN tb_kategori on tb_pesan.kategoriid = tb_kategori.id INNER join tbl_user on tb_pesan.userid = tbl_user.id WHERE judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	function show_pesan_by_id($id) {
		$user_id=$this->session->userdata('idadmin');
		$hsl = $this->db->query("SELECT * FROM tb_pesan WHERE artikelid='$id' AND tampil='1' AND parent='0'");
		return $hsl;
	}

	function get_all_pesan($id) {
		$hsl = $this->db->query("SELECT * FROM tb_customer INNER JOIN tb_pesan on tb_customer.id = tb_pesan.artikelid  WHERE id=$id  ORDER BY id ASC");
		return $hsl;
	}

}
