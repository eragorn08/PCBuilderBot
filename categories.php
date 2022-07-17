<?php 
require('top.php'); 
$cat_id=mysqli_real_escape_string($con,$_GET['id']);
if($cat_id>0){
    $get_product=get_product($con,'',$cat_id);
}else{
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}

?>
<link rel="stylesheet" href="categories.css">


<div class="body__overlay"></div>
            <div id="top-catego"  class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                              <a id="homebut" class="breadcrumb-item" href="index.php">HOME</a>
                              <span class="brd-separetor"><i style="color: rgb(104, 205, 255);" class="zmdi zmdi-chevron-right"></i></span>
                              <span style="color: rgb(104, 205, 255);" class="breadcrumb-item active"><?php echo $get_product[0]['categories']?></span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Start Bradcaump area -->
        <div id="banner" onclick="location.href='product.php?id=86'" class="ht__bradcaump__area">
        <a href="product.php?id=86"><div class="ht__bradcaump__wrap"></a>
                
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section id="backdrop" class="htc__product__grid bg__white ptb--100">
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
                                                <div id="grid" class="ht__cat__thumb">
                                                    <a href="product.php?id=<?php echo $list['id'] ?>">
                                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['product_image'] ?>" alt="product images">
                                                    </a>
                                                </div>
                                                <br>
                                                <div class="fr__product__inner">
                                                    <h4><a id="prodnamer" href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['product_name'] ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li style="color: yellow;" class="old__prize">PHP <?php echo $list['product_price'] ?></li>
                                                        <li style="color: #694047;">PHP <?php echo $list['mrp'] ?></li>
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