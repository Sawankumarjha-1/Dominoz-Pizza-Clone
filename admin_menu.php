<?php session_start();
if(isset($_SESSION['username'])){
    ?>
 
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
       
        <?php include 'connection.php'?>
       
        <title>PizzaWeb-Admin menu</title>
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
                <a href="#">Menu</a>
            </div>
            <div>
                <a href="admin_add.php">Add Items</a>
            </div>

            <div>

                <a href="logout.php" class="btn"> LOGOUT</a>
            </div>
        </div>

        <table cellspacing="5px">
            <tr>
                <td colspan="9" align="Center" class="tableTh">
                <h2 class="menuHeading" >
                    <span>🍕</span>
                    <span>MENU ITEMS</span>
                </h2>
                </td>
            </tr>
            <tr>
                <td class="idno">ID</td>
                <td class="idno">IMAGE</td>
                <td class="idno">ITEM NAME</td>
                <td class="idno">FEATURE</td>
                <td class="idno">PRIZE</td>
                <td class="idno">CATEGORY</td>
                <td class="idno">VEG / NONVEG</td>
                <td class="idno" colspan=2>OPERATION</td>
            </tr>

            <?php 

                
                    $query = "select * from  menu";
                    $res = mysqli_query($con,$query);
                    while($data = mysqli_fetch_array($res)){
                        ?>
             <tr>
                <td class="idno"><?php echo $data['id'];?></td>
                <td><img src="images/<?php echo $data['image'];?>" alt="" srcset=""><?php echo $data['image'];?></td>
                <td><?php echo $data['itemname'];?></td>
                <td><?php echo $data['feature'];?></td>
                <td><?php echo $data['prize'];?></td>
                <td><?php echo $data['category'];?></td>
                <td><?php echo $data['type'];?></td>
                <td class="operation"><a href='itemdupdate.php?id=<?php echo $data['id'];?>&itemname=<?php echo $data['itemname'];?>&feature=<?php echo $data['feature'];?>&prize=<?php echo $data['prize'];?>&image=<?php echo $data['image'];?>&category=<?php echo $data['category'];?>&type=<?php echo $data['type'];?>'  title="UPDATE"><i class="fas fa-edit"></i></a></td>
                <td class="operation"> <a href='itemdelete.php?id=<?php echo $data['id'];?>' title="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                
            </tr>
            <?php

                    }
            ?>
            
        </table>






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
















