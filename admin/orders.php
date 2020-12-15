<?php include 'submit.php' ?>
<?php include 'header.php' ?>
<?php include 'navigation.php' ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Orders</h1>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    List of Orders
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive table-bordered">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order Id</th>
                                                    <th>Ordered By</th>
                                                    <th>Meal Name</th>
                                                    <th>Meal Plan Name</th>
                                                    <th>Days</th>
                                                    <th>Date-Time</th>
                                                    <th>Change Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($orderdetails["data"] as $key=>$orderdetail) {?>
                                                <tr>
                                                    <td><?php echo $orderdetail["id"]; ?></td>
                                                    <td><?php echo $orderdetail["first_name"]; ?></td>
                                                    <td><?php echo $orderdetail["meal_name"]; ?></td>
                                                    <td><?php echo $orderdetail["name"]; ?></td>
                                                    <td><?php echo $orderdetail["days"]; ?></td>
                                                    <td><?php echo $orderdetail["created_at"]; ?> </td>
                                                    <td>
                                                    <select id="status_<?php echo $orderdetail["id"]?>" name="status" onchange="onChangeStatus(<?php echo $orderdetail["id"] ?>)">
                                                        <?php foreach($status["data"] as $val ) {?>
                                                            <option  <?php echo ($val["id"] == $orderdetail["status_id"] )?"selected":"" ?>  value="<?php echo$val["id"] ?>">
                                                                <?php echo$val["status"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                     </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<?php include 'footer.php' ?>