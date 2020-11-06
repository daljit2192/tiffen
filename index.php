<?php include 'submit.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Website</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/main.css">
    </head>
    <body>
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-header">
                            <h3 class="modal-title">Login here!!</h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="/action_page.php">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <h6>Don't have account? Signup with us <a data-toggle="modal" data-target="#signUpModal" style="cursor: pointer; color: red;" class="_signup"> here </a></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-hidden="true" style="overflow: scroll;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-header">
                            <h3 class="modal-title">Signup here!!</h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label class="control-label col-sm-4" >First Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="first_name" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" >Last Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="last_name" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" >Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" >Address:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" >Postal code:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter postal code" name="postal_code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="pwd">Phone Number:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter phone number" name="phone_number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="pwd">Password:</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" placeholder="Confirm password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="register" class="btn btn-success">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <h6>Already have account? Login now <a style="cursor: pointer; color: red;" href="" data-toggle="modal" data-target="#loginModal"> here </a></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Meals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Supplements</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.html">About us</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.html">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>     
                </ul>
            </div>  
        </nav>
        <!-- Slider -->
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/image.png" alt="Image 1" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>Slide 1</h3>
                        <p>Image 1</p>
                    </div>   
                </div>
                <div class="carousel-item">
                    <img src="./images/image.png" alt="Image 2" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>Slide 2</h3>
                        <p>Image 2</p>
                    </div>   
                </div>
                <div class="carousel-item">
                    <img src="./images/image.png" alt="Image 3" width="1100" height="500">
                        <div class="carousel-caption">
                            <h3>Slide 3</h3>
                            <p>Image 3</p>
                        </div>   
                </div>
            </div>
            <a class="carousel-control-prev" href="#slider" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#slider" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <div class="container-fluid">
            <div class="row p-5">
                <div class="col-12 text-center">
                    <h2>Meals</h2>
                </div>
                <div class="col-12 my-5" >
                    <div class="card-deck px-5">
                        <div class="card">
                            <img src="./images/image.png" class="card-img-top" alt="Image">
                        </div>
                        <div class="card">
                            <img src="./images/image.png" class="card-img-top" alt="Image">
                        </div>
                        <div class="card">
                            <img src="./images/image.png" class="card-img-top" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-5">
                <div class="col-md-3 text-center contact-border">
                    <i class="fa fa-map-marker"  aria-hidden="true"></i>
                    <h5>Our Office Address</h5>
                    <p>Malad West,Mumbai</p>
                </div>
                <div class="col-md-3 text-center contact-border"  >
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <h5>General Enquiries</h5>
                    <p>demo@gmail.com</p>
                </div>
                <div class="col-md-3 text-center contact-border" >
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <h5>Call Us</h5>
                    <p>+91-0000000000</p>
                </div>
                <div class="col-md-3 text-center">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <h5>Our Timings</h5>
                    <p>Mon - Sun : 09:00 AM - 05:00 PM</p>
                </div>
            </div>
        </div>
        <footer class="page-footer text-white bg-dark font-small p-4">
            <div class="container-fluid text-center text-md-left">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <h5 class="text-uppercase">ABOUT</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      
                    </div>
                    <hr class="clearfix w-100 d-md-none pb-3">
                    <div class="col-md-3 mb-md-0 mb-3">
                        <h5 class="text-uppercase">USEFUL LINKS</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a class="a-color" href="#!">Link 1</a>
                            </li>
                            <li>
                                <a class="a-color" href="#!">Link 2</a>
                            </li>
                            <li>
                                <a class="a-color" href="#!">Link 3</a>
                            </li>
                            <li>
                                <a class="a-color" href="#!">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 mb-md-0 mb-3">
                        <h5 class="text-uppercase">Connect Us</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a class="a-color" href="#!">Link 1</a>
                            </li>
                            <li>
                                <a class="a-color" href="#!">Link 2</a>
                            </li>
                            <li>
                                <a class="a-color" href="#!">Link 3</a>
                            </li>
                            <li>
                                <a class="a-color" href="#!">Link 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</html>