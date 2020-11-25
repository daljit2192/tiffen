<?php include 'submit.php' ?>
<?php include 'header.php' ?>
<?php include 'navigation.php' ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Meals</h1>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    List of Meals
                                    <a href="addmeal.php"><button type="button" class="btn btn-primary btn-xs pull-right">Add Meal</button></a>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive table-bordered">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Meal Name</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($meals["data"] as $meal) {?>
                                                <tr>
                                                    
                                                    <td><?php echo $meal["id"]; ?></td>
                                                    <td><?php echo $meal["meal_name"]; ?></td>
                                                    <td><?php echo $meal["description"]; ?></td>
                                                    <td><img src="<?php echo 'uploads/'.$meal['image']; ?>" alt="Image" height="80px" width="80px" /></td>
                                                    <td>
                                                        <?php echo"<a href='viewmeal.php?id=". $meal['id'] ."'>
                                                        <i class='fa fa-eye' aria-hidden='true' title='View'></i></a>"?>
                                                        <?php echo"<a href='editmeal.php?id=". $meal['id'] ."'>
                                                        <i class='fa fa-edit' aria-hidden='true' title='Edit'></i></a>"?>
                                                        <a href="#del<?php echo $meal["id"];?>" class="delete" data-toggle="modal">
                                                            <i class='fa fa-archive' aria-hidden='true' title='Delete'></i>
                                                        </a>
                                                        <?php include('deletemeal.php'); ?>
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

            <!-- Add Meal Modal -->
            <!-- <div class="modal fade" id="addMeal" tabindex="-1" role="dialog" aria-labelledby="addMealLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="addMealLabel">Add Meal</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" enctype="multipart/form-data" method="post">    
                                <div class="form-group">
                                    <label>Meal Name</label>
                                    <input class="form-control" name="meal_name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" placeholder="Enter Description" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>File input</label>
                                    <input name="image" type="file" accept="image/jpeg">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" name="addmeal" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            
<?php include 'footer.php' ?>