<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUDModel extends CI_Model {

	public function get_last($table) {
		$query = "SELECT * FROM $table ORDER BY ID DESC LIMIT 1";

		return $this->db->query($query)->row_array();
	}
	
	public function insert($table, $data) {
		// $data['created_at'] = date('Y-m-d H:i:s', time());
		// $data['updated_at'] = date('Y-m-d H:i:s', time());

		return $this->db->insert($table, $data);
	}

	public function get($table, $id = NULL) {
		if($id) {
			return $this->db->get_where($table, ['ID' => $id])->row_array();
		} else {
			return $this->db->get($table)->result_array();
		}
	}

	public function update($table, $data, $id) {
		// $data['updated_at'] = date('Y-m-d H:i:s', time());

		$this->db->set($data);
		$this->db->where('ID', $id);
		$this->db->update($table);

		return $this->db->rows_affected();
	}

	public function delete($table, $id) {
		return  $this->db->delete($table, ['ID' => $id]);
	}

	// fungsi aktivasi
	public function activation($id) {
		$user = $this->get('users', $id);

		$this->db->set('aktif', !$user['aktif']);
		$this->db->where('ID', $id);
		$this->db->update('users');

		return $this->db->affected_rows();
	}

}