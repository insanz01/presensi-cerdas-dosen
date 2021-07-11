<div class="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-4 mt-2">
				<div class="form-group">
					<label>Kelas</label>
					<select class="form-control" onchange="pilihMatkul(this)">
						<option value="">BELUM DIPILIH</option>
						<?php foreach($kelas as $k): ?>
							<option value="<?= $k['Id_jadwal'] ?>"><?= $k['nama_matkul'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="col-4 mt-2">
				<div class="form-group">
					<label>Pertemuan</label>
					<select id="pertemuan" class="form-control"></select>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-stried">
							<thead>
								<th>#</th>
								<th>NIM</th>
								<th>Nama</th>
								<th>Waktu Hadir</th>
							</thead>
							<tbody id="mahasiswa_data">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	let GLOBAL_JADWAL = '';

	const pilihMatkul = (x) => {
    console.log(x.value);
    
    if(x.value !== '') {
      dapatkanPertemuan();

      GLOBAL_JADWAL = x.value;
    } else {
      const pertemuan = document.getElementById('pertemuan');
      pertemuan.innerHTML = '';
    }
  }

  const getData = async (jadwal, pertemuan) => {
  	return await axios.get(`<?= base_url('Api/get/pertemuan/') ?>${jadwal}/${pertemuan}`).then(res => res.data);
  }

  const pilihPertemuan = async (x) => {
  	let pertemuan = x.value;

  	let mahasiswa = document.getElementById('mahasiswa_data');

  	let result = await getData(GLOBAL_JADWAL, pertemuan).then(res => res);

  	console.log(pertemuan);

  	let temp = '';

  	result.forEach((res, nomor) => {
  		temp += `<tr>
  			<td>${nomor + 1}</td>
  			<td>${res.NIM}</td>
  			<td>${res.Nama}</td>
  			<td>${res.Tanggal_jam_presensi}</td>
  		</tr>`;
  	})

  	mahasiswa.innerHTML = temp;
  }

	const dapatkanPertemuan = () => {
    const pertemuan = document.getElementById('pertemuan');

    const list_pertemuan = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];

    let temp = '<option value="">BELUM DIPILIH</option>';

    list_pertemuan.forEach((pertemuan_ke) => {
      temp += `<option onchange="pilihPertemuan(this)" value="${pertemuan_ke}">Pertemuan ${pertemuan_ke}</option>`;
    })

    pertemuan.innerHTML = temp;
  }
</script>