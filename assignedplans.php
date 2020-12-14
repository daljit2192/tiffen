<?php session_start(); ?>
<?php include 'header.php'; ?>
        <!-- Slider -->
        
        <div class="container-fluid">
            <div class="row p-5">
                <div class="col-12 text-center">
                    <h2><strong>Your Meal Plans</strong></h2>
                </div>
                <div class="col-12 my-5" >
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Meal Name</th>
                        <th scope="col">Meal Plan Name</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Days(Plan Left)</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach($assignedplans["data"] as $key=>$assignedplan) {?>
                        <tr>
                            <th scope="row"><?php echo $key+1 ?></th>
                            <td><?php echo $assignedplan["meal_name"] ?></td>
                            <td><?php echo $assignedplan["name"] ?></td>
                            <td><?php echo $assignedplan["cost"] ?>/ <?php echo $assignedplan["day"]; ?> day<?php
                                    if($assignedplan["day"]>1){
                                        ?>s<?php } ?></td>
                            <td><?php echo $assignedplan["days_left"] ?></td>
                            <td>
                                <?php if($assignedplan["days_left"]>0) {?>
                                <button class="btn btn-dark" onclick='order(<?php echo $assignedplan["id"] ?>,<?php echo $assignedplan["days_left"] ?>)' id="order_now"  type="submit">Order Now</button>
                                <?php } else{ ?>
                                    <span class="badge badge-success">Order Completed</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>