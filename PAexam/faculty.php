<?php
include('connection.php');
session_start();

$facultyId = $_SESSION['facultyId'];

if (!isset($_SESSION['facultyId'])) {
    header('location:logout.php');
}

if (isset($_POST['change'])) {

    

    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if ($pass == $cpass) {
        $query = mysqli_query($conn, "UPDATE users SET password = '$pass' WHERE facultyId = '$facultyId'");

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Changed","Password updated successfully</b>","success");';
        echo '}, 500);</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { sweetAlert("<b>Oops...","The password did not match!...</b>","error");';
        echo '}, 500);</script>';
    }
}

if (isset($_POST['SLOT1'])) {
    $sqlSlot1 = mysqli_query($conn,"INSERT INTO facultySlots(`facultyId`, `slotNumber`)VALUES('$facultyId','SLOT1')");
    // if($sqlSlot1){
    //     echo '<script type="text/javascript">';
    //     echo 'setTimeout(function () { sweetAlert("<b>Changed","Password updated successfully</b>","success");';
    //     echo '}, 500);</script>';
    // }
}

if (isset($_POST['SLOT2'])) {
    $sql = mysqli_query($conn,"INSERT INTO facultySlots(`facultyId`, `slotNumber`)VALUES('$facultyId','SLOT2')");
    // if($sql){
    //     echo '<script type="text/javascript">';
    //     echo 'setTimeout(function () { sweetAlert("<b>Changed","Password updated successfully</b>","success");';
    //     echo '}, 500);</script>';
    // }
}

?>


<!doctype html>
<html>

