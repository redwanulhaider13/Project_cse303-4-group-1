<?php


$semester = isset($_POST["semester"]) ? $_POST["semester"] : "";
$semester2 = isset($_POST["semester"]) ? $_POST["semester"] : "Session";
$year = isset($_POST["year"]) ? $_POST["year"] : "";

$con = new mysqli('localhost', 'root', '', 'mis');





$query = $con->query("
SELECT 
    CASE 
        WHEN Capacity BETWEEN 1 AND 20 THEN '20'
          WHEN Capacity BETWEEN 21 AND 30 THEN '30'
          WHEN Capacity BETWEEN 31 AND 35 THEN '35'
          WHEN Capacity BETWEEN 36 AND 40 THEN '40'
          WHEN Capacity BETWEEN 41 AND 50 THEN '50'
          WHEN Capacity BETWEEN 51 AND 54 THEN '54'
          WHEN Capacity BETWEEN 55 AND 64 THEN '64'
          WHEN Capacity BETWEEN 65 AND 124 THEN '124'
          WHEN Capacity BETWEEN 125 AND 168 THEN '168'
          WHEN Capacity THEN Capacity
      END AS classsize,
  COUNT(DISTINCT(section_t.Room_ID)) AS IUB_resources,
  ROUND(COUNT(CASE WHEN Enrolled > 0 THEN 1 END) / 12) AS $semester2,
  ROUND(COUNT(DISTINCT(section_t.Room_ID)) - COUNT(CASE WHEN Enrolled > 0 THEN 1 END) / 12, 1) AS Difference
  FROM section_t
  LEFT JOIN room_t ON section_t.Room_ID = room_t.Room_Id
  WHERE Session = '$semester' AND YEAR = '$year' OR Enrolled = 0
  GROUP BY classsize
  HAVING classsize IS NOT NULL
  UNION
  SELECT 
    'Total',
      COUNT(DISTINCT(section_t.Room_ID)) AS IUB_resources,
      ROUND(COUNT(CASE WHEN Enrolled > 0 THEN 1 END) / 12, 1) AS semester,
      ROUND(COUNT(DISTINCT(section_t.Room_ID)) - COUNT(CASE WHEN Enrolled > 0 THEN 1 END) / 12, 1) AS Difference
  FROM section_t
  LEFT JOIN room_t ON section_t.Room_ID = room_t.Room_Id
  WHERE Session = '$semester' AND YEAR = '$year' OR Enrolled = 0 AND Capacity != 0;
  ");




?>



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
    <title> Student Enrollment Analysis System</title>
</head>
<script src="https://kit.fontawesome.com/dc74cc19b1.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg" style="height:100px">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link upper-link fw-bolder text-dark hover_effect mb-2" href="index.php"><i class="fa-solid fa-house fs-5 text-danger"></i></a>
                    <a class="nav-link upper-link fw-bolder text-dark hover_effect mb-2" href="classroom-requirements.php">Classroom Requirements</a>
                    <a class="nav-link upper-link fw-bolder text-dark hover_effect mb-2" href="class-size-distributions.php">Class-size Distributions</a>
                    <a class="nav-link upper-link fw-bolder text-dark hover_effect mb-2" href="resource-summery.php">Resource summery</a>
                    <a class="nav-link upper-link fw-bolder text-dark hover_effect mb-2" href="resource-utilization.php">Resource utilization</a>
                    <a class="nav-link upper-link fw-bolder text-dark hover_effect mb-2" href="all-school-revenue.php">Revenue</a>
                    <a class="nav-link upper-link fw-bolder text-dark hover_effect mb-2" href="sets-revenue.php"> SETS revenue</a>
                </ul>
                <form method="POST">
                    <div class="">
                        <select class="dropDown_bar" name="semester" id="semester">

                            <option value="Summer">Summer</option>
                            <option value="Spring">Spring</option>
                            <option value="Autumn">Autumn</option>
                        </select>
                        <select class="dropDown_bar" name="year" id="year">

                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <button class="btn mb-2 btn-danger" type="submit"> submit </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <div class="container <?php if($semester){echo "";} else{echo "d-none";} ?>">

        <div class="main_contents">
            <div class="row mt-5 ps-5">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <h4 class="text-danger hFont fw-bolder lh-lg pt-5 pb-3 text-uppercase">resource utilizations OF <?php echo $semester2 . " " . $year ?></h4>
                    <table class="table table-danger table-danger">
                        <thead>
                            <tr>

                                <?php

                                while ($fieldinfo = $query->fetch_field()) {
                                    echo '<th scope="col">' . $fieldinfo->name . '</th>';
                                }

                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($query->num_rows > 0) {
                                while ($row = $query->fetch_row()) {
                                    echo '<tr>';
                                    for ($i = 0; $i < sizeof($row); $i++) {

                                        echo '<td>' . $row[$i] . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            } else {
                                echo "0 results";
                            }

                            mysqli_close($con);
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-5 ps-5">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <h4 class="text-danger hFont fw-bolder lh-lg pt-5 pb-3 text-uppercase">resource utilization GRAPH & CHARTS</h4>
                    <div class="w-50">
                        <canvas id="myChart"></canvas>
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


    <script>
        <?php
        $i = 0;
        foreach ($query as $data) {
            $IUB_resources[] = $data['IUB_resources'];
            $session[] = $data[$semester2];
            $i = $i + 20;
            $count[] = $i;
        }

        ?>



        // setup 
        const data = {
            labels: <?php echo json_encode($count) ?>,
            datasets: [{
                    label: 'IUB_resources',
                    data: <?php echo json_encode($IUB_resources) ?>,
                    backgroundColor: '#CB4335',
                    borderWidth: 1
                },
                {
                    label: 'Session',
                    data: <?php echo json_encode($session) ?>,
                    backgroundColor: '#1F618D',
                    borderWidth: 1
                },
            ]
        };

        // config 
        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>