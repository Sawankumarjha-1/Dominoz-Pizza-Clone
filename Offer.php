<?php session_start();
if(isset($_SESSION['username'])){
    ?>
    
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <title>PizzaWeb - Offer</title>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
       
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
            <!-- <div class="menuNavigationDIv lowerMenuNav">
               


            </div> -->

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
                <a href="favourite.php">Favourite  <span><?php echo $_SESSION['favourite'];?></span></a>
            </div>
            <div>
                <a href="Cart.php">Cart <span><?php echo $_SESSION['cart'];?></span></a>
            </div>
            <div>
                <a href="Order.php">My Order</a>
            </div>
            <div>
                <a href="#">OFFERS</a>
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
  <div class="items">

        <h2 class="menuHeading" id="bestsellers">
              <hr noshade="">

                <span>🍕</span>
                <span>OFFERS</span>
                <hr noshade="">
            </h2>    
        <div class="menusDiv">
            
                <?php 

                   
                    $query = "select * from  menu where category='OFFERS'";
                    $res = mysqli_query($con,$query);
                    while($data = mysqli_fetch_array($res)){
                        ?>
                <div class="indivaluItem">
                    <div class="individualImage"
                        style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(images/<?php echo $data['image']; ?>); background-size: 100% 100%;">
                        <div class='<?php
                        
                        if($data['type']=='Veg'){
                            echo "veg";
                        } else{
                            echo "nonveg";
                        }
                        
                        ?>'><span></span></div>
                        <h1>&#8377; <?php echo $data['prize'];?></h1>
                    </div>
                    <div class=" individualFeature">
                        <h2><?php echo $data['itemname'];?></h2>
                        <div class="individaulParagraph">
                            <p title='<?php echo $data['feature'];?>'><?php echo $data['feature'];?></p>
                        </div>
                        <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO CART</a>
                    </div>
                </div>

                <?php
                 }  
                    
                ?>

            </div>

</div>

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










