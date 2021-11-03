<?= $this->extend('layouts/auth_template') ?>

<?= $this->section('content') ?>

<main id="main">


<section id="catalogue-admin">
		<div class="container">
			<div class="row">
				<div id="catalogue">
					<hr>

					<a href="<?= base_url('sales') ?>" class="btn btn-danger float-end top-btn" style="border: 3px solid red; border-radius:30px; width:10%;">Back</a>
					<div style="height:10px;"></div>

					<div class="box-table table-shadow">
						<table class="table box-table table-hover table" id="cataloguetable">
							<thead class="table-shadow title">
								<tr>
									<th>&nbsp;&nbsp;No.</th>
									<th>&nbsp;&nbsp;Product No.</th>
									<th>&nbsp;&nbsp;Name</th>
									<th>&nbsp;&nbsp;Images</th>
									<th>&nbsp;&nbsp;Category</th>
									<th>&nbsp;&nbsp;Price</th>
									<th>&nbsp;&nbsp;Quantity Selected</th>
									<th>&nbsp;&nbsp;Sub Total</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($list) : ?>
								<?php foreach ($items as $row) : ?>
									<tr class="tb-body table-shadow ">
									<td class="catalogue"></td>
										<td class="catalogue"><?= $row['Product_id'] ?></td>
										<td class="catalogue" style="text-transform: uppercase;"><?= $row['Product_Name'] ?></td>
										<td class="catalogue" style="text-align:center;">
											<img src="<?= "uploads/" . $row['Product_img'] ?>" width="150" height="150" style="border-radius:10px;">
										</td>
										<td class="catalogue"><?= $row['Category'] ?></td>
										<td class="catalogue"><?= $row['Product_Price'] ?></td>
										<td class="catalogue"><?= $row['Quantity'] ?></td>
										<td class="catalogue"><?= $row['Product_Price'] ?></td>
										<td class="catalogue"><?= $row['Product_Price'] * $row['Quantity'] ?></td>
									</tr>
								<?php endforeach; ?>
								<?php endif ?>
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
		var t = $('#cataloguetable').DataTable();
        t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
	});
</script>

<!-- MAIN : END -->

<?= $this->endSection() ?>