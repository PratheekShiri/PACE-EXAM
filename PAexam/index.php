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
        <button type="button" class="btn btn-light">Find my seat <i class="fas fa-chair"></i></button>
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