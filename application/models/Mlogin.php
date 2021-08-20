<?php
class Mlogin extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("select*from tbl_user where username='$u'and password=md5('$p')");
        return $hasil;
    }
    function cekpelanggan($u,$p){
        $hasil=$this->db->query("select*from tb_customer where nofak='$u' and password=md5('$p')");
        return $hasil;
    }
  
}
