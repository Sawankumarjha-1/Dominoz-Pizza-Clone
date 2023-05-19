<?php session_start();
if(isset($_SESSION['username'])){
    ?>
 <!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
        <?php include 'connection.php'?>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
        <title>PizzaWeb-Dashboard</title>
    </head>

    <body>
    

        <nav class="menuNavigation" >


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
                <a href="#">Home</a>
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

                <a href="index.php" class="btn"> LOGOUT</a>
            </div>



        </div>
        <?php 
                $query = "select * from  orders";
                $query2= "select * from  menu";
                $res = mysqli_query($con,$query);
                $res2 = mysqli_query($con,$query2);
                $len = mysqli_num_rows($res);
                $len2 = mysqli_num_rows($res2);
                $totalItem = $len2;
                $totalOrder = $len;
                $todayOrder = 0;
                $activeOrder = 0;
                $dt = '20'.date('y').'-'.date('m').'-'.date('d');
               
                while($data = mysqli_fetch_array($res)){
                    if($data['status']=='active'){
                        $activeOrder++;
                    }
                    if($data['Date']==$dt){
                        $todayOrder++;
                    }
                }
        ?>
        

        <div class="dashboard">
       
                <h2 class="menuHeading">
                      <hr noshade="">
                    <span>🍕</span>
                    <span>DASHBOARD</span>
                    <hr noshade="">
                </h2>
            <div class="analyze">
                <div class="analyzeDiv">
                    <div class="analyzeOuterDiv">
                        <div class="analyzeIconDiv">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="analyzeContentDiv">
                            <p>TOTAL SALES</p>
                            <h1><?php echo $totalOrder;?></h1>
                        </div>
                    </div>
                    <div class="analyzeOuterDiv">
                        <div class="analyzeIconDiv">
                        <i class="fas fa-location-arrow"></i>
                        </div>
                        <div class="analyzeContentDiv">
                            <p>ACTIVE ORDER</p>
                            <h1><?php echo $activeOrder;?></h1>
                        </div>
                    </div>
                    <div class="analyzeOuterDiv">
                        <div class="analyzeIconDiv">
                        <i class="fas fa-calendar-week"></i>
                        </div>
                        <div class="analyzeContentDiv">
                            <p>TODAY ORDER</p>
                            <h1><?php echo $todayOrder;?></h1>
                        </div>
                    </div>
                    <div class="analyzeOuterDiv">
                        <div class="analyzeIconDiv">
                            <i class="fas fa-cookie-bite"></i>
                        </div>
                        <div class="analyzeContentDiv">
                            <p>ITEMS</p>
                            <h1><?php echo $totalItem;?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php include 'adminfooter.php'?>

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











