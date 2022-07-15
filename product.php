<?php 
require('top.php'); 
$product_id=mysqli_real_escape_string($con,$_GET['id']);
if($product_id>0){
    $get_product=get_product($con,'','',$product_id);
}else{
    ?>
    <sciprt>
        window.location.href='index.php';
    </sciprt>
    <?php
}
?>

<link rel="stylesheet" href="products.css">

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
 
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product[0]['product_image']?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h1 class="prodname"><?php echo $get_product[0]['product_name']?></h1>
                                <p id="tagline"><?php echo $get_product[0]['product_short_desc']?></p>
                                <ul  class="pro__prize">
                                    <li id="finprice">PHP <?php echo $get_product[0]['product_price']?>&nbsp&nbsp</li>
                                    <li style="text-decoration: line-through; color: red;"class="old__prize">PHP <?php echo $get_product[0]['mrp']?></li>   
                                </ul>
                                
                                <div class="ht__pro__desc">
                                    <div class="sin__desc align--left">
                                        <p style="color: lightblue;">Categories&nbsp&nbsp&nbsp>&nbsp&nbsp&nbsp</p>
                                        <ul class="pro__cat__list">
                                            <li><a style="color: lightblue;" href="#"><?php echo $get_product[0]['categories']?></a></li>
                                        </ul>
                                    </div>
                                    </div>
                                    <div class="sin__desc">
                                        <p style="color: white;">Availability:&nbsp&nbsp&nbsp</p><p style="color: orange;">In Stock</p>
                                    </div>
                                    <div class="sin__desc">
                                        <p style="color: white;"><span>Quantity:</span> 
                                            <select id="qty">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </p>
                                    </div>
                                    
                                    
                                </div>
                                <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
         <!-- Start Product Description -->
         <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab" style="color: white; font-size: 200%;">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div id="descri" class="pro__tab__content__inner">
                                <?php echo $get_product[0]['product_desc']?>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
<?php require('footer.php') ?>