<!DOCTYPE html>
<html lang="en">
<?php include 'dbconnection.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="adminJS.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- ====1.Menu bar====  -->
    <section id="menu">
        <div class="logo">
            <img src="logo.jpg" alt="">
            <h1>Admin</h1>
        </div>

        <div class="items">
            <li onclick="responce()" id="resp"><i class="fa fa-pie-chart" aria-hidden="true"></i><a href="#">Responce</a></li>
            <li onclick="addsub()" id="addsubject"><i class="fa fa-book" aria-hidden="true"></i><a href="#">Add Subject</a></li>
            <li onclick="addque()" id="addque"> <i class="fa fa-plus-circle" aria-hidden="true"></i> <a href="#">Add Questions</a></li>

            <li onclick="showquestion()" id="que"> <i class="fa fa-question-circle" aria-hidden="true"></i><a href="#">Questions</a></li>
            <li onclick="Showsubject()" id="sub"><i class="fa fa-book" aria-hidden="true"></i><a href="#">Subjects</a></li>
            <li onclick="users()" id="reg"> <i class="fa fa-user" aria-hidden="true"></i><a href="#">Registered Users</a></li>
        </div>
    </section>

    <!-- ====2.Interface Board==== -->
    <section id="interface">

        <!-- ====2.1Navigation bar==== -->
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <div class="type">

                    <b> Admin</b>
                </div>
            </div>
            <div class="profile">
                <i class="fa fa-sign-language" aria-hidden="true"></i>
                <!--  <img src="img/im1.jpg" alt="">-->
                Welcome
            </div>
        </div>
        <!-- ====2.2 Count Records==== -->
        <?php
        $selectqueryr = "select * from users";
        $query = mysqli_query($con, $selectqueryr);
        $tusers = mysqli_num_rows($query);

        $selectqueryr = "select * from result";
        $query = mysqli_query($con, $selectqueryr);
        $tres = mysqli_num_rows($query);


        $selectqueryr = "select * from 	category";
        $query = mysqli_query($con, $selectqueryr);
        $tsub = mysqli_num_rows($query);

        $selectqueryr = "select * from 		question";
        $query = mysqli_query($con, $selectqueryr);
        $tque = mysqli_num_rows($query);
        ?>

        <h3 class="i-name">Dashboard</h3>
        <div class="values">
            <div class="val-box">
                <i class="fa fa-user" aria-hidden="true"></i>
                <div>
                    <h3><?php echo $tusers;  ?></h3>
                    <span>Users</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fa fa-pie-chart" aria-hidden="true"></i>
                <div>
                    <h3><?php echo $tres;  ?></h3>
                    <span>Responce</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fa fa-book" aria-hidden="true"></i>
                <div>
                    <h3><?php echo $tsub ?></h3>
                    <span>Total Subjects</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                <div>
                    <h3><?php echo $tque + 1 ?></h3>
                    <span>Total Question</span>
                </div>
            </div>
        </div>


        <!-- ====2.3 Responce Board====  -->
        <?php

        $selectqueryr = "select * from result";
        $query = mysqli_query($con, $selectqueryr);
        $num = mysqli_num_rows($query);
        ?>
        <div class="board" id="result">
            <table width="100%">
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>User_id</th>
                        <th>Subject</th>
                        <th>Attempt/Total Que</th>
                        <th> Obtained/Total Marks</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $count = 0;
                    while ($res = mysqli_fetch_array($query)) {
                        $count++;
                    ?>

                        <tr>
                            <td class="active">
                                <p><?php echo $count;  ?></p>
                            </td>
                            <td class="active">
                                <p><?php echo $res['User_id'];  ?></p>
                            </td>
                            <td class="active">
                                <p><?php echo $res['Subject'];  ?></p>
                            </td>
                            <td class="people-des">
                                <h5><?php echo $res['Attempted_Q'];  ?></h5>
                                <p><?php echo $res['Total_Q'];  ?></p>
                            </td>
                            <td class="people-des">
                                <h5><?php echo $res['Obtain_Marks'];  ?></h5>
                                <p><?php echo $res['Total_Marks'];  ?></p>
                            </td>

                            <td class="active">
                                <p><?php echo $res['Sub_Time'];  ?></p>
                                <!--  <td class="edit"><a href="#">Edit</a></td>-->
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- ====2.4 ADD Question==== -->
        <?php
        if (isset($_POST['submit'])) {
            $sub = $_POST['title'];
            $qustion = $_POST['content'];
            $option_a = $_POST['option_a'];
            $option_b = $_POST['option_b'];
            $option_c = $_POST['option_c'];
            $option_d = $_POST['option_d'];
            $answer = $_POST['answer'];
            $mark = $_POST['mark'];

            echo $sub;
            $selectid = "SELECT * FROM category WHERE Title='$sub' ";
            $query = mysqli_query($con, $selectid);
            $count = 0;

            while ($res = mysqli_fetch_array($query)) {
                echo ++$count;
                $cid = $res['C_id'];
            }
            $inquery = "INSERT into `question` (`C_id`,`Content`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Answer`, `Marks`) values ('$cid','$qustion','$option_a','$option_b','$option_c','$option_d','$answer','$mark')";
            mysqli_query($con, $inquery);
            ?>
            <script>
                location.replace("./admin.php");
            </script>
        <?php
        }
        ?>

        <?php $count = 0;
        $selectCategory = "SELECT Title FROM category ";
        $query = mysqli_query($con, $selectCategory);
        ?>
        <!--Question_id`, `C_id`, `Content`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Answer`, `Marks`)-->
        <div class="formCBox" id="addQue">
            <div class="formSubBox">
                <h1>Add Question</h1>
                <form method="post">
                    <select name="title">

                        <?php
                        while ($res = mysqli_fetch_array($query)) {
                            $count++;
                        ?>
                            <option>
                                <?php echo $res['Title'];  ?>
                            </option>
                        <?php }  ?>
                    </select>
                    <input type="text" name="content" placeholder="Question" required>
                    <input type=" text" name="option_a" placeholder="Option A" required>
                    <input type="text" name="option_b" placeholder="Option B" required>
                    <input type="text" name="option_c" placeholder="Option C">
                    <input type="text" name="option_d" placeholder="Option D" required>
                    <input type="text" name="answer" placeholder="Answer" required>
                    <input type="text" name="mark" placeholder="Mark" required>
                    <input type="submit" class="btn" Style=" margin-top: 20px" name="submit">
                </form>
            </div>
        </div>
        <br>

        <!--2.2.3 ADD Subject-->
        <?php
        if ((isset($_POST['insertsub'])) && isset($_FILES['my_image'])) {
            $sub = $_POST['subject'];
            $descripton = $_POST['descripton'];


        ?>
            <script>

            </script>
            <?php


            $img_name = $_FILES['my_image']['name'];

            $temp_name = $_FILES["my_image"]["tmp_name"];
            $folder = "../img/" . $img_name;


            $inquery_sub = "INSERT into `category` ( `Title`, `Description`,`img`) values ('$sub','$descripton','$img_name')";
            mysqli_query($con, $inquery_sub);
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($temp_name, $folder)) {
            } else {
                echo "<h3> Failed to upload image!</h3>";
            }
            ?>
            <script>
                location.replace("./admin.php");
            </script>
        <?php
        }
        ?>

        <div class="catFormBox" id="AddSub" style="margin-top:50px;">
            <div class="catSubFormBox">
                <h2>Add Subject</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="subject" placeholder="Subject" required>
                    <input type="file" name="my_image" required>
                    <textarea name="descripton" rows="4" cols="50" required></textarea>
                    <input class="btn" type="submit" name="insertsub">
                </form>
            </div>
        </div>


        <!--2.2.4 show and Edit Question-->


        <div style="display:none;" id="sq">
            <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Question_id</th>
                            <th>Content</th>
                            <th>Option_A</th>
                            <th>Option_B</th>
                            <th>Option_c</th>
                            <th>Option_D</th>
                            <th>Answer</th>
                            <th>Marks</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selectquery = "SELECT * FROM question";
                        $qquery = mysqli_query($con, $selectquery);
                        while ($res = mysqli_fetch_array($qquery)) {
                        ?>
                            <tr>
                                <td class="role">
                                    <p> <?php echo $res['Question_id']; ?></p>
                                </td>
                                <td class="role">
                                    <p> <?php echo $res['Content']; ?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $res['Option_A']; ?></p>
                                </td>
                                <td class="role">
                                    <p> <?php echo $res['Option_B']; ?></p>
                                </td>
                                <td class="role">
                                    <p> <?php echo $res['Option_C']; ?></p>
                                </td>
                                <td class="role">
                                    <p> <?php echo $res['Option_D']; ?></p>
                                </td>
                                <td class="role">
                                    <p> <?php echo $res['Answer']; ?></p>
                                </td>
                                <td class="role">
                                    <p> <?php echo $res['Marks']; ?></p>
                                </td>
                                <td style="padding:0 15px; color:green">
                                    <a style="color:green" href="updatequestion.php?qid=<?php echo $res['Question_id']; ?>" data-toggle="tooltip" data-placement="top" title="UPDATE!"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                </td>
                                <td style="padding:0 15px; color:green">
                                    <a style="color:red" href="remove-que.php?queid=<?php echo $res['Question_id']; ?>" data-toggle="tooltip" data-placement="top" title="Remove!"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>




        <!--2.2.5 Subject Section -->
        <?php
        $selectquery = "select * from category";
        $query = mysqli_query($con, $selectquery);
        $num = mysqli_num_rows($query);
        ?>
        <div style="display:none;" id="quizLi">
            <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>User_id</th>
                            <th>Subject</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        while ($res = mysqli_fetch_array($query)) {
                            $count++;
                        ?>
                            <tr>
                                <td class="active">
                                    <p><?php echo $count;  ?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $res['Title'];  ?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $res['Description'];  ?></p>
                                </td>
                                <td style="padding:0 15px; color:green">
                                    <a style="color:red" href="remove-sub.php?subid=<?php echo $res['C_id']; ?>" data-toggle="tooltip" data-placement="top" title="Remove!"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!---2.2.6 User list-->
        <?php
        $selectqueryr = "select * from users";
        $query = mysqli_query($con, $selectqueryr);
        $num = mysqli_num_rows($query);
        ?>
        <div class="board" id="userList">
            <table width="100%">
                <thead>
                    <tr>
                        <th style="width:200px;">Sir No</th>
                        <th>username</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th style=" min-width: 180px;">Reg_Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    while ($res = mysqli_fetch_array($query)) {
                        $count++;
                    ?>
                        <tr>

                            <td class="active">
                                <p><?php echo $count;  ?></p>
                            </td>
                            <td class="active">
                                <p><?php echo $res['username'];  ?></p>
                            </td>
                            <td class="role">
                                <p><?php echo $res['Fname'];  ?></p>
                            </td>
                            <td class="active">
                                <p><?php echo $res['Lname'];  ?></p>
                            </td>
                            <td class="role">
                                <p><?php echo $res['Gender'];  ?></p>
                            </td>
                            <td class="active">
                                <p><?php echo $res['Email'];  ?></p>
                            </td>
                            <td class="role">
                                <p><?php echo $res['Mobile'];  ?></p>
                            </td>
                            <td class="role">
                                <p><?php echo $res['Reg_Time'];  ?></p>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>


    </section>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        $('#menu-btn').click(function() {
            $('#menu').toggleClass("active");
            console.log("hello");
        })
    </script>
</body>

</html>