<head>
    <title>Exam Seat Allotment | Faculty</title>
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
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
            <img src="assets/images/logo.jpg" height="60" width="60" style="border-radius:50%;" class="d-inline-block align-top" alt="mdb logo"> P.A. College of Engineering Mangaluru | Faculty
        </a>
        <a data-toggle="modal" data-target="#changePasswordModal" class="btn btn-light" style="color:black;">Change my password <i class="fas fa-exchange-alt"></i></a>
        <a class="btn btn-light" href="logout.php"> logout <i class="fas fa-sign-out-alt"></i></a>
    </nav>
    <?php
    include('connection.php');
    
    $sql0 = "SELECT * FROM facultylist WHERE facultyId = '$facultyId'";
    $sql0Result = mysqli_query($conn, $sql0);

    while ($sql0ResultRow = mysqli_fetch_array($sql0Result)) {  
        echo '
        <div class="alert alert-success" role="alert">
            <strong>Logged in as:</strong> '.$sql0ResultRow['name'].' ['.$facultyId.']
            </div>
        ';
        if($sql0ResultRow['status'] == '1'){
            
            $sql2 = "SELECT * FROM studentCountPerDay WHERE studentCount != 0";
            $studentCountPerDayResult = mysqli_query($conn, $sql2);

            echo '
                <h3 style="text-align:center">DCS Allocation Table</h3>
                <table class="table table-bordered" style="text-align:center;font-weight:bold;">
                    <thead class="black white-text">
                        <tr>
                            <th scope="col"> Date </th>
                            <th scope="col"> Student Count </th>
                            <th scope="col"> Faculty Name </th>
                        </tr>
                    </thead>
                    <tbody>
            ';

            while ($studentCountPerDayResultRow = mysqli_fetch_array($studentCountPerDayResult)) {
                $date = $studentCountPerDayResultRow['date'];
                $studentCount = $studentCountPerDayResultRow['studentCount'];
                echo '
                    <tr>
                        <td style="font-weight:bold;">' . substr($date,0,2).'-'.substr($date,2,2).'-'.substr($date,4,2).'</td>
                        <td style="font-weight:bold;">' . $studentCount . '</td>
                        <td style="font-weight:bold;">
                            <ul >

                ';
                $sql3 = "SELECT FL.name FROM facultylist AS FL, facultyAllotment AS FA WHERE FA.date = $date AND FA.facultyId = FL.id";
                $Result = mysqli_query($conn, $sql3);
                while ($ResultRow = mysqli_fetch_array($Result)) {
                    $facultyName = $ResultRow['name'];
                    echo '
                        <li>' . $facultyName . ' </li>

                    ';
                }
                echo '
                    </ul>
                    </td>
                    </tr>
                ';  
            }       
            echo '
                </tbody>
                </table>
                <br><br>
            ';
        }
        else if($sql0ResultRow['status'] == '0'){
            $exeSql1 = mysqli_query($conn, "SELECT EXISTS(SELECT * from facultySlots WHERE facultyId='$facultyId')");
            $rowSql1 = mysqli_fetch_array($exeSql1);

            $MaxSlot1Count = "SELECT * FROM generatedSlots WHERE slotNumber = 'SLOT1'";
            $MaxSlot1CountResult = mysqli_query($conn, $MaxSlot1Count);
            $CurrentSlot1Count = "SELECT * FROM facultySlots WHERE slotNumber = 'SLOT1'";
            $CurrentSlot1CountResult = mysqli_query($conn, $CurrentSlot1Count);

            $MaxSlot2Count = "SELECT * FROM generatedSlots WHERE slotNumber = 'SLOT2'";
            $MaxSlot2CountResult = mysqli_query($conn, $MaxSlot2Count);
            $CurrentSlot2Count = "SELECT * FROM facultySlots WHERE slotNumber = 'SLOT2'";
            $CurrentSlot2CountResult = mysqli_query($conn, $CurrentSlot2Count);

            $maxSlot1 = mysqli_num_rows($MaxSlot1CountResult);
            $currentSlot1 = mysqli_num_rows($CurrentSlot1CountResult);
            $maxSlot2 = mysqli_num_rows($MaxSlot2CountResult);
            $currentSlot2 = mysqli_num_rows($CurrentSlot2CountResult);

            if($rowSql1[0] == 1){
                echo '
                <div style="text-align:center;">
                <h3>Select Any One Slot For Your Exam Duty</h3> 
                <form method="POST" action="faculty.php">
                    <button type="submit" name="SLOT1" class="btn btn-warning btn-lg " disabled>Slot - 01</button>
                    <a data-toggle="modal" data-target="#Slot1Details" style="color:black;"><i class="fas fa-info-circle"style="font-size:25px;color:gray"></i></a>
                </form>
                <form method="POST" action="faculty.php">
                    <button type="submit" name="SLOT2" class="btn btn-warning btn-lg " disabled>Slot - 02</button>
                    <a data-toggle="modal" data-target="#Slot2Details" style="color:black;"><i class="fas fa-info-circle"style="font-size:25px;color:gray"></i></a>
                </form>
                </div>
                ';
            } else if($currentSlot1 >= $maxSlot1){
                echo '
                <div style="text-align:center;">
                <h3>Select Any One Slot For Your Exam Duty</h3> 
                <form method="POST" action="faculty.php">
                    <button type="submit" name="SLOT1" class="btn btn-warning btn-lg " disabled>Slot - 01</button>
                    <a data-toggle="modal" data-target="#Slot1Details" style="color:black;"><i class="fas fa-info-circle"style="font-size:25px;color:gray"></i></a>
                </form>
                <form method="POST" action="faculty.php">
                    <button type="submit" name="SLOT2" class="btn btn-warning btn-lg " >Slot - 02</button>
                    <a data-toggle="modal" data-target="#Slot2Details" style="color:black;"><i class="fas fa-info-circle"style="font-size:25px;color:gray"></i></a>
                </form>
                </div>
                ';
            } else if($currentSlot2 >= $maxSlot2){
                echo '
                <div style="text-align:center;">
                <h3>Select Any One Slot For Your Exam Duty</h3> 
                <form method="POST" action="faculty.php">
                    <button type="submit" name="SLOT1" class="btn btn-warning btn-lg " >Slot - 01</button>
                    <a data-toggle="modal" data-target="#Slot1Details" style="color:black;"><i class="fas fa-info-circle"style="font-size:25px;color:gray"></i></a>
                </form>
                <form method="POST" action="faculty.php">
                    <button type="submit" name="SLOT2" class="btn btn-warning btn-lg " disabled>Slot - 02</button>
                    <a data-toggle="modal" data-target="#Slot2Details" style="color:black;"><i class="fas fa-info-circle"style="font-size:25px;color:gray"></i></a>
                </form>
                </div>
                ';
            } 
            else {
                echo '
                <div style="text-align:center;">
                <h3>Select Any One Slot For Your Exam Duty</h3> 
                <form method="POST" action="faculty.php">
                    <button type="submit" name="SLOT1" class="btn btn-warning btn-lg ">Slot - 01</button>
                    <a data-toggle="modal" data-target="#Slot1Details" style="color:black;"><i class="fas fa-info-circle"style="font-size:25px;color:gray"></i></a>
                </form>
                <form method="POST" action="faculty.php">
                    <button type="submit" name="SLOT2" class="btn btn-warning btn-lg ">Slot - 02</button>
                    <a data-toggle="modal" data-target="#Slot2Details" style="color:black;"><i class="fas fa-info-circle"style="font-size:25px;color:gray"></i></a>
                </form>
                </div>
                ';
            }            
        }
        else {
            echo 'You are neither DCS nor Non-DCS';
        }
    }


    ?>

    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Change Password</h4>
                </div>
                <form method="post" action="faculty.php">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" name="pass" id="defaultForm-email" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Enter new password</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" name="cpass" id="defaultForm-pass" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">Confirm new password</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="change" class="btn btn-primary">Change <i class="fas fa-exchange-alt"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Slot1Details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <table class="table table-bordered" style="text-align:center;font-weight:bold;">
                    <thead class="black white-text">
                        <tr>
                            <th scope="col"> {SLOT - 01} EXAM DUTY DATES </th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                $sqlSlot1 = "SELECT * FROM generatedSlots WHERE slotNumber = 'SLOT1'";
                $sqlSlot1Result = mysqli_query($conn, $sqlSlot1);
                while ($sqlSlot1ResultRow = mysqli_fetch_array($sqlSlot1Result)) {
                    $date = $sqlSlot1ResultRow['date'];
                    echo '
                    <tr>
                    <td style="font-weight:bold;">' . substr($date,0,2).'-'.substr($date,2,2).'-'.substr($date,4,2).' ['.substr($date,6).']</td>
                    </tr>
                    ';
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Slot2Details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <table class="table table-bordered" style="text-align:center;font-weight:bold;">
                    <thead class="black white-text">
                        <tr>
                            <th scope="col"> {SLOT - 02} EXAM DUTY DATES </th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                $sqlSlot1 = "SELECT * FROM generatedSlots WHERE slotNumber = 'SLOT2'";
                $sqlSlot1Result = mysqli_query($conn, $sqlSlot1);
                while ($sqlSlot1ResultRow = mysqli_fetch_array($sqlSlot1Result)) {
                    $date = $sqlSlot1ResultRow['date'];
                    echo '
                    <tr>
                    <td style="font-weight:bold;">' . substr($date,0,2).'-'.substr($date,2,2).'-'.substr($date,4,2).' ['.substr($date,6).']</td>
                    </tr>
                    ';
                }
                ?>
                </tbody>
                </table>
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