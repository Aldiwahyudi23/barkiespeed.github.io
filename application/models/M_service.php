<?php
class M_service extends CI_Model{

	function hapus_service($kode){
		$hsl=$this->db->query("DELETE FROM tbl_service where service_id='$kode'");
		return $hsl;
	}

	function update_service($kobar,$nabar,$harjul_grosir){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_service SET service_nama='$nabar',service_harjul_grosir='$harjul_grosir',service_user_id='$user_id' WHERE service_id='$kobar'");
		return $hsl;
	}

	function tampil_service(){
		$hsl=$this->db->query("SELECT * from tbl_service order by service_id desc");
		return $hsl;
	}

	function simpan_service($kobar,$nabar,$harpok,$harjul_grosir){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_service (service_id,service_nama,service_harpok,service_harjul_grosir,service_user_id) VALUES ('$kobar','$nabar','$harfok','$harjul_grosir','$user_id')");
		return $hsl;
	}


	function get_service($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_service where service_id='$kobar'");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(service_id,6)) AS kd_max FROM tbl_service");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "JS".$kd;
	}

    function get_data_penjualan(){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,jual_total,d_jual_service_id,d_jual_service_nama,d_jual_service_satuan,d_jual_service_harpok,d_jual_service_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_total_penjualan(){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,jual_total,d_jual_service_id,d_jual_service_nama,d_jual_service_satuan,d_jual_service_harpok,d_jual_service_harjul,d_jual_qty,d_jual_diskon,sum(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak ORDER BY jual_nofak DESC");
		return $hsl;
	}

}