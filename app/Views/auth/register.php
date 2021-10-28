<?= $this->extend('layouts/auth_template') ?>

<?= $this->section('content') ?>

<main id="main">

    <section id="register" class="register">
        <div class="container ">

            <div class="row justify-content-md-center text-center">
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <div class="container" style="border:10px solid #eeeeee; padding: 20px; border-radius:50px; box-shadow: 0 8px 18px rgba(8, 8, 8, 0.3);">

                        <div style="color: black; text-transform: uppercase; font-weight: bold;">
                            <h2>PHP Admin</h2>
                        </div>
                        <div style="border-radius: 30px;background-color: #07689F; color: white; text-transform: uppercase; font-weight: bold;">
                            <h4>Register</h4>
                        </div>

                        <div style="height:10px;"></div>

                        <form action="<?= base_url('save'); ?>" method="post" autocomplete="off">
                            <?= csrf_field(); ?>

                            <div class="form-group">
                                <label class="label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter full name" value="<?= set_value('name'); ?>">
                                <span class="text-danger fw-bold"><?= isset($validation) ? $validation->getError('name') : '' ?></span>
                            </div>
                            <div class="form-group">
                                <label class="label">Email address</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter your email" value="<?= set_value('email'); ?>">
                                <span class="text-danger fw-bold"><?= isset($validation) ? $validation->getError('email') : '' ?></span>
                            </div>
                            <div class="form-group">
                                <label class="label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                <span class="text-danger fw-bold"><?= isset($validation) ? $validation->getError('password') : '' ?></span>
                            </div>
                            <div class="form-group">
                                <label class="label">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm Password">
                                <span class="text-danger fw-bold"><?= isset($validation) ? $validation->getError('cpassword') : '' ?></span>
                            </div>

                            <div style="height: 10px;"></div>
                            <div class="text-left button">
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                            <div style="height: 10px;"></div>

                            <a href="<?= site_url('users'); ?>">Click Here To Go Back To Users List</a>

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
    </section>

</main>

<?= $this->endSection() ?>