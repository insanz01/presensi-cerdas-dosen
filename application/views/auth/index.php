<div class="container">
	<div class="row mb-4">
		<div class="col-xl-5 col-xs-12 my-4 mx-auto">
			<div class="card pt-4">
				<div class="card-body">
					<form action="<?= base_url('Auth/index') ?>" method="POST">
						<div class="form-group mb-4">
							<h3 class="text-center">Presensi App</h3>
						</div>
						<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="NIP/NIY">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" onmouseenter="showPassword(this)" onmouseleave="hidePassword(this)" placeholder="Password">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">MASUK</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	const showPassword = (x) => {
		x.type = "text"
	}

	const hidePassword = (x) => {
		x.type = "password"
	}
</script>