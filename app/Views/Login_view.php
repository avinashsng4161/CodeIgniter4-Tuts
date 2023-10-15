<!--Navbar Section Start-->
<?= $this->extend("layout/base"); ?>
<!--Navbar Section End-->

<!--Section Content Start-->
<?= $this->section("content"); ?>
<div class="container">
    <div class="row pt-3 align-items-center justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="card mt-4 mb-4">
                <div class="card-body">
                    <h3 class="text-center">Login</h3>
                    <?php if(isset($validation)):?>
                    <div class="alert alert-danger">
                    <?= $validation->listErrors(); ?>
                    </div>
                    <?php endif;?>

                    <?php if(isset($error)):?>
                    <?= $error;?>
                    <?php endif;?>

                    <?php if(session()->getTempdata('error')):?>
                        <div class='alert alert-danger'><?= session()->getTempdata('error');?></div>
                    <?php endif;?>
<!---->
                    <?php if(session()->getTempdata('success')):?>
                        <div class='alert alert-success'><?= session()->getTempdata('success');?></div>
                    <?php endif;?>

                    <!-- Registration Form Section Start -->
                    <?= form_open(); ?>
                    <div class="form-group pt-3 mb-4">
                        <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group mt-4 mb-4">
                        <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="pass">
                    </div>
                    <div class="mt-2 text-right">
                        <a href="<?= base_url() ?>/login/forgot_password">Forgot Password ?</a>
                    </div>
                    <div class="form-group row mt-4 mb-0 justify-content-center">
                            <input type="submit" class="btn btn-primary mx-2" value="Login">
                            <input type="reset" class="btn btn-primary mx-2" value="Reset">
                    </div>
                    <?= form_close(); ?>
                    <!-- Registration Form Section End -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--Section Content End-->
<?= $this->endsection(); ?>
