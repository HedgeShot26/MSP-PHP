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
    </style>

</head>

<body>

    <div id="c-store" class="container mt-4">

        <div style="height:20px;"></div>

        <div class="row justify-content-md-center">
            <div class="col-lg-5 mt-5 mt-lg-5">
                <div class="container" style="border:10px solid #eeeeee; padding: 20px; border-radius:50px; box-shadow: 0 8px 18px rgba(8, 8, 8, 0.3); ">

                    <div style="height:20px;"></div>

                    <div style="border-radius: 30px;background-color: #07689F; color: white; text-transform: uppercase; font-weight: bold;">
                        <h3 class="mt-1 py-1">
                            <span class="ps-4 ">Add Products</span>
                            <a href="<?= base_url('catalogue') ?>" class="btn btn-danger btn-sm float-end me-1 fw-bold" style="border: 3px solid red; border-radius:30px; width:20%;">BACK</a>
                        </h3>
                    </div>

                    <div style="height:10px;"></div>

                    <div class="container text-right">
                        <?php if (session()->getFlashdata('status')) : ?>
                            <div style="display: block; border-radius: 30px; background-color:#fd5031; color: #fff; box-shadow: 0 8px 18px rgba(150, 125, 125, 0.2); width:430px; padding:5px;">
                                <?= "<h5>" . session()->getFlashdata('status') . "</h5>"; ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div style="height:5px;"></div>

                    <form action="<?= base_url('Catalogue/itemStore') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group mb-2">
                            <label class="label">Product Name</label>
                            <div class="col mt-1 mb-3">
                                <input type="text" name="Product_Name" class="form-control" required placeholder="Enter Product Name" style="border: 1px solid #D8E3E7; border-radius:30px;">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="label">Product Price</label>
                            <div class="col mt-1 mb-3">
                                <input type="text" name="Product_Price" class="form-control" required placeholder="Enter Product Price" style="border: 1px solid #D8E3E7; border-radius:30px;">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="label">Product Quantity</label>
                            <div class="col mt-1 mb-3">
                                <input type="text" name="Product_Quantity" class="form-control" required placeholder="Enter Product Quantity" style="border: 1px solid #D8E3E7; border-radius:30px;">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="label">Product Category</label>
                            <div class="col mt-1 mb-3">
                                <select name = "Product_cat" class="form-select" aria-label="Default select example">
                                 <option selected disabled>Select Category</option>
                                 <option value="Medical Supplies">Medical Supplies</option>
                                 <option value="Personal Care Products">Personal Care Products</option>
                                 <option value="Vitamins & Supplements">Vitamins & Supplements</option>
                                 <option value="Sexual Wellness">Sexual Wellness</option>
                                 <option value="Skin Care & Beauty">Skin Care & Beauty</option>
                                 <option value="Healthy Foods & Drinks">Healthy Foods & Drinks</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Product Image</label>
                            <div class="container mt-1" style="border: 1px solid #D8E3E7; border-radius:30px; background-color:#fff;">

                                <div class="col mt-3 mb-3">
                                    <input type="file" name="Product_img" class="form-control" style="border: 1px solid #D8E3E7; border-radius:30px;" required />
                                </div>
                            </div>
                        </div>
                        

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