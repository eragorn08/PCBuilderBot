<?php 
require('top.php'); 
?>
<link rel="stylesheet" href="cart.css">

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
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div id="tbr" class="table-content table-responsive">
                                <table   style="background-color: transparent;">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_SESSION['cart'])){
                                            foreach($_SESSION['cart'] as $key=>$val){
                                            $productArr=get_product($con,'','',$key);
                                            $product_name=$productArr[0]['product_name'];
                                            $mrp=$productArr[0]['mrp'];
                                            $price=$productArr[0]['product_price'];
                                            $image=$productArr[0]['product_image'];
                                            $qty=$val['qty'];

                                        ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"/></a></td>
                                            <td class="product-name"><a id="pdname" href="#"><?php echo $product_name ?></a>
                                                <ul  class="pro__prize">
                                                    <li id="oldpr" class="old__prize">PHP <?php echo $mrp ?></li>
                                                    <li id="nprice">PHP <?php echo $price ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span  id="npricef" class="amount">PHP <?php echo $price ?></span></td>
                                            <td class="product-quantity"><input type="number" id="<?php echo $key ?>qty" value="<?php echo $qty ?>" />
                                            <br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')" style="color: white;">update</a> </td>
                                            <td class="product-subtotal" id="npricef">PHP <?php echo $qty*$price ?></td>
                                            <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i style="color: white; font-size: 200%; margin-right: 15%;" class="icon-trash icons"></i></a></td>
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="<?php echo SITE_PATH ?>checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
<?php require('footer.php') ?>