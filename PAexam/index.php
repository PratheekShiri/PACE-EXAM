<?php

session_start();

if (isset($_SESSION['facultyId'])) {
    header('location:faculty.php');
}

if (isset($_SESSION['adminId'])) {
    header('location:admin.php');
}

if (isset($_POST['login'])) {
    login();
}

if (isset($_POST['findSeat'])) {
    findSeat();
}

if (isset($_POST['findSubject'])) {
    findSubject();
}

if (isset($_POST['timeTable'])) {
    include('connection.php');
    $scheme = mysqli_real_escape_string($conn, $_POST['scheme']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);

    header("location:displayTimeTable.php?scheme='$scheme'&year='$year'");
}



function login()
{

    include('connection.php');

    $facultyId = mysqli_real_escape_string($conn, $_POST['facultyId']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);

    $exe = mysqli_query($conn, "SELECT * FROM facultylist WHERE facultyId = '$facultyId' AND password = '$password' ");

    $row = mysqli_fetch_array($exe);

    if ($row['facultyId'] == 'PA100' && $row['password'] == '21232f297a57a5a743894a0e4a801fc3') {

        $_SESSION['adminId'] = $facultyId;
        header('location:admin.php');

    }
    elseif ($row['facultyId'] == $facultyId && $row['password'] == $password) {

        $_SESSION['facultyId'] = $facultyId;
        header('location:faculty.php');

    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Oops...","Incorrect username or password!...</b>");';
        echo '}, 500);</script>';
    }
}

function findSeat() {
    include('connection.php');
    $usn = mysqli_real_escape_string($conn, $_POST['usn']);

    $query = mysqli_query($conn, "SELECT * FROM generatedSeats WHERE SUSN = '$usn'");
    $queryResult = mysqli_fetch_array($query);

    if(empty($queryResult)){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("'.$usn.'","Room is not yet generated.","success");';
        echo '}, 500);</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("'.$queryResult['SUSN'].'","Room Number: '.$queryResult['room_num'].' <br>Seat Number: '.$queryResult['seat_number'].'","success");';
        echo '}, 500);</script>';
    }
}

function findSubject() {
    include('connection.php');
    $usn = mysqli_real_escape_string($conn, $_POST['usn']);

    $query = mysqli_query($conn, "SELECT * FROM studentlist WHERE SUSN = '$usn'");
    $queryN = mysqli_query($conn, " SELECT * FROM subjectname WHERE branch = 'CS' ");
    $queryResult = mysqli_fetch_assoc($query);
    $queryName = mysqli_fetch_assoc($queryN); 
    if(!empty($queryResult) AND ($queryName)){

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("'.$usn.'","has applied for the following subjects:<br><ul>'; 

                foreach(array_keys($queryResult,"1") as $value){

                    echo '<li>'.substr($value,1).'</li>'; 
                foreach (array_keys($queryName,"1") as $val ) {
                    echo '<li>'.substr($val,0).'</li>'; 
                }
                    
    }
        echo '</ul>","success");';
        echo '}, 500);</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("'.$usn.'","has not applied for any subject!.","success");';
        echo '}, 500);</script>';
    }
}



?>

<!doctype html>
<html>

<head>
    <title>Exam Seat Allotment</title>
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
        body {
            font-weight: bold;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <!-- Image and text -->
    <nav class="navbar navbar-dark primary-color">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo.jpg" height="60" width="60" style="border-radius:50%;" class="d-inline-block align-top" alt="mdb logo"> P.A. College of Engineering Mangaluru
        </a>
        <a data-toggle="modal" data-target="#timeTableModal" class="btn btn-light" style="color:black;">Time Table <i class="fas fa-calendar"></i></a>
        <a data-toggle="modal" data-target="#findMySubjectModal" class="btn btn-light" style="color:black;">My Applied Subjects <i class="fas fa-book"></i></a>
        <a data-toggle="modal" data-target="#findMySeatModal" class="btn btn-light" style="color:black;">Find My Seat <i class="fas fa-chair"></i></a>
    </nav>

    <!--Modal: Login / Register Form-->
    <div id="modalLRForm" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog cascading-modal" role="document" style="margin-top:5%;">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active btn-primary" data-toggle="tab" href="#panel7" role="tab">
                                Login</a>
                        </li>
                    </ul>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                            <!--Body-->
                            <form method="post" action="index.php">
                                <div class="modal-body mb-1">
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-user prefix"></i>
                                        <input type="text" id="modalLRInput10" name="facultyId" class="form-control form-control-sm validate" required>
                                        <label data-error="wrong" data-success="right" for="modalLRInput10">Faculty id</label>
                                    </div>

                                    <div class="md-form form-sm mb-4">
                                        <i class="fas fa-lock prefix"></i>
                                        <input type="password" id="modalLRInput11" name="password" class="form-control form-control-sm validate" required>
                                        <label data-error="wrong" data-success="right" for="modalLRInput11"> password</label>
                                    </div>
                                    <div class="text-center mt-2">
                                        <button type="submit" name="login" class="btn btn-info">Log in <i class="fas fa-sign-in-alt"></i></button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!--/.Panel 7-->
                    </div>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login / Register Form-->

    <div class="modal fade" id="findMySeatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">FIND MY SEAT</h4>
                </div>
                <form method="post" action="index.php">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" name="usn" id="defaultForm-usn" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-usn">Enter USN</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="findSeat" class="btn btn-primary">SEARCH <i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="findMySubjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">MY APPLIED SUBJECTS</h4>
                </div>
                <form method="post" action="index.php">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" name="usn" id="defaultForm-usn" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-usn">Enter USN</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="findSubject" class="btn btn-primary">SEARCH <i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="timeTableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">TIME TABLE</h4>
                </div>
                <form method="POST" action="index.php">
                    <div class="modal-body mx-5">
                        <div class="md-form mb-5">
                            <h4>Select Scheme: </h4>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="scheme" id="scheme1" value="15" checked>15 &nbsp;
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="scheme" id="scheme2" value="17">17 &nbsp;
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="scheme" id="scheme3" value="18">18 &nbsp;
                            </div>
                        </div>

                        <div class="md-form mb-5">
                            <h4>Select Year: </h4>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="year" id="year1" value="1" checked>1<sup>st</sup> &nbsp;
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="year" id="year2" value="2">2<sup>nd</sup> &nbsp;
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="year" id="year3" value="3">3<sup>rd</sup> &nbsp;
                            </div> 
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="year" id="year4" value="4">4<sup>th</sup> &nbsp;
                            </div>
                        </div>             
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="timeTable" class="btn btn-primary">Go <i class="fas fa-search"></i></button>
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