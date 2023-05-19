<?php           include 'connection.php';
                $getId = $_GET['id'];
                
                $query = "update orders set  status='Delivered' where id=$getId";
                $res = mysqli_query($con,$query);
                
                ?>
                <script type="text/javascript">location.href = 'admin_order.php'</script>
                <?php
?>