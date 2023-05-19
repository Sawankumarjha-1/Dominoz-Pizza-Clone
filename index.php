<?php session_start();
if(isset($_SESSION['username'])){
    ?>
    <!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">

        <title>PizzaWeb</title>
    </head>

    <body>


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
                <p>
                    <?php echo $_SESSION['username'];?>
                </p>
            </div>
            <div>
                <a href="#">Home</a>
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




        <div class="banner" id="banner" style="height:70vh;">
            <div id="quotesDiv">
                <h1 id="quotes"> </h1>
                <div></div>
            </div>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid perspiciatis nostrum dignissimos
                suscipit nihil obcaecati natus nobis, officiis excepturi sequi.
            </p>
            <a class="btn" id="orderBtn" href="menu.php">Order Now</a>
        </div>

        <?php 
        include "organic.php";?>
      
      <div class="chiefSection">
            <img src="banner/chef.png">
            <div>
               
                <h1 class="menuHeading">
                <span>Red Chief for Getting the Real Taste</span>
                </h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore ex aspernatur fugit, dolor velit
                    modi molestias veritatis, quisquam veniam asperiores repellat atque ratione aliquid esse fugiat
                    ullam facere, illum beatae accusantium. Impedit quibusdam sed sint veritatis tempora nam, vitae iure
                    magnam saepe a nihil debitis repellat? Ullam ratione nihil necessitatibus illo officiis possimus
                    architecto atque natus labore? Veniam, libero accusamus non mollitia beatae pariatur et tenetur
                    praesentium doloremque. Tenetur voluptatibus labore aut. Eius impedit natus eaque placeat fuga,
                    incidunt error possimus eum vel est rem tempora quo deserunt dolorem distinctio modi doloribus
                    veritatis! Natus fuga voluptates saepe nesciunt officiis harum!</p>
                <a href="menu.php">Order Now</a>
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

           include "connection.php";
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

    <?php include "footer.php";?>


        


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

<?php
}
else{
    ?>
    <!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">

        <title>PizzaWeb</title>
    </head>

    <body>


        <nav class="bannerNavigation">
            <div>
                <h1 class="logo"><i class="fas fa-pizza-slice"></i> <span>PIZZA </span> WED</h1>
            </div>
            <ul>
                <a id="loginLink">LOGIN</a>
                <a id="signupLink">SIGNUP</a>
            </ul>
        </nav>

        <div class="banner" id="banner">
            <div id="quotesDiv">
                <h1 id="quotes"> </h1>
                <div></div>
            </div>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid perspiciatis nostrum dignissimos
                suscipit nihil obcaecati natus nobis, officiis excepturi sequi.
            </p>
            <a class="btn" id="orderBtn">Order Now</a>
        </div>


        <?php 
        include "organic.php";?>
          
       <div class="chiefSection">
            <img src="banner/chef.png">
            <div>
                <h1 class="menuHeading">
                <span>Red Chief for Getting the Real Taste</span>
                </h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore ex aspernatur fugit, dolor velit
                    modi molestias veritatis, quisquam veniam asperiores repellat atque ratione aliquid esse fugiat
                    ullam facere, illum beatae accusantium. Impedit quibusdam sed sint veritatis tempora nam, vitae iure
                    magnam saepe a nihil debitis repellat? Ullam ratione nihil necessitatibus illo officiis possimus
                    architecto atque natus labore? Veniam, libero accusamus non mollitia beatae pariatur et tenetur
                    praesentium doloremque. Tenetur voluptatibus labore aut. Eius impedit natus eaque placeat fuga,
                    incidunt error possimus eum vel est rem tempora quo deserunt dolorem distinctio modi doloribus
                    veritatis! Natus fuga voluptates saepe nesciunt officiis harum!</p>
               
            </div>
        </div>
        <?php
        include "adminfooter.php";
        ?>
        <!--Signup Pop up -->

        <form action="" class="Form" id="signupForm" method="POST">

            <h3 id="closeHeading"> <i class="fa fa-times" aria-hidden="true" id="closeSignup"></i></h3>


            <h1 class="logo" id="logoSignUp">SIGNUP WITH <i class="fas fa-pizza-slice"></i> <span>PIZZA </span> WED</h1>


            <div class="inputFied">
                <i class="fa fa-user" aria-hidden="true"></i><input type="text" name="fullname" id=""
                    placeholder="Full name" required>
            </div>
            <div class="inputFied">
                <i class="fa fa-envelope-open" aria-hidden="true"></i><input type="email" name="emailAddress" id=""
                    placeholder="Email address" required>
            </div>
            <div class="inputFied">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <input type="text" name="phone" id="" placeholder="Phone Number" required>
            </div>
            <div class="inputFied">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" name="pass" id="" placeholder="Create Password" required>
            </div>
            <div class="inputFied">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" name="cpass" id="" placeholder="Confirm Password" required>
            </div>

            <div class="formBtn">
                <input type="submit" value="Create Account" name="signup">
            </div>

            <p>Have an account ? <a id="loginRedirect">Login</a></p>

        </form>



        <!--Login Pop up -->

        <form action="" class="Form" id="loginForm" method="POST">

            <h3 id="closeHeading"> <i class="fa fa-times" aria-hidden="true" id="closeLogin"></i></h3>


            <h1 class="logo" id="logoSignUp">LOGIN WITH <i class="fas fa-pizza-slice"></i> <span>PIZZA </span> WED</h1>


            <div class="inputFied">
                <i class="fa fa-envelope-open" aria-hidden="true"></i><input type="email" name="loginEmail" id=""
                    placeholder="Email address" required>
            </div>

            <div class="inputFied">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" name="loginpass" id="" placeholder="Password" required>
            </div>
            <div class="formBtn">
                <input type="submit" value="Login" name="login">
            </div>

            <p>Not Have an account ? <a id="signupRedirect">Signup</a></p>

        </form>

        <p id="errorHeading"></i> </p>


        <script>
            $(document).ready(function () {

                <?php include 'random.php' ?>
                    $('#closeSignup').click(() => {
                        $('#signupForm').fadeOut(1000);
                    })
                $('#loginRedirect').click(() => {
                        $('#signupForm').fadeOut(0);
                        $('#loginForm').fadeIn(1000);
                    })
                $('#signupRedirect').click(() => {
                    $('#signupForm').fadeIn(1000);
                    $('#loginForm').fadeOut(0);
                })
                $('#closeLogin').click(() => {
                    $('#loginForm').fadeOut(1000);
                })
                $('#signupLink').click(() => {
                    $('#signupForm').fadeIn(1000);
                    $('#loginForm').fadeOut(0);
                })
                $('#loginLink').click(() => {
                    $('#signupForm').fadeOut(0);
                    $('#loginForm').fadeIn(1000);
                })
                $('#orderBtn').click(() => {
                    $('#loginForm').fadeIn(1000);
                })
                $('#closeError').click(() => {
                    $('#errorHeading').fadeOut(0);
                })

            });
        </script>




        <?php 
            include 'connection.php';

            if(isset($_POST['signup'])){
                $name = $_POST['fullname'];
                $email = $_POST['emailAddress'];
                $password = $_POST['pass'];
                $phone = $_POST['phone'];
                $cpass = $_POST['cpass'];
                if($cpass == $password){
                    $ins = "insert into singup(name, email, phone, password) values('$name','$email','$phone','$password')";
                    $res =  mysqli_query($con,$ins);
                    $_SESSION['username']=$email;
                    include 'setnum.php';
                    
                  ?>
        <script type="text/javascript">location.href = 'index.php'</script>
        <?php
                    exit();
                 
                }
                else{
                    ?>
        <script>
            let err = document.getElementById('errorHeading');
            err.innerHTML = `Password Doesn't Match<i class="fa fa-times" aria-hidden="true" id="closeError">`
            err.style.display = 'block';
        </script>
        <?php
                }
               
             }

             if(isset($_POST['login'])){
                $email = $_POST['loginEmail'];
                $password = $_POST['loginpass'];
                $selectquery1 = "select * from singup where email = '$email'";
                $selectquery2 = "select * from singup where password = '$password'";
                $query1= mysqli_query($con,$selectquery1);
                $query2= mysqli_query($con,$selectquery2);

                $len1 = mysqli_num_rows($query1);
                $len2 = mysqli_num_rows($query2);
                if($len1 && $len2)
                {
                $_SESSION['username']=$email;

                

                if($email=='admin@gmail.com' && $password=='admin'){

                ?>
        <script type="text/javascript">location.href = 'Dashboard.php'</script>
        <?php
                }
                else{
                    include 'setnum.php';
                    ?>
        <script type="text/javascript">location.href = 'index.php'</script>
        <?php
                exit();
                    }
                }
                else{
                ?>
        <script>
            let err = document.getElementById('errorHeading');
            err.innerHTML = `Invalid Password and Email <i class="fa fa-times" aria-hidden="true" id="closeError">`
            err.style.display = 'block';
        </script>
        <?php
                }

             }
        ?>





    </body>

</html>

    <?php
}
?>


    
