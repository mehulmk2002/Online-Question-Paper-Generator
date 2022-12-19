<?php

$dusername="root";
$password="";
$server='localhost';
$db='quiz';
$con=mysqli_connect($server,$dusername,$password,$db);

if($con)
{
    
}

else
{
    ?>
    <script>
        alert("Error");
    </script>
     <?php
}

?>