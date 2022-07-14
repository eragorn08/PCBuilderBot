<?php require('top.php') ?>
<div class="body__overlay"></div>
<link rel="stylesheet" href="index.css">



        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div  id = "slide1" class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div  class="slide">
                                    <div class="slider__inner">
                                        <h2 id="h2s1">THE ULTIMATE PLAY</h2>
                                        <h1 id="gf3070">GEFORCE RTX 3070 FAMILY</h1>
                                        <p>The GeForce RTXTM 3070 Ti and RTX 3070 graphics cards are powered by Ampere—NVIDIA’s 2nd gen RTX architecture. Built with enhanced Ray Tracing Cores and Tensor Cores, new streaming multiprocessors, and high-speed memory, they give you the power you need to rip through the most demanding games.</p>
                                        <h1></h1>
                                        <h2>Php 42,000</h2>
                                        <h1></h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="gfc" class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div id="slide2" class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Rule Your Game</h2>
                                        <h1 id="rx6000">RADEON RX6000 SERIES</h1>
                                        <p>Introducing the AMD Radeon™ RX 6000 Series graphics cards, featuring the breakthrough AMD RDNA™ 2 architecture and engineered to take on next generation gaming with supercharged performance and breathtaking visuals.</p>
                                        <h1></h1>
                                        <h2>Php 32,000</h2>
                                        <h1></h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div id="slide3" class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Heavy Metal for Enthusiasts.</h2>
                                        <h1 id="ryzthread">2nd Gen AMD Ryzen Threadripper 2950X</h1>
                                        <p>16 cores provide an astonishing 32 threads of simultaneous multi-processing power, while 40MB of combined cache and vast I/O from the enthusiast-grade AMD X399 platform stand ready to feed the beast.</p>
                                        <h1></h1>
                                        <h2>Php 86,000</h2>
                                        <h1></h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2  id="needup" class="title__line">Need Upgrades? We're here to Help</h2>
                            <p id="thelat">The Latest Gaming Peripherals, fit for your Budget!</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php
                            
                            $get_product=get_product($con,4);
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
                                        <h4><a id="prodname" href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['product_name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li id="oldprice" class="old__prize">PHP <?php echo $list['mrp'] ?></li>
                                            <li id="newprice">PHP <?php echo $list['product_price'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 id="needup" class="title__line">Top Full-Build Sellers</h2>
                            <p id="thelat">No time for building a PC? No Problem! We are here to help!</p>
                            <p id="thelat">Personal Computers straight to your home!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/9.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Special Wood Basket</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/10.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">voluptatem accusantium</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/11.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Dummy Name</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/12.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Title Here </a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->

<?php require('footer.php') ?>