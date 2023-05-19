
<?php        
session_start();   
  
                

if(isset($_SESSION['username'])){
    include 'connection.php';
    $email=$_SESSION['username'];
                $getId = $_GET['id'];
                $getItemname = $_GET['itemname'];
                $getImage = $_GET['image'];
                $getFeature = $_GET['feature'];
                $getPrize= $_GET['prize'];
                $getCategory= $_GET['category'];
                $getType= $_GET['type'];
                 
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/scroll.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/responsive.css">

        <title>PizzaWeb</title>
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
                <p><?php echo $email;?></p>
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
                <a href="admin_add.php">Add Items</a>
            </div>

            <div>
                <a href="logout.php" class="btn"> LOGOUT</a>
            </div>
        </div>


        <!-- Update Item -->

        <form action="" class="Form" method="POST" style="display: block;  width: 90%; margin: 0px 5%;
        margin-top: 20vh;">

            <h1 class="logo" id="logoSignUp">UPDATE <i class="fas fa-pizza-slice"></i> <span>PIZZA</span> ITEM</h1>


            <div class="inputFied">

                <input type="number" name="id" value="<?php echo $getId;?>" placeholder="ID" required style="width:86%;"
                    readonly>
            </div>
            <div class="inputFied">
                <input type="text" name="itemname" value="<?php echo $getItemname;?>" placeholder="Itemname" required
                    style="width:86%;">
            </div>
            <div class="inputFied">
                <input type="number" name="prize" value="<?php echo $getPrize;?>" placeholder="Prize" required
                    style="width:86%;">
            </div>
            <div class="inputFied">
                <textarea name="feature" style="width:86%; height:100px;" placeholder="Feature"
                    required><?php echo $getFeature;?></textarea>
            </div>
            <div class="inputFied">
                <input type="text" name="category" id="" placeholder="Category" value="<?php echo $getCategory;?>"
                    style="width:86%;" required>
            </div>
            <div class="inputFied">
                <input type="text" name="image" id="" placeholder="Image name" value="<?php echo $getImage;?>"
                    style="width:86%;" required>
            </div>
            <div class="inputFied">
                <select name="type" id="" style="width:86%;" required>
                    <?php
                            if($getType=='Veg'){
                                ?>
                                <option value="Veg" selected>Veg</option>
                                <option value="Non Veg" >Non Veg</option>
                                <?php
                            }else{
                                ?>
                                <option value="Non Veg" selected>Non Veg</option>
                                <option value="Veg" >Veg</option>
                                <?php
                            }
                    ?>
                   
                </select>
            </div>

            <div class="formBtn">
                <input type="submit" value="UPDATE" name="update">
            </div>



        </form>
        <?php
    

    if(isset($_POST['update'])){
        $id= $_POST['id'];
        $itemname= $_POST['itemname'];
        $prize = $_POST['prize'];
        $feature= $_POST['feature'];
        $image= $_POST['image'];
        $category= $_POST['category'];
        $type= $_POST['type'];
        $ins = "update menu set  prize=$prize , itemname='$itemname' , category='$category' , feature='$feature' , image= '$image' , type= '$type' where id=$id";
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












