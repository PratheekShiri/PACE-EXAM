<?php

session_start();

if (!isset($_SESSION['facultyId'])) {
    header('location:index.php');
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
    <style>
        h2 {
            font-size: 22px;
            margin-top: -15%;
        }

        .jumbotron {
            border-radius: 2.125rem;
        }

        .jumbotron:hover {
            -webkit-transform: translate(5px, 15px);
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
        <a class="btn btn-light" href="admin.php"> back <i class="fas fa-arrow-circle-left"></i></a>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-3">
                <div class="jumbotron">
                    <h2>View time table details</h2>
                    <a href="viewTimeTable.php" class="btn btn-primary btn-lg btn1" role="button">view <i class="fas fa-file-upload"></i></a>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>View student details</h2>
                    <a href="viewStudentDetails.php" class="btn btn-primary btn-lg btn1" role="button">view <i class="fas fa-file-upload"></i></a>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>View room details</h2>
                    <a href="viewRoomDetails.php" class="btn btn-primary btn-lg btn1" role="button">view <i class="fas fa-file-upload"></i></a>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>View faculty details </h2>
                    <a href="viewFacultyDetails.php" class="btn btn-primary btn-lg btn1" role="button">view <i class="fas fa-file-upload"></i></a>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>View Subject code </h2>
                    <a href="viewSubjectCode.php" class="btn btn-primary btn-lg btn1" role="button">view <i class="fas fa-file-upload"></i></a>
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
</body>

</html>