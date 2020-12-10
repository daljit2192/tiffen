
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
} ?>
<?php include 'header.php' ?>
<div class="container">
  <div class="py-5 text-center">
    <h2>Checkout Details</h2>
  </div>
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Order details</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Meal details</h6>
            <small class="text-muted"><h5 style="text-align: center;text-transform: uppercase;" class="card-title"><?php echo $mealplan["data"]["name"]; ?></h5></small>
          </div>
          
              <p style="text-align: center;" class="card-text">$<?php echo $mealplan["data"]["cost"]; ?>/ <?php echo $mealplan["data"]["day"]; ?> day<?php
                    if($mealplan["data"]["day"]>1){
                        ?>s<?php } ?>
            </p>
        
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$<?php echo $mealplan["data"]["cost"]; ?></strong>
        </li>
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Shipping Details</h4>
      <?php 
            if(!empty($orderdetail)) {
                if($orderdetail["error"] !== ""){
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $orderdetail["error"]; ?>
        </div>
        <?php }} ?>
      <form class="needs-validation" novalidate method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="firstname" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" name="lastname" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="s_email" name="email" placeholder="Enter email">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>
        <div class="mb-3">
          <label for="phone_no">Phone Number </label>
          <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter phone number">
          <div class="invalid-feedback">
            Please enter a valid phone number.
          </div>
        </div>
        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <!-- <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div> -->

        <div class="row">
          <!-- <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div> -->
          <div class="col-md-3 mb-3">
            <label for="zip">Postal Code</label>
            <input type="text" class="form-control" name="postal_code" id="postal" placeholder="" required>
            <div class="invalid-feedback">
              Postal code required.
            </div>
          </div>
        </div>
        <input type="hidden" name="amount" value="<?php echo $mealplan["data"]["cost"] ?>">
        <input type="hidden" name="meal_plan_id" value="<?php echo $mealplan["data"]["id"] ?>">
        <input type="hidden" name="meal_plan_day" value="<?php echo $mealplan["data"]["day"] ?>">
        <!-- <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4"> -->

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <!-- <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div> -->
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" value="COD" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="paypal">COD</label>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div> -->
        <hr class="mb-4">
        <input class="btn btn-dark btn-lg btn-block" name="checkout" type="submit" value="Checkout"/>
        <br/>
      </form>
    </div>
  </div>

  
</div>
        
<?php include 'footer.php'; ?>