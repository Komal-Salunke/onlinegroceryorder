<?php
include("config-admin.php");
 // session_start();
  if(isset($_SESSION['cart']))
	{
		$cart=$_SESSION['cart'];
	}
	else{
		$cart=array();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>
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
          <a class="nav-link active" href="index.php"><i class="fas fa-shopping-basket"></i>Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://techstudio82/final/categories.php"><i class="fas fa-th-list mr-2"></i>Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-light"></span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">Products in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a class="badge-danger badge p-1" onclick="clearcart()"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                $total_price=0;
                if(isset($_SESSION['cart']))
                {
                  
                  foreach($_SESSION['cart'] as $s)
                  {
                    $sql2 = "SELECT * FROM tbl_items WHERE id= '$s'";
                    $res2 = mysqli_query($conn, $sql2);
                    
                   $row=mysqli_fetch_assoc($res2);
						      
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['image_name'] ?>" width="50"></td>
                <td><?php echo $row['title'] ?></td>
                <td id="price<?= $row['id'] ?>">
                  ₹<?= number_format($row['price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="1" style="width:75px;" id="quantity<?= $row['id'] ?>" onclick="increse_value('<?= $row['id'] ?>')" onblur="increse_value('<?= $row['id'] ?>')">
                </td>
                <td id="total_price<?= $row['id'] ?>">₹ <?= number_format($row['price'],2); ?></td>
                <td>
                  <a onclick="remove_product('<?php echo $row['id'];?>') " class="text-danger lead"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $total_price += $row['price']; ?>
              <?php

                  }
                }
              ?>
              <tr>
                <td colspan="3">
                  <a href="http://techstudio82/final/index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b id="grand_total">₹<?= number_format($total_price,2); ?></b></td>
                <td>
                  <a class="btn btn-info " onclick="ckeckout()" <?= ($total_price > 0) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

 
  <script>
  function clearcart()
    {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cart_clear: "clear"
        },
        success: function(response) {
          location.reload();
        }
      });
    }
    function remove_product(id)
    {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          remove_product: id
        },
        success: function(response) {
          location.reload();
        }
      });
    }

    function increse_value(id){
      console.log(id)
      var quantity=document.getElementById('quantity'+id).value;
      var price=document.getElementById('price'+id).innerHTML;
      var total_price_ss=document.getElementById('total_price'+id).innerHTML;
      var grand_total=document.getElementById('grand_total').innerHTML;
      price= price.replace("₹", "");
      grand_total= grand_total.replace("₹", "");
      total_price_ss= total_price_ss.replace("₹", "");
      total_price_ss= total_price_ss.replace("₹", "");
      if(quantity>0)
      {
        price=parseFloat(price);
        var total_price=price*quantity;
        document.getElementById('total_price'+id).innerHTML='₹'+total_price;
        grand_total=parseFloat(grand_total);
        grand_total=grand_total-total_price_ss;
        console.log(grand_total)
        grand_total=grand_total+total_price;
        document.getElementById('grand_total').innerHTML='₹'+grand_total;
      }
      else{
        document.getElementById('quantity'+id).value=1;
      }
    }

    function ckeckout(){
      var cart='<?php echo json_encode($cart);?>';
      console.log(cart)
      cart= cart.replace("[", "");
      cart= cart.replace("]", "");
      cart= cart.replaceAll('"', "");
      let arr = cart.split(','); 
      var l=arr.length;
      var a=[];
      for(var i=0;i<l;i++)
      {
          var quantity=document.getElementById('quantity'+arr[i]).value;
          a[i]={'p_id':arr[i],'quantity':quantity};
          
      }
      var grand_total=document.getElementById('grand_total').innerHTML;
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          order_checkout: 1,
          grand_total:grand_total,
          order:a
        },
        success: function(response) {
          location.href="checkout.php";
        }
      });
    }
  </script>
</body>

</html>
