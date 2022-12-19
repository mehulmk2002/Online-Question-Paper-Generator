<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
?>
  <script>
    location.replace("index.html");
  </script>

<?php
}
?>
<html lang="en">
<?php include 'dbconnection.php'; ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="Script/profileScript.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="css/card.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  $susername = $_SESSION['username'];
  $uid = $_SESSION['User_id'];
  ?>


  <!-- ====1.Menu bar====  -->
  <section id="menu">
    <div class="logo">
      <img src="img/logo.jpg" alt="">
      <h1><?php echo  $susername; ?></h1>
    </div>

    <div class="items">
      <li id="dash" onclick="onDashboard()"> <i class="fa fa-tachometer" aria-hidden="true"></i><a href="#">Dashboard</a></li>
      <li id="history" onclick="onHistory()"> <i class="fa fa-history" aria-hidden="true"></i><a href="#">Quiz Histories</a></li>
      <li id="editp" onclick="onEdit()"> <i class="fa fa-pencil" aria-hidden="true"></i> <a href="#">Edit Profile</a></li>
      <li onclick="changePwd()" id="chpwd"> <i class="fa fa-lock" aria-hidden="true"></i><a href="#">Change Password</a></li>
      <li onclick="logout()" id="sub"><i class="fa fa-sign-out" aria-hidden="true"></i><a href="logout.php">Logout</a></li>
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

          <b>My Profile</b>
        </div>
      </div>
      <div class="profile">
       
        <!--  <img src="img/im1.jpg" alt="">-->
        <span onclick="myacc()" style="cursor:pointer; margin-left:10px; font-weight:bold; font-size:16px;"><i class="fa fa-address-card" aria-hidden="true" style="margin-right:1px;"></i>MY ACCOUNT</span>
        <span onclick="logout()" id="sub" style="cursor:pointer; margin-left:10px; font-weight:bold; font-size:16px;"><i class="fa fa-sign-out" aria-hidden="true" style="margin-right:1px;" ></i>LOGOUT</span>

      </div>
    </div>

    <h3 class="i-name">Dashboard</h3>
    <br>

    <!---=====2.2 Quiz-cards======---->
    <?php include 'dbconnection.php';
    $selectquery = "select * from category";
    $query = mysqli_query($con, $selectquery);
    $num = mysqli_num_rows($query);
    ?>

    <div class="grid" id="grid">
      <?php
      $count = 0;
      while ($res = mysqli_fetch_array($query)) {
        $count++;
      ?>
        <div class="grid-item">
          <div class="card">
          <img class="card-img" src="./img/<?php echo $res['img'];  ?>"  />
            <div class="card-content">
              <h1 class="card-header"><?php echo $res['Title'];  ?></h1>
              <p class="card-text">
              As exams develop them as an individual, give values, extraordinary thinking, self assessment, overcome failures,
               filling them with positivity to improve the quality of education.
              </p>
              <a href="start_quiz.php?uid=<?php echo $uid; ?>&subid=<?php echo $res['C_id']; ?>"><button class="card-btn">START<span>&rarr;</span></button></a> 
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    
    <br><br>
    <!-- ====2.3 History Board====  -->
    <?php
    $uid = $_SESSION['User_id'];
    $selectqueryr = "select * from result where User_id='$uid'";
    $query = mysqli_query($con, $selectqueryr);
    $num = mysqli_num_rows($query);
    ?>
    <div style="display:none;" id="result">
      <div class="board">
        <table width="100%">
          <thead>
            <tr>
              <th>Sr. No</th>
              <th>Subject</th>
              <th> Obtain Marks</th>
              <th>Total Marks</th>
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
                  <p><?php echo $count; ?></p>
                </td>
                <td class="active">
                  <p><?php echo $res['Subject'];  ?></p>
                </td>
                <td class="active">
                  <p><?php echo $res['Obtain_Marks'];  ?></p>
                </td>
                <td class="active">
                  <p><?php echo $res['Total_Marks'];  ?></p>
                </td>
                <td class="active">
                  <p><?php echo $res['Sub_Time'];  ?></p>
                </td>

              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>




    <!--=====2.4 profile Edit=======-->
    <?php
    if (isset($_POST['submit'])) {

      $username = mysqli_real_escape_string($con, $_POST['username']);
      $fname = mysqli_real_escape_string($con, $_POST['fname']);
      $lname = mysqli_real_escape_string($con, $_POST['lname']);

      $email = mysqli_real_escape_string($con, $_POST['email']);
      $mobile = mysqli_real_escape_string($con, $_POST['mobile']);

      $emailquery = "select * from users where email='$email'";
      $unamequery = "select * from users where username='$username'";

      $query = mysqli_query($con, $emailquery);
      $uquery = mysqli_query($con, $unamequery);

      $emailcount = mysqli_num_rows($query);
      $unamecount = mysqli_num_rows($uquery);

      $susername = $username;
      $querys = "UPDATE `users` SET `username`='$username',`Fname`='$fname',`Lname`='$lname',`Email`='$email',`Mobile`='$mobile' WHERE `username`='{$_SESSION['username']}'";
      $regi = mysqli_query($con, $querys);
    }
    ?>


    <?php
    $showquery = "select * from users where 	username='$susername'";
    $showdata = mysqli_query($con, $showquery);
    $resarr = mysqli_fetch_array($showdata);

    ?>
    <!-- User_id`, `username`, `Fname`, `Lname`, `DOB`, `Gender`, `Email`, `Mobile`,-->
    <div class="editProfile" style="display:none;" id="editProfile">
      <div class="container">
        <div class="row col-md-6 col-md-offset-3">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h1 class="text-center">Edit Profile</h1>
            </div>
            <div class="panel-body">
              <form action="#" method="POST" onsubmit="return validation()">
                <span id="valText" style="color:red;"></span>

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" autocomplete="off" value="<?php echo $resarr['username'];  ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="fname">fname</label>
                  <input type="text" name="fname" id="fname" value="<?php echo $resarr['Fname'];  ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="lname">lname</label>
                  <input type="text" name="lname" id="lname" value="<?php echo $resarr['Lname'];  ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="email">email</label>
                  <input type="text" name="email" id="email" value="<?php echo $resarr['Email'];  ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="mobile">mobile</label>
                  <input type="text" name="mobile" id="mobile" value="<?php echo $resarr['Mobile'];  ?>" class="form-control" required>
                </div>

                <<input type="submit" name="submit" value="Update" class="btn btn-primary btn-block">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>




    <!--=======2.5 Change Password PDW =========-->
    <?php
    if (isset($_POST['change'])) {

      $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
      $querys = "UPDATE `users` SET `PDW`='$pwd' WHERE `username`='$susername'";
      $regi = mysqli_query($con, $querys);
    }
    ?>

    <div class="changePwd" style="display:none;" id="cpwd">
      <div class="container">
        <div class="row col-md-6 col-md-offset-3">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h1 class="text-center">Password Change</h1>
            </div>
            <div class="panel-body">
              <form action="#" method="POST" onsubmit="return pswdVali()">
                <span style="color:red;" id="valiPw"></span>
                <div class="form-group">
                  <label for="username">Password</label>
                  <input type="text" name="pwd" id="pswd" value="<?php echo $resarr['PDW'];  ?>" class="form-control" required>
                </div>
                <input type="submit" name="change" value="Change" class="btn btn-primary btn-block" required>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>





    <!--=========Profile==========--->
    <div class="profile-sec" style="display:none;" id="profilesec">
      <div class="icon-prof">
        <div class="id-icon">
          <img src="img/id-icon.png">
        </div>
        <div class="pro-txt">
          My Profile
        </div>

      </div>

 
      <div class="pro-detail">
        <div class="detail-txt">Details</div>

        <div class="pinfor">
          <div class="user-detail">Username</div>
          <div class="user-info"><?php echo $_SESSION['username']; ?> </div>

          <div class="user-detail">First name</div>
          <div class="user-info"><?php echo  $_SESSION['fname']; ?></div>

          <div class="user-detail">Last name</div>
          <div class="user-info"><?php echo  $_SESSION['lname']; ?></div>

          <div class="user-detail">Mobile</div>
          <div class="user-info"><?php echo $_SESSION['Mobile']; ?></div>

          <div class="user-detail">EmailID</div>
          <div class="user-info"> <?php echo $_SESSION['Email']; ?></div>

          <div class="user-detail">DOB</div>
          <div class="user-info"><?php echo $_SESSION['DOB']; ?></div>

          <div class="user-detail">Gender</div>
          <div class="user-info"><?php echo   $_SESSION['Gender'];  ?></div>
        </div>
      </div>
      <br><br>
    </div>
  </section>


  <script>
    function validation() {
      var uname = document.getElementById('username').value;
      var fname = document.getElementById('fname').value;
      var lname = document.getElementById('lname').value;
      var email = document.getElementById('email').value;
      var mobile = document.getElementById('mobile').value;




      if (uname == '') {
        document.getElementById('valText').innerHTML = "*Enter the Username";
        return false;
      } else if (fname == '') {
        document.getElementById('valText').innerHTML = "*Enter the First Name";
        return false;
      } else if (lname == '') {
        document.getElementById('valText').innerHTML = "*Enter the Last Name";
        return false;
      } else if (mobile == '') {
        document.getElementById('valText').innerHTML = "*Enter the Mobile Number";
        return false;
      } else if (mobile.length < 10) {
        document.getElementById("valText").innerHTML = "**Mobile Number must be 10 ";
        return false;
      } else if (true) {
        var atSymbol = email.indexOf("@");
        if (atSymbol < 1) {
          document.getElementById("valText").innerHTML = "**Email Is invalid there must be @";
          console.log("wrong @");
          return false;
        }

        var dot = email.indexOf(".");
        if (dot <= atSymbol + 2) {
          document.getElementById("valText").innerHTML = "**Email Is invalid must be . ";
          console.log("wrong dot");
          return false;
        }

        // check that the dot is not at the end
        if (dot === email.length - 1) {
          document.getElementById("valText").innerHTML = "**check that the dot is not at the end";
          console.log("wrong l");
          return false;
        }

      }
    }

    function pswdVali() {
      var pw = document.getElementById("pswd").value;
      if (pw == "") {
        document.getElementById("valiPw").innerHTML = "**Fill the password please!";
        return false;
      }

      //minimum password length validation  
      else if (pw.length < 8) {
        document.getElementById("valiPw").innerHTML = "**Password length must be atleast 8 characters";
        return false;
      } else {
        return true;
      }
    }
  </script>



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