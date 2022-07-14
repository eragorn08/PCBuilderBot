<?php
require('top.php');



$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Master</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                           <table>
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
                                    $res=mysqli_query($con,"select user_order.*,order_status.name as order_status_str, payment_status.name as payment_status_str from user_order,order_status,payment_status where order_status.id=user_order.order_status and payment_status.id=user_order.payment_status");
                                    while($row=mysqli_fetch_assoc($res)){
                                    ?>
                                    <tr>
                                        <td class="product-add-to-cart"><a href="order_master_details.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
                                        <td class="product-name"><a href="#"><?php echo $row['added_on'] ?></a></td>
                                        <td class="product-name"><a href="#">
                                            <?php echo $row['address'] ?><br/>
                                            <?php echo $row['city'] ?><br/>
                                            <?php echo $row['postcode'] ?>
                                        </a></td>
                                        <td class="product-name"><a href="#"><?php echo $row['payment_type'] ?></a></td>
                                        <td class="product-price"><span class="amount"><?php echo $row['payment_status_str'] ?></span></td>
                                        <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $row['order_status_str'] ?></span></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
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