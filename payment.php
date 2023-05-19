<?php
session_start();
require('config.php');
include "connection.php";
\Stripe\Stripe::setVerifySslCerts(false);
$prize =$_GET['prize'];
$name = $_GET['name'];
$itemid = $_GET['itemid'];
$id = $_GET['id'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$size = $_GET['size'];


$itemname = $_GET['itemname'];
$feature = $_GET['feature'];
$image = $_GET['image'];
$customerEmail = $_GET['customerEmail']; 


 

$ins = "insert into orders(name,address,phone,size,email,itemid,prize,status,itemname,Feature,image,Pmode) values('$name','$address','$phone','$size','$customerEmail',$itemid,$prize,'active','$itemname','$feature','$image','Stripe mode')";
$res =  mysqli_query($con,$ins);
$query = "delete from cartitem where id=$id";
$res2 = mysqli_query($con,$query);
$email = $_SESSION['username'];
$selectquery3 = "select * from favourite where email = '$email'";
$query3= mysqli_query($con,$selectquery3);
$selectquery4 = "select * from cartitem where signupemail = '$email'";
$query4= mysqli_query($con,$selectquery4);
$_SESSION['favourite']=mysqli_num_rows($query3);
$_SESSION['cart']=mysqli_num_rows($query4);
echo "<pre>";
print_r($_POST);
$token =$_POST['stripeToken'];
$data = \Stripe\Charge::create(array(
    "amount"=>$prize*100,
    "currency"=>"inr",
    "description"=>"Pizza Web",
    "source"=>$token,
));
?>
<script type="text/javascript">location.href = 'Cart.php'</script>