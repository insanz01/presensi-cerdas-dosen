<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUDModel extends CI_Model {

	public function get_last($table, $primary) {
		$query = "SELECT * FROM $table ORDER BY $primary DESC LIMIT 1";

		return $this->db->query($query)->row_array();
	}
	
	public function insert($table, $data) {
		// $data['created_at'] = date('Y-m-d H:i:s', time());
		// $data['updated_at'] = date('Y-m-d H:i:s', time());

		return $this->db->insert($table, $data);
	}

	public function get($table, $primary = NULL, $id = NULL) {
		if($id) {
			return $this->db->get_where($table, [$primary => $id])->row_array();
		} else {
			return $this->db->get($table)->result_array();
		}
	}

	public function get_kelas($id = NULL) {
		$query = "";
		if($id) {
			$query = "SELECT jadwal.Id_jadwal, jadwal.Hari, jadwal.Jam, kelas.Id_kelas, matakuliah.Id_matkul, matakuliah.Nama FROM jadwal JOIN kelas ON jadwal.Id_kelas = kelas.Id_kelas JOIN matakuliah ON kelas.Id_matkul = matakuliah.Id_matkul WHERE jadwal.Id_jadwal = '$id'";

			return $this->db->query($query)->row_array();
		} else {
			$query = "SELECT jadwal.Id_jadwal, jadwal.Hari, jadwal.Jam, kelas.Id_kelas, matakuliah.Id_matkul, matakuliah.Nama FROM jadwal JOIN kelas ON jadwal.Id_kelas = kelas.Id_kelas JOIN matakuliah ON kelas.Id_matkul = matakuliah.Id_matkul";

			return $this->db->query($query)->result_array();
		}

	}

	public function update($table, $data, $primary, $id) {
		// $data['updated_at'] = date('Y-m-d H:i:s', time());

		$this->db->set($data);
		$this->db->where($primary, $id);
		$this->db->update($table);

		return $this->db->rows_affected();
	}

	public function delete($table,$primary, $id) {
		return  $this->db->delete($table, [$primary => $id]);
	}

	// fungsi aktivasi
	public function activation($primary, $id) {
		$user = $this->get('users', $id);

		$this->db->set('aktif', !$user['aktif']);
		$this->db->where($primary, $id);
		$this->db->update('users');

		return $this->db->affected_rows();
	}

}