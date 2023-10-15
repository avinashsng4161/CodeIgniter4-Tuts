<?= $this->extend("layout/base"); ?>

<?= $this->section("content");?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6 mt-3 pt-4 mb-3" style="height:520px;">
            <div class="card">
                <div class="card-body">
                    <h4>Reset Password</h4>
                    <?php
                    if(isset($validation)): ?>
                        <div class="alert alert-danger">
                            <?= $validation->listErrors()?>
                        </div>
                    <?php endif;?>


                    <?php if(session()->getTempdata('error')):?>
                        <div class='alert alert-danger'><?= session()->getTempdata('error');?></div>
                    <?php endif;?>

                    <?php if(isset($error)):?>
                        <div class='alert alert-danger'><?= $error;?></div>
                    <?php else: ?>
                        <?= form_open();?>
                        <div class='form-group mt-3 mb-3'>
                            <label>Enter new password:</label>
                            <input type="password" name="pwd" class='form-control'>
                        </div>
                        <div class='form-group mt-3 mb-3'>
                            <label>Confirm new password:</label>
                            <input type="password" name="cpwd" class='form-control'>
                        </div>
                        <div class='form-group mt-3 mb-3 pt-2'>
                            <input type="submit" value='Update' class='btn btn-primary'>
                        </div>
                        <?= form_close();?>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();?>
