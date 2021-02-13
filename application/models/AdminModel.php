<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// just for special query
class AdminModel extends CI_Model {
	public function getKelas($NIP, $id = NULL) {
		$query = "";
		if(!$id) {
			$query = "SELECT kelas.Id_kelas, matakuliah.Nama as nama_matkul, jadwal.Hari, jadwal.Jam FROM kelas JOIN matakuliah ON kelas.Id_matkul = matakuliah.Id_matkul JOIN dosen ON kelas.NIP = dosen.NIP JOIN jadwal ON kelas.Id_kelas = jadwal.Id_kelas WHERE dosen.NIP=$NIP";
		} else {
			$query = "SELECT kelas.Id_kelas, matakuliah.Nama as nama_matkul, jadwal.Hari, jadwal.Jam FROM kelas JOIN matakuliah ON kelas.Id_matkul = matakuliah.Id_matkul JOIN dosen ON kelas.NIP = dosen.NIP JOIN jadwal ON kelas.Id_kelas = jadwal.Id_kelas WHERE dosen.NIP=$NIP AND kelas.Id_kelas=$id";

			return $this->db->query($query)->row_array(); // because can get only one kelas data
		}

		return $this->db->query($query)->result_array();
	}
}