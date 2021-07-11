<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('CRUDModel', 'crud');
		$this->load->model('AdminModel', 'admin');

		$this->session->set_userdata('NIP', '2001801');
	}

	// helper function
	public function set_respon($isi_pesan, $success = false) {
		if($success) {
			$data = "<div class='alert alert-success' role='alert'>" . $isi_pesan . "</div>";
			$this->session->set_flashdata("pesan", $data);
		} else {
			$data = "<div class='alert alert-danger' role='alert'>" . $isi_pesan . "</div>";
			$this->session->set_flashdata("pesan", $data);
		}
	}

	// halaman dashboard
	public function index() {
		$NIP = $this->session->userdata('NIP');
		$data['kelas'] = $this->admin->getKelas($NIP);

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('app/dashboard', $data);
		$this->load->view('templates/footer');
	}

	// kelas area
	public function kelas($aksi = NULL, $id = NULL) {
		if(!$aksi or $aksi == 'detail') {
			$NIP = $this->session->userdata('NIP');

			$data['kelas'] = [];
			if(!$id && $aksi == 'detail')
				$data['kelas'] = $this->admin->getKelas($NIP);
			else
				$data['kelas'] = $this->admin->getKelas($NIP, $id);

			$data['matakuliah'] = $this->crud->get('matakuliah');

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('app/kelas/index', $data);
			$this->load->view('templates/footer');
		} else {
			switch($aksi) {
				case 'add':
					$kelas = [
						'Id_kelas' => 'KL' . random_string('numeric', 3),
						'Id_matkul' => $this->input->post('Id_matkul'),
						'NIP' => $this->session->userdata('NIP')
					];
					
					$sukses = $this->crud->insert('kelas', $kelas);

					$jadwal = [
						'Id_jadwal' => 'JD'.random_string('numeric', 3),
						'Hari' => $this->input->post('hari'),
						'Jam' => $this->input->post('jam_mulai'),
						'Id_kelas' => $kelas['Id_kelas']
					];

					if($sukses && $this->crud->insert('jadwal', $jadwal)) {
						$this->set_respon('Kelas berhasil ditambahkan', true);
					} else {
						$this->set_respon('Kelas gagal ditambahkan', false);
					}

				break;
				// =========================================================
				case 'edit':
					$data = [
						'Id_matkul' => $this->input->post('Id_matkul'),
						'NIP' => $this->session->userdata('NIP')
					];

					$id = $this->input->post('Id_kelas');

					if($this->admin->updateKelas($data, $id)) {
						$this->set_respon('Kelas berhasil diperbaharui', true);
					} else {
						$this->set_respon('Kelas gagal diperbaharui', false);
					}
				break;
				// =========================================================
				case 'delete':
					$id = $this->input->post('Id_kelas');

					if($this->admin->delete('kelas', $id)) {
						$this->set_respon('Kelas berhasil dihapus', true);
					} else {
						$this->set_respon('Kelas gagal dihapus', false);
					}
				break;
				// =========================================================
				default:
					$this->set_respon('Tidak ada method ' . $aksi, false);
			}

			redirect('App/kelas');
		}
	}

	// presensi area
	public function presensi($aksi = NULL, $id = NULL) {
		if(!$aksi or $aksi == 'detail') {
			$NIP = $this->session->userdata('NIP');

			$data['kelas'] = [];
			if(!$id && $aksi == 'detail')
				$data['kelas'] = $this->admin->getKelas($NIP);
			else
				$data['kelas'] = $this->admin->getKelas($NIP, $id);

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('app/presensi/index', $data);
			$this->load->view('templates/footer');
		} else {
			switch($aksi) {
				case 'add':
					$kelas = [
						'Id_kelas' => 'KL' . random_string('numeric', 3),
						'Id_matkul' => $this->input->post('Id_matkul'),
						'NIP' => $this->session->userdata('NIP')
					];
					
					$sukses = $this->crud->insert('kelas', $kelas);

					$jadwal = [
						'Id_jadwal' => 'JD'.random_string('numeric', 3),
						'Hari' => $this->input->post('hari'),
						'Jam' => $this->input->post('jam_mulai'),
						'Id_kelas' => $kelas['Id_kelas']
					];

					if($sukses && $this->crud->insert('jadwal', $jadwal)) {
						$this->set_respon('Kelas berhasil ditambahkan', true);
					} else {
						$this->set_respon('Kelas gagal ditambahkan', false);
					}

				break;
				// =========================================================
				case 'edit':
					$data = [
						'Id_matkul' => $this->input->post('Id_matkul'),
						'NIP' => $this->session->userdata('NIP')
					];

					$id = $this->input->post('Id_kelas');

					if($this->admin->updateKelas($data, $id)) {
						$this->set_respon('Kelas berhasil diperbaharui', true);
					} else {
						$this->set_respon('Kelas gagal diperbaharui', false);
					}
				break;
				// =========================================================
				case 'delete':
					$id = $this->input->post('Id_kelas');

					if($this->admin->delete('kelas', $id)) {
						$this->set_respon('Kelas berhasil dihapus', true);
					} else {
						$this->set_respon('Kelas gagal dihapus', false);
					}
				break;
				// =========================================================
				default:
					$this->set_respon('Tidak ada method ' . $aksi, false);
			}

			redirect('App/presensi');
		}
	}

	public function kunci() {

		$this->form_validation->set_rules('kunci', 'Kunci', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['kunci'] = $this->admin->get_key();

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('app/kunci/index', $data);
			$this->load->view('templates/footer');
		} else {
			$kunci = $this->input->post('kunci');

			if($this->admin->set_key($kunci)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kunci Enkripsi telah diperbaharui</div>');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kunci Enkripsi gagal diperbaharui</div>');
			}

			redirect('app/kunci');
		}
	}

	// lainnya untuk kebutuhan API
	public function get_data($table, $id = NULL) {
		$primary_key = '';

		switch($table){
			case 'presensi':
				$primary_key = "Id_presensi";
			break;
			#===================================
			case 'jadwal':
				$primary_key = "Id_jadwal";
			break;
			#===================================
		}

		$data = $this->crud->get($table, $primary_key, $id);

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

}