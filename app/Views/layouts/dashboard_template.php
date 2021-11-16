<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= (isset($meta_title) ? $meta_title : 'PHP') ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/PHPlogo.png" rel="icon">
    <link href="assets/img/PHPlogo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>



</head>

<body>

    <!-- ======= HEADER : BEGIN ======= -->
    <header id="header-admin" class="fixed-top d-flex align-items-center">

        <div class="container d-flex align-items-center shadow-round size">

            <a class="logo">
                <img src="assets/img/PHPlogo.png" alt="PHP Logo" class="img-fluid">
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

    <div class="container">
        <div class=""></div>
    </div>

    <div style="height:70px;"></div>

    <!-- ======= CONTENT : BEGIN ======= -->
    <?= $this->renderSection('content') ?>
    <!-- ======= CONTENT : END ======= -->

    <!-- ======= FOOTER : BEGIN ======= -->
    <footer id="dashboard-footer" style="height:50%; font-size: 14px; padding: 5px 0 20px 0;">
        <div class="dashboard-footer-top" style="padding: 40px 0 0px 0;">
            <div class="container">
                <div class="row"></div>
            </div>
        </div>
        <hr>
        <div class="container text-center">

            <div class="credits">
                Designed by <span><b>Team Emerald 2021</b></span>
            </div>
        </div>
        <div style="height:8px;"></div>
    </footer>
    <!-- ======= FOOTER : END ======= -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Data Table -->




</body>

</html>