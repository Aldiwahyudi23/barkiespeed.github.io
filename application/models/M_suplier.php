<?php
class M_suplier extends CI_Model{

	function hapus_suplier($kode){
		$hsl=$this->db->query("DELETE FROM tbl_suplier where suplier_id='$kode'");
		return $hsl;
	}

	function update_suplier($kode,$nama,$perusahaan,$alamat,$notelp){
		$hsl=$this->db->query("UPDATE tbl_suplier set suplier_nama='$nama',perusahaan='$perusahaan',suplier_alamat='$alamat',suplier_notelp='$notelp' where suplier_id='$kode'");
		return $hsl;
	}

	function tampil_suplier(){
		$hsl=$this->db->query("select * from tbl_suplier order by suplier_id desc");
		return $hsl;
	}

	function simpan_suplier($nama,$perusahaan,$alamat,$notelp){
		$hsl=$this->db->query("INSERT INTO tbl_suplier(suplier_nama,perusahaan,suplier_alamat,suplier_notelp) VALUES ('$nama','$perusahaan','$alamat','$notelp')");
		return $hsl;
	}

}