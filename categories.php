<?php 
require('top.php'); 
$cat_id=mysqli_real_escape_string($con,$_GET['id']);
if($cat_id>0){
    $get_product=get_product($con,'',$cat_id);
}else{
    ?>
    <sciprt>
        window.location.href='index.php';
    </sciprt>
    <?php
}

?>
<div class="body__overlay"></div>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $get_product[0]['categories']?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <?php
                    if(count($get_product)>0) {
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar"></div>
                                        <?php 
                                        foreach($get_product as $list) {
                                        ?>
                                        <!-- Start Single Category -->
                                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product.php?id=<?php echo $list['id'] ?>">
                                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['product_image'] ?>" alt="product images">
                                                    </a>
                                                </div>
                                                <br>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['product_name'] ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize">$ <?php echo $list['mrp'] ?></li>
                                                        <li>$ <?php echo $list['product_price'] ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } else{
                            echo "Product Not Found"; 
                        }
                            ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- End Banner Area -->
<?php require('footer.php') ?>