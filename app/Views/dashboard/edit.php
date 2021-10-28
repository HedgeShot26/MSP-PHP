<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- <?= (isset($meta_title) ? $meta_title : 'CI default title') ?> -->
    <title>Edit Profile | MFD Admin</title>
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
    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

    <style>
        /* #009bf2 */

        #profile-edit .label {
            width: 200px;
            padding: 3px;
            border-radius: 30px;
            /* background-color: #07689F;
            color: white; */
            font-size: 16px;
            font-weight: bold;
        }

        #profile-edit .form-group .form-control {
            width: 400px;
            background-color: #FAFAFA;
            display: block;
            margin: 5px auto;
            text-align: center;
            font-weight: bold;
            border: 2px solid #A2D5F2;
            /*circle box size*/
            padding: 5px 10px;
            outline: none;
            color: #111;
            border-radius: 30px;
            transition: 0.25s;
        }

        #profile-edit .form-group .form-control:focus {
            width: 300px;
            border-color: #A2D5F2;
        }

        #profile-edit .btn-primary {
            border: 0;
            background-color: #07689F;
            display: block;
            margin: 13px auto;
            text-align: center;
            /* font-weight: bold; */

            /*circle box size*/
            padding: 8px 50px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
        }

        #profile-edit .btn-primary:hover {
            background: #51C4D3;
            /* color:#111; */
            /* font-weight: bold; */
        }

        #profile-edit a {
            color: #111;
        }

        #profile-edit a:hover {
            color: #A2D5F2;
        }
    </style>

</head>

<body>

    <main id="main">

        <div id="profile-edit" class="container">

            <div style="height:30px;"></div>

            <div class="row justify-content-md-center">
                <div class="col-lg-5 mt-5 mt-lg-5">
                    <div class="container" style="border:10px solid #eeeeee; padding: 20px; border-radius:50px; box-shadow: 0 8px 18px rgba(8, 8, 8, 0.3); text-align:center;">

                        <div style="height:20px;"></div>

                        <div style="border-radius: 30px;background-color: #07689F; color: white; text-transform: uppercase; font-weight: bold;">
                            <h3>Edit Profile</h4>
                        </div>

                        <div style="height:10px;"></div>

                        <form action="<?= base_url('dashboard/update'); ?>" method="post" autocomplete="off">
                            <?= csrf_field(); ?>

                            <div class="form-group mb-2">
                                <label class="label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?= ucfirst($userInfo['name']); ?>">
                                <span class="text-danger fw-bold"><?= isset($validation) ? $validation->getError('name') : ''  ?></span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="label">Email address</label>
                                <input type="text" class="form-control" name="email" value="<?= $userInfo['email']; ?>">
                                <span class="text-danger fw-bold"><?= isset($validation) ? $validation->getError('email') : ''  ?></span>
                            </div>
                            <div class="form-group">
                                <label class="label">Password</label>
                                <input type="password" class="form-control" name="password" value="<?= $userInfo['password']; ?>">
                                <span class="text-danger fw-bold"><?= isset($validation) ? $validation->getError('password') : ''  ?></span>
                            </div>

                            <div style="height: 10px;"></div>
                            <div class="text-left button">
                                <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                            </div>

                            <div style="height: 10px;"></div>

                            <div class="container text-center">
                                <a href="<?= site_url('profile'); ?>" style="text-decoration:none; ">Click Here To Go Back To Profile</a>
                            </div>

                            <div style="height: 10px;"></div>

                            <div class="container text-right">
                                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                    <div style="display: block; border-radius: 30px; background-color:#fd5031; color: #fff; box-shadow: 0 8px 18px rgba(150, 125, 125, 0.2); width:430px; padding:5px;">
                                        <?= session()->getFlashdata('fail'); ?>
                                    </div>
                                <?php endif ?>
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div style="display: block; border-radius: 30px; background-color:#14d403; color: #fff; box-shadow: 0 8px 18px rgba(150, 125, 125, 0.2); width:430px; padding:5px;">
                                        <?= session()->getFlashdata('success'); ?>
                                    </div>
                                <?php endif ?>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>