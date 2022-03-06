<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<?php if($this->session->flashdata('pesan')): ?>
				<div class="col-7 mx-auto mt-4">
					<?= $this->session->flashdata('pesan'); ?>
				</div>
			<?php endif; ?>
			<div class="col-7 my-4 mx-auto">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('app/kunci') ?>" method="post">
							<h3 class="mb-3">Kunci Enkripsi</h3>
							<div class="form-group">
								<input class="form-control" type="text" name="kunci" placeholder="Ketik disini..." required>
								<?php if($kunci): ?>
									<small class="text-danger pt-3 pl-3">Kunci sudah di set sebelumnya pada : <?= date('d-M-Y', strtotime($kunci['updated_at'])) ?></small>
								<?php endif; ?>
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