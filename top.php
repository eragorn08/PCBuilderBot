<?php
require('connection.php');
require('functions.php');
require('add_to_cart.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)) {
    $cat_arr[]=$row;
}

$obj=new add_to_cart();
$totalProduct = $obj->totalProduct();
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PCBuilderBot</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <header id="htc__header" class="htc__header__area header--one">
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div id="header" class="row">
                        <div id="headermenu" class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="images/extra/PCBotLogo.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav id="he01" class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a id="navver" href="index.php">Home</a></li>
                                            <?php
                                        foreach($cat_arr as $list){
                                            ?>
                                            <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                            <?php
                                        }
                                        ?>
                                        <li><a href="https://pcbuilderbot-v2-js.herokuapp.com/">PCBuilderBot</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    
                            <div class="col-md-1 col-lg-3 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__account">
                                        <?php if(isset($_SESSION['USER_LOGIN'])) {
                                            echo'<a style="color: white; display: inline-block; width: 80%" href="logout.php">Logout</a><div style="padding:3%"></div><a style="color: white; display: inline-block" href="my_order.php">Orders&nbsp;</a>';
                                        }else{
                                            echo'<a style="color: white;" href="login.php">Login/Register</i></a>';
                                        }
                                        ?>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <i class="icon-handbag icons" style="color: white;"></i>
                                        <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct ?></span></a>
                                    </div>
                                </div>
                            </div>

                                    </ul>

                                        

                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <?php
                                            foreach($cat_arr as $list){
                                            ?>
                                            <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                            <?php
                                        }
                                        ?>
                                            <li><a href="#">PCBuilderBot</a></li>
                                            <li><a href="contact.php">contact</a></li>
                                            
                                            <div class="col-md-1 col-lg-3 col-sm-4 col-xs-4">
                                                <div class="header__right">
                                                    <div id="login-bl" class="header__account">
                                                        <?php if(isset($_SESSION['USER_LOGIN'])) {
                                                            echo'<a href="logout.php">Logout</a> <a href="my_order.php">My Order</a>';
                                                        }else{
                                                            echo'<a href="login.php">Login/Register</i></a>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="htc__shopping__cart">
                                                        <i class="icon-handbag icons"></i>
                                                         <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct ?></span></a>
                                                    </div>
                                                </div>
                                         </div>
                                        </ul>

                                    </nav>
                                </div>  
                            </div>
                            
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        </header>