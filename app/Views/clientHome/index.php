<?php
if (session()->has('loggedInUser'))
	$this->extend('layouts/logged_layout');
else {
	$this->extend('layouts/main_layout');
}


?>

<?= $this->section('clientHome') ?>

	<div style="margin-top: 3vh;" class="album py-5 bg-light">
		<div class="container">
			<h3> Sabores:</h3>
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				<div class="col">

					<div class="card shadow-sm">
						<img class="bd-placeholder-img card-img-top" width="100%" height="225"
							src="<?= base_url('public/assets/images/quatro-queijos.jpg') ?>" role="img"
							aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#55595c"></rect></img>

						<div class="card-body">

							<p class="card-text"> 4 Queijos </p>
						</div>
					</div>
				</div>
				<div class="col">

					<div class="card shadow-sm">
						<img class="bd-placeholder-img card-img-top" width="100%" height="225"
							src="<?= base_url('public/assets/images/frango-catupiry.jpg') ?>" role="img"
							aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#55595c"></rect></img>

						<div class="card-body">

							<p class="card-text"> Frango com Catupiry </p>
						</div>
					</div>
				</div>
				<div class="col">

					<div class="card shadow-sm">
						<img class="bd-placeholder-img card-img-top" width="100%" height="225"
							src="<?= base_url('public/assets/images/calabresa.jpg') ?>" role="img"
							aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#55595c"></rect></img>

						<div class="card-body">

							<p class="card-text"> Calabresa </p>
						</div>
					</div>
				</div>

				<div class="col">

					<div class="card shadow-sm">
						<img class="bd-placeholder-img card-img-top" width="100%" height="225"
							src="<?= base_url('public/assets/images/lombo.jpg') ?>" role="img"
							aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#55595c"></rect></img>

						<div class="card-body">

							<p class="card-text"> Lombinho </p>
						</div>
					</div>
				</div>
				<div class="col">

					<div class="card shadow-sm">
						<img class="bd-placeholder-img card-img-top" width="100%" height="225"
							src="<?= base_url('public/assets/images/file-cheddar.jpg') ?>" role="img"
							aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#55595c"></rect></img>

						<div class="card-body">

							<p class="card-text"> Filé com Cheddar </p>
						</div>
					</div>
				</div>
				<div class="col">

					<div class="card shadow-sm">
						<img class="bd-placeholder-img card-img-top" width="100%" height="225"
							src="<?= base_url('public/assets/images/portuguesa.jpg') ?>" role="img"
							aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#55595c"></rect></img>

						<div class="card-body">

							<p class="card-text"> Portuguesa </p>
						</div>
					</div>
				</div>

				<div class="col">

					<div class="card shadow-sm">
						<img class="bd-placeholder-img card-img-top" width="100%" height="225"
							src="<?= base_url('public/assets/images/margherita.jpg') ?>" role="img"
							aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#55595c"></rect></img>

						<div class="card-body">

							<p class="card-text"> Margherita </p>
						</div>
					</div>
				</div>

			</div>
			<hr>
			<h3>Faça seu pedido!</h3>

			<div class="wrap" style="margin-top: 3vh;">
				<div class="row" style="margin-left: 16.5vw;">
					<div class="col-sm-3">
						<h5>Selecione os sabores:</h5>
						<div class="form-group">
							<form action="<?= site_url('order') ?>" method="post">
								<?= csrf_field() ?>
									<select name="flavor" aria-label="Default select example">
										<?php
                                        for ($i = 0; sizeof($flavorArray) > $i; $i++) {
	                                        $item = $flavorArray[$i]["name"];
                                        ?>
										<option value="<?php echo $item ?>">
											<?php echo $item ?>
										</option>

										<?php } ?>
									</select>

									<form action="<?= site_url('order') ?>" method="post">
										<?= csrf_field() ?>
											<select name="flavor1" aria-label="Default select example"
												style="margin-top: 2vh;">
												<?php
                                                for ($i = 0; sizeof($flavorArray) > $i; $i++) {
	                                                $item = $flavorArray[$i]["name"];
                                                ?>
												<option value="<?php echo $item ?>">
													<?php echo $item ?>
												</option>

												<?php } ?>
											</select>

											<form action="<?= site_url('order') ?>" method="post">
												<?= csrf_field() ?>
													<select name="flavor2" aria-label="Default select example"
														style="margin-top: 2vh;">
														<?php
                                                        for ($i = 0; sizeof($flavorArray) > $i; $i++) {
	                                                        $item = $flavorArray[$i]["name"];
                                                        ?>
														<option value="<?php echo $item ?>">
															<?php echo $item ?>
														</option>

														<?php } ?>
													</select>
						</div>
					</div>
					<div class="col-sm-3">
						<h5>Selecione a massa:</h5>
						<div class="form-group">
							<form action="<?= site_url('order') ?>" method="post">
								<?= csrf_field() ?>
									<select name="dough" aria-label="Default select example">
										<?php
                                        for ($i = 0; sizeof($doughArray) > $i; $i++) {
	                                        $item = $doughArray[$i]["name"];
                                        ?>
										<option value="<?php echo $item ?>">
											<?php echo $item ?>
										</option>

										<?php } ?>
									</select>
						</div>
					</div>
					<div class="col-sm-3">
						<h5>Selecione a borda:</h5>
						<div class="form-group">
							<form action="<?= site_url('order') ?>" method="post">
								<form action="<?= site_url('order') ?>" method="post">
									<?= csrf_field() ?>
										<select name="edge" aria-label="Default select example">
											<?php
                                            for ($i = 0; sizeof($edgeArray) > $i; $i++) {
	                                            $item = $edgeArray[$i]["name"];
                                            ?>
											<option value="<?php echo $item ?>">
												<?php echo $item ?>
											</option>

											<?php } ?>
										</select>
						</div>
					</div>
					<div class="col-sm-8 " style="text-align: center; margin-left: 1vw;">
						<input style="width: 10vw;" class="btn btn-primary" type="submit" value="Submit">
					</div>
					</form>
				</div>
			</div>
			<hr>
			<h3>Acompanhe seu pedido em tempo real!</h3>
			<div id="statusPedidos" class="row" style="margin-top:5vh; min-height: 30vh;" ></div>
	</div>


	<script language="javascript">
		let url = '<?= site_url('clientOrderStatus'); ?>';
		let listaStatusPedidos = document.getElementById("statusPedidos");
		request(url);
		setInterval(function () {
			listaStatusPedidos.innerHTML = '';
			request(url);
		}, 10000);

		function request(url) {

			fetch(url).then(response => response.json()).then(json => {
				var colorClass = '';
				json.forEach(item => {
					
					if(item.status=='Pedido'){
						colorClass = "bg-warning";
					}else if(item.status=='Em produção'){
						colorClass = "bg-primary";
					}else if(item.status=='Pronto'){
						colorClass = "bg-success";
					}else if(item.status=='Concluido'){
						colorClass = "bg-dark";
					}
					listaStatusPedidos.innerHTML += `<div class="card text-white  ${colorClass} mb-3" style="max-width: 18rem; margin-left: 1vw; margin-right: 1vw"><div class="card-header">Pedido: ${item.id}</div><div class="card-body"><h5 class="card-title">Status: ${item.status}</h5></div></div></div></div>`;
				});
			});
		}
//

// 
	</script>
	
	<?= $this->endSection() ?>