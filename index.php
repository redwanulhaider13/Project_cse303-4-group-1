<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Bebas+Neue&family=Karla:wght@200;300;400&family=Oswald:wght@200;300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">

  <script src="https://kit.fontawesome.com/dc74cc19b1.js" crossorigin="anonymous"></script>

  <title> Student Enrollment Analysis System</title>
</head>

<body>
  <div class="">
    <?php
    //include 'shared-components/sidebar.php';
    ?>
    <div class="container d-flex align-items-center justify-content-center">
    <h1 class="title_heading">Management Information System</h1>
      <div class="nav_board container">
        
        <div class="row ms-5">
          <div class="col">
            <div class="navBoard_button  d-flex flex-column align-items-center justify-content-center">
              <i class="fa-solid fa-people-roof fs-2"></i>
              <a class="nav-link fw-bolder text-dark" href="classroom-requirements.php">Classroom Requirements</a>
            </div>
          </div>
          <div class="col">
            <div class=" navBoard_button  d-flex flex-column align-items-center justify-content-center">
              <i class="fa-solid fa-square-poll-horizontal fs-2"></i>
              <a class="nav-link fw-bolder text-dark" href="class-size-distributions.php">Class-size Distributions</a>
            </div>
          </div>
          <div class="col">
            <div class=" navBoard_button d-flex flex-column align-items-center justify-content-center">
              <i class="fa-solid fa-box fs-2"></i>
              <a class="nav-link fw-bolder text-dark" href="resource-summery.php">Resource summery</a>
            </div>
          </div>
        </div>
        <div class="row ms-5">
          <div class="col">
            <div class="navBoard_button mt-5 d-flex flex-column align-items-center justify-content-center">
              <i class="fa-solid fa-person-digging fs-2"></i>
              <a class="nav-link fw-bolder text-dark " href="resource-utilization.php">Resource utilization</a>
            </div>
          </div>
          <div class="col">
            <div class="navBoard_button mt-5 d-flex flex-column align-items-center justify-content-center">
              <i class="fa-solid fa-school fs-2"></i>
              <a class="nav-link fw-bolder text-dark " href="all-school-revenue.php">All school's revenue</a>
            </div>
          </div>
          <div class="col">
            <div class="navBoard_button mt-5 d-flex flex-column align-items-center justify-content-center">
              <i class="fa-solid fa-arrow-up-right-dots fs-2"></i>
              <a class="nav-link fw-bolder text-dark " href="sets-revenue.php"> SETS revenue</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>