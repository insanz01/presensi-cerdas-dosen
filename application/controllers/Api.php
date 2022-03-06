<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 604800");
header("Access-Control-Request-Headers: x-requested-with");
header("Access-Control-Allow-Headers: x-requested-with, x-requested-by, content-type");
header("Content-Type: application/json");
header('Accepted: application/json');

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Credentials: true");
		header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
		header("Access-Control-Max-Age: 604800");
		header("Access-Control-Request-Headers: x-requested-with");
		header("Access-Control-Allow-Headers: x-requested-with, x-requested-by, content-type");
		header("Content-Type: application/json");
		header('Accepted: application/json');

		$this->load->model('CRUDModel', 'crud');
		$this->load->model('AdminModel', 'admin');
	}

	public function get($table, $id, $primary)
	{
		if ($table == 'jadwal') {
			$data = ($id) ? $this->crud->get_kelas($id) : $this->crud->get_kelas();

			echo json_encode($data, JSON_PRETTY_PRINT);
		} else if($table == "pertemuan") {
			$data = ($id) ? $this->admin->getPertemuan($id, $primary) : [];

			echo json_encode($data, JSON_PRETTY_PRINT);
		}
	}

	public function login()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Credentials: true");
		header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
		header("Access-Control-Max-Age: 604800");
		header("Access-Control-Request-Headers: x-requested-with");
		header("Access-Control-Allow-Headers: x-requested-with, x-requested-by, content-type");
		header("Content-Type: application/json");
		header('Accepted: application/json');

		$data = $this->security->xss_clean($this->input->raw_input_stream);

		$data_obj = json_decode($data);

		$data_obj = (array) $data_obj;

		$input_data = [
			'username' => $data_obj['username'],
			'password' => $data_obj['password']
		];

		$data = [];
		$data['message'] = "This message from server, because you're success to access";

		if ($input_data['username'] == "1600018015" && $input_data['password'] == "insan") {
			$data['nim'] = $input_data['username'];
			$data['status'] = 'Success';
		} else {
			$data['nim'] = $input_data['username'];
			$data['status'] = 'Berhasil';
		}

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function hadir($NIM)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Credentials: true");
		header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
		header("Access-Control-Max-Age: 604800");
		header("Access-Control-Request-Headers: x-requested-with");
		header("Access-Control-Allow-Headers: x-requested-with, x-requested-by, content-type");
		header("Content-Type: application/json");
		header('Accepted: application/json');

		$data = $this->security->xss_clean($this->input->raw_input_stream);

		$data_obj = json_decode($data);

		$data_obj = (array) $data_obj;

		$kunci = $data_obj['kunci'];

		var_dump($kunci);

		$data = [
			'NIM' => $NIM,
			'status' => 'Failed'
		];

		$kunci = str_replace(" ", "+", $kunci);
		$kunci = str_replace("b'", "", $kunci);
		$kunci = str_replace("'", "", $kunci);

		var_dump($kunci);

		if ($this->admin->setPresent($kunci, $NIM)) {
			$data['status'] = 'Success';
		}

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function get_data($who, $id_jadwal, $why = NULL, $others = NULL)
	{
		$data = [
			'data' => NULL,
			'status' => 'Failure'
		];

		if ($who == 'mahasiswa') {
			$data['data'] = $this->admin->getPresent($why, $id_jadwal, $others);
			$data['status'] = 'Success';
		}

		echo json_encode($data, JSON_PRETTY_PRINT);
	}
}
