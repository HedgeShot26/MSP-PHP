<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- <?= (isset($meta_title) ? $meta_title : 'CI default title') ?> -->
    <title>Weekly Report | PHP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= site_url() ?>assets/img/PHPlogo.png" rel="icon">
    <link href="<?= site_url() ?>assets/img/PHPlogo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Vendor CSS Files -->
    <link href="<?= site_url() ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= site_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= site_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= site_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= site_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= site_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= site_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= site_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>


    <!-- Template Main CSS File -->
    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

    <!-- ======= HEADER : BEGIN ======= -->
    <header id="header-admin" class="fixed-top d-flex align-items-center">

        <div class="container d-flex align-items-center shadow-round size">

            <a class="logo">
                <img src="<?= site_url() ?>assets/img/PHPlogo.png" alt="PHP Logo" class="img-fluid">
            </a>
            <h2 class="logo me-auto">
                <a>People Health Pharmacy</a>
            </h2>
            <!-- me-auto -->

            <!-- NAVBAR : BEGIN -->
            <nav id="navbar" class="navbar nav m-auto">
                <ul>
                    <li><a href="<?= site_url('profile') ?>">Profile</a></li>
                    <li><a href="<?= site_url('users') ?>">Users</a></li>
                    <li><a href="<?= site_url('sales') ?>">Sales</a></li>
                    <li><a href="<?= site_url('sales/monthly_sales_report') ?>">Sales Report</a></li>
                    <li><a href="<?= site_url('catalogue') ?>">Products</a></li>
                    <li><a href="<?= site_url('stock') ?>">Low Stocks</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- NAVBAR : END -->

            &nbsp;&nbsp;
            <div class="box">
                <div class="user-name">
                    &nbsp;&nbsp;
                    <span style="color:#111;"><b>Welcome!</b>
                        <?= ucfirst($userInfo['name']); ?></span>
                    &nbsp;&nbsp;
                </div>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <!-- Logout -->
            <a href="<?= site_url('auth/logout'); ?>"><b>Logout</b></a>
            &nbsp;&nbsp;
        </div>
    </header>
    <!-- ======= HEADER : END ======= -->

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

        .padding-0 {
            padding-right: 0;
            padding-left: 0;
        }
    </style>

</head>

<body>

    <div id="c-store" class="container mt-4">

        <div style="height:50px;"></div>

        <div class="row justify-content-md-center">
            <div class="col-lg-10 mt-5 mt-lg-5">
                <div class="container" style="border:10px solid #eeeeee; padding: 20px; border-radius:50px; box-shadow: 0 8px 18px rgba(8, 8, 8, 0.3); ">
                    <div style="height:20px;"></div>


                    <?php date_default_timezone_set("Asia/Kuala_Lumpur"); ?>
                    <form action="<?= base_url('Sales/monthly_sales_report') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                            <div style="float:left;" class="col-xl-6 mt-1">
                                <label class="label">Month</label>
                            </div>
                            <div style="float:left;" class="col-xl-6 mt-1">
                                <label class="label">Year</label>
                            </div>
                            <?php
                            //Get full name of month 
                            $monthNum  = $month;
                            $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                            $monthName = $dateObj->format('F');
                            ?>
                            <div style="float:left;" class="col-xl-6 mt-1">
                                <select id="month" name="month" class="form-control form-select form-select month">
                                    <option value="<?= $month ?>" selected><?= $monthName ?></option>
                                    <option value='1'>Janaury</option>
                                    <option value='2'>February</option>
                                    <option value='3'>March</option>
                                    <option value='4'>April</option>
                                    <option value='5'>May</option>
                                    <option value='6'>June</option>
                                    <option value='7'>July</option>
                                    <option value='8'>August</option>
                                    <option value='9'>September</option>
                                    <option value='10'>October</option>
                                    <option value='11'>November</option>
                                    <option value='12'>December</option>
                                </select>
                            </div>
                            <div style="float:left;" class="col-xl-6 mt-1">
                                <select id="year" name="year" class="form-control form-select form-select year">
                                    <option value="<?= $year ?>" selected><?= $year ?></option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                </select>
                            </div>
                        </div>
                        <div style="border-radius: 30px; ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-7 ">

                                    </div>
                                    <div class="col-5">
                                        <button type="submit" name="filter" value="filter" id="filter" class="btn btn-success px-5 py-2 float-end">FILTER</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="<?= base_url('Sales/export_monthly_report/' . $month . '/' . $year . '/' . $monthName) ?>" method="post" enctype="multipart/form-data">
                        <div style="border-radius: 30px; ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-7 ">

                                    </div>
                                    <div class="col-5">
                                        <button type="submit" class="btn btn-success px-5 py-2 float-end">EXPORT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="box-table table-shadow">
                        <table class="table box-table table-hover table-borderless" id="addsalestable">
                            <thead class="table-shadow title">
                                <tr>
                                    <th>No.</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Total sales (RM)</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php
                                $counter = 1;
                                if (count($sale_report_data) != 0) {
                                    foreach ($sale_report_data as $row) { ?>
                                        <tr class="tb-body table-shadow ">
                                            <td><?= $counter ?></td>
                                            <td><?= $row['Product_id'] ?></td>
                                            <td><?= $row['Product_Name'] ?></td>
                                            <td><?= $row['Category'] ?></td>
                                            <td><?= $row['pro_total_quantity'] ?></td>
                                            <td>RM <?= $row['pro_total_sale'] ?></td>
                                        </tr>
                                    <?php
                                        $counter++;
                                    }
                                    echo '<tr>
                                            <td colspan = "4"></td>
                                            <td style = "background-color:black; color:white; float:right;">Total Sale:</td>
                                            <td class = "fw-bold" style = "background-color:black; color:white">RM ' . $overall_sale_total . '</td>
                                        </tr>';
                                } else { ?>
                                    <tr class="tb-body table-shadow ">
                                        <td colspan="6">
                                            <center>No data available</center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>


    </div>

    <script>

    </script>

    <!-- Vendor JS Files -->
    <script src="<?= site_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= site_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= site_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= site_url() ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= site_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= site_url() ?>assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= site_url() ?>assets/js/main.js"></script>

</body>

</html>