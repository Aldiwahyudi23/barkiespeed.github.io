<?php
class Customer extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
		};

		$this->load->model('m_customer');
		$this->load->model('m_barang');
		$this->load->model('m_identitas');
		$this->load->library('upload');
	}

	function index() {
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='3'){
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data'] = $this->m_customer->get_all_customer();
		$this->load->view('admin/master/v_customer', $x);
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('Dashboard');
    }
	}
	function pelanggan($id) {
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='3'){
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data'] = $this->m_customer->get_all_customer_masuk($id);
		$x['data1'] = $this->m_customer->get_all_customer_active1($id);
		$x['data3'] = $this->m_barang->tampil_barang();
		$this->load->view('admin/pelanggan', $x);
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('dashboard');
    }
	}
	function active($nopol) {
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2' ||$this->session->userdata('akses')=='3'){
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['data'] = $this->m_customer->get_all_customer_masuk4($nopol);
			$x['data1'] = $this->m_customer->get_all_customer_active3($nopol);
			$this->load->view('admin/service', $x);
		}else{
			echo $this->session->set_flashdata('msg', 'danger');
			redirect('Dashboard');
		}
		}
public function slugify($string) {
		//remove prepositions
		$preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the');
		$pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
		$string = preg_replace($pattern, '', $string);

		// replace non letter or digits by -
		$string = preg_replace('~[^\\pL\d]+~u', '-', $string);

		// trim
		$string = trim($string, '-');

		// transliterate
		//$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

		// lowercase
		$string = strtolower($string);

		// remove unwanted characters
		$string = preg_replace('~[^-\w]+~', '', $string);

		if (empty($string)) {
			return 'n-a';
		}

		return $string;
	}
	function simpan_customer() {
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$nama_customer = strip_tags($this->input->post('xnama_customer'));
		$slug = $this->slugify($nama_customer);
		$keluhan = $this->input->post('xkeluhan');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');
		$alamat = $this->input->post('xalamat');
		$keterangan = 'masuk';
		$nohp = $this->input->post('xnohp');
		$nopol = $this->input->post('xnopol');
		$kendaraan = $this->input->post('xkendaraan');
		$type = $this->input->post('xtype');
		$km = $this->input->post('xkm');
		$this->m_customer->simpan_customer($nama_customer, $keluhan, $mulai, $selesai, $alamat, $keterangan, $nohp, $nopol, $kendaraan, $type, $km, $slug);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/customer');
	}else{
        echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/customer');
    }
	}

	function update_customer() {
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode = strip_tags($this->input->post('kode'));
		$nama_customer = strip_tags($this->input->post('xnama_customer'));
		$slug = $this->slugify($nama_customer);
		$keluhan = $this->input->post('xkeluhan');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');
		$alamat = $this->input->post('xalamat');
		$keterangan = $this->input->post('xketerangan');
		$nohp = $this->input->post('xnohp');
		$nopol = $this->input->post('xnopol');
		$kendaraan = $this->input->post('xkendaraan');
		$type = $this->input->post('xtype');
		$km = $this->input->post('xkm');
		$this->m_customer->update_customer($kode, $nama_customer, $keluhan, $mulai, $selesai, $alamat, $keterangan, $nohp, $nopol, $kendaraan, $type, $km, $slug);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/customer');
	}else{
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/customer');
    }
	}
	function update_pelanggan() {
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
					redirect('admin/customer');
				} elseif ($password != $konfirm_password) {
					echo $this->session->set_flashdata('msg', 'error');
					redirect('admin/customer');
				} else {
					$this->m_customer->update_pengguna($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('admin/customer');
				}

			} else {
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin/customer');
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
				redirect('admin/customer');
			} elseif ($password != $konfirm_password) {
				echo $this->session->set_flashdata('msg', 'error');
				redirect('admin/customer');
			} else {
				$this->m_customer->update_pengguna_tanpa_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin/customer');
			}
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
				$alamat = $this->input->post('xalamat');
				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				if (file_exists($path)) {
					unlink($path);
				}

				if (empty($password) && empty($konfirm_password)) {
					$this->m_customer->update_profile_tanpa_pass($kode, $nama, $jenkel, $username, $password, $email, $nohp, $alamat, $gambar);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('pelanggan/profile');
				} elseif ($password != $konfirm_password) {
					echo $this->session->set_flashdata('msg', 'error');
					redirect('pelanggan/profile');
				} else {
					$this->m_customer->update_profile($kode, $nama, $jenkel, $username, $password, $email, $nohp, $alamat, $gambar);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('pelanggan/profile');
				}

			} else {
				echo $this->session->set_flashdata('msg', 'info');
				redirect('pelanggan/profile');
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
			$alamat = $this->input->post('xalamat');
			if (empty($password) && empty($konfirm_password)) {
				$this->m_customer->update_profile_tanpa_pass_dan_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $alamat);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('pelanggan/profile');
			} elseif ($password != $konfirm_password) {
				echo $this->session->set_flashdata('msg', 'error');
				redirect('pelanggan/profile');
			} else {
				$this->m_customer->update_profile_tanpa_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $alamat);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('pelanggan/profile');
			}

	}

	}
	function hapus_customer() {
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode = strip_tags($this->input->post('kode'));
		$this->m_customer->hapus_customer($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/customer');
	}else{
		$this->load->view('notification/success');
			echo "<meta http-equiv='refresh' content='2,URL=index'>";
    }
	}
	function reset_password() {
		if($this->session->userdata('akses')=='1'){
		$id = $this->uri->segment(4);
		$get = $this->m_customer->getusername($id);
		if ($get->num_rows() > 0) {
			$a = $get->row_array();
			$b = $a['username'];
		}
		$pass = rand(123456, 999999);
		$this->m_customer->resetpass($id, $pass);
		echo $this->session->set_flashdata('msg', 'show-modal');
		echo $this->session->set_flashdata('uname', $b);
		echo $this->session->set_flashdata('upass', $pass);
		redirect('admin/customer');

	}else {
		echo $this->session->set_flashdata('msg', 'danger');
		redirect('admin/customer');
		}
	
	}
	function cart($id) {
		$x['data'] = $this->m_customer->get_all_customer_masuk($id);
		$this->load->view('admin/alert/cart', $x);
	}
	
}