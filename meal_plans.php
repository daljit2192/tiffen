<?php session_start(); ?>
<?php include 'header.php'; ?>
        <!-- Slider -->
        
        <div class="container-fluid p-0">
            <div class="row p-5">
                <div class="col-12 text-center floating">
                    <h2><strong><?php echo $meal["data"]["meal_name"]?> Meal Plans</strong></h2>
                </div>
                <div class="col-12 my-5" >
                    <div class="card-deck px-5">
                    <?php foreach($mealplans["data"] as $mealplan) {?>
                        <div class="card floating">
                           	<a href="food_items.php?plan_id=<?php echo $mealplan["id"];?>">
                            	<img src="<?php echo "./admin/uploads/mealplan/".$mealplan["image"]; ?>" class="card-img-top" alt="Image">
                            </a>
                            
                        <div class="card-footer">
                        <h6 class="floating h-card"><strong><?php echo $mealplan["name"]; ?></h6></strong>
                            <p class="floating p-card">$<?php echo $mealplan["cost"]; ?> / <?php echo $mealplan["day"]; ?> day<?php
                                    if($mealplan["day"]>1){
                                        ?>s<?php } ?>
                            </p>
                        </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
<?php include 'footer.php'; ?>