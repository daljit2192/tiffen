<?php include 'submit.php' ?>
<?php include 'header.php' ?>
<?php include 'navigation.php' ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Meal Plans</h1>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Meal Plan
                                    <a href="mealplans.php?mealid=<?php echo $mealid ?>"><button type="button" class="btn btn-primary btn-xs pull-right">< Back</button></a>
                                </div>
                                <div class="panel-body">
                                    <?php 
                                    if(!empty($mealplan)) {
                                        if($mealplan["error"] !== ""){
                                    ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $mealplan["error"];?>
                                    </div>
                                    <?php } 
                                    elseif ($mealplan["success"]!=="") { ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <?php 
                                                echo $mealplan["success"];
                                                header( "refresh:1;url=mealplans.php?mealid=".$mealid );
                                            ?>
                                        </div>
                                    <?php }} ?>
                                <form role="form" enctype="multipart/form-data" method="post">    
                                <div class="form-group">
                                    <label>Plan Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" placeholder="Enter Description" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Cost in $</label>
                                    <input class="form-control" type="number" name="cost" min="0" value="0" step=".01">
                                </div>
                                <div class="form-group">
                                    <label>File input</label>
                                    <input name="image" type="file" accept="image/jpeg">
                                </div>
                                <input type="hidden" name="mealid" value="<?php echo $mealid; ?>"/>
                                <button type="submit" name="addmealplan" class="btn btn-primary pull-right">Save</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include 'footer.php' ?>