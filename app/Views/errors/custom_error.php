<!-- Navbar Section Start-->
<?= $this->extend("layout/base"); ?>
<!-- Navbar Section End-->

<!--Section Content Start-->
<?= $this->section("content");?>
<section>
    <div class="container d-flex align-items-center mt-4">
        <div class="row">
            <div class="col-md-9">
                <div class="jumbotron">
                    <h1>Sorry! Unable to process your request.</h1>
                    <p>Sorry!</p>
                </div>
            </div>
            <div class="col-md-3">
                <?= $this->include("widgets/categories");?>
            </div>
        </div>
    </div>
</section>
<!--Section Content End-->
<?= $this->endsection("");?>

