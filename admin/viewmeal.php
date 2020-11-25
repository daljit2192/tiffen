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
                                    View Meal
                                    <a href="meals.php"><button type="button" class="btn btn-primary btn-xs pull-right">< Back</button></a>
                                </div>
                                <div class="panel-body">
                                    <?php 
                                    if(!empty($meal)) {
                                        if($meal["error"] !== ""){
                                    ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $meal["error"];?>
                                    </div>
                                    <?php } 
                                    elseif ($meal["success"]!=="") { ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <?php 
                                                echo $meal["success"];
                                                header( "refresh:1;url=meals.php" );
                                            ?>
                                        </div>
                                    <?php }} ?>
                                <form role="form" enctype="multipart/form-data" method="post">    
                                <div class="form-group">
                                    <label>Meal Name</label>
                                    <input class="form-control" name="meal_name" readonly value="<?php echo $meal["data"]["meal_name"]; ?>" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea class="form-control" name="description" readonly placeholder="Enter Description" rows="3"><?php echo $meal["data"]["description"] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>File input</label>
                                    <p>
                                    <?php if(!empty($meal['data']['image'])){ ?>
                                            <img width="100px" height="100px" src="uploads/<?php echo $meal['data']['image']; ?>">
                                    <?php } ?>
                                    </p>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include 'footer.php' ?>