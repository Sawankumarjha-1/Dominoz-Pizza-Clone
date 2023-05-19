
<?php session_start();
require('config.php');
if(isset($_SESSION['username'])){
$email = $_SESSION['username'];
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

    ?>
    
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <title>PizzaWeb - Payment by Stripe</title>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
        <style>
        .PaymentByStripe{
            width:100%;
            margin:auto;
       
            display:flex;
            justify-content:center;
            align-item:Center;
        }
        
        </style>
    </head>

    <body>


        <!-- Navigation -->
        <?php include 'connection.php'?>
        <nav class="menuNavigation">
            <div class="menuNavigationDIv">
                <div>
                    <i class="fa fa-bars fa-2x" aria-hidden="true" id="menuBar"></i>
                    <h1 class="logo"><i class="fas fa-pizza-slice"></i> <span>PIZZA </span> WED</h1>
                </div>
                <a href="logout.php" class="btn"> LOGOUT</a>
            </div>
            

        </nav>

    
        <div class="menuDiv" id="menuDiv">
       
            <div>
                <i class="fa fa-arrow-left" aria-hidden="true" id="menuClose"></i>
            </div>
            <div>
                <i class="fas fa-user-circle fa-2x"></i>
                <p><?php echo $_SESSION['username'];?></p>
            </div>
            <div>
                <a href="index.php">Home</a>
            </div>
            <div>
                <a href="menu.php">Menu</a>
            </div>
            <div>
                <a href="Offer.php">OFFERS</a>
            </div>
            <div>
                <a href="favourite.php">Favourite  <span><?php echo $_SESSION['favourite'];?></span></a>
            </div>
            <div>
                <a href="Cart.php">Cart <span><?php echo $_SESSION['cart'];?></span></a>
            </div>
            <div>
                <a href="Order.php">My Order</a>
            </div>
                <div><a href="menu.php#bestsellers">BESTSELLERS</a></div>
                <div><a href="menu.php#pasta">PASTA PIZZA PARTY</a></div>
                <div><a href="menu.php#veg">VEG PIZZA</a></div>
                <div><a href="menu.php#nonveg">NON-VEG PIZZA</a></div>
                <div><a href="menu.php#meals">MEALS & COMBOS</a></div>
                <div><a href="menu.php#mania">PIZZA MANIA</a></div>
                <div><a href="menu.php#speciality">SPECIALITY CHICKEN</a></div>
                <div><a href="menu.php#sides">SIDES</a></div>
                <div><a href="menu.php#beverages">BEVERAGES</a></div>
                <div><a href="menu.php#desert">DESERT</a></div>
            <div>
                <a href="logout.php" class="btn"> LOGOUT</a>
            </div>

        </div>
        
        <form action="payment.php?prize=<?php echo $prize;?>&name=<?php echo $name;?>prize=<?php echo $prize;?>&name=<?php echo $name;?>&itemid=<?php echo $itemid;?>&id=<?php echo $id;?>&phone=<?php echo $phone;?>&address=<?php echo $address;?>&size=<?php echo $size;?>&itemname=<?php echo $itemname;?>&feature=<?php echo $feature;?>&image=<?php echo $image;?>&customerEmail=<?php echo $email;?>" method="post" class="PaymentByStripe">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="<?php echo $publishablekey;?>",
                    data-email="<?php echo $email;?>"
                    data-name="Pizza Web"
                    data-description="We Serve Organic Food"
                    data-image="banner/serving.png"
                    data-currency="inr"
                    >
                    </script>
        </form> 

        <?php include 'footer.php' ?>

        <script>
            $(document).ready(function () {
               

                $('#menuClose').click(() => {
                    $('#menuDiv').toggle('slide');
                })
                $('#menuBar').click(() => {
                    $('#menuDiv').toggle('slide');
                })
            });
        </script>



    </body>

</html>

    <?php
}else
{
    include 'not.php';
}
?>













