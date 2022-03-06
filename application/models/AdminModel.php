<?php
defined('BASEPATH') or exit('No direct script access allowed');

// just for special query
class AdminModel extends CI_Model
{
	public function getKelas($NIP, $id = NULL)
	{
		$query = "";
		if (!$id) {
			$query = "SELECT kelas.Id_kelas, matakuliah.Nama as nama_matkul, jadwal.Hari, jadwal.Jam, jadwal.Id_jadwal FROM kelas JOIN matakuliah ON kelas.Id_matkul = matakuliah.Id_matkul JOIN dosen ON kelas.NIP = dosen.NIP JOIN jadwal ON kelas.Id_kelas = jadwal.Id_kelas WHERE dosen.NIP=$NIP";
		} else {
			$query = "SELECT kelas.Id_kelas, matakuliah.Nama as nama_matkul, jadwal.Hari, jadwal.Jam, jadwal.Id_jadwal FROM kelas JOIN matakuliah ON kelas.Id_matkul = matakuliah.Id_matkul JOIN dosen ON kelas.NIP = dosen.NIP JOIN jadwal ON kelas.Id_kelas = jadwal.Id_kelas WHERE dosen.NIP=$NIP AND kelas.Id_kelas=$id";

			return $this->db->query($query)->row_array(); // because can get only one kelas data
		}

		return $this->db->query($query)->result_array();
	}

	// mencari data mahasiswa dari pertemuan dan jadwal

	// https://cdn.cloudimagesb.com/cti/66/8b/20/668b207de4b8ffa80a9d17e7aa3c15f5/1607081682.gif

	public function getPertemuan($jadwal, $pertemuan)
	{

		$query = "SELECT kelas.Id_kelas, mahasiswa.NIM, mahasiswa.Nama, presensi.Tanggal_jam_presensi FROM kelas JOIN jadwal ON kelas.Id_kelas = jadwal.Id_kelas JOIN pertemuan ON pertemuan.Id_jadwal = jadwal.Id_jadwal JOIN presensi ON presensi.Id_pertemuan = pertemuan.Id_pertemuan JOIN mahasiswa ON presensi.NIM = mahasiswa.NIM WHERE pertemuan.Id_jadwal = '$jadwal' AND pertemuan.pertemuan = $pertemuan";

		return $this->db->query($query)->result_array();
	}

	public function setPresent($kunci, $NIM)
	{
		$pertemuan = $this->db->get_where('pertemuan', ['kunci' => $kunci])->row_array();

		if ($pertemuan) {
			$presensi = [
				'Id_presensi' => NULL,
				'Id_pertemuan' => $pertemuan['Id_pertemuan'],
				'NIM' => $NIM,
				'Tanggal_jam_presensi' => date('Y-m-d H:i:s', time())
			];

			$is_exist = $this->db->get_where('presensi', ['NIM' => $presensi['NIM']])->row_array();

			if (!$is_exist) {
				return $this->db->insert('presensi', $presensi);
			}

			return true;
		} else {
			return false;
		}
	}

	public function getPresent($table, $id, $pertemuan)
	{
		if ($table == 'presensi') {
			$hasPresent = $this->db->get_where('pertemuan', ['Id_jadwal' => $id, 'Pertamuan' => $pertemuan])->row_array();

			if($hasPresent) {
				return true;
			}

			$query = "SELECT mahasiswa.NIM, mahasiswa.Nama FROM mahasiswa JOIN presensi ON mahasiswa.NIM = presensi.NIM JOIN pertemuan ON pertemuan.Id_pertemuan = presensi.Id_pertemuan WHERE pertemuan.Id_jadwal = '$id' AND pertemuan.Pertemuan = $pertemuan";

			return $this->db->query($query)->result_array();
		}
	}

	public function get_key()
	{
		$data = $this->db->get_where('kunci', ['id' => 1])->row_array();

		// if ($data) {
		// 	return $data['kunci'];
		// }
		if($data) {
			return $data;
		}

		return '';
	}

	public function set_key($kunci)
	{
		$data = $this->db->get_where('kunci', ['id' => 1])->row_array();

		if ($data) {
			$this->db->set('kunci', $kunci);
			$this->db->where('id', 1);
			$this->db->update('kunci');

			return $this->db->affected_rows();
		} else {
			$new_data = [
				'id' => 1,
				'kunci' => $kunci,
				'created_at' => date('Y-m-d', time()),
				'updated_at' => date('Y-m-d', time())
			];

			return $this->db->insert('kunci', $new_data);
		}
	}

	public function deleteJadwalKelas($id_kelas) {
		if($this->db->delete('jadwal', ['Id_kelas' => $id_kelas])) {
			return $this->db->delete('kelas', ['Id_kelas' => $id_kelas]);
		}
	}
}
