<?php 
require('top.php'); 
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}

$cart_total=0;



if(isset($_POST['submit'])){
    $address=get_safe_value($con,$_POST['address']);
    $city=get_safe_value($con,$_POST['city']);
    $postcode=get_safe_value($con,$_POST['postcode']);
    $payment_type=get_safe_value($con,$_POST['payment_type']);
    $user_id=$_SESSION['USER_ID'];
    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'','',$key);
        $price=$productArr[0]['product_price'];
        $qty=$val['qty'];
        $cart_total=$cart_total+($price*$qty);
    }
    $total_price=$cart_total;
    $payment_status='1';
    $order_status='1';
    $added_on=date('Y-m-d h:i:s');

    mysqli_query($con,"insert into `user_order`(user_id,address,city,postcode,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$address','$city','$postcode','$payment_type','$payment_status','$order_status','$added_on','$total_price')");

    $order_id=mysqli_insert_id($con);
    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'','',$key);
        $price=$productArr[0]['product_price'];
        $qty=$val['qty'];
        $cart_total=$cart_total+($price*$qty);

        mysqli_query($con,"insert into `order_details`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");

    }
    ?>
    <script>
        window.location.href='thank_you.php';
    </script>
    <?php
}
?>
<link rel="stylesheet" href="checkout.css">

<div id="top-catego"  class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                              <a id="homebut" class="breadcrumb-item" href="index.php">HOME</a>
                              <span class="brd-separetor"><i style="color: rgb(104, 205, 255);" class="zmdi zmdi-chevron-right"></i></span>
                              <span style="color: rgb(104, 205, 255);" class="breadcrumb-item active">CART</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

 <!-- Start Bradcaump area -->
 <div class="ht__bradcaump__area">

        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    
                                    <?php 
                                    $accordion_class='accordion__title';
                                    if(!isset($_SESSION['USER_LOGIN'])) {
                                        $accordion_class='accordion__hide';
                                        ?>
                                    <div id="checkoutmeth" class="accordion__title">
                                        Checkout Method
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form id="login-form" method="post">
                                                            <h5 style="color: pink;" class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                                <label style="color: white;" for="user-email">Email Address</label>
                                                                <input type="text" name="login_email" id="login_email" placeholder="Your Email" style="width:100%">
                                                                <span class="field_error" id="login_email_error"></span>
                                                            </div>
                                                            
                                                            <div class="single-input">
                                                                <label style="color: white;" for="user-pass">Password</label>
                                                                <input type="password" name="login_password" id="login_password" placeholder="Your Password" style="width:100%">
                                                                <span class="field_error" id="login_password_error"></span>
                                                            </div>
                                                            <p class="require">* Required Fields</p>
                                                            <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                                            </div>
                                                            <div class="form-output login_msg">
                                                                <p class="form-messege field_error"></p>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 style="color: pink;" class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                                <label style="color: white;" for="user-email">Name</label>
                                                                <input type="text" name="name" id="name" placeholder="Your Name" style="width:100%">
                                                                <span class="field_error" id="name_error"></span>
                                                            </div>
															<div class="single-input">
                                                                <label style="color: white;" for="user-email">Email Address</label>
                                                                <input type="text" name="email" id="email" placeholder="Your Email" style="width:100%">
                                                                <span class="field_error" id="email_error"></span>
                                                            </div>
															
                                                            <div class="single-input">
                                                            <label style="color: white;" for="user-email">Mobile Number</label>
                                                            <input type="text" name="mobile" id="mobile" placeholder="Your Mobile" style="width:100%">
                                                            <span class="field_error" id="mobile_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                            <label style="color: white;" for="user-email">Password</label>
                                                            <input type="password" name="password" id="password" placeholder="Your Password" style="width:100%">
                                                            <span class="field_error" id="password_error"></span>
                                                            </div>
                                                            <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="user_register()">Register</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div id="checkoutmeth" class="<?php echo $accordion_class?>">
                                        Address Information
                                    </div>
                                    <form method="post">
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                        <label style="color: white;" for="user-email">Home Address</label>
                                                            <input type="text" name="address" placeholder="Home Address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                        <label style="color: white;" for="user-email">City/State</label>
                                                            <input type="text" name="city" placeholder="City/State" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                        <label style="color: white;" for="user-email">Post Code/Zip</label>
                                                            <input type="text" name="postcode" placeholder="Post code/ zip" required>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div id="checkoutmeth" class="<?php echo $accordion_class?>">
                                        payment option
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                <input type="radio" name="payment_type" value="COD" required>&nbsp;&nbsp;<a style="color: white; font-size: 150%">Cash-on Delivery</a>
                                                <br/><br/><input type="radio" name="payment_type" value="GCash" required>&nbsp;&nbsp;<a style="color: white; font-size: 150%">GCASH Online Bank</a>
                                            </div>
                                            <div class="single-method">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <input id="subsub" type="submit" name="submit"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="background-color: transparent" class="order-details">
                            <h5 id="checkoutmeth" class="order-details__title">Your Orders</h5>
                            <div class="order-details__item">
                            <?php
                                $cart_total=0;
                                foreach($_SESSION['cart'] as $key=>$val){
                                $productArr=get_product($con,'','',$key);
                                $product_name=$productArr[0]['product_name'];
                                $mrp=$productArr[0]['mrp'];
                                $price=$productArr[0]['product_price'];
                                $image=$productArr[0]['product_image'];
                                $qty=$val['qty'];
                                $cart_total=$cart_total+($price*$qty);
                            ?>
                                <div class="single-item">
                                    <div class="single-item__thumb"></div>
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"/>
                                    </div>
                                    <div class="single-item__content">
                                        <a style="color: pink; font-size: 150%;" href="#"><?php echo $product_name ?></a>
                                        <span  id="finprice" class="price">PHP <?php echo $price*$qty ?></span>
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i style="color: white;" class="icon-trash icons"></i></a>
                                    </div>
                                    <div class="single-item__remove">
                                    </div>
                                </div>
                                <?php
                                }
                            ?>
                            </div>
                            
                            <div id="space1" class="ordre-details__total">
                                <h5 id="checkoutmeth" >Your Total Price: </h5>
                                <div id="space">
                                <span id="finalprc" class="price">PHP <?php echo $cart_total ?>.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
<?php require('footer.php') ?>