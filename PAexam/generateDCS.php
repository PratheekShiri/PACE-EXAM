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
    $truncatestudentCountPerDay = mysqli_query($conn,"TRUNCATE TABLE studentCountPerDay");
    $truncatefacultyAllotment = mysqli_query($conn,"TRUNCATE TABLE facultyAllotment");

    $sql1 = "SELECT * FROM calculateddata";
    $calculatedDataResult = mysqli_query($conn, $sql1);

    $previousDate = 0;
    $previousCount = 0;
    while ($calculatedDataRow = mysqli_fetch_array($calculatedDataResult)) {
        $date = $calculatedDataRow['date'];
        $date = substr($date,0,6); //chopping `A` & `M` from date
        $studentC1 = $calculatedDataRow['student1'];
        $studentC2 = $calculatedDataRow['student2'];
        
        if($date == $previousDate){

            $studentCount = $studentC1 + $studentC2 + $previousCount;

            $sql = mysqli_query($conn,"UPDATE studentCountPerDay SET studentCount = $studentCount WHERE date = $date");

        } else {

            $studentCount = $studentC1 + $studentC2;
            $previousCount = $studentCount;

            $sql = mysqli_query($conn,"INSERT INTO studentCountPerDay(`date`,`studentCount`)VALUES('$date','$studentCount')");
        
        }
        $previousDate = $date;
    }

    //reading available faculties and storing it in array `facultyList`
    $facultyList = array();
    $sql00 = "SELECT * FROM facultylist WHERE status = '1'";
    $facultyListResult = mysqli_query($conn, $sql00);
    
    while ($facultyListResultRow = mysqli_fetch_array($facultyListResult)) {
        array_push($facultyList,$facultyListResultRow['id']);
    }


    $sql01 = "SELECT * FROM studentCountPerDay WHERE studentCount != '0'";
    $studentCountResult = mysqli_query($conn, $sql01);
    $currentIndex = 0;
    $totalFacultyCount = count($facultyList);
    
    while ($studentCountResultRow = mysqli_fetch_array($studentCountResult)) {
        $studentCount = $studentCountResultRow['studentCount'];
        $date = $studentCountResultRow['date'];
        $requiredFacultyCount = ceil($studentCount/250);
        $x = 0;

        while($x < $requiredFacultyCount){

            if($currentIndex == $totalFacultyCount){
                $currentIndex=0;
            }

            $sql = mysqli_query($conn,"INSERT INTO facultyAllotment(`date`,`facultyCount`,`facultyId`)VALUES('$date','$requiredFacultyCount','$facultyList[$currentIndex]')");

            $currentIndex++;
            $x++;
        }
         
    }

    $sql2 = "SELECT * FROM studentCountPerDay WHERE studentCount != 0";
    $studentCountPerDayResult = mysqli_query($conn, $sql2);

    echo '
        <h3 style="text-align:center">Student Count Per Day</h3>
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
        // $facultyName = $studentCountPerDayResultRow['name'];
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
    ';

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