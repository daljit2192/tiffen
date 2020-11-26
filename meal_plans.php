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
                           	<a href="food_items.php">
                            	<img src="<?php echo "./admin/uploads/mealplan/".$mealplan["image"]; ?>" class="card-img-top" alt="Image">
                            </a>
                            <h6 style="align-content: center;"><?php echo $mealplan["name"]; ?></h6>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
<?php include 'footer.php'; ?>