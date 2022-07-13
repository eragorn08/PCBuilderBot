<?php 
require('top.php'); 
$order_id=get_safe_value($con,$_GET['id']);
?>
 <!-- wishlist-area start -->
 <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Product Name</th>
                                                <th class="product-thumbnail">Product Image</th>
                                                <th class="product-name">Qty</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-price">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $uid=$_SESSION['USER_ID'];
                                            $res=mysqli_query($con,"select distinct(order_details.id),order_details.*,product.product_name, product.product_image from order_details,product,user_order where order_details.order_id='$order_id' and user_order.user_id='$uid' and order_details.product_id=product.id");
                                            $total_price=0;
                                            while($row=mysqli_fetch_assoc($res)){
                                                $total_price=$total_price+($row['qty']*$row['price']);
                                            ?>
                                            <tr>
                                                <td class="product-name"><?php echo $row['product_name'] ?></td>
                                                <td class="product-name"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['product_image']?>" alt="full-image"></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['qty'] ?></span></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['price'] ?></span></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['qty']*$row['price'] ?></span></td>
                                            </tr>
                                            <?php }?>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="product-name">Total Price = </td>
                                                <td class="product-name"><?php echo $total_price ?></td>
                                            </tr>
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