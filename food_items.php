<?php include 'header.php'; ?>
        <!-- Slider -->
        
        <div class="container-fluid">
            <div class="row p-5">
                <div class="col-12 text-center">
                    <h2>Food Items</h2>
                </div>
                <div class="col-12 my-5" >
                    <div class="card-deck px-5">
                        <div class="card h-200">
                           	<a href="meal_plans.php?meal_id=<?php echo $mealplan["data"]["mealid"];?>">
                            	<img style="max-height:400px" src="<?php echo "./admin/uploads/mealplan/".$mealplan["data"]["image"]; ?>"class="card-img-top" alt="Image">
                            </a>
                            <h5 style="text-align: center;text-transform: uppercase;" class="card-title"><?php echo $mealplan["data"]["name"]; ?></h5>
                            <p style="text-align: center;" class="card-text">$<?php echo $mealplan["data"]["cost"]; ?>/ <?php echo $mealplan["data"]["day"]; ?> day<?php
                                    if($mealplan["data"]["day"]>1){
                                        ?>s<?php } ?>
                            </p>
                        </div>
                        <div class="card">
                            <h3 style="text-align: center;"><?php echo $mealplan["data"]["description"]; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
<?php include 'footer.php'; ?>