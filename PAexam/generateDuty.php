<?php

session_start();

if (!isset($_SESSION['adminId'])) {
    header('location:logout.php');
}

?>

<!doctype html>
<html>

<head>
    <title>Exam Seat Allotment | Admin</title>
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
            <img src="assets/images/logo.jpg" height="60" width="60" style="border-radius:50%;" class="d-inline-block align-top" alt="mdb logo"> P.A. College of Engineering Mangaluru | Admin
        </a>
        <a class="btn btn-light" href="admin.php"> back <i class="fas fa-arrow-circle-left"></i></a>
    </nav><br>

    <?php

    include('connection.php');

    // Truncate table before use
    $truncategeneratedSlots = mysqli_query($conn,"TRUNCATE TABLE generatedSlots");

    $sql3 = "SELECT * FROM facultylist AS FL WHERE FL.status = '0'";
    $sql3Result = mysqli_query($conn, $sql3);

    $sql2 = "SELECT * FROM facultySlots AS FS, facultylist AS FL WHERE FS.facultyId = FL.facultyId ORDER BY FS.slotNumber";
    $sql2Result = mysqli_query($conn, $sql2);

    echo '
    <h3 style="text-align:center">Current Status of Slots</h3>
    <table class="table table-bordered" style="text-align:center;">
        <thead class="black white-text">
            <tr>
                <th scope="col">Faculty ID</th>
                <th scope="col">Faculty Name</th>
                <th scope="col">Slot Number</th>
            </tr>
        </thead>
        <tbody>
    ';

    while ($sql2ResultRow = mysqli_fetch_array($sql2Result)) {
        $facultyId = $sql2ResultRow['facultyId'];
        $facultyName = $sql2ResultRow['name'];
        $slotNumber = $sql2ResultRow['slotNumber'];
        echo '
            <tr>
            <td style="font-weight:bold;">' . $facultyId . '</td>
            <td style="font-weight:bold;">' . $facultyName . '</td>
            <td style="font-weight:bold;">' . $slotNumber . '</td>
    
        ';
    }


    echo '
    </tbody> </table><br><br><br><br>
    ';

    
    $sql1 = "SELECT * FROM calculateddata WHERE student1 != 0 OR student2 != 0";
    $calculatedDataResult = mysqli_query($conn, $sql1);
    $rowByTwo = ceil(mysqli_num_rows($calculatedDataResult)/2);
    $counter = $rowByTwo;

    while ($calculatedDataResultRow = mysqli_fetch_array($calculatedDataResult)) {
        $date = $calculatedDataResultRow['date'];
        $sub1 = $calculatedDataResultRow['sub1'];
        $student1 = $calculatedDataResultRow['student1'];
        $sub2 = $calculatedDataResultRow['sub2'];
        $student2 = $calculatedDataResultRow['student2'];
        $slots = 0;
        $releiving = 0;
        if($student1 != 0) {
            $slots = ceil($student1/30);
            $releiving = ceil($slots/4);
        }
        if($student2 != 0){
            $slots = $slots + ceil($student2/30);
            $releiving = $releiving + ceil($slots/4); 
        }
        $totalSlots = $slots + $releiving;

        if($counter != 0){
            $sql = mysqli_query($conn,"INSERT INTO generatedSlots(`date`,`slotCount`,`slotNumber`)VALUES('$date','$totalSlots','SLOT1')");
            $counter--;
        } else {
            $sql = mysqli_query($conn,"INSERT INTO generatedSlots(`date`,`slotCount`,`slotNumber`)VALUES('$date','$totalSlots','SLOT2')");
        }

        
    }

    $sql2 = "SELECT * FROM generatedSlots";
    $generatedSlotsResult = mysqli_query($conn, $sql2);

    echo '
    <h3 style="text-align:center">Generated Slots</h3>
    <table class="table table-bordered" style="text-align:center;">
        <thead class="black white-text">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Slot Count</th>
                <th scope="col">Slot Number</th>
            </tr>
        </thead>
        <tbody>
    ';
    $totalSlotsGenerated = 0;
    while ($generatedSlotsResultRow = mysqli_fetch_array($generatedSlotsResult)) {
        $date = $generatedSlotsResultRow['date'];
        $slotCount = $generatedSlotsResultRow['slotCount'];
        $slotNumber = $generatedSlotsResultRow['slotNumber'];

        $totalSlotsGenerated = $totalSlotsGenerated + $slotCount;
        echo '
            <tr>
            <td style="font-weight:bold;">' . substr($date,0,2).'-'.substr($date,2,2).'-'.substr($date,4,2).' ['.substr($date,6).']</td>
            <td style="font-weight:bold;">' . $slotCount . '</td>
            <td style="font-weight:bold;">' . $slotNumber . '</td>
    
        ';
    }
    echo '
    </tbody> </table>
    ';


    $facultiesSelected = mysqli_num_rows($sql2Result);
    $dutyCount = mysqli_num_rows($calculatedDataResult);
    $pendingFaculty = mysqli_num_rows($sql3Result) - $facultiesSelected;
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { sweetAlert("<b>Summary","'.$dutyCount.' duties and '.$totalSlotsGenerated.' slots are generated.<br> '.$facultiesSelected.' faculties chose their slot.<br> '.$pendingFaculty.' faculties pending to select slot</b>");';
    echo '}, 500);</script>';

    ?>


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