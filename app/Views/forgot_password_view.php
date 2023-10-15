<!-- Navbar Section Start -->
<?= $this->extend("layout/base"); ?>
<!-- Navbar Section End -->

<?= $this->section("content");?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6 mt-4 mb-4 pt-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Forgot Password</h3>
                        <?php
                        if(isset($validation)): ?>
                            <div class="alert alert-danger">
                                <?= $validation->listErrors()?>
                            </div>
                        <?php endif;?>


                        <?php if(session()->getTempdata('error')):?>
                            <div class='alert alert-danger'><?= session()->getTempdata('error');?></div>
                        <?php endif;?>

                        <?php if(session()->getTempdata('success')):?>
                            <div class='alert alert-success'><?= session()->getTempdata('success');?></div>
                        <?php endif;?>


                        <?= form_open(); ?>

                        <div class='form-group mt-3 pt-2'>
                            <label>Enter your email</label>
                            <input type="text" name="email" value="<?= set_value('email');?>" class='form-control'>
                        </div>
                        <div class='form-group mt-3 pt-2'>
                            <input type="submit" name="login" value='Login' class='btn btn-primary'>
                        </div>

                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection();?>