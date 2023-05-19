<?php           include 'connection.php';
                $getId = $_GET['id'];
                $emailCart = $_GET['email'];
               
                $query = "delete from cartitem where id=$getId";
                $res = mysqli_query($con,$query);
                include 'setnum.php';
                ?>
                <script type="text/javascript">location.href = 'Cart.php'</script>
                <?php
?>