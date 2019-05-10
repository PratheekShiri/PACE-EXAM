<?php

session_start();

if (!isset($_SESSION['adminId'])) {
    header('location:logout.php');
}

if (isset($_POST['tt'])) {
    delete_time_table();
}

if (isset($_POST['sl'])) {
    delete_student_list();
}

if (isset($_POST['rd'])) {
    delete_room_details();
}

if (isset($_POST['fd'])) {
    delete_faculty_details();
}

if (isset($_POST['sc'])) {
    delete_subject_code();
}
if (isset($_POST['sd'])) {
    delete_subject_details();
}

function delete_time_table()
{

    include('connection.php');
    $query = "DROP TABLE timetable";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Deleted","Time Table Deleted successfully</b>","success");';
        echo '}, 500);</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Warning","Table already deleted..!!!</b>","warning");';
        echo '}, 500);</script>';
    }
}

function delete_student_list()
{
    include('connection.php');
    $query = "DROP TABLE studentlist";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Deleted","Student Details Table Deleted successfully</b>","success");';
        echo '}, 500);</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Warning","Table already deleted..!!!</b>","warning");';
        echo '}, 500);</script>';
    }
}

function delete_room_details()
{

    include('connection.php');
    $query = "DROP TABLE room";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Deleted","Room Details Table Deleted successfully</b>","success");';
        echo '}, 500);</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Warning","Table already deleted..!!!</b>","warning");';
        echo '}, 500);</script>';
    }
}

function delete_faculty_details()
{

    include('connection.php');
    $query = "DROP TABLE facultylist";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Deleted","faculty Details Table Deleted successfully</b>","success");';
        echo '}, 500);</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Warning","Table already deleted..!!!</b>","warning");';
        echo '}, 500);</script>';
    }
}

function delete_subject_code()
{

    include('connection.php');
    $query = "DROP TABLE sub_code";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Deleted","Subject Code Table Deleted successfully</b>","success");';
        echo '}, 500);</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Warning","Table already deleted..!!!</b>","warning");';
        echo '}, 500);</script>';
    }
}
function delete_subject_details()
{

    include('connection.php');
    $query = "DROP TABLE subjectname";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Deleted","Subject Code Table Deleted successfully</b>","success");';
        echo '}, 500);</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Warning","Table already deleted..!!!</b>","warning");';
        echo '}, 500);</script>';
    }
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
                    <h2>Delete time table details</h2>
                    <form method="post" action="deleteCsv.php" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="tt">delete <i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>Delete student details</h2>
                    <form method="post" action="deleteCsv.php" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="sl">delete <i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>Delete room details</h2>
                    <form method="post" action="deleteCsv.php" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="rd">delete <i class="far fa-trash-alt"></i></i></button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>Delete faculty details </h2>
                    <form method="post" action="deleteCsv.php" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="fd">delete <i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>Delete Subject code </h2>
                    <form method="post" action="deleteCsv.php" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="sc">delete <i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>Delete Subject Names </h2>
                    <form method="post" action="deleteCsv.php" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="sd">delete <i class="far fa-trash-alt"></i></button>
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