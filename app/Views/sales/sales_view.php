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
            <div class="col-lg-10 mt-lg-3">
                <div class="container" style="border:10px solid #eeeeee; padding: 20px; border-radius:50px; box-shadow: 0 8px 18px rgba(8, 8, 8, 0.3); ">
                    <div style="height:20px;"></div>

                    <div class="mb-5" style="border-radius: 30px;background-color: #07689F; color: white; text-transform: uppercase; font-weight: bold;">
                        <h3 class="mt-1 py-1">
                            <span class="ps-4 ">View Sale Item</span>
                            <a href="<?= base_url('sales') ?>" class="btn btn-danger btn-sm float-end me-1 fw-bold" style="border: 3px solid red; border-radius:30px; width:20%;">BACK</a>
                        </h3>
                    </div>

                    <div class="box-table table-shadow">
                        <table class="table box-table table-hover table-borderless" id="addsalestable">
                            <thead class="table-shadow title">
                                <tr>
                                    <th>Image</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Total Product Price (RM)</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                            <?php foreach ($sale_pro_data as $row) { ?>
                                    <tr class="tb-body table-shadow ">
                                        <td><img src="<?= base_url("uploads/" . $row['Product_img']) ?>" width="100" height="100" style="border-radius:10px;"></td>
                                        <td><?= $row['Product_id'] ?></td>
                                        <td><?= $row['Product_Name'] ?></td>
                                        <td><?= $row['Category'] ?></td>
                                        <td><?= $row['SPro_Quantity'] ?></td>
                                        <td>RM <?= $row['SPro_Price'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div style="height: 10px;"></div>

                    <div style="border-radius: 30px; ">
                        <div class="container">
                            <div class="row mt-1">
                                <div class="col-6 mt-3">

                                </div>
                                <div class="col-3 mt-3 pt-2 ">
                                    <h6 style="float: right; font-weight:700;">Grand Total:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM</h6>
                                </div>
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="number" name="grand_total_price" class="form-control product_id" value="<?= $sale_data['Sales_TotalPrice'] ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

    </script>


</body>

</html>