<?php
include('connection.php');
session_start();

if (!isset($_SESSION['adminId'])) {
    header('location:logout.php');
}

if (isset($_POST['addF'])) {

    $fname = $_POST['fname'];
    $fid = $_POST['fid'];

    $query = "INSERT INTO facultylist(`name`,`facultyId`,`password`)VALUES('$fname','$fid','pace')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Added","New Faculty added successfully</b>","success");';
        echo '}, 500);</script>';
    }
}

if (isset($_POST['GDC'])) {
    generateDutyChart();
}

function generateDutyChart() {

    $date = $_POST['date_from_dropdown'];

    header("location:generateDutyChart.php?date='$date'");

}

?>

<!doctype html>
<html>

<head>
    <title>Exam Seat Allotment | Admin</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet">
    <!-- sweetalert css cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
    <style>
        h2 {
            font-size: 22px;
            margin-top: -15%;
        }

        .jumbotron {
            border-radius: 2.125rem;
        }

        .jumbotron:hover {
            -webkit-transform: translate(1px, 3px);
            -webkit-box-shadow: inset 0 0 10px #000000;
            cursor: pointer;
        }


        .btn1 {
            margin-top: 25%;
            margin-left: 5%;
        }
    </style>
</head>

<body>
    <!-- Image and text -->
    <nav class="navbar navbar-dark primary-color">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo.jpg" height="60" width="60" style="border-radius:50%;" class="d-inline-block align-top" alt="mdb logo"> P.A. College of Engineering Mangaluru | Admin
        </a>
        <a class="btn btn-light" href="logout.php"> logout <i class="fas fa-sign-out-alt"></i></a>
    </nav>


    <div class="padding container">
        <div class="event-container">
            <div class="event-card">
                <div class="event-details">
                    <a href="uploadCsv.php"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a href="uploadCsv.php/">Upload CSV</a></p>
                        <p class="event-date"><i class="fas fa-upload"></i></p>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-details">
                    <a href="viewCsv.php"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a href="viewCsv.php">View CSV</a></p>
                        <p class="event-date"><i class="fas fa-eye"></i></p>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-details">
                    <a href="calculate.php"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a href="calculate.php">Calculate</a></p>
                        <p class="event-date"><i class="fas fa-calculator"></i></p>
                    </div>
                </div>
            </div>
           <div class="event-card">
                <div class="event-details">
                    <a href="generateDuty.php"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a href="generateDuty.php">Generate Duty</a></p>
                        <p class="event-date"><i class="fas fa-external-link-alt"></i></p>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-details">
                    <a href="generateDCS.php"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a href="generateDCS.php">Generate DCS</a></p>
                        <p class="event-date"><i class="fas fa-external-link-alt"></i></p>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-details">
                    <a href="generateSeatingArrangement.php"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a href="generateSeatingArrangement.php">Generate Seating Arrangement</a></p>
                        <p class="event-date"><i class="fas fa-external-link-alt"></i></p>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-details">
                    <a href="viewGeneratedSeats.php"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a href="viewGeneratedSeats.php">View Generated seats</a></p>
                        <p class="event-date"><i class="fas fa-eye"></i></p>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-details">
                    <a data-toggle="modal" data-target="#generateDutyChart"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a data-toggle="modal" data-target="#generateDutyChart">Generate Duty Chart</a></p>
                        <p class="event-date"><i class="fas fa-external-link-alt"></i></p>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-details">
                    <a href="generateFormA.php"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a href="generateFormA.php">Generate Form-A</a></p>
                        <p class="event-date"><i class="fas fa-print"></i></p>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-details">
                    <a href="generateFormB.php"><img class="event-image" src="./assets/images/click.jpg" alt="" /></a>
                    <div class="event-desc">
                        <p class="event-title"><a href="generateFormB.php">Generate Form-B</a></p>
                        <p class="event-date"><i class="fas fa-print"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <div class="modal fade" id="generateDutyChart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Duty Chart</h4>
                </div>
                <form method="post" action="admin.php">

                    <h3>Select Exam Date: &nbsp; </h3>
                     <select name="date_from_dropdown">
                        <?php
                        $sql2 = "SELECT * FROM timetable";
                        $result2 = mysqli_query($conn, $sql2);
                        if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $date = $row2["date"];
                    ?>
  

                    <option value="<?php echo($date); ?>"><?php echo(substr($date,0,2).'-'.substr($date,2,2).'-'.substr($date,4,2).' ['.substr($date,6).']'); ?>
                   

                    <?php }} 
                    ?>
                </select>

                <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="GDC" class="btn btn-primary">Go <i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/js/mdb.min.js"></script>
    <!-- sweetalert js cdn -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
</body>

</html>