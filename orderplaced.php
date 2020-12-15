
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
} ?>
<?php include 'header.php' ?>
<div class="jumbotron text-center mb-0">
<h1 class="display-3 text-success">Thank You!</h1>
  <p class="lead text-success">Order Placed successfully!</p>
  <hr>
  <!-- <p>
    Having trouble? <a href="contactus.html">Contact us</a>
  </p> -->
  <p class="lead">
    <a class="btn btn-dark btn-sm" href="index.php" role="button">Back to home <i class="fa fa-home" aria-hidden="true"></i></a>
  </p>
</div>
<?php include 'footer.php'; ?>

