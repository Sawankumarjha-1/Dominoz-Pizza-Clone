<?php session_start();
if(isset($_SESSION['username'])){
    ?>
 
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
        <?php include 'connection.php'?>
        <title>PizzaWeb-Add Item</title>
    </head>

    <body>


        <nav class="menuNavigation" >


            <div class="menuNavigationDIv upperMenuNav" >
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
                <p><?php echo $_SESSION['username'];?></p>
            </div>
            <div>
                <a href="Dashboard.php">Home</a>
            </div>
            <div>
                <a href="admin_order.php">Orders</a>
            </div>
            <div>
                <a href="admin_menu.php">Menu</a>
            </div>
            <div>
                <a href="#">Add Items</a>
            </div>

            <div>
                <a href="logout.php" class="btn"> LOGOUT</a>
            </div>
        </div>


        <!-- Update Item -->

        <form action="" class="Form" method="POST" style="display: block;  width: 90%; margin: 0px 5%;
        margin-top: 20vh;">

            <h1 class="logo" id="logoSignUp">ADD <i class="fas fa-pizza-slice"></i> <span>PIZZA</span> ITEM</h1>


            
            <div class="inputFied">
                <input type="text" name="itemname"  placeholder="Itemname" required
                    style="width:86%;">
            </div>
            <div class="inputFied">
                <input type="number" name="prize"  placeholder="Prize" required
                    style="width:86%;">
            </div>
            <div class="inputFied">
                <textarea name="feature" style="width:86%; height:100px;"
                    placeholder="Feature" required></textarea>
            </div>
            <div class="inputFied">
                    <select name="category" id="" style="width:86%;" required>
                    <option value="BESTSELLERS" selected>BESTSELLERS</option>
                    <option value="PASTA PIZZA PARTY" >PASTA PIZZA PARTY</option>
                    <option value="VEG PIZZA" >VEG PIZZA</option>
                    <option value="NON-VEG PIZZA" >NON-VEG PIZZA</option>
                    <option value="MEALS & COMBOS" >MEALS & COMBOS</option>
                    <option value="PIZZA MANIA" >PIZZA MANIA</option>
                    <option value="SPECIALITY CHICKEN" >SPECIALITY CHICKEN</option>
                    <option value="SIDES" >SIDES</option>
                    <option value="BEVERAGES" >BEVERAGES</option>
                    <option value="BEVERAGES" >DESSERT</option>
                    <option value="OFFERS" >OFFERS</option>
                    </select>
            </div>
            <div class="inputFied">

                <input type="file"  name="image"  id="" 
                    style="width:86%;" required>
            </div>
            <div class="inputFied">
                <select name="type" id="" style="width:86%;" required>                  
                                <option value="Veg" selected>Veg</option>
                                <option value="Non Veg" >Non Veg</option>
                </select>
            </div>

            <div class="formBtn">
                <input type="submit" value="UPDATE" name="add">
            </div>



        </form>
        <?php
    

    if(isset($_POST['add'])){
        
        $itemname= $_POST['itemname'];
        $prize = $_POST['prize'];
        $feature= $_POST['feature'];
        $image= $_POST['image'];
        $category= $_POST['category'];
        $type= $_POST['type'];
        $ins = "insert into menu(itemname, prize, feature, image,category,type) values('$itemname',$prize,'$feature','$image','$category','$type')";

        $res = mysqli_query($con,$ins);
        echo $res;
        
        ?>
        <script type="text/javascript">location.href = 'Dashboard.php'</script>
        <?php
        exit();
     
    }
    ?>

        <?php include 'adminfooter.php' ?>
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


















