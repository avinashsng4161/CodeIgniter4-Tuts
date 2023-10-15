<?= $this->extend("layout/base"); ?>

<?= $this->section("content");?>

    <!--Slider Section-->
    <?= $this->include("partials/slider"); ?>

    <!-- Features Section   -->
    <?= $this->include("partials/features"); ?>

    <!-- About Section -->
    <section id="about">
    <?= $this->include("partials/about"); ?>
    </section>

    <!-- Blog Section -->
    <section>
    <?= $this->include("partials/blog"); ?>
    </section>

</section>
<?= $this->endsection("");?>