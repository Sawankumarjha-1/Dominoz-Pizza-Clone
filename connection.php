<?php

$server = 'localhost';
$username = 'root';
$password ='';
$db='pizzaweb';
$con = mysqli_connect($server,$username,$password,$db);
if($con){
    ?>
    <script>
    	
    	// alert('Connection Successully');
    </script>
    <?php
}
else{
      ?>
    <script>
    	
    	alert('Connection Error');
    </script>
    <?php
}


?>