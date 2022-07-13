<?php
require('connection.php');
require('functions.php');
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile_num=get_safe_value($con,$_POST['mobile_num']);
$comment=get_safe_value($con,$_POST['comment']);
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into contact_us(name,email,mobile_num,comment,added_on) values('$name','$email','$mobile_num','$comment','$added_on')" );
echo "Thank you!";
?>