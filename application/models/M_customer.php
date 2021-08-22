<?php
class M_customer extends CI_Model {

	function get_all_customer() {
		$hsl = $this->db->query("SELECT * from tb_customer order by id desc");
		return $hsl;
	}
	function get_all_customer_masuk($id) {
		$hsl = $this->db->query("SELECT * FROM tb_customer WHERE tb_customer.id= $id");
		return $hsl;
	}
	function get_all_customer_masuk3($nofak) {
		$hsl = $this->db->query("SELECT * FROM tb_customer WHERE tb_customer.nofak= $nofak");
		return $hsl;
	}
	function get_all_customer_masuk4($nopol) {
		$hsl = $this->db->query("SELECT * FROM tb_customer WHERE tb_customer.nopol=$nopol");
		return $hsl;
	}
	function get_all_customer_masuk1($id) {
		$hsl = $this->db->query("SELECT * FROM tbl_jual WHERE tbl_jual.id_customer= $id");
		return $hsl;
	}
	function get_all_customer_masuk2($id) {
		$hsl = $this->db->query("SELECT * FROM tbl_detail_jual WHERE tbl_detail_jual.jual_nofak ");
		return $hsl;
	}
	function get_all_customer_active5() {
		$hsl = $this->db->query("SELECT * FROM tb_customer INNER JOIN tbl_jual on tb_customer.id = tbl_jual.id_customer  WHERE tb_customer.ket = 'masuk'  ORDER BY tb_customer.ket ASC");
		return $hsl;
	}
	function get_all_customer_active1($nofak) {
		$hsl = $this->db->query("SELECT * FROM tbl_detail_jual INNER JOIN tbl_jual on tbl_detail_jual.d_jual_nofak = tbl_jual.jual_nofak  WHERE d_jual_nofak=$nofak  ORDER BY jual_nofak ASC");
		return $hsl;
	}
	function get_all_customer_active2($nofak) {
		$hsl = $this->db->query("SELECT * FROM tbl_detail_jual INNER JOIN tb_customer on tbl_detail_jual.d_jual_nofak = tb_customer.nofak  WHERE nofak=$nofak  ORDER BY nofak ASC");
		return $hsl;
	}
	function get_all_customer_active3($nopol) {
		$hsl = $this->db->query("SELECT * FROM tbl_detail_jual INNER JOIN tb_customer on tbl_detail_jual.d_jual_nofak = tb_customer.nofak  WHERE nopol=$nopol  ORDER BY nofak ASC");
		return $hsl;
	}
	function get_all_customer_act($nofak) {
		$hsl = $this->db->query("SELECT * FROM tb_customer INNER JOIN tbl_jual on tb_customer.nofak = tbl_jual.jual_nofak  WHERE jual_nofak=$nofak  ORDER BY jual_nofak ASC");
		return $hsl;
	}
	function get_all_customer_acti($nofak) {
		$hsl = $this->db->query("SELECT jual_nofak,d_jual_barang_nama,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak GROUP BY jual_nofak,d_jual_barang_nama");
		return $hsl;
	}
	function get_all_customer_actif($nopol) {
		$hsl = $this->db->query("SELECT jual_nofak,d_jual_barang_nama,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak GROUP BY jual_nofak=$nopol");
		return $hsl;
	}

	function get_all_customer_active() {
		$hsl = $this->db->query("SELECT tb_customer.id, tb_customer.nofak,tb_customer.nama, tb_customer.tanggal, tb_customer.keluhan, tb_customer.startdate, tb_customer.enddate, tb_customer.alamat, tb_customer.ket, tb_customer.nohp, tb_customer.nopol , tb_customer.kode1 , tb_customer.kode3, tb_customer.kendaraan, tb_customer.type, tb_customer.km, tbl_user.nama as userid,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_customer INNER JOIN tbl_user on tb_customer.userid = tbl_user.id  WHERE ket = 'Masuk' ORDER BY ket ASC");
		return $hsl;
	}
	function get_all_customer_selesai() {
		$hsl = $this->db->query("SELECT tb_customer.id, tb_customer.nofak,tb_customer.nama, tb_customer.tanggal, tb_customer.keluhan, tb_customer.startdate, tb_customer.enddate, tb_customer.alamat, tb_customer.ket, tb_customer.nohp, tb_customer.nopol , tb_customer.kode1, tb_customer.kode3, tb_customer.kendaraan, tb_customer.type, tb_customer.km, tbl_user.nama as userid,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_customer INNER JOIN tbl_user on tb_customer.userid = tbl_user.id  WHERE ket = 'bayar' ORDER BY ket ASC");
		return $hsl;
	}
	





