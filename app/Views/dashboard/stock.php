<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>

<main id="main">

	<section id="catalogue-admin">
		<div class="container">
			<div class="row">
				<div id="catalogue">

					<h4><b><?= $title; ?></b></h4>
					<hr>
					<div style="height:10px;"></div>

					<div class="box-table table-shadow">
						<table class="table box-table table-hover table-borderless" id="cataloguetable">
							<thead class="table-shadow title">
								<tr>
									<th>&nbsp;&nbsp;No.</th>
									<th>&nbsp;&nbsp;Product No.</th>
									<th>&nbsp;&nbsp;Name</th>
									<th>&nbsp;&nbsp;Images</th>
									<th>&nbsp;&nbsp;Category</th>
									<th>&nbsp;&nbsp;Price</th>
									<th>&nbsp;&nbsp;Quantity</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($items as $row) : ?>
                                    <?php if($row['Product_Quantity']<=5){ ?> 
									<tr class="tb-body table-shadow ">
									<td class="catalogue"></td>
										<td class="catalogue"><?= $row['Product_id'] ?></td>
										<td class="catalogue" style="text-transform: uppercase;"><?= $row['Product_Name'] ?></td>
										<td class="catalogue" style="text-align:center;">
											<img src="<?= "uploads/" . $row['Product_img'] ?>" width="150" height="150" style="border-radius:10px;">
										</td>
										<td class="catalogue"><?= $row['Category'] ?></td>
										<td class="catalogue"><?= $row['Product_Price'] ?></td>
										<td class="catalogue"><?= $row['Product_Quantity'] ?></td>										
									</tr>
                                    <?php }; ?>
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