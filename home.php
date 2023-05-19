<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">

        <title>PizzaWeb</title>
    </head>

    <body>


        <nav class="menuNavigation" style="height:7vh; background-color:black;">


            <div class="menuNavigationDIv upperMenuNav" style="height:100%;">
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
                <p>
                    <?php echo $_SESSION['username']?>
                </p>
            </div>
            <div>
                <a href="#">Home</a>
            </div>
            <div>
                <a href="menu.php">Menu</a>
            </div>
            <div>
                <a href="Cart.php">Cart</a>
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




        <div class="banner" id="banner">
            <div id="quotesDiv">
                <h1 id="quotes"> </h1>
                <div></div>
            </div>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid perspiciatis nostrum dignissimos
                suscipit nihil obcaecati natus nobis, officiis excepturi sequi.
            </p>
            <a class="btn" id="orderBtn" href="menu.php">Order Now</a>
        </div>


        <script>

            $(document).ready(function () {
                <?php include 'random.php' ?>
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