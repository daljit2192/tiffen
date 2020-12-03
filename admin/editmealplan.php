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
                                    Edit Meal Plan <?php $check;?>
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
                                    <input class="form-control" name="name" value="<?php echo $mealplan["data"]["name"]; ?>" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea class="form-control" name="description" placeholder="Enter Description" rows="3"><?php echo $mealplan["data"]["description"] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Cost in $</label>
                                    <input class="form-control" type="number" name="cost" min="0" value="<?php echo $mealplan["data"]["cost"] ?>" step=".01">
                                </div>
                                <div class="form-group">
                                    <label>Day</label>
                                    <input class="form-control" type="number" name="day" min="1" value="<?php echo $mealplan["data"]["day"] ?>">
                                </div>
                                <div class="form-group">
                                    <label>File input</label>
                                    <p>
                                    <?php if(!empty($mealplan['data']['image'])){ ?>
                                            <img width="100px" height="100px" src="uploads/mealplan/<?php echo $mealplan['data']['image']; ?>">
                                    <?php } ?>
                                    </p>
                                    <input name="image" type="file" accept="image/jpeg">
                                </div>
                                <input type="hidden" name="mealid" value="<?php echo $mealid; ?>"/>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <button type="submit" name="updatemealplan" class="btn btn-primary pull-right">Save</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include 'footer.php' ?>