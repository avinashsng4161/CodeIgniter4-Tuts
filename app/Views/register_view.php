<?php $page_session = \Config\Services::session();?>

<?= $this->extend("layout/base"); ?>

<?= $this->section("content"); ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5">
                <div class="card mt-4 pt-2 mb-3">
                    <div class="card-body">
                        <h5 class="text-center">Register</h5>

                        <!--   Page Session code Start -->
                        <?php
                        if($page_session->getTempdata('success')):
                            ?>
                            <div class='alert alert-success'><?= $page_session->getTempdata('success');?></div>
                        <?php
                        endif;
                        ?>

                        <?php
                        if($page_session->getTempdata('error')):
                            ?>
                            <div class='alert alert-danger'><?= $page_session->getTempdata('error');?></div>
                        <?php
                        endif;
                        ?>
                        <!-- Page Session code end -->
                        <?= form_open(); ?>
                        <div class='form-group mt-3 mb-3'>
                            <label>Username</label>
                            <input type="text" name="username" class='form-control' <?= set_value('username') ?>>
                            <span class="text-danger"><?= display_error($validation, 'username'); ?></span>
                        </div>
                        <div class='form-group'>
                            <label>Email</label>
                            <input type="email" name="email" class='form-control' <?= set_value('email') ?>>
                            <span class="text-danger"><?= display_error($validation, 'email'); ?></span>
                        </div>
                        <div class='form-group'>
                            <label>Password</label>
                            <input type="password" name="pass" class='form-control'>
                            <span class="text-danger"><?= display_error($validation, 'pass'); ?></span>
                        </div>
                        <div class='form-group'>
                            <label>Confirm Password</label>
                            <input type="password" name="cpass" class='form-control'>
                            <span class="text-danger"><?= display_error($validation, 'cpass'); ?></span>
                        </div>
                        <div class='form-group'>
                            <label>Mobile</label>
                            <input type="tel" name="mobile" class='form-control' <?= set_value('mobile') ?>>
                            <span class="text-danger"><?= display_error($validation, 'mobile'); ?></span>
                        </div>
                        <div class='form-group mt-4 mb-4 pt-2'>
                            <input type="submit" name="register" value='Register' class='btn btn-primary'>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>