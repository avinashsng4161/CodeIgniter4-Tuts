<!--Navbar Section Start-->
<?= $this->extend("layout/base"); ?>
<!--Navbar Section End-->
<?= $this->section("page_title"); ?>
    <span>Welcome <?= ucfirst($userdata->username);?></span>
<?= $this->endsection(); ?>

<!--Section Content Start-->
<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4 mb-0 pt-2">
            <div class="jumbotron">
                <?php if($userdata->profile_pic!=''):?>
                    <img src='<?= $userdata->profile_pic;?>' height='50' width='50'>
                <?php else:?>
                <img src='<?= $userdata->profile_pic;?>' height='60' width='60'>
                <?php endif;?>
                <h4 class="mt-3 mb-3 pt-2">Welcome to <?= ucfirst($userdata->username);?></h4>
                <h4 class="mt-3 mb-3 pt-2">Mobile: <?= $userdata->mobile; ?></h4>
                <h4 class="mt-3 mb-3 pt-2">Email: <?= ucfirst($userdata->email);?></h4>
            </div>
        </div>
    </div>
</div>
<!--Section Content End-->
<?= $this->endsection(); ?>