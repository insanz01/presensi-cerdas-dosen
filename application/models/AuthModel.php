<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
	public function login($data) {
		$user = $this->db->get_where('user_dosen', ['Username' => $data['username']])->row_array();

		if(password_verify($data['password'], $user['password'])) {
			$this->session->set_userdata('user_id', $user['id']);
			$this->session->set_userdata('NIP', $user['Username']);

			return true;
		} else {
			return false;
		}
	}
}