<?php
class Profile extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('on') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_service');
		$this->load->model('m_suplier');
		$this->load->model('m_customer');
		$this->load->model('m_penjualan');
		$this->load->model('m_identitas');
		$this->load->library('upload');
	}

		function nofaktur($nofak) {
			if($this->session->userdata('akses')=='4' || $this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='4'){
				$x['iden'] = $this->m_identitas->get_all_identitas();
				$x['data'] = $this->m_customer->get_all_customer_masuk3($nofak);
				$x['data1'] = $this->m_customer->get_all_customer_active2($nofak);
				$x['data3'] = $this->m_barang->tampil_barang();
				$this->load->view('pelanggan/profile', $x);
			}else{
				echo $this->session->set_flashdata('msg', 'danger');
				redirect('pelanggan/Dashboard');
			}
			}
	
			function edit() {
				$config['upload_path'] = './assets/images/'; //path folder
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
				$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
				$this->upload->initialize($config);
				if (!empty($_FILES['filefoto']['name'])) {
					if ($this->upload->do_upload('filefoto')) {
						$gbr = $this->upload->data();
						//Compress Image
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/images/' . $gbr['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['quality'] = '60%';
						$config['width'] = 300;
						$config['height'] = 300;
						$config['new_image'] = './assets/images/' . $gbr['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
		
						$gambar = $gbr['file_name'];
						$kode = $this->input->post('kode');
						$nama = $this->input->post('xnama');
						$jenkel = $this->input->post('xjenkel');
						$username = $this->input->post('xusername');
						$password = $this->input->post('xpassword');
						$konfirm_password = $this->input->post('xpassword2');
						$email = $this->input->post('xemail');
						$nohp = $this->input->post('xkontak');
						$level = $this->input->post('xlevel');
						$images = $this->input->post('gambar');
						$path = './assets/images/' . $images;
						if (file_exists($path)) {
							unlink($path);
						}
		
						if (empty($password) && empty($konfirm_password)) {
							$this->m_customer->update_pengguna_tanpa_pass($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
							echo $this->session->set_flashdata('msg', 'info');
							redirect('pelanggan/dashboard');
						} elseif ($password != $konfirm_password) {
							echo $this->session->set_flashdata('msg', 'error');
							redirect('pelanggan/dashboard');
						} else {
							$this->m_customer->update_pengguna($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
							echo $this->session->set_flashdata('msg', 'info');
							redirect('pelanggan/dashboard');
						}
		
					} else {
						echo $this->session->set_flashdata('msg', 'info');
						redirect('pelanggan/dashboard');
					}
		
				} else {
					$kode = $this->input->post('kode');
					$nama = $this->input->post('xnama');
					$jenkel = $this->input->post('xjenkel');
					$username = $this->input->post('xusername');
					$password = $this->input->post('xpassword');
					$konfirm_password = $this->input->post('xpassword2');
					$email = $this->input->post('xemail');
					$nohp = $this->input->post('xkontak');
					$level = $this->input->post('xlevel');
					if (empty($password) && empty($konfirm_password)) {
						$this->m_customer->update_pengguna_tanpa_pass_dan_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level);
						echo $this->session->set_flashdata('msg', 'info');
						redirect('pelanggan/dashboard');
					} elseif ($password != $konfirm_password) {
						echo $this->session->set_flashdata('msg', 'error');
						redirect('pelanggan/dashboard');
					} else {
						$this->m_customer->update_pengguna_tanpa_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level);
						echo $this->session->set_flashdata('msg', 'info');
						redirect('pelanggan/dashboard');
					}
				}
		
			}
		
	function cetak_faktur_grosir(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data']=$this->m_penjualan->cetak_faktur();
		$this->load->view('admin/laporan/v_faktur_grosir',$x);
		//$this->session->unset_userdata('nofak');
	
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/dataharian/input');
    }
}

}