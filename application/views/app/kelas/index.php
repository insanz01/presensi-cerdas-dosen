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
							<h3><?= $k['nama_matkul'] ?></h3>
							<hr>
							<p><?= $k['Hari'] ?></p>
							<p><?= $k['Jam'] ?></p>
							<div class="row">
								<div class="col-12">
									<button class="btn btn-primary btn-block">EDIT</button>
								</div>
								<div class="col-12 text-center">
									<a href="#" class="text-sm text-danger">DELETE</a>
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
	        	<!-- <select class="form-control" name="Jam">
	        		<option></option>
	        		<option value="07:00-08:30">07.30 - 08.30</option>
	        	</select> -->
	        	<div class="row">
	        		<div class="col-6">
	        			<input type="time" name="jam_mulai" class="form-control" required>
	        		</div>
	        		<!-- <div class="col-6">
	        			<input type="time" name="jam_akhir" class="form-control" required>
	        		</div> -->
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