<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="css/card.css">

</head>

<body Bgcolor="#aeb0b4">
  <!--========Navigation=========-->
  <!--navigation Bar-->
  <div class="header">
    <div class="menu-bar">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Online-Exam</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>


    <!---=====2.2 Quiz-cards======---->
    <?php include 'dbconnection.php';
    $selectquery = "select * from category";
    $query = mysqli_query($con, $selectquery);
    $num = mysqli_num_rows($query);
    ?>
<div style="margin:10px 10%;">
    <div class="grid"  id="grid">
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
              <a href="Practice-Quiz/start_quiz.php?subid=<?php echo $res['C_id']; ?>"><button class="card-btn">START<span>&rarr;</span></button></a> 
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div></div>
  <br><br>
  <!--Footer-->

  <footer class="text-center text-white" style="background-color: #f1f1f1;">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">

        <!-- Twitter -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">
          <i class="fab fa-twitter"></i>
        </a>

        <!-- Facebook -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.facebook.com/mehul.kurkitiya" role="button" data-mdb-ripple-color="dark">
          <i class="fab fa-facebook-f"></i>
        </a>

        <!-- Instagram -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.instagram.com/kurkutemehu17/" role="button" data-mdb-ripple-color="dark">
          <i class="fab fa-instagram"></i>
        </a>

        <!-- Linkedin -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">
          <i class="fab fa-linkedin"></i>
        </a>
        <!-- Github -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">
          <i class="fab fa-github"></i>
        </a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">mehulmk2002</a>
    </div>
    <!-- Copyright -->
  </footer>

</body>

</html>