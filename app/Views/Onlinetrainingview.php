<!-- Navbar Section Start-->
<?= $this->extend("layout/base"); ?>
<!-- Navbar Section End-->

<!--Section Content Start-->
<?= $this->section("content");?>
<section>
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4 text-primary"><i>Page title will goes here</i></h1>
                <hr>
                <!-- Date/Time -->
                <p>Posted on January 1, 2019 at 12:00 PM</p>

                <!-- Banner Image-->
                <?= $this->include("partials/banner"); ?>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

                <blockquote class="blockquote">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">Someone famous in
                        <cite title="Source Title">Source Title</cite>
                    </footer>
                </blockquote>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

                <hr>


            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4 pt-3">
                <?= $this->include("widgets/related_article"); ?>
            </div>

            <!-- Search Widget -->
            <div class="card my-4">
                <?= $this->include("widgets/search"); ?>
            </div>

            <!-- Categories Widget Start -->
            <?= $this->include("widgets/categories"); ?>
            <!-- Categories Widget End-->

            <!-- Quick Link Widget Start -->
            <?= $this->include("widgets/quick_links"); ?>
            <!-- Quick Link Widget End -->

            <!-- Side Widget Start-->
            <?= $this->include("widgets/side_widget"); ?>
            <!-- Side Widget End-->
            </div>

        </div>
        <!-- /.row -->

    </div>
</section>
<?= $this->endsection("");?>
<!--Section Content end -->

