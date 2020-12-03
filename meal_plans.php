<?php include 'header.php'; ?>
        <!-- Slider -->
        
        <div class="container-fluid">
            <div class="row p-5">
                <div class="col-12 text-center">
                    <h2><?php echo $meal["data"]["meal_name"]?> Meal Plans</h2>
                </div>
                <div class="col-12 my-5" >
                    <div class="card-deck px-5">
                    <?php foreach($mealplans["data"] as $mealplan) {?>
                        <div class="card">
                           	<a href="food_items.php?plan_id=<?php echo $mealplan["id"];?>">
                            	<img src="<?php echo "./admin/uploads/mealplan/".$mealplan["image"]; ?>" class="card-img-top" alt="Image">
                            </a>
                            <h6 style="text-align: center;text-transform: uppercase;"><?php echo $mealplan["name"]; ?></h6>
                            <p style="text-align: center;">$<?php echo $mealplan["cost"]; ?> / <?php echo $mealplan["day"]; ?> day<?php
                                    if($mealplan["day"]>1){
                                        ?>s<?php } ?>
                            </p>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
<?php include 'footer.php'; ?>