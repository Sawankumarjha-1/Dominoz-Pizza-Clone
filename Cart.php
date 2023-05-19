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
            <div class="menuNavigationDIv upperMenuNav" >
                <div>
                    <i class="fa fa-bars fa-2x" aria-hidden="true" id="menuBar"></i>
                    <h1 class="logo"><i class="fas fa-pizza-slice"></i> <span>PIZZA </span> WED</h1>
                </div>
                <a href="index.php" class="btn"> LOGOUT</a>
            </div>
        


        </nav>


        <div class="menuDiv" id="menuDiv" style="margin-top:7vh;">
        <div>
                <i class="fa fa-arrow-left" aria-hidden="true" id="menuClose"></i>
            </div>
            <div>
                <i class="fas fa-user-circle fa-2x"></i>
                <p><?php echo $_SESSION['username']?></p>
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
                <a href="#">Cart <span><?php echo $_SESSION['cart'];?></span></a>
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


        <div class="cart">

            <h2 class="menuHeading">
                  <hr noshade="">

                <span>🍕</span>
                <span>Cart Items</span>
                <hr noshade="">
            </h2>
                 

        <?php
        
        if(isset($_POST['order'])){
        $name = $_POST['name'];
        $itemid = $_POST['itemid'];
        $id = $_POST['id'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $size = $_POST['size'];
        $prize =$_POST['prize'];
        $pay=$_POST['payment'];
        $itemname = $_POST['itemname'];
        $feature = $_POST['feature'];
        $image = $_POST['image'];
        $customerEmail = $email;  
        if($pay=="Stripe"){
            
            ?>
            <script>
            location.href="pay.php?prize=<?php echo $prize;?>&name=<?php echo $name;?>&itemid=<?php echo $itemid;?>&id=<?php echo $id;?>&phone=<?php echo $phone;?>&address=<?php echo $address;?>&size=<?php echo $size;?>&pay=<?php echo $pay;?>&itemname=<?php echo $itemname;?>&feature=<?php echo $feature;?>&image=<?php echo $image;?>&customerEmail=<?php echo $email;?>";
            </script>
               
                
            <?php 
        }  
        else{

        $ins = "insert into orders(name,address,phone,size,email,itemid,prize,status,itemname,Feature,image,Pmode) values('$name','$address','$phone','$size','$customerEmail',$itemid,$prize,'active','$itemname','$feature','$image','Cash on Delivery')";
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
        ?>
        <script type="text/javascript">location.href = 'Cart.php'</script>
        <?php
        }}
        ?>
            <div class="cartItem">
                <?php 
                $query = "select * from  cartitem where signupemail='$email'";
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
                                    <a href="delete.php?id=<?php echo $data['id'];?>&email=<?php echo $data['signupemail'];?>" ><i class="fa fa-trash" aria-hidden="true" id="delete"></i></a>
                                </div>
        
                            </div>
                            <form class="cartOrder" method="POST">
                                <input name="itemid" value=<?php echo $data['itemid'];?> style="display:none;">
                                <input name="id" value=<?php echo $data['id'];?> style="display:none;">
                                <input name="itemname" value="<?php echo $data['itemname'];?>" style="display:none;">
                                <input name="feature" value="<?php echo $data['Feature'];?>" style="display:none;">
                                <input name="image" value=<?php echo $data['image'];?> style="display:none;">
                                <input type="text" placeholder="Name ....." name="name" required>
                                <input type="text" placeholder="Phone no ....." name="phone" required>
                                <textarea name="address" placeholder="Address"></textarea required>
                                <input type="text" name="size" id="" value="Medium" readonly>
                                <input type="text" name="prize" id="" value=<?php echo $data['prize'];?> readonly>
                                <select name="payment" id="">
                                    <option value="Cash" Selected>Cash on Delivery</option>
                                    <option value="Stripe" >Stripe Payment</option>
                                </select>
                                <input type="submit" value="Order Now" name="order" class="btn2">
                            </form>
        
                        </div>
                        <?php
                         } }
                         else{
                             echo "<h1>No Item Found in Your Cart</h1>";
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

