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

        if ($username=='admin') {
        
            if ($password=='admin') {
                 ?>
                <script>
                    location.replace("./admin.php");
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
                    <h1 class="text-center">Admin Login</h1>
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