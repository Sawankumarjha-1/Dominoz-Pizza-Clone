<?php           include 'connection.php';
                $getId = $_GET['id'];
                
               
                $query = "delete from menu where id=$getId";
                $res = mysqli_query($con,$query);
                
                ?>
                <script type="text/javascript">location.href = 'admin_menu.php'</script>
                <?php
?>