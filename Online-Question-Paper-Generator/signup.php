<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php
   include 'dbconnection.php';

   if (isset($_POST['submit'])) {
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $fname = mysqli_real_escape_string($con, $_POST['fname']);
      $lname = mysqli_real_escape_string($con, $_POST['lname']);
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
      $dob = mysqli_real_escape_string($con, $_POST['dob']);
      $gender = mysqli_real_escape_string($con, $_POST['gender']);
      $password = mysqli_real_escape_string($con, $_POST['password']);

      $emailquery = "select * from users where email='$email'";
      $unamequery = "select * from users where username='$username'";

      $query = mysqli_query($con, $emailquery);
      $uquery = mysqli_query($con, $unamequery);

      $emailcount = mysqli_num_rows($query);
      $unamecount = mysqli_num_rows($uquery);

      if ($emailcount > 0) {

   ?>
         <script>
            alert("Email already exists!");
         </script>
         <?php
      } else {
         if ($unamecount > 0) {

         ?>
            <script>
               alert("Username already exists!");
            </script>
            <?php
         } else {
            //  `User_id`, `username`, `Fname`, `Lname`, `DOB`, `Gender`, `Email`, `Mobile`, `PDW`, `Reg_Time`
            $insertquerys = "INSERT INTO `users`(`username`,`Fname`, `Lname`, `DOB`, `Gender`, `Email`, `Mobile`, `PDW`)
         VALUES ('$username','$fname','$lname','$dob','$gender','$email','$mobile','$password')";
            $regi = mysqli_query($con, $insertquerys);


            if ($regi) {
            ?>
               <script>
                  alert("Thanks for Signup");
                  location.replace("index.php");
               </script>
            <?php
            } else {
               echo "ERROR: $insertquerys <br> $con->error";
            ?>
               <script>
                  alert("Error");
               </script>
   <?php
            }
         }
      }
   }

   ?>
  
<br>
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="text-center">SignUp Form</h1>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" onsubmit="return validation()">
                        <label id="validation-text" style="color:red;"></label>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" onblur="validation()" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" onblur="validation()" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" onblur="validation()" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Gender</label>
                            <div>
                                <label for="male" class="radio-inline"><input type="radio" name="gender" value="male"
                                        id="male">Male</label>
                                <label for="female" class="radio-inline"><input type="radio" name="gender"
                                        value="female" id="female">Female</label>
                                <label for="others" class="radio-inline"><input type="radio" name="gender"
                                        value="others" id="others">Others</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" name="dob" id="dob" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email ID</label>
                            <input type="text" name="email" id="email"
                            onblur="validation()" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" name="mobile" id="mobile" onblur="validation()" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="pswd">Password</label>
                            <input type="text" name="password" id="pswd" onblur="validation()" class="form-control">
                        </div>

                        <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary btn-block"">

                    </form>
                    <div class=" text-center">
                        <span style="margin-top: 10px;">Have an Acount? <a href="login.php">Login</a></span>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>



        function ValidateEmailAddress(emailString) {
            // check for @ sign
            var atSymbol = emailString.indexOf("@");
            if (atSymbol < 1) return false;

            var dot = emailString.indexOf(".");
            if (dot <= atSymbol + 2) return false;

            // check that the dot is not at the end
            if (dot === emailString.length - 1) return false;

            return true;
        }
        function validation() {
            var genders = '';
            var uname = document.getElementById('username').value;
            var fname = document.getElementById('fname').value;
            var lname = document.getElementById('lname').value;
            var genders = document.getElementsByName("gender");
            var email = document.getElementById('email').value;
            var mobile = document.getElementById('mobile').value;
            var pw = document.getElementById("pswd").value;

            if (uname == '') {
                document.getElementById('validation-text').innerHTML = "*Enter the Username";
                return false;
            } else {
                document.getElementById('validation-text').innerHTML = "*";

            }

            if (fname == '') {
                document.getElementById('validation-text').innerHTML = "*Enter the First Name";
                return false;
            } else {
                document.getElementById('validation-text').innerHTML = "*";
            }


            if (lname == '') {
                document.getElementById('validation-text').innerHTML = "*Enter the Last Name";
                return false;
            } else {
                document.getElementById('validation-text').innerHTML = "*";
            }



            if (genders[0].checked == false && genders[1].checked == false && genders[2].checked == false) {
                var msg = 'You must select your gender!';
                alert("You must select your gender!");
                document.getElementById('validation-text').innerHTML = msg;
                return false;
            } else {
                document.getElementById('validation-text').innerHTML = "*";
            }

            var Result = ValidateEmailAddress(email);
            if (Result) {
                document.getElementById("validation-text").innerHTML = "*";
            } else {
                document.getElementById("validation-text").innerHTML = "NOT a Valid Email Id";
                return false;
            }

            if (mobile == '') {
                document.getElementById('validation-text').innerHTML = "*Enter the Mobile Number";
                return false;
            } else {
                document.getElementById('validation-text').innerHTML = "*";
            }

            //check empty password field  
            if (pw == "") {
                document.getElementById("validation-text").innerHTML = "**Fill the password please!";
                return false;
            }

            //minimum password length validation  
            if (pw.length < 8) {
                document.getElementById("validation-text").innerHTML = "**Password length must be atleast 8 characters";
                return false;
            }

            //maximum length of password validation  
            if (pw.length > 15) {
                document.getElementById("validation-text").innerHTML = "**Password length must not exceed 15 characters";
                return false;
            } else {
                document.getElementById("validation-text").innerHTML = "*";
            }


        }


        function CheckEmail(emailString) {
            //get result as true/false
            var Result = ValidateEmailAddress(emailString);

            if (Result) {
                document.getElementById("validation-text").innerHTML = "*";
            } else {
                document.getElementById("validation-text").innerHTML = "NOT a Valid Email Id";
            }
        }
    </script>
</body>

</html>