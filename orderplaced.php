
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
} ?>
<?php include 'header.php' ?>
<div class="jumbotron text-center mb-0">
<h1 class="display-3 text-success">Thank You!</h1>
  <p class="lead text-success">Order Placed successfully! Your order Id is <strong><?php echo $_GET['orderid'] ?></strong></p>
  <hr>
  <!-- <p>
    Having trouble? <a href="contactus.html">Contact us</a>
  </p> -->
  <p class="lead">
    <a class="btn btn-dark btn-sm" href="index.php" role="button">Continue to homepage</a>
  </p>
</div>
<?php include 'footer.php'; ?>

