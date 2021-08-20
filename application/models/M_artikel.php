<?php
class M_artikel extends CI_Model {
	function get_all_artikel() {
		$hsl = $this->db->query("SELECT tb_artikel.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_artikel ORDER BY tanggal DESC");
		return $hsl;
	}
	function tampil_artikel() {
		$hsl = $this->db->query("SELECT tb_artikel.id, tb_artikel.judul, tb_artikel.tanggal, tb_artikel.isi, tb_artikel.tayang,tb_artikel.slug,tb_artikel.gambar,tb_kategori.nama as kategori ,tbl_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_artikel INNER JOIN tb_kategori on tb_artikel.kategoriid = tb_kategori.id INNER join tbl_user on tb_artikel.userid = tbl_user.id ORDER BY tanggal DESC");
		return $hsl;
	}

	function simpan_artikel($judul, $isi, $kategoriid, $userid, $gambar, $slug, $tanggal) {
		$hsl = $this->db->query("insert into tb_artikel(judul,isi,kategoriid,userid,gambar,slug,tanggal) values ('$judul','$isi','$kategoriid','$userid','$gambar','$slug','$tanggal')");
		return $hsl;
	}
	function get_artikel_by_kode($kode) {
		$hsl = $this->db->query("SELECT tb_artikel.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_artikel where id='$kode'");
		return $hsl;
	}
	function update_artikel($id, $judul, $isi, $kategoriid, $userid, $gambar, $slug, $tanggal) {
		$hsl = $this->db->query("update tb_artikel set judul='$judul',isi='$isi',kategoriid='$kategoriid',userid='$userid',gambar='$gambar',slug='$slug', tanggal='$tanggal' where id='$id'");
		return $hsl;
	}
	function update_artikel_tanpa_img($id, $judul, $isi, $kategoriid, $userid, $slug, $tanggal) {
		$hsl = $this->db->query("update tb_artikel set judul='$judul',isi='$isi',kategoriid='$kategoriid',userid='$userid',slug='$slug', tanggal='$tanggal' where id='$id'");
		return $hsl;
	}
	function hapus_artikel($kode) {
		$hsl = $this->db->query("delete from tb_artikel where id='$kode'");
		return $hsl;
	}

	//Front-End
	function get_artikel_home() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y") AS tanggal1');
		$this->db->from('tb_artikel');
		$this->db->join('tbl_user', 'tbl_user.id = tb_artikel.userid', 'INNER');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(4, 1);
		$hsl = $this->db->get();
		return $hsl;
		// $hsl = $this->db->query("SELECT tb_artikel.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_artikel ORDER BY id DESC limit 1,4");
		// return $hsl;
	}
	function get_artikel_pertama() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y") AS tanggal1');
		$this->db->from('tb_artikel');
		$this->db->join('tbl_user', 'tbl_user.id = tb_artikel.userid', 'INNER');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(1);
		$hsl = $this->db->get();

		return $hsl;
	}
	function get_artikel_populer() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y %h:%i") AS tanggal1');
		$this->db->from('tb_artikel');
		$this->db->join('tbl_user', 'tbl_user.id = tb_artikel.userid', 'INNER');
		$this->db->order_by('tayang', 'DESC');
		$this->db->limit(3);
		$hsl = $this->db->get();

		return $hsl;
	}
	function get_artikel_terbaru() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y %h:%i") AS tanggal1');
		$this->db->from('tb_artikel');
		$this->db->join('tbl_user', 'tbl_user.id = tb_artikel.userid', 'INNER');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(3);
		$hsl = $this->db->get();

		return $hsl;
	}

	function artikel_perpage($offset, $limit) {
		$hsl = $this->db->query("SELECT tb_artikel.id, tb_artikel.judul, tb_artikel.tanggal, tb_artikel.isi, tb_artikel.tayang,tb_artikel.slug,tb_artikel.gambar,tb_kategori.nama as kategori ,tbl_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_artikel INNER JOIN tb_kategori on tb_artikel.kategoriid = tb_kategori.id INNER join tbl_user on tb_artikel.userid = tbl_user.id ORDER BY tanggal DESC limit $offset,$limit");
		return $hsl;
	}

	function artikel() {
		$hsl = $this->db->query("SELECT tb_artikel.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_artikel ORDER BY tanggal DESC");
		return $hsl;
		// $hsl = $this->db->query("SELECT tb_artikel.id, tb_artikel.judul, tb_artikel.tanggal, tb_artikel.isi, tb_artikel.tayang,tb_artikel.slug,tb_artikel.gambar,tb_kategori.nama as kategori ,tbl_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_artikel INNER JOIN tb_kategori on tb_artikel.kategoriid = tb_kategori.id INNER join tbl_user on tb_artikel.userid = tbl_user.id ORDER BY id DESC");
		// return $hsl;
	}
	function get_artikel1_by_kode($kode) {
		$hsl = $this->db->get_where('tb_artikel', array('id' => $kode));
		return $hsl;
	}

	function cari_artikel($keyword) {
		$hsl = $this->db->query("SELECT tb_artikel.id, tb_artikel.judul, tb_artikel.tanggal, tb_artikel.isi, tb_artikel.tayang,tb_artikel.slug,tb_artikel.gambar,tb_kategori.nama as kategori ,tbl_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_artikel INNER JOIN tb_kategori on tb_artikel.kategoriid = tb_kategori.id INNER join tbl_user on tb_artikel.userid = tbl_user.id WHERE judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	function show_komentar_by_id($kode) {
		$hsl = $this->db->query("SELECT * FROM tb_komentar WHERE artikelid='$kode' AND tampil='1' AND parent='0'");
		return $hsl;
	}

}
