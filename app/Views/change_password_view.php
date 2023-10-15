<?= $this->extend("layout/base.php");?>

<?= $this->section('page_title');?>
    <span>Welcome to <?= ucfirst($userdata->username);?></span>
<?= $this->endsection();?>

<?= $this->Section('content');?>
    <div class='container'>
        <div class='row'>
            <div class='col-md-12 mt-4 mb-3 justify-content-center align-items-center'>
                <div class="card">
                    <div class="card-body">
                        <h3>Change Password</h3>
                        <?php if(isset($validation)):?>
                            <div class='alert alert-danger mt-3 mb-3'><?= $validation->listErrors(); ?></div>
                        <?php endif;?>

                        <?php if(session()->getTempdata('success')): ?>
                            <div class='alert alert-success mt-3 mb-3'><?= session()->getTempdata('success') ;?></div>
                        <?php endif; ?>

                        <?php if(session()->getTempdata('error')): ?>
                            <div class='alert alert-danger mt-3 mb-3'><?= session()->getTempdata('error') ;?></div>
                        <?php endif; ?>

                        <?= form_open();?>
                        <div class='form-group mt-3 mb-3 pt-2'>
                            <label>Enter Old Password</label>
                            <input type='password' name='opwd' class='form-control'>
                        </div>
                        <div class='form-group mt-3 mb-3 pt-2'>
                            <label>New Password</label>
                            <input type='password' name='npwd' class='form-control'>
                        </div>
                        <div class='form-group mt-3 mb-3 pt-2'>
                            <label>Confirm New Password</label>
                            <input type='password' name='cnpwd' class='form-control'>
                        </div>
                        <div class='form-group mt-3 mb-3 pt-2'>
                            <input type='submit' name='update' value='Update' class='btn btn-primary'>
                        </div>
                        <?= form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection();?>