<?php session_start();
if(isset($_SESSION['username'])){
    ?>
 
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">

        <?php include 'connection.php'?>

        <title>PizzaWeb-Admin order</title>
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
                <p><?php echo $_SESSION['username'];?></p>
            </div>
            <div>
                <a href="Dashboard.php">Home</a>
            </div>
            <div>
                <a href="#">Orders</a>
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

        <table cellspacing="5px">
            <tr>
                <td colspan="8" align="Center" class="tableTh">
                <h2 class="menuHeading" >
                    <span>🍕</span>
                    <span>ORDERS ITEMS</span>
                </h2>
                </td>
            </tr>
            <tr>
                <td class="idno">ID</td>
                <td class="idno">CUSTOMER NAME</td>
                <td class="idno">PHONE</td>
                <td class="idno">ADDRESS</td>
                
                <td class="idno">EMAIL</td>
                <td class="idno">STATUS</td>
                <td class="idno">ITEM DETAILS</td>
                <td class="idno">WATING TIME</td>
                <td class="idno">Payment Mode</td>
            </tr>

            <?php 

                
                    $query = "select * from  orders";
                    $res = mysqli_query($con,$query);
                    while($data = mysqli_fetch_array($res)){
                        ?>
             <tr>
                <td class="idno"><?php echo $data['id'];?></td>
                <td><?php echo $data['name'];?></td>
                <td><?php echo $data['phone'];?></td>
                <td><?php echo $data['address'];?></td>
                
                <td><?php echo $data['email'];?></td>
                <td>
                <?php 
                if($data['status']=='active'){
                   ?> <a href="complete.php?id=<?php echo $data['id']?>"> <?php echo $data['status'];?> </a> <?php
                }else{
                    echo $data['status'];
                }
                
                ?></td>
                <td>
                    <small><span style="color:red;">Item Id : </span> <?php echo $data['itemid'];?></small>
                    <small><span style="color:red;">Name : </span><?php echo $data['itemname'];?></small>
                    <small><span style="color:red;">Size : </span><?php echo $data['size'];?></small>
                    <small><span style="color:red;">Date : </span><?php echo $data['Date'];?></small>
                    <small><span style="color:red;">Prize : </span>&#8377; <?php echo $data['prize'];?></small>
                </td>
                <td><?php echo $data['Waiting Time'];?></td>
                <td><?php echo $data['Pmode'];?></td>
                
                
                
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














