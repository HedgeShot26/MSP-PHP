<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= (isset($meta_title) ? $meta_title : 'CI default title') ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/mfd/mfd-logo.jpg" rel="icon">
    <link href="assets/img/mfd/mfd-logo.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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

</head>

<body>

    <!-- ======= HEADER : BEGIN ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <a href="<?= site_url('/') ?>" class="logo">
                <img src="assets/img/mfd/mfd-logo.jpg" alt="MFD Logo" class="img-fluid">
            </a>
            <h2 class="logo me-auto">
                <a href="<?= site_url('/') ?>"><?= lang('home.mfd-title'); ?></a>
            </h2>
            <!-- me-auto -->


            <nav id="navbar" class="navbar">
                <!-- NAVBAR : BEGIN -->
                <ul>
                    <!-- class="active" -->
                    <li><a href="<?= site_url('/') ?>"><?= lang('home.navbar.home'); ?></a></li>

                    <li class="dropdown"><a href="#"><span><?= lang('home.navbar.about'); ?></span>
                            <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= site_url('about') ?>"><?= lang('home.navbar-sub.about'); ?></a></li>
                            <li><a href="<?= site_url('teams') ?>"><?= lang('home.navbar-sub.team'); ?></a></li>
                            <li><a href="<?= site_url('affiliates') ?>"><?= lang('home.navbar-sub.branch'); ?></a></li>
                        </ul>
                    </li>

                    <li><a href="<?= site_url('services') ?>"><?= lang('home.navbar.service') ?></a></li>
                    <li class="dropdown"><a href="#"><span><?= lang('home.navbar.BIM') ?></span>
                            <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= site_url('about-BIM') ?>"><?= lang('home.navbar-sub.bim'); ?></a></li>
                            <li><a href="<?= site_url('learn-BIM') ?>"><?= lang('home.navbar-sub.learn'); ?></a></li>
                            <li><a href="<?= site_url('BIM-books') ?>"><?= lang('home.navbar-sub.book'); ?></a></li>
                        </ul>
                    </li>

                    <li><a href="<?= site_url('contact') ?>"><?= lang('home.navbar.contact') ?></a></li>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="language" 
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?= lang('home.navbar.language'); ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="language">
                            <li><a class="dropdown-item" href="<?=base_url('lang/en');?>">English</a></li>
                            <li><a class="dropdown-item" href="<?=base_url('lang/my');?>">Bahasa Melayu</a></li>
                        </ul>
                    </div>
                    <!-- LANGUAGE BUTTON -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- NAVBAR : END -->

        </div>
    </header>
    <!-- ======= HEADER : END ======= -->

    <div class="space"></div>

    <!-- ======= CONTENT : BEGIN ======= -->
    <?= $this->renderSection('content') ?>
    <!-- ======= CONTENT : END ======= -->
    

    <!-- ======= FOOTER : BEGIN ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-md-6">
                        <div class="footer-info">
                            <h3><?= lang('home.mfd-title'); ?></h3>
                            <p>
                                No.3A-12, Staircase 3,
                                Menara KLH, Bandar Puchong Jaya<br>
                                47100 Puchong, Selangor, Malaysia<br><br>
                                <b><?= lang('home.footer.no');?></b> +603 8070 9308 &nbsp;
                                <b> Fax:</b> +603 8076 1090<br>
                                <b>Email:</b> infomfd@gmail.com<br>
                            </p>
                            <div class="social-links mt-4">
                                <a href="https://twitter.com/malaysia_deaf" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="https://www.facebook.com/MyMFDeaf/" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/mfd.2020/?hl=en" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="https://my.linkedin.com/company/mfdeaf" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4><?= lang('home.footer.col-1.link-1'); ?></h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="home"><?= lang('home.footer.col-1.p1'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="about"><?= lang('home.footer.col-1.p2'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="services"><?= lang('home.footer.col-1.p3'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="contact"><?= lang('home.footer.col-1.p4'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"><?= lang('home.footer.col-1.p5'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"><?= lang('home.footer.col-1.p6'); ?></a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4><?= lang('home.footer.col-2.link-2'); ?></h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"><?= lang('home.footer.col-2.p1'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"><?= lang('home.footer.col-2.p2'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('learn-BIM') ?>"><?= lang('home.footer.col-2.p3'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"><?= lang('home.footer.col-2.p4'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('social_enterprise') ?>"><?= lang('home.footer.col-2.p5'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('interpreting_service') ?>"><?= lang('home.footer.col-2.p6'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('early-childhood-education') ?>"><?= lang('home.footer.col-2.p7'); ?></a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('independentlivingskillprogram') ?>"><?= lang('home.footer.col-2.p8'); ?></a></li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
        <hr>
        <div class="container">
            <div class="copyright">
                &copy; <?= lang('home.footer.copy'); ?>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- <br>Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
                <?= lang('home.footer.license'); ?>
                <!-- <br>Designed by <b>BootstrapMade</b></a> and <span><b>INTI International IT Student 2021</b></span> -->
                <?= lang('home.footer.create'); ?>
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
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>