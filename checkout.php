<?php
	include("config-admin.php");
  //session_start();
	$grand_total = $_SESSION['grand_total'];
//echo $grand_total;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body id="all_body">
  <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #fb3640">

    <!-- Brand -->
    <a class="navbar-brand" href="index.php"><i class="fas fa-seedling"></i>&nbsp;&nbsp;Grocery Store</a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="http://techstudio82/final/index.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fas fa-shopping-basket"></i>Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://techstudio82/final/categories.php"><i class="fas fa-th-list mr-2"></i>Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-light"></span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Complete your order!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
         
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable : </b><?php echo  $grand_total?>/-</h5>
        </div>
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <textarea name="address" id="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" id="pmode" class="form-control">
              <option value=""  selected disabled>-Select Payment Mode-</option>
              <option value="offline">Cash On Delivery</option>
              <option value="online">Online Payment</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block" id="rzp-button1">
          </div>
       
      </div>
    </div>
  </div>
  <img src="image/delivery.PNG" alt="">


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
  })
  </script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>


document.getElementById('rzp-button1').onclick = function(e){
  var pmode=document.getElementById("pmode").value;
  var name=document.getElementById("name").value;
  var email=document.getElementById("email").value;
  var phone=document.getElementById("phone").value;
  var address=document.getElementById("address").value;
  if(pmode=="online")
  {

    var options = {
    "key": "rzp_test_CjlqlfKHZ1Bzoa", // Enter the Key ID generated from the Dashboard
    "amount": <?php $grand_total=$_SESSION['grand_total'];
		        $grand_total=str_replace('₹','',$grand_total);
            echo $grand_total*100;?>, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Test Transaction",
    "image": "download.ico",
    "handler": function (response){
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pmode: pmode,name:name,email:email,phone:phone,address:address,razorpay_payment_id:response.razorpay_payment_id
        },
		success: function(response) {
      location.href="success.php";
        }
      });
    },
    "prefill": {
        "name": name,
        "email": email,
        "contact": phone
    },
    "notes": {
        "address": address
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
    rzp1.open();
    e.preventDefault();
  
  }
  else{
    $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pmode: pmode,name:name,email:email,phone:phone,address:address,
        },
		success: function(response) {
        location.href="success.php";
        }
		});
  }
}
</script>
</body>

</html>