	function simpan_customer($nofak,$nama_customer, $keluhan, $mulai, $selesai, $alamat, $keterangan, $level, $nohp, $nopol, $kode1, $kode3,$kendaraan, $type, $km, $password,$slug) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("INSERT INTO tb_customer(nofak,nama,keluhan,startdate,enddate,alamat,ket,level,nohp,nopol,kode1,kode3,kendaraan,type,km,password,userid,slug) VALUES ('$nofak','$nama_customer','$keluhan','$mulai','$selesai','$alamat','$keterangan','$level','$nohp','$nopol','$kode1','$kode3','$kendaraan','$type','$km',md5('$password'),'$author', '$slug')");
		return $hsl;
	}
	function update_finis($ket,$nofak) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("UPDATE tb_customer SET ket='$ket' where nofak='$nofak'");
		return $hsl;
	}
	function update_finisa($kode, $nama_customer, $keluhan, $mulai, $selesai, $alamat, $keterangan, $nohp, $nopol, $kendaraan, $type, $km, $slug) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("UPDATE tb_customer SET nama='$nama_customer',keluhan='$keluhan',startdate='$mulai',enddate='$selesai',alamat='$alamat',ket='$keterangan',nohp='$nohp' ,nopol='$nopol',kendaraan='$kendaraan' ,type='$type' ,km='$km' ,userid='$author', slug= '$slug' where id='$kode'");
		return $hsl;
	}
	function update_pelanggan($kode, $nama_customer, $keluhan, $mulai, $selesai, $alamat, $keterangan, $nohp, $nopol, $kendaraan, $type, $km, $slug) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("UPDATE tb_customer SET nama='$nama_customer',keluhan='$keluhan',startdate='$mulai',enddate='$selesai',alamat='$alamat',ket='$keterangan',nohp='$nohp' ,nopol='$nopol',kendaraan='$kendaraan' ,type='$type' ,km='$km' ,userid='$author', slug= '$slug' where id='$kode'");
		return $hsl;
	}
	function update_customer($kode, $nama_customer, $keluhan, $mulai, $selesai, $alamat, $keterangan, $nohp, $nopol, $kendaraan, $type, $km, $slug) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("UPDATE tb_customer SET nama='$nama_customer',keluhan='$keluhan',startdate='$mulai',enddate='$selesai',alamat='$alamat',ket='$keterangan',nohp='$nohp' ,nopol='$nopol',kendaraan='$kendaraan' ,type='$type' ,km='$km' ,userid='$author', slug= '$slug' where id='$kode'");
		return $hsl;
	}
	function update_data($keterangan) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("UPDATE tb_customer SET keterangan='$keterangan' where id");
		return $hsl;
	}
	function hapus_customer($kode) {
		$hsl = $this->db->query("DELETE FROM tb_customer WHERE id='$kode'");
		return $hsl;
	}
	function get_nofak(){
		$q = $this->db->query("SELECT MAX(RIGHT(nofak,6)) AS kd_max FROM tb_customer WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return date('dmy').$kd;
	}
	//UPDATE PENGGUNA //
	function update_pengguna_tanpa_pass($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar) {
		$hsl = $this->db->query("UPDATE tb_customer set nama='$nama',jenkel='$jenkel',username='$username',email='$email',nohp='$nohp',level='$level',photo='$gambar' where id='$kode'");
		return $hsl;
	}
	function update_pengguna($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar) {
		$hsl = $this->db->query("UPDATE tb_customer set nama='$nama',jenkel='$jenkel',username='$username',password=md5('$password'),email='$email',nohp='$nohp',level='$level',photo='$gambar' where id='$kode'");
		return $hsl;
	}

	function update_pengguna_tanpa_pass_dan_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level) {
		$hsl = $this->db->query("UPDATE tb_customer set nama='$nama',jenkel='$jenkel',username='$username',email='$email',nohp='$nohp',level='$level' where id='$kode'");
		return $hsl;
	}
	function update_pengguna_tanpa_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level) {
		$hsl = $this->db->query("UPDATE tb_customer set nama='$nama',jenkel='$jenkel',username='$username',password=md5('$password'),email='$email',nohp='$nohp',level='$level' where id='$kode'");
		return $hsl;
	}
	//END UPDATE PENGGUNA//

	//UPDATE PROFILE //
	function update_profile_tanpa_pass($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar) {
		$hsl = $this->db->query("UPDATE tbl_user set nama='$nama',jenkel='$jenkel',username='$username',email='$email',nohp='$nohp',level='$level',photo='$gambar' where id='$kode'");
		return $hsl;
	}
	function update_profile($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar) {
		$hsl = $this->db->query("UPDATE tbl_user set nama='$nama',jenkel='$jenkel',username='$username',password=md5('$password'),email='$email',nohp='$nohp',level='$level',photo='$gambar' where id='$kode'");
		return $hsl;
	}

	function update_profile_tanpa_pass_dan_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level) {
		$hsl = $this->db->query("UPDATE tbl_user set nama='$nama',jenkel='$jenkel',username='$username',email='$email',nohp='$nohp',level='$level' where id='$kode'");
		return $hsl;
	}
	function update_profile_tanpa_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level) {
		$hsl = $this->db->query("UPDATE tbl_user set nama='$nama',jenkel='$jenkel',username='$username',password=md5('$password'),email='$email',nohp='$nohp',level='$level' where id='$kode'");
		return $hsl;
	}
	//END UPDATE PROFILE//

	//front-end
	function get_stok_barang(){
		$hsl=$this->db->query("SELECT kategori_id,kategori_nama,barang_nama,barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id GROUP BY kategori_id,barang_nama");
		return $hsl;
	}
	// function get_customer_home() {
	// 	$hsl = $this->db->query("SELECT tb_customer.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_customer ORDER BY id DESC limit 3");
	// 	return $hsl;
	// }
	function customer() {
		$hsl = $this->db->query("SELECT tb_customer.*,DATE_FORMAT(tanggal,'%d %M %Y %h:%i ') AS tanggal1 FROM tb_customer ORDER BY id DESC");
		return $hsl;
	}
	function customer_perpage($offset, $limit) {
		$hsl = $this->db->query("SELECT tb_customer.id, tb_customer.nama, tb_customer.keluhan, tb_customer.startdate,tb_customer.enddate,tb_customer.alamat,tb_customer.ket,tb_customer.slug,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d %M %Y %h:%i ') AS tanggal1 FROM tb_customer INNER JOIN tb_user on tb_customer.userid = tb_user.id ORDER BY id DESC limit $offset,$limit");
		return $hsl;
	}
	function get_customer_by_kode($kode) {
		$hsl = $this->db->query("SELECT tb_customer.id, tb_customer.nama, tb_customer.keluhan,DATE_FORMAT(tb_customer.startdate,'%d %M %Y %h:%i ') AS startdate,DATE_FORMAT(tb_customer.enddate,'%d %M %Y %h:%i ') AS enddate ,tb_customer.alamat,tb_customer.ket,tb_customer.slug,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d %M %Y %h:%i ') AS tanggal1 FROM tb_customer INNER JOIN tb_user on tb_customer.userid = tb_user.id where tb_customer.id ='$kode'");
		// $hsl = $this->db->get_where('vw_berita', array('id' => $kode));
		return $hsl;
	}
	public function get_events() {
		return $this->db->get('tb_customer')->result();
	}
	function get_by_kode($kode) {
		$hsl = $this->db->get_where('tb_customer', array('nofak' => $kode));
		return $hsl;
	}
	function getusername($id) {
		$hsl = $this->db->query("SELECT * FROM tb_customer where id='$id'");
		return $hsl;
	}
	function resetpass($id, $pass) {
		$hsl = $this->db->query("UPDATE tb_customer set password=md5('$pass') where id='$id'");
		return $hsl;
	}

}