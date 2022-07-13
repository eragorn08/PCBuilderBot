<?php
require('top.php');


$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
    $update_order_status=$_POST['update_order_status'];
    mysqli_query($con,"update user_order set order_status='$update_order_status' where id='$order_id'");
}

if(isset($_POST['update_payment_status'])){
    $update_payment_status=$_POST['update_payment_status'];
    echo($update_payment_status);
    mysqli_query($con,"update user_order set payment_status='$update_payment_status' where id='$order_id'");
}
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Details</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
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
                                    $res=mysqli_query($con,"select distinct(order_details.id),order_details.*,product.product_name, product.product_image, user_order.address, user_order.city, user_order.postcode, user_order.order_status from order_details,product,user_order where order_details.order_id='$order_id' and order_details.product_id=product.id GROUP by order_details.id");
                                    $total_price=0;
                                    while($row=mysqli_fetch_assoc($res)){
                                        $address = $row['address'];
                                        $city = $row['city'];
                                        $postcode = $row['postcode'];
                                        $total_price=$total_price+($row['qty']*$row['price']);
                                        $order_status= $row['order_status']
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
                            <div id="address_details">
                                <strong>Address: </strong>
                                <?php echo  $address?>,<?php echo  $city?>,<?php echo  $postcode?><br/><br/>
                                <strong>Order Status:</strong>
                                <?php  
                                $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,user_order where user_order.id='$order_id' and user_order.order_status=order_status.id"));
                                echo $order_status_arr['name'];
                                ?>

                                <div>
                                    <form method="post">
                                    <select class="form-control" name="update_order_status">
                                        <option>Select Status</option>
                                        <?php
                                        $res=mysqli_query($con,"select * from order_status");
                                        while($row=mysqli_fetch_assoc($res)){
                                            if($row ['id']==$categories_id){
                                                echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                                            }else{
                                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="submit" class="form-control"/>
                                    </form>
                                </div>
                                <strong>Payment Status:</strong>
                                <?php  
                                $payment_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select payment_status.name from payment_status,user_order where user_order.id='$order_id' and user_order.payment_status=payment_status.id"));
                                echo $payment_status_arr['name'];
                                ?>
                                <div>
                                    <form method="post">
                                    <select class="form-control" name="update_payment_status">
                                        <option>Select Status</option>
                                        <?php
                                        $res=mysqli_query($con,"select * from payment_status");
                                        while($row=mysqli_fetch_assoc($res)){
                                            if($row ['id']==$categories_id){
                                                echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                                            }else{
                                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="submit" class="form-control"/>
                                    </form>
                                </div>
                            </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
require('footer.php')
?>