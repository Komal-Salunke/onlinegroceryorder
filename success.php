<?php
    session_start();
    $success_order=$_SESSION['success_order'];
?>
<div class="text-center">
        <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
        <h2 class="text-success">Your Order Placed Successfully!</h2>
        <h4>Your Name : <?php echo $success_order['name']?></h4>
        <h4>Your E-mail :  <?php echo $success_order['email']?></h4>
        <h4>Your Phone :  <?php echo $success_order['phone']?></h4>
        <h4>Total Amount Paid :  <?php echo $success_order['grand_total']?></h4>
        <h4>Payment Mode : <?php echo $success_order['pmode']?></h4>
        <?php if ($success_order['razorpay_payment_id']!=null)
        {
         ?>
        <h4>Rezorpay ID : <?php echo $success_order['razorpay_payment_id']?></h4>

        <?php 
        }
        ?>
</div>