<?php
$page_session = \CodeIgniter\Config\Services::session();
?>

<!--Navbar Section Start -->
<?= $this->extend("layout/base"); ?>
<!--Navbar Section End -->

<?= $this->section("content");?>

    <script>
        setTimeout(function(){
            $("#hidemsg").hide();
        },2000);
    </script>

    <div class="container">
        <div class="row">
            <div class='col-md-12'>
                <h3 class="mt-3 mb-3">Contact Us</h3>

                <?php if($page_session->getTempdata('success')): ?>
                    <div id='hiedmsg' class='alert alert-success'><?= $page_session->getTempdata('success');?></div>
                <?php endif;?>

                <?php if($page_session->getTempdata('error')): ?>
                    <div id='hidemsg' class='alert alert-danger'><?= $page_session->getTempdata('error');?></div>
                <?php endif;?>

                <?= form_open();?>
                <div class='form-group'>
                    <label>Name</label>
                    <input type='text' name='name' class='form-control' value='<?= set_value('name')?>'>
                    <span class='text-danger'><?= display_error($validation, 'name');?></span>
                </div>
                <div class='form-group'>
                    <label>Email</label>
                    <input type='email' name='email' class='form-control' value='<?= set_value('email')?>'>
                    <span class='text-danger'><?= display_error($validation, 'email');?></span>
                </div>
                <div class='form-group'>
                    <label>Mobile</label>
                    <input type='tel' name='mobile' class='form-control' value='<?= set_value('mobile')?>'>
                    <span class='text-danger'><?= display_error($validation, 'mobile');?></span>
                </div>
                <div class='form-group'>
                    <label>Message</label>
                    <textarea name='msg' class='form-control'><?= set_value('msg') ?></textarea>
                    <span class='text-danger'><?= display_error($validation, 'msg');?></span>
                </div>
                <div class='form-group'>

                    <input type='submit' name='save' class='btn btn-primary' value='Send'>
                </div>
                <?= form_close();?>

            </div>
        </div>
    </div>
<?= $this->endSection();?>