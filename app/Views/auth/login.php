<?= $this->extend('layouts/auth_template') ?>

<?= $this->section('content') ?>

<main id="main">

    <section id="auth" class="auth">
        <div class="container">
            <div class="row" style="margin:20px">
                <div>
                    <h2>People Health Pharmacy</h2>
                </div>
                <div>
                    <h4>Login</h4>
                </div>
                <div style="height:6px;"></div>

                <div class="img">
                    <img src="assets/img/PHPlogo.png" alt="PHP Logo" class="img-thumbnail" width="280" height="250" style="border-radius:10px; margin-bottom:8px;">
                </div>

                <div style="height:6px;"></div>

                <form action="<?= base_url('check') ?>" method="post" autocomplete="off">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label class="label">Email address</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?= set_value('email') ?>" required>
                        <span style="color:#A2D5F2"><?= isset($validation) ? $validation->getError('email') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                        <span style="color:#A2D5F2"><?= isset($validation) ? $validation->getError('password') : '' ?></span>
                    </div>

                    <!-- <div style="height:2px;"></div> -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>


                    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert-red" style="top: 95%;"><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif ?>
                </form>

            </div>
        </div>
    </section>

</main>
<br>

<?= $this->endSection() ?>