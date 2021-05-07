<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// just for special query
class AdminModel extends CI_Model {
	public function getKelas($NIP, $id = NULL) {
		$query = "";
		if(!$id) {
			$query = "SELECT kelas.Id_kelas, matakuliah.Nama as nama_matkul, jadwal.Hari, jadwal.Jam, jadwal.Id_jadwal FROM kelas JOIN matakuliah ON kelas.Id_matkul = matakuliah.Id_matkul JOIN dosen ON kelas.NIP = dosen.NIP JOIN jadwal ON kelas.Id_kelas = jadwal.Id_kelas WHERE dosen.NIP=$NIP";
		} else {
			$query = "SELECT kelas.Id_kelas, matakuliah.Nama as nama_matkul, jadwal.Hari, jadwal.Jam, jadwal.Id_jadwal FROM kelas JOIN matakuliah ON kelas.Id_matkul = matakuliah.Id_matkul JOIN dosen ON kelas.NIP = dosen.NIP JOIN jadwal ON kelas.Id_kelas = jadwal.Id_kelas WHERE dosen.NIP=$NIP AND kelas.Id_kelas=$id";

			return $this->db->query($query)->row_array(); // because can get only one kelas data
		}

		return $this->db->query($query)->result_array();
	}

	// mencari data mahasiswa dari pertemuan dan jadwal

	// https://cdn.cloudimagesb.com/cti/66/8b/20/668b207de4b8ffa80a9d17e7aa3c15f5/1607081682.gif

	public function getPertemuan($jadwal, $pertemuan) {
		$query = "SELECT kelas.Id_kelas, mahasiswa.NIM, mahasiswa.Nama, presensi.Tanggal_jam_presensi FROM kelas JOIN jadwal ON kelas.Id_kelas = jadwal.Id_kelas JOIN pertemuan ON pertemuan.Id_jadwal = jadwal.Id_jadwal JOIN presensi ON presensi.Id_pertemuan = pertemuan.Id_pertemuan JOIN mahasiswa ON presensi.NIM = mahasiswa.NIM WHERE pertemuan.Id_jadwal = $jadwal AND pertemuan.pertemuan = $pertemuan";

		return $this->db->query($query)->result_array();
	}

	public function setPresent($kunci, $NIM) {
		$pertemuan = $this->db->get_where('pertemuan', ['kunci' => $kunci])->row_array();

		if($pertemuan) {
			$presensi = [
				'Id_presensi' => NULL,
				'Id_pertemuan' => $pertemuan['Id_pertemuan'],
				'NIM' => $NIM,
				'Tanggal_jam_presensi' => date('Y-m-d H:i:s', time())
			];

			return $this->db->insert('presensi', $presensi);
		} else {
			return false;
		}
	}

	public function getPresent($table, $id, $pertemuan) {
		if($table == 'presensi') {
			$query = "SELECT mahasiswa.NIM, mahasiswa.Nama FROM mahasiswa JOIN presensi ON mahasiswa.NIM = presensi.NIM JOIN pertemuan ON pertemuan.Id_pertemuan = presensi.Id_pertemuan WHERE pertemuan.Id_jadwal = '$id' AND pertemuan.Pertemuan = $pertemuan";

			return $this->db->query($query)->result_array();
		}

	}
}