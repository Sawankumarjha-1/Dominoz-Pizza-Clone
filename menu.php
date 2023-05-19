<?php session_start();
if(isset($_SESSION['username'])){
    ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <?php include 'head.php'?>
    <title>PizzaWeb - Menu</title>
    <link rel="stylesheet"
          href="css/style.css?v=<?php echo time();?>">

</head>

<body>


    <!-- Navigation -->
    <?php include 'connection.php'?>
    <nav class="menuNavigation">
        <div class="menuNavigationDIv">
            <div>
                <i class="fa fa-bars fa-2x"
                   aria-hidden="true"
                   id="menuBar"></i>
                <h1 class="logo"><i class="fas fa-pizza-slice"></i> <span>PIZZA </span> WED</h1>
            </div>
            <a href="logout.php"
               class="btn"> LOGOUT</a>
        </div>


    </nav>


    <div class="menuDiv"
         id="menuDiv">

        <div>
            <i class="fa fa-arrow-left"
               aria-hidden="true"
               id="menuClose"></i>
        </div>
        <div>
            <i class="fas fa-user-circle fa-2x"></i>
            <p><?php echo $_SESSION['username'];?></p>
        </div>
        <div>
            <a href="index.php">Home</a>
        </div>
        <div>
            <a href="#">Menu</a>
        </div>

        <div>
            <a href="favourite.php">Favourite <span><?php echo $_SESSION['favourite'];?></span></a>
        </div>
        <div>
            <a href="Cart.php">Cart <span><?php echo $_SESSION['cart'];?></span></a>
        </div>
        <div>
            <a href="Order.php">My Order</a>
        </div>
        <div>
            <a href="Offer.php">OFFERS</a>
        </div>
        <div><a href="#bestsellers">BESTSELLERS</a></div>
        <div><a href="#pasta">PASTA PIZZA PARTY</a></div>
        <div><a href="#veg">VEG PIZZA</a></div>
        <div><a href="#nonveg">NON-VEG PIZZA</a></div>
        <div><a href="#meals">MEALS & COMBOS</a></div>
        <div><a href="#mania">PIZZA MANIA</a></div>
        <div><a href="#speciality">SPECIALITY CHICKEN</a></div>
        <div><a href="#sides">SIDES</a></div>
        <div><a href="#beverages">BEVERAGES</a></div>
        <div><a href="#desert">DESERT</a></div>
        <div>
            <a href="logout.php"
               class="btn"> LOGOUT</a>
        </div>

    </div>


    <!-- ***************************** -->
    <div class="items">

        <!-- *************1************* -->

        <h2 class="menuHeading"
            id="bestsellers">
            <hr noshade="">
            <span>🍕</span>
            <span> BESTSELLERS</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">

            <?php 

                   
                    $query = "select * from  menu where category='BESTSELLERS'";
                    $res = mysqli_query($con,$query);
                    $email= $_SESSION['username'];
                   
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
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                 }  
                    
                ?>

        </div>

        <!-- ************************2************ -->
        <h2 class="menuHeading"
            id="pasta">
            <hr noshade="">

            <span>🍕</span>
            <span> PASTA PIZZA PARTY</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">
            <?php 

                
                    $query = "select * from  menu where category='PASTA PIZZA PARTY'";
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
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                    }
                    
                    
                    
                ?>




        </div>
        <!-- ************************3************ -->
        <h2 class="menuHeading"
            id="veg">
            <hr noshade="">

            <span>🍕</span>
            <span>VEG PIZZA</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">
            <?php 

               
                    $query = "select * from  menu where category='VEG PIZZA'";
                    $res = mysqli_query($con,$query);
                    while($data = mysqli_fetch_array($res)){
                        ?>
            <div class="indivaluItem">
                <div class="individualImage"
                     style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(images/<?php echo $data['image']; ?>); background-size: 100% 100%;">
                    <div class='
                        <?php
                        
                        if($data['type']=='Veg'){
                            echo "veg";
                        } else{
                            echo "nonveg";
                        }
                        
                        ?>
                        '><span></span></div>

                    <h1>&#8377; <?php echo $data['prize'];?></h1>
                </div>
                <div class=" individualFeature">
                    <h2><?php echo $data['itemname'];?></h2>
                    <div class="individaulParagraph">
                        <p title='<?php echo $data['feature'];?>'><?php echo $data['feature'];?></p>
                    </div>
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                    }
                    
                    
                    
                ?>




        </div>
        <!-- ************************4************ -->
        <h2 class="menuHeading"
            id=nonveg>
            <hr noshade="">

            <span>🍕</span>
            <span>NON-VEG PIZZA</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">
            <?php 

                 
                    $query = "select * from  menu where category='NON-VEG PIZZA'";
                    $res = mysqli_query($con,$query);
                    while($data = mysqli_fetch_array($res)){
                        ?>
            <div class="indivaluItem">
                <div class="individualImage"
                     style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(images/<?php echo $data['image']; ?>); background-size: 100% 100%;">
                    <div class='
                        <?php
                        
                        if($data['type']=='Veg'){
                            echo "veg";
                        } else{
                            echo "nonveg";
                        }
                        
                        ?>
                        '><span></span></div>

                    <h1>&#8377; <?php echo $data['prize'];?></h1>
                </div>
                <div class=" individualFeature">
                    <h2><?php echo $data['itemname'];?></h2>
                    <div class="individaulParagraph">
                        <p title='<?php echo $data['feature'];?>'><?php echo $data['feature'];?></p>
                    </div>
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                    }
                    
                    
                    
                ?>




        </div>
        <!-- ************************5************ -->
        <h2 class="menuHeading"
            id="meals">
            <hr noshade="">

            <span>🍕</span>
            <span>MEALS & COMBOS</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">
            <?php 

                 
                    $query = "select * from  menu where category='MEALS & COMBOS'";
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
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                    }
                    
                    
                    
                ?>




        </div>
        <!-- ************************6************ -->
        <h2 class="menuHeading"
            id="mania">
            <hr noshade="">

            <span>🍕</span>
            <span>PIZZA MANIA</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">
            <?php 

                 
                    $query = "select * from  menu where category='PIZZA MANIA'";
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
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                    }
                    
                    
                    
                ?>




        </div>
        <!-- ************************7************ -->
        <h2 class="menuHeading"
            id="speciality">
            <hr noshade="">

            <span>🍕</span>
            <span>SPECIALITY CHICKEN</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">
            <?php 

                 
                    $query = "select * from  menu where category='SPECIALITY CHICKEN'";
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
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                    }
                    
                    
                    
                ?>




        </div>
        <!-- ************************8************ -->
        <h2 class="menuHeading"
            id="sides">
            <hr noshade="">

            <span>🍕</span>
            <span>SIDES</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">
            <?php 

                 
                    $query = "select * from  menu where category='SIDES'";
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
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                    }
                    
                    
                    
                ?>




        </div>
        <!-- ************************9************ -->
        <h2 class="menuHeading"
            id="beverages">
            <hr noshade="">

            <span>🍕</span>
            <span>BEVERAGES</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">
            <?php 

                 
                    $query = "select * from  menu where category='BEVERAGES'";
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
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                    }
                    
                    
                    
                ?>




        </div>
        <!-- ************************10************ -->
        <h2 class="menuHeading"
            id="desert">
            <hr noshade="">

            <span>🍕</span>
            <span>DESSERT</span>
            <hr noshade="">
        </h2>
        <div class="menusDiv">
            <?php 

                 
                    $query = "select * from  menu where category='DESSERT'";
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
                    <a href="addcart.php?id=<?php echo $data['id'];?>&email=<?php echo $_SESSION['username'];?>">ADD TO
                        CART</a>
                </div>
            </div>

            <?php
                    }
                    
                    
                    
                ?>




        </div>




    </div>


    </div>


    <?php include 'footer.php' ?>

    <script>
    $(document).ready(function() {


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