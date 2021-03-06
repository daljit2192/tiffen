<?php session_start(); ?>
<?php include 'header.php'; ?>
        <!-- Slider -->
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/sl1.jpg" alt="Image 1" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>Slide 1</h3>
                        <p>Image 1</p>
                    </div>   
                </div>
                <div class="carousel-item">
                    <img src="./images/sl2.jpg" alt="Image 2" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>Slide 2</h3>
                        <p>Image 2</p>
                    </div>   
                </div>
                <div class="carousel-item">
                    <img src="./images/sl3.jpg" alt="Image 3" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>Slide 3</h3>
                            <p>Image 3</p>
                        </div>   
                </div>
            </div>
            <a class="carousel-control-prev" href="#slider" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#slider" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <div class="container-fluid">
            <div class="row p-5">
                <div class="col-12 text-center">
                    <h2><strong>Meals</strong></h2>
                </div>
                <div class="col-12 my-5" >
                    <div class="card-deck px-5">
                    <?php foreach($meals["data"] as $meal) {?>
                        <div class="card">
                           	<a href="meal_plans.php?meal_id=<?php echo $meal["id"];?>">
                            	<img height="250px" width="250px" src="<?php echo "./admin/uploads/".$meal["image"]; ?>" class="card-img-top meals" alt="Image">
                                <div style="text-transform: uppercase;" class="overlay meals"><?php echo $meal["meal_name"]; ?></div>
                            </a>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row p-5">
                <div class="col-md-3 text-center contact-border contact">
                    <i class="fa fa-map-marker"  aria-hidden="true"></i>
                    <h5>Our Office Address</h5>
                    <p>Malad West,Mumbai</p>
                </div>
                <div class="col-md-3 text-center contact-border contact"  >
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <h5>General Enquiries</h5>
                    <p>demo@gmail.com</p>
                </div>
                <div class="col-md-3 text-center contact-border contact" >
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <h5>Call Us</h5>
                    <p>+91-0000000000</p>
                </div>
                <div class="col-md-3 text-center contact">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <h5>Our Timings</h5>
                    <p>Mon - Sun : 09:00 AM - 05:00 PM</p>
                </div>
            </div>
        </div>

<?php include 'footer.php'; ?>