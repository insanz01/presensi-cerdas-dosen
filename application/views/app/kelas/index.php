<div class="content-wrapper">
	<div class="container">
		<div class="row">

			<div class="col-12 mt-2">
				<button class="btn btn-success float-right" data-toggle="modal" data-target="#addModal">Tambah</button>
			</div>

			<?php foreach($kelas as $k): ?>
				<div class="col-3 my-3">
					<div class="card">
						<div class="card-body">
							<h5><?= $k['nama_matkul'] ?></h5>
							<hr>
							<p class="font-weight-bold"><?= $k['Hari'] ?></p>
							<p><?= $k['Jam'] ?></p>
							<div class="row">
								<div class="col-12">
									<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#editModal" onclick="showData(this)" id-kelas="<?= $k['Id_jadwal'] ?>">EDIT</button>
								</div>
								<div class="col-12 text-center">
									<a href="#" class="text-sm text-danger" data-toggle="modal" data-target="#deleteModal" onclick="deleteData(this)" id-kelas="<?= $k['Id_kelas'] ?>">DELETE</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('App/kelas/add') ?>" method="POST">
	      <div class="modal-body">
	        <div class="form-group">
	        	<label>Matakuliah</label>
	        	<select class="form-control" name="Id_matkul" required>
	        		<?php foreach($matakuliah as $m): ?>
		        		<option value="<?= $m['Id_matkul'] ?>"><?= $m['Nama'] ?></option>
		        	<?php endforeach; ?>
	        	</select>
	        </div>
	        <div class="form-group">
	        	<label>Hari</label>
	        	<select class="form-control" name="hari" required>
	        		<option value=""></option>
	        		<option value="Senin">Senin</option>
	        		<option value="Selasa">Selasa</option>
	        		<option value="Rabu">Rabu</option>
	        		<option value="Kamis">Kamis</option>
	        		<option value="Jumat">Jumat</option>
	        		<option value="Sabtu">Sabtu</option>
	        	</select>
	        </div>
	        <div class="form-group">
	        	<label>Jam</label>
	        	<div class="row">
	        		<div class="col-6">
	        			<input type="time" name="jam_mulai" class="form-control" required>
	        		</div>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <button type="submit" class="btn btn-primary">Tambah Kelas</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Ingin menghapus ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('App/kelas/delete') ?>" method="post">
	      <div class="modal-body">
	      	<input type="hidden" name="Id_kelas" id="id_hapus">
	        <p>Apakah anda ingin menghapus kelas ini ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-danger">Hapus</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Update Matakuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('App/kelas/edit') ?>" method="POST">
      	<div class="modal-body">
	        <div class="form-group">
	        	<label>Matakuliah</label>
	        	<select class="form-control" name="Id_matkul" id="edit_matkul" required>
	        		<?php foreach($matakuliah as $m): ?>
		        		<option value="<?= $m['Id_matkul'] ?>"><?= $m['Nama'] ?></option>
		        	<?php endforeach; ?>
	        	</select>
	        </div>
	        <div class="form-group">
	        	<label>Hari</label>
	        	<select class="form-control" name="hari" id="edit_hari" required>
	        		<option value=""></option>
	        		<option value="Senin">Senin</option>
	        		<option value="Selasa">Selasa</option>
	        		<option value="Rabu">Rabu</option>
	        		<option value="Kamis">Kamis</option>
	        		<option value="Jumat">Jumat</option>
	        		<option value="Sabtu">Sabtu</option>
	        	</select>
	        </div>
	        <div class="form-group">
	        	<label>Jam</label>
	        	<div class="row">
	        		<div class="col-6">
	        			<input type="time" name="jam_mulai" class="form-control" id="edit_jam" required>
	        		</div>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
	      </div>
      </form>
      
    </div>
  </div>
</div>

<script type="text/javascript">
	const getData = async (id) => {
		return await axios.get(`<?= base_url('api/get/jadwal/') ?>${id}/Id_jadwal`).then(res => res.data);
	}

	const showData = async (target) => {
		const id = target.getAttribute('id-kelas');
		const result = await getData(id).then(res => res);

		console.log(result)
		console.log(result.Id_matkul)

		document.getElementById('edit_matkul').value = result.Id_matkul;
		document.getElementById('edit_hari').value = result.Hari;
		document.getElementById('edit_jam').value = result.Jam;
	}

	const deleteData = async (target) => {
		const id = target.getAttribute('id-kelas');
		console.log('id kelas untuk dihapus : ', id);

		document.getElementById('id_hapus').value = id;
	}
</script>