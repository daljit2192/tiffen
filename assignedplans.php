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
                        <th scope="col">Order</th>
                        <th scope="col">Days(Plan Left)</th>
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
                                <td>
                                    <div class="number">
                                        <input type="hidden" value="<?php echo $assignedplan["days_left"]; ?>" id="left_<?php echo $assignedplan["id"]; ?>">
                                        <span class="minus" onclick="sub(<?php echo $assignedplan['id']; ?>)">-</span>
                                        <input type="text" class="input_number" id="num_<?php echo $assignedplan["id"]; ?>" value="0" min="0" max="<?php echo $assignedplan["days_left"] ?>"/>
                                        <span class="plus" onclick="add(<?php echo $assignedplan['id']; ?>)">+</span>
                                    </div>
                                </td>
                                <td><?php echo $assignedplan["days_left"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button class="btn btn-dark pull-right" onclick='order_all(<?php echo json_encode($assignedplans["data"]) ?>)'  type="submit">Order Now</button>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>