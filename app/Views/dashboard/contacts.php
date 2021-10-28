<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>

<main id="main">

	<section id="message-admin">
		<div class="container">
			<div class="row">
				<div class="">

					<h4><b><?= $title; ?></b></h4>
					<hr>

					<div class="box-table table-shadow">
						<table class="table box-table table-hover table-borderless" id="mydatatable">
							<thead class="table-shadow title">
								<tr>
									<th>&nbsp;No.</th>
									<th>&nbsp;&nbsp;Name</th>
									<th>&nbsp;&nbsp;Email Address</th>
									<th>&nbsp;&nbsp;Title</th>
									<th>&nbsp;&nbsp;Date Posted</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($contacts as $row) : ?>
									<tr class="tb-body table-shadow ">
										<td class="contact weight"><?= $row['msg_id'] ?></td>
										<td class="contact weight" style="width:13%;"><?= $row['name'] ?></td>
										<td class="contact weight" style="width:20%;"><?= $row['email'] ?></td>
										<td class="contact weight"><?= $row['title'] ?></td>
										<td class="contact weight" style="width:15%;"><?= $row['dateSent'] ?></td>
										<td class="contact weight" style="width:10%;">
											<?php if ($row['status'] == 0) { ?>
												<a href="<?= base_url('dashboard/status/' . $row['msg_id']) ?>" class="btn btn-sm" style="background-color:#e6e600; color:#000000;">Pending</a>
											<?php } else { ?>
												<a href="<?= base_url('dashboard/status/' . $row['msg_id']) ?>" class="btn btn-sm" style="background-color:#14d403; color:#000000;">Seen</a>
											<?php } ?>
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
		$('#mydatatable').DataTable();
	});
</script>
<!-- MAIN : END -->

<?= $this->endSection() ?>