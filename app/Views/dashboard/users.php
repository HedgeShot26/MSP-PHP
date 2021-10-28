<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>

<main id="main">

	<section id="users-admin">
		<div class="container">
			<div class="row">
				<div>
					<h4><b><?= $title; ?></b></h4>
					<hr>

					<a href="<?= site_url('register') ?>" class="btn btn-primary float-right top-btn">Add Employee</a>
					<div style="height:10px;"></div>

					<div class="box-table table-shadow">
						<table class="table box-table table-hover table-borderless" id="usertable">
							<thead class="table-shadow title">
								<tr>
									<th>ID No.</th>
									<th>Name</th>
									<th>Email Address</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($users as $row) : ?>
									<tr class="tb-body table-shadow ">
										<td class="user weight"><?= $row['id'] ?></td>
										<td class="user weight"><?= $row['name'] ?></td>
										<td class="user weight"><?= $row['email'] ?></td>
										<td class="user weight">
												<form action="<?= base_url('dashboard/delete/' . $row['id']) ?>" method="POST">
													<input type="hidden" name="_method" value="DELETE" />
													<button type="submit" class="btn btn-sm" style="background-color:#cf0000; color:#ffffff;">DELETE</button>
												</form>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</section>

</main>
<script>
	$(document).ready(function() {
		$('#usertable').DataTable();
	});
</script>
<!-- MAIN : END -->

<?= $this->endSection() ?>