<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>

<!-- MAIN : BEGIN -->
<main id="main">

	<section id="profile">
		<div class="container">
			<div class="row">
				<div>
					<h4><b><?= $title; ?></b></h4>
					<hr>

					<div style="height:10%"></div>
					<div class="container bcontent">
						<div class="card in-box profile-shadow d-flex" style="width: 100%;">
							<div class="row no-gutters">
								<div class="col-sm-2">
									<img class="card-img" src="assets/img/jerry.jpg" alt="Profile Picture">
								</div>
								<div class="col-sm-9 mt-2">
									<div class="card-body profile-shadow" style="border-radius: 30px; background-color: #fff; ">
										<ul class="list-group list-group-horizontal-sm">
											<li class="list-group-item title">Name</li>
											<li class="list-group-item display-title"><?= ucfirst($userInfo['name']); ?></li>
										</ul>
										<ul class="list-group list-group-horizontal-sm">
											<li class="list-group-item title">Email</li>
											<li class="list-group-item display-title"><?= $userInfo['email']; ?></li>
										</ul>
										<div class="row text-end">
											<div style="height:10px;"></div>
											<div class="col">
												<a href="<?= base_url('edit/' . $userInfo['id']) ?>" class="btn btn-primary">Edit</a>
											</div>
											<div style="height:10px;"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div  style="padding: 50px"></div>
	</section>

</main>
<!-- MAIN : END -->

<?= $this->endSection() ?>