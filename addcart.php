<?php           include 'connection.php';
                $getId = $_GET['id'];
                $emailCart = $_GET['email'];
                $query = "select * from  menu where id=$getId";
                $res = mysqli_query($con,$query);
                $len = mysqli_num_rows($res);
                $data = mysqli_fetch_array($res);

                $itemname = $data['itemname'];
                $feature = $data['feature'];
                $prize = $data['prize'];
                $image = $data['image'];
                $itemid = $data['id'];

                $query2 = "insert into cartitem(itemid,itemname, Feature, prize, image,signupemail) values($getId,'$itemname','$feature','$prize','$image','$emailCart')";
                $res2 = mysqli_query($con,$query2);
                include 'setnum.php';
                ?>
                <script type="text/javascript">location.href = 'menu.php'</script>
                <?php
?>