<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <?php
    include 'dbconnection.php';
    $sub_id = $_GET['subid'];

    $qquery = "SELECT * FROM `question` WHERE C_id='$sub_id' AND Marks='1'  ORDER BY rand() LIMIT 50";
    $query = mysqli_query($con, $qquery);
    $count = 1;
    $array = array();

    while ($row = mysqli_fetch_assoc($query)) {
        $array[] = $row;
    }
    $_SESSION['quiz_question'] = $array;
    $_SESSION['quiz_sub_id'] = $sub_id;
    ?>
    <script>
        location.replace("started_quiz.php");
    </script>
</body>

</html>