<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<!-- <?= (isset($meta_title) ? $meta_title : 'CI default title') ?> -->
	<title>Add Sales | PHP</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<!-- <link href="assets/img/mfd/mfd-logo.jpg" rel="icon">
	<link href="assets/img/mfd/mfd-logo.jpg" rel="apple-touch-icon"> -->

	<!-- Template Main CSS File -->
	<link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Boostrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<!-- Vendor CSS Files -->
	<link href="<?= base_url() ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->


	<!-- Template Main CSS File -->
	<!-- <link href="assets/css/style.css" rel="stylesheet"> -->

	<style>
		#c-store .label {
			width: 100%;
			padding: 2px;
			border-radius: 30px;
			background-color: #07689F;
			color: white;
			font-size: 16px;
			font-weight: bold;
			text-align: center;
		}

		#c-store .btn-primary {
			border: 0;
			background-color: #009bf2;
			display: block;
			margin: 13px auto;
			text-align: center;
			font-weight: bold;

			/*circle box size*/
			padding: 10px 60px;
			outline: none;
			color: white;
			border-radius: 24px;
			transition: 0.25s;
			cursor: pointer;
		}

		.btn-success {
			border: 0;
			display: block;
			margin: 13px auto;
			text-align: center;
			font-weight: bold;

			/*circle box size*/
			padding: 10px 60px;
			outline: none;
			color: white;
			border-radius: 24px;
			transition: 0.25s;
			cursor: pointer;
		}

		#c-store .btn-primary:hover {
			background: #51C4D3;
			/* color:#111; */
			/* font-weight: bold; */
		}

		#c-store .link {
			color: #111;
		}

		#c-store .link:hover {
			color: #A2D5F2;
		}

		input:read-only {
			background-color: rgba(255, 255, 255, 0.0) !important;
			border: 0 !important;
		}
	</style>

</head>

<body>

	<div id="c-store" class="container mt-4">

		<div style="height:20px;"></div>

		<div class="row justify-content-md-center">
			<div class="col-lg-10 mt-5 mt-lg-5">
				<div class="container" style="border:10px solid #eeeeee; padding: 20px; border-radius:50px; box-shadow: 0 8px 18px rgba(8, 8, 8, 0.3); ">
					<div style="height:20px;"></div>

					<div class="mb-5" style="border-radius: 30px;background-color: #07689F; color: white; text-transform: uppercase; font-weight: bold;">
						<h3 class="mt-1 py-1">
							<span class="ps-4 ">Add Sales</span>
							<a href="<?= base_url('sales') ?>" class="btn btn-danger btn-sm float-end me-1 fw-bold" style="border: 3px solid red; border-radius:30px; width:20%;">BACK</a>
						</h3>
					</div>



					<div class="form-group mb-2">
						<div style="float:left;" class="col-xl-6 mt-1">
							<label class="label">Product Category</label>
						</div>
						<div style="float:left;" class="col-xl-6 mt-1">
							<label class="label">Product Name</label>
						</div>
						<div style="float:left;" class="col-xl-6 mt-1">
							<select name="product_category" id="product_category" class="form-control form-select" style="border: 1px solid #D8E3E7; border-radius:30px;" required>
								<?php foreach ($category as $row) { ?>
									<option value="<?= $row['Category'] ?>"><?= $row['Category'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div style="float:left;" class="col-xl-6 mt-1">
							<select name="Product_id" id="Product_id" class="form-control form-select" style="border: 1px solid #D8E3E7; border-radius:30px;" required>
							</select>
						</div>
					</div>
					<div style="border-radius: 30px; ">
						<div class="container">
							<div class="row">
								<div class="col-7 ">

								</div>
								<div class="col-5">
									<button type="button" id="add" class="btn btn-success px-5 py-2 float-end">Add</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-lg-10 mt-lg-3">
				<div class="container" style="border:10px solid #eeeeee; padding: 20px; border-radius:50px; box-shadow: 0 8px 18px rgba(8, 8, 8, 0.3); ">
					<div style="height:20px;"></div>

					<form action="<?= base_url('Sales/confirm_sale_items') ?>" method="post" enctype="multipart/form-data">
						<?= csrf_field(); ?>
						
						<table class="table box-table table-hover table-borderless" id="addsalestable">
							<thead class="table-shadow title">
								<tr>
									<th>Product ID</th>
									<th>Product Name</th>
									<th>Single Price (RM)</th>
									<th>Quantity</th>
									<th>Stock</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="body">

							</tbody>
						</table>
						<?php if (session()->getFlashdata('status')) : ?>
							<div class="container text-center" id="alert" style="width:70%;">

								<div class="bg-danger" style="border-radius: 10px;  color: white;">
									<h4 class="mt-1 py-1">
										<span class=""><?= session()->getFlashdata('status') ?></span>
									</h4>
								</div>
							</div>
						<?php endif ?>

						<div style="height: 10px;"></div>

						<div style="border-radius: 30px; ">
							<div class="container">
								<div class="row mt-1">
									<div class="col-7 mt-3">

									</div>
									<div class="col-5">
										<button type="submit" class="btn btn-primary px-5 py-2 float-end">Save</button>
									</div>
								</div>
							</div>
						</div>

					</form>


				</div>
			</div>
		</div>

	</div>

	<script>
		setTimeout(function() {
			$('#alert').fadeOut();
		}, 3000); // <-- time in milliseconds

		var base_url = "<?= base_url() ?>";
		$(document).ready(function() {

			$.ajax({
				url: "<?php echo base_url('/Sales/fetch_product'); ?>",
				method: "POST",
				dataType: "JSON",
				data: {
					category: $("#product_category").val()
				},
				success: function(data) {
					$('#Product_id').html(data);
				}
			});

			$('#product_category').change(function() {

				$.ajax({
					url: "<?php echo base_url('/Sales/fetch_product'); ?>",
					method: "POST",
					dataType: "JSON",
					data: {
						category: $("#product_category").val()
					},
					success: function(data) {
						$('#Product_id').html(data);
					}
				});
			});

			var i = 1;

			$('#add').click(function() {

				var product_id = $("#Product_id").val();
				var product_name = $('#Product_id').find(':selected').data('name');
				var product_price = $('#Product_id').find(':selected').data('price');
				var product_quantity = $('#Product_id').find(':selected').data('quantity');

				var exist = false;
				$("#addsalestable .product_id").each(function() {
					var get_value = $(this).val();
					if (get_value == product_id) {
						exist = true;
					}
				});

				if (exist == false) {
					$('#body').append('<tr id="row' + i + '" class="tb-body table-shadow ">' +
						'<td style = "width:15%;"><input type="number" name="product_id[]" class="form-control product_id" value = "' + product_id + '" readonly/></td>' +
						'<td style = "width:40%;"><input type="text"   name="product_name[]" class="form-control" value = "' + product_name + '" readonly/></td>' +
						'<td style = "width:17%;"><input type="number" name="product_price[]" class="form-control" value = "' + product_price + '" readonly/></td>' +
						'<td><input type="number" name="product_quantity[]" class="form-control"  min = "1" max = "' + product_quantity + '" value = "1"/></td>' +
						'<td style = "width:10%;"><input type="number" class="form-control" value = "' + product_quantity + '" readonly/></td>' +
						'<td style = "width:2%;">' +
						'<button type="button" style = "width:3em;" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><span class="fas fa-trash"></span></button></td>' +
						'</tr>');

					i++;
				}


			});

			$(document).on('click', '.btn_remove', function() {
				var button_id = $(this).attr("id");
				$('#row' + button_id + '').remove();
			});

		}); // end of ready function
	</script>

	<!-- Vendor JS Files -->
	<!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/waypoints/noframework.waypoints.js"></script> -->

	<!-- Template Main JS File -->
	<!-- <script src="assets/js/main.js"></script> -->

</body>

</html>