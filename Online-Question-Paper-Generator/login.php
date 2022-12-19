<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    $username = "root";
    $password = "";
    $server = 'localhost';
    $db = 'quiz';
    $con = mysqli_connect($server, $username, $password, $db);

    $Err = $unameErr = "";
    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $username_search = "select * from users where 	username='$username' ";

        echo "login succsesfully";
        $query = mysqli_query($con, $username_search);
        $username_count = mysqli_num_rows($query);
        if ($username_count) {
            $username_pass = mysqli_fetch_assoc($query);
            $db_pass = $username_pass['PDW'];
            $_SESSION['User_id'] = $username_pass['User_id'];
            $_SESSION['username'] = $username_pass['username'];

            $_SESSION['fname'] = $username_pass['Fname'];
            $_SESSION['lname'] = $username_pass['Lname'];
            $_SESSION['DOB'] = $username_pass['DOB'];
            $_SESSION['Gender'] = $username_pass['Gender'];
            $_SESSION['Email'] = $username_pass['Email'];
            $_SESSION['Mobile'] = $username_pass['Mobile'];
            $pass_decode = password_verify($password, $db_pass);

            if ($db_pass == $password) {
                echo "login succsesfully"; ?>
                <script>
                    location.replace("profile.php");
                </script>

    <?php
            } else {
                $Err = "Invalid Password";
            }
        } else {
            $Err = "Invalid username";
        }
    }
    ?>

    <br>
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="text-center">Login Form</h1>
                </div>
                <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                        <span style="color:red;">*<?php echo $Err; ?> </span><br>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" onblur="validation()" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="pswd">Password</label>
                            <input type="password" name="password" id="pswd" onblur="validation()" class="form-control">
                        </div>

                        <input type="submit" value="Login" name="login" class="btn btn-primary btn-block">

                    </form>
                    <div class=" text-center">
                        <span style="margin-top: 10px;">Have an Acount? <a href="signup.php">Signup</a></span>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>