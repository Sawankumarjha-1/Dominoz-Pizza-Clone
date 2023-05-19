<?php session_start();
if(isset($_SESSION['username'])){
    ?>
    <!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
     
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
        
        <?php include 'connection.php' ?>

        <title>PizzaWeb-Cart</title>
    </head>

    <body>
    <?php 
        $email = $_SESSION['username'];
        ?>

        <nav class="menuNavigation">
            <div class="menuNavigationDIv upperMenuNav">
                <div>
                    <i class="fa fa-bars fa-2x" aria-hidden="true" id="menuBar"></i>
                    <h1 class="logo"><i class="fas fa-pizza-slice"></i> <span>PIZZA </span> WED</h1>
                </div>
                <a href="logout.php" class="btn"> LOGOUT</a>
            </div>
        


        </nav>


        <div class="menuDiv" id="menuDiv" style="margin-top:7vh;">
            <div>
                <i class="fa fa-arrow-left" aria-hidden="true" id="menuClose"></i>
            </div>
            <div>
                <i class="fas fa-user-circle fa-2x"></i>
                <p><?php echo $email;?></p>
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
                <a href="#">My Order</a>
            </div>
            <div>
                <a href="Offer.php">OFFERS</a>
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


        <div class="cart">

            <h2 class="menuHeading">
                  <hr noshade="">

                <span>🍕</span>
                <span>My Orders</span>
                <hr noshade="">
            </h2>

            <div class="cartItem">
                <?php 
                $query = "select * from  orders where email='$email'";
                $res = mysqli_query($con,$query);
                $len = mysqli_num_rows($res);

                if($len){
                    while($data = mysqli_fetch_array($res)){
                        ?>
                         <div class="individualCart">
                            <div class="cartOuterDiv">
                                <img src="images/<?php echo $data['image'];?>" alt="" srcset="">
                                <div class="cartInnerDiv">
                                    <h2><?php echo $data['itemname'];?></h2>
                                    <p><?php echo $data['Feature'];?></p>
                                    <h2>&#8377; <?php echo $data['prize'];?></h2>
                                    
                                </div>
        
                            </div>
                            <div class="orderDetails">
                                <p><span>DATE : </span><?php echo $data['Date'];?></p>
                                <p><span>STATUS : </span><?php echo $data['status'];?></p>
                                <p><span>TIME </span><?php echo $data['Time'];?></p>
                                <p><span>WAITING TIME </span><?php echo $data['Waiting Time'];?></p>
                            </div>

                          <?php
                                $id = $data['itemid'];
                                $orderid = $data['id'];
                                $query2 = "select * from  feedback where itemid=$id AND orderid=$orderid";
                                $res2 = mysqli_query($con,$query2);
                                $len2 = mysqli_num_rows($res2);
                                $data2 = mysqli_fetch_array($res2);
                                if($len2){
                            ?>
                            <div class="orderDetails" style="display:flex; flex-direction:row;">
                            <i class="fa fa-star" aria-hidden="true" style="color:<?php echo $data2['rate']>0?"yellow":"lightgray";?>"></i>
                            <i class="fa fa-star" aria-hidden="true"style="color:<?php echo $data2['rate']>1?"yellow":"lightgray";?>"></i>
                            <i class="fa fa-star" aria-hidden="true"style="color:<?php echo $data2['rate']>2?"yellow":"lightgray";?>"></i>
                            <i class="fa fa-star" aria-hidden="true"style="color:<?php echo $data2['rate']>3?"yellow":"lightgray";?>"></i>
                            <i class="fa fa-star" aria-hidden="true"style="color:<?php echo $data2['rate']>4?"yellow":"lightgray";?>"></i>
                            </div>

                            <?php
                                }
                                else{
                                    ?>
                            <div class="orderDetails" style="display:flex; flex-direction:row;">
                            <p>Give your Feedback</p>
                            <a href="feed.php?rating=1&itemid=<?php echo $data['itemid']?>&id=<?php echo $data['id']?>"><i class="far fa-star" id="star1"></i></a>
                            <a href="feed.php?rating=2&itemid=<?php echo $data['itemid']?>&id=<?php echo $data['id']?>"><i class="far fa-star" id="star2"></i></a>
                            <a href="feed.php?rating=3&itemid=<?php echo $data['itemid']?>&id=<?php echo $data['id']?>"><i class="far fa-star" id="star3"></i></a>
                            <a href="feed.php?rating=4&itemid=<?php echo $data['itemid']?>&id=<?php echo $data['id']?>"><i class="far fa-star" id="star4"></i></a>
                            <a href="feed.php?rating=5&itemid=<?php echo $data['itemid']?>&id=<?php echo $data['id']?>"><i class="far fa-star" id="star5"></i></a>
                            </div>

                                    <?php
                                }
                          ?>

                           



                        </div>
                        <?php
                         } }
                         else{
                             echo "<h1>No Item Found in Your Cart</h1>";
                         }
                            
                        ?>
                
            
                 
               
            </div>

        </div>
    <script>
    
    </script>


        <?php include 'footer.php' ?>

        <?php
        
            if(isset($_POST['order'])){
            $name = $_POST['name'];
            $itemid = $_POST['itemid'];
            $id = $_POST['id'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $size = $_POST['size'];
            $prize =$_POST['prize'];
            echo "$prize";
            $itemname = $_POST['itemname'];
            $feature = $_POST['feature'];
            $image = $_POST['image'];
            $customerEmail = $email;
            
            
            $ins = "insert into orders(name,address,phone,size,email,itemid,prize,status,itemname,Feature,image) values('$name','$address','$phone','$size','$customerEmail',$itemid,$prize,'active','$itemname','$feature','$image')";
            $res =  mysqli_query($con,$ins);
          
            ?>
            <script type="text/javascript">location.href = 'Cart.php'</script>
            <?php

            }
            ?>
        
        


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










