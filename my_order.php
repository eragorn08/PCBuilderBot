<?php 
require('top.php');
?>
<link rel="stylesheet" href="my_order.css">

 <!-- wishlist-area start -->
 <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div id="tbr" class="wishlist-table table-responsive">
                                    <table style="background-color: transparent;">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Order ID</th>
                                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                                <th class="product-price"><span class="nobr"> Address </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $uid=$_SESSION['USER_ID'];
                                            $res=mysqli_query($con,"select user_order.*,order_status.name as order_status_str, payment_status.name as payment_status_str from user_order,order_status,payment_status where user_order.user_id='$uid' and order_status.id=user_order.order_status and payment_status.id=user_order.payment_status");
                                            while($row=mysqli_fetch_assoc($res)){
                                            ?>
                                            <tr>
                                                <td class="product-add-to-cart"><a href="my_order_details.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
                                                <td class="product-name"><a href="#"><?php echo $row['added_on'] ?></a></td>
                                                <td class="product-name"><a href="#">
                                                    <?php echo $row['address'] ?><br>
                                                    &nbsp;&nbsp;<?php echo $row['city'] ?><br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['postcode'] ?>
                                                </a></td>
                                                <td class="product-name"><a href="#"><?php echo $row['payment_type'] ?></a></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['payment_status_str'] ?></span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $row['order_status_str'] ?></span></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
<?php require('footer.php') ?>