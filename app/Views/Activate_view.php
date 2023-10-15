<!--Navbar Section Start -->
<?= $this->extend("layout/base"); ?>
<!--Navbar Section End -->

<!--Content Section Start-->
<?= $this->section("content"); ?>
<div class="container">
    <div class="card mt-4 pt-2 mb-4">
        <div class="card-body">
            <h3>Activation Process</h3>

            <?php if(isset($error)):?>
                <div class="alert alert-danger mt-3 mb-3">
                    <?=$error;?>
                </div>
            <?php endif;?>

            <?php if(isset($success)):?>
                <div class="alert alert-success mt-3 mb-3">
                    <?=$success;?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<!--Content Section End-->

