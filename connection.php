<?php
session_start();
$con=mysqli_connect("localhost","root","Eragorn110800",'pcbuilderbot');
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/PCBuilderBot/');
define('SITE_PATH','http://127.0.0.1/PCBuilderBot/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/products/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/products/');
?>