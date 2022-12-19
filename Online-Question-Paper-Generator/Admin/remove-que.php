    <?php
    $queid = $_GET['queid'];
    echo $queid;
    include 'dbconnection.php';
    $delete_que_query = "DELETE FROM question WHERE Question_id='$queid'";
    mysqli_query($con, $delete_que_query);
    ?>
    <script>
        alert("Removed Subject");
        location.replace("./admin.php");
    </script>