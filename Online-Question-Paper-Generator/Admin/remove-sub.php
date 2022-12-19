    <?php
    $subid=$_GET['subid'];
    echo $subid;
    include 'dbconnection.php';
    $delete_sub_query = "DELETE FROM category WHERE C_id='$subid'";
    $delete_que_query = "DELETE FROM question WHERE C_id='$subid'";
    mysqli_query($con, $delete_sub_query);
    mysqli_query($con, $delete_que_query);
    ?>
    <script>
        alert("Removed Subject");
        location.replace("./admin.php");
    </script>

