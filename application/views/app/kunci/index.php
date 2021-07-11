<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-7 my-4 mx-auto">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('app/kunci') ?>" method="post">
							<h3 class="mb-3">Kunci Enkripsi</h3>
							<div class="form-group">
								<input class="form-control" type="text" name="kunci" placeholder="Ketik disini..." required>
							</div>
							<div class="form-group">
								<button class="btn btn-primary float-right" role="button" type="submit">Simpan Kunci</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>