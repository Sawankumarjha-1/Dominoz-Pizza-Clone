<?php              session_start(); 
 include 'connection.php';
                    $email = $_SESSION['username'];
                    $itemid = $_GET['itemid'];
                    $rate = $_GET['rating'];
                    $orderid = $_GET['id'];
                    $selectquery3 = "insert into feedback (itemid,rate,email,orderid) values($itemid,$rate,'$email',$orderid)";
                    $query4= mysqli_query($con,$selectquery3);
                    ?>
                    <script>
                        location.href='Order.php';
                    </script>
                    <?php
?>