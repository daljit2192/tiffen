
<?php session_start(); ?>
<?php include 'header.php'; ?>
        <!-- Slider -->
        
        <div class="container-fluid p-0">
            <div class="row p-5">
                <div class="col-12 text-center floating">
                    <h2><strong>Food Items</strong></h2>
                </div>
                <div class="col-12 my-5" >
                    <div class="card-deck px-5">
                        <div class="card h-200 floating">
                           	<a href="meal_plans.php?meal_id=<?php echo $mealplan["data"]["mealid"];?>">
                            	<img style="max-height:400px" src="<?php echo "./admin/uploads/mealplan/".$mealplan["data"]["image"]; ?>"class="card-img-top" alt="Image">
                            </a>
                            <div class="card-footer">
                                <h5 class="floating h-card"  class="card-title"><strong><?php echo $mealplan["data"]["name"]; ?></strong></h5>
                                <p class="floating p-card"  class="card-text">$<?php echo $mealplan["data"]["cost"]; ?>/ <?php echo $mealplan["data"]["day"]; ?> day<?php
                                        if($mealplan["data"]["day"]>1){
                                            ?>s<?php } ?>
                                </p>
                            </div>
                            
                        </div>
                        <div class="card align-items-center d-flex justify-content-center items-card">
                            <h3 class="floating text-center"><strong>Description<h3><strong>
                            <div class="card-body">
                            <h3 class="floating p-card"><?php echo $mealplan["data"]["description"]; ?></h3>
                            
                            <br/>
                            <div class="text-center">
                                <?php if(isset($_SESSION['user'])) { ?>
                                    <a href="checkout.php?plan_id=<?php echo $mealplan["data"]["id"];?>">
                                        <button type="button" class="btn btn-dark btn-lg">Purchase
                                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                <?php } else { ?>
                                    <a data-toggle="modal" data-target="#loginModal">
                                        <button type="button" class="btn btn-dark btn-lg">Purchase
                                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                <?php } ?>
                           </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
<?php include 'footer.php'; ?>