<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,300;0,400;1,300&family=Roboto:wght@100&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

            background-color: hsl(206deg 1% 89%);
        }

        .body-box {
            display: grid;
            place-items: center;
            font-family: 'Poppins', sans-serif;

        }





        /*==================TABLE==========================*/
        /*Table Desining*/
        .board {
            width: 94%;
            margin: 30px 0px 30px 0px;
            background: #fff;
            border-radius: 8px;
            text-align: left;


        }

        .board h5 {
            font-weight: 600;
            font-size: 14px;
        }

        .board p {
            font-weight: 400;
            font-size: 13px;
            color: #444a53;
        }

        table {
            border-collapse: collapse;
            background: #fff;

        }

        tr {
            border-bottom: 1px solid #568dc5;
        }

        thead th {
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 400;
            background-color: #4d9be9;
            text-align: start;
            padding: 15px;
        }

        tbody tr td p {
            background: #fff;
        }

        tbody tr td {
            padding: 10px 15px;
            background: #fff;
        }

        tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .que-content {
            font-size: 18px;
            text-decoration: underline;
        }

        .btn {
            font-size: 20px;
            height: 40px;
            width: 150px;
            padding: 0 10px;
            background: #009879;
            color: #fff;
            font-weight: bold;
            border: none;
            margin-left: 5rem;
            margin-top: 10px;
        }

        .btn-playAgain {
            font-size: 20px;
            height: 40px;
            width: 150px;
            padding: 0 10px;
            background: #e60246;
            color: #fff;
            font-weight: bold;
            border: none;
            margin-left: 5rem;
        }

        .btn-playAgain:hover {
            background: #0a4898;
        }
        .btn:hover {
            background: #0a4898;
        }




        @media(max-width:769px) {
            .board {
                margin: 30px 10px;
                overflow-x: auto;

            }
        }
    </style>
</head>

<body>
    <div class="body-box">
        <div>
            <h1>Your Score</h1>

            <?php



            include 'dbconnection.php';


            if (isset($_POST['submit'])) {
                $totalq = 0;
                $res = 0;
                $match = 0;
                $totalq = count($_SESSION['an']);
                if (!empty($_POST['check'])) {

                    $match = count($_POST['check']);

                    $totalq = count($_SESSION['an']);

                    $selected = $_POST['check'];
                    $correctans = $_SESSION['an'];

                    $question_res = $_SESSION['quiz_question'];
                    $total_que = count($question_res);
                    $count = 1;
                    $i = 0;
                    while ($total_que >= $count) { ?>
                        <div class="que-content">
                            <?php echo $count . " ";
                            echo $question_res[$i]['Content'];  ?></div>
                    <?php

                        if (!empty($selected[$count])) {
                            $marks = $correctans[$count] == $selected[$count];
                            if ($marks) {

                                echo "<b>Selected: </b><span style='color:green'>$selected[$count] </span><br>";
                                $res++;
                            } else {
                                echo "<b>Selected: </b><span style='color:red'>$selected[$count]</span><br>";
                            }
                        }


                        echo "<b>Answer: </b><span style='color:blue'>" . $question_res[$i]['Answer'] . "</span><br>";
                        $count++;
                        $i++;
                    }

                    ?> <br><br> <?php
                            }

                            if (empty($_POST['check'])) {
                                echo "<td>Please select the options </td>";
                            }
                        }
                                ?>
            <!--INSERT INTO `result`(`Result_id`, `User_id`, `Total_Q`, `Attempted_Q`, `Total_Marks`, `Obtain_Marks`, `Sub_Time`, `Subject`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')
-->
            <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Total_Q</th>
                            <th>Attempted_Q</th>
                            <th>Correct_Q</th>
                            <th>Total_Marks</th>
                            <th>Obtain_Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="active">
                                <p><?php echo $totalq; ?></p>
                            </td>
                            <td class="active">
                                <p><?php echo  $match; ?></p>
                            </td>
                            <td class="active">
                                <p><?php echo  $res; ?></p>
                            </td>
                            <td class="active">
                                <p><?php echo  $totalq; ?></p>
                            </td>
                            <td class="active">
                                <p><?php echo  $res  ?></p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
        include 'dbconnection.php';
        $uid = $_SESSION['User_id'];
        $sub_id = $_SESSION['quiz_sub_id'];
        $select_sub_query = "select * from category WHERE C_id= '$sub_id' ";
        $sub_query = mysqli_query($con, $select_sub_query);
        $num = mysqli_num_rows($sub_query);
        while ($sub = mysqli_fetch_array($sub_query)) {
            $subject_name = $sub['Title'];
        }

        $query = "INSERT INTO `result`(`User_id`, `Total_Q`, `Attempted_Q`, `Total_Marks`, `Obtain_Marks`, `Subject`)VALUES 
        ('$uid','$totalq','$match','$totalq','$res','$subject_name')";
        mysqli_query($con, $query);
        ?>
 <a href="start_quiz.php?uid=<?php echo $uid; ?>&subid=<?php echo $sub_id; ?>"> <input class="btn-playAgain" type="submit" value="Play Again"></a> <br>
 <a href="profile.php"> <input class="btn" type="submit" value="Go Home"></a> <br><br>

    </div>
</body>




</html>