<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>

<main id="main">

	<section id="sales-admin">
		<div class="container">
			<div class="row">
				<div id="sales">

					<h4><b><?= $title; ?></b></h4>
					<hr>

					<a href="<?= base_url('sales/salesAdd') ?>" class="btn btn-primary float-right top-btn">Add Sales</a>
					<div style="height:10px;"></div>

					<div class="box-table table-shadow">
						<table class="table box-table table-hover table-borderless" id="cataloguetable">
							<thead class="table-shadow title">
								<tr>
									<th>&nbsp;&nbsp;No.</th>
                                    <th>&nbsp;&nbsp;Sales No.</th>
									<th>&nbsp;&nbsp;TotalPrice</th>
									<th>&nbsp;&nbsp;Date</th>
									<th>&nbsp;&nbsp;Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($sales as $row) : ?>
									<tr class="tb-body table-shadow ">
                                        <td class="catalogue"> </td>
										<td class="catalogue"><?= $row['Sales_Id'] ?></td>
										<td class="catalogue" style="text-transform: uppercase;"><?= $row['Sales_TotalPrice'] ?></td>
                                        <td class="catalogue" style="text-transform: uppercase;"><?= $row['Sales_Date'] ?></td>
										<td class="catalogue" style="text-align:center;">
											<a href="<?= base_url(' sales/salesEdit/' . $row['Sales_Id']) ?>" class="btn btn-sm" style="background-color:#07689F; color:#ffffff;">EDIT</a>
											<br>
											<div style="height:5px;"></div>
											<a href="<?= base_url('sales/salesDelete/' . $row['Sales_Id']) ?>" class="btn btn-sm" style="background-color:#cf0000; color:#ffffff;">DELETE</a>
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