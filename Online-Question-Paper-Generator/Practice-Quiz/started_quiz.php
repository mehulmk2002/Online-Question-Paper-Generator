<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .quiz-question {
            width: 100%;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background-color: hsl(206deg 38% 85%);
            padding-bottom: 50px;

        }

        .quiz_container {
            background-color: #fff;
            margin: 30px 0;
        }

        .top-info {
            padding: 10px 50px;
            background-color: #4d9be9;
            color: #fff;

        }

        .top-info .sub-name {
            font-size: 40px;
            font-weight: 100;
            font-family: cursive;
            text-align: center;

        }

        .sub-quiz-question {
            width: 50vw;
            background-color: #fff;
            padding: 2rem 5rem;
            /*  border-radius: 1rem;*/
            box-shadow: 0 1rem 1 rem --0.7rem rgba(0, 0, 0, 0.4);
        }

        ul li {
            list-style: none;
            padding-top: 10px;
        }
        .que-content{
            font-size: 25px;
           
        }
        .btn {
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

        .btn-playAgain {
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

        .btn:hover {
            background: #0a4898;
        }

        .btn-playAgain:hover {
            background: #0a4898;
        }

        .play-again {
            background-color: hsl(206deg 38% 85%);
        }

        @media(max-width:769px) {

            .sub-quiz-question {
            width: 100vw; 
            padding: 1rem 2rem;
        }

        .quiz_container {
        padding-bottom: 30px;
        margin: 0;
        }
        .que-content{
            font-size: 18px;
            font-weight: 700;
        }
       

        .btn,.btn-playAgain {       
            margin-left: 2rem;   
        }

        }
    </style>
</head>

<body>
    <?php
    $username = "root";
    $password = "";
    $server = 'localhost';
    $db = 'quiz';
    $con = mysqli_connect($server, $username, $password, $db);
    $res = $_SESSION['quiz_question'];
    $count = 1;
    $i = 0;
    $total_que = count($res);
    $sub_id = $_SESSION['quiz_sub_id'];
    $select_sub_query = "select * from category WHERE C_id= '$sub_id' ";
    $sub_query = mysqli_query($con, $select_sub_query);
    $num = mysqli_num_rows($sub_query);
    while ($sub = mysqli_fetch_array($sub_query)) {
        $subject_name = $sub['Title'];
    }
    ?>

    <div class="quiz-question">
        <div class="quiz_container">
            <div class="top-info">
                <div class="sub-name"><?php echo $subject_name; ?></div>
            </div>

            <form action="result.php" method="POST">

                <?php while ($total_que >= $count) {
                    if ($count > 1) {
                        echo "<hr>";
                    }
                ?>
                    <div class="sub-quiz-question">

                        <div class="que-content"><?php echo $count . " ";
                                                        echo $res[$i]['Content'];  ?></div>
                        <ul>
                            <li>
                                <input type="radio" id="<?php echo $res[$i]['Option_A'];  ?>" name="check[<?php echo $count; ?>]" value="<?php echo $res[$i]['Option_A'];  ?>" class="option">
                                <label for="<?php echo $res[$i]['Option_A'];  ?>"><?php echo $res[$i]['Option_A'];  ?></label>
                            </li>

                            <li>
                                <input type="radio" id="<?php echo $res[$i]['Option_B'];  ?>" name="check[<?php echo $count; ?>]" value="<?php echo $res[$i]['Option_B'];  ?>" class="option">
                                <label for="<?php echo $res[$i]['Option_B'];  ?>"><?php echo $res[$i]['Option_B'];  ?></label>
                            </li>

                            <li>
                                <input type="radio" id="<?php echo $res[$i]['Option_C'];  ?>" name="check[<?php echo $count; ?>]" value="<?php echo $res[$i]['Option_C'];  ?>" class="option">
                                <label for="<?php echo $res[$i]['Option_C'];  ?>"><?php echo $res[$i]['Option_C'];  ?></label>
                            </li>

                            <li>
                                <input type="radio" id="<?php echo $res[$i]['Option_D'];  ?>" name="check[<?php echo $count; ?>]" value="<?php echo $res[$i]['Option_D']; ?>" class="option">
                                <label for="<?php echo $res[$i]['Option_D'];  ?>"><?php echo $res[$i]['Option_D'];  ?></label>

                                <?php $qans[$count] = $res[$i]['Answer']; ?>
                            </li>
                        </ul>
                    </div>
                <?php

                    $count++;
                    $i++;
                    $_SESSION['an'] = $qans;
                }  ?>
                <input class="btn" type="submit" name="submit" value="SUBMIT"><br>

            </form>
            <a href="start_quiz.php?subid=<?php echo $sub_id; ?>"> <input class="btn-playAgain" type="submit" value="Play Again"></a> <br><br>

        </div>
       
    </div>
</body>

</html>