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

    $sql2 = "SELECT * FROM studentcountperday WHERE studentCount != 0";
    $studentCountPerDayResult = mysqli_query($conn, $sql2);

    echo '
        <h3 style="text-align:center">Deputy Chief Superintendent</h3><div style="text-align: center;">
        <button style="background-color: skyblue"    onclick="myFunction()">Print</button></div>
    
    <script> function myFunction(){
        window.print();
        }
        </script>

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
        $sql3 = "SELECT FL.name FROM facultylist AS FL, facultyallotment AS FA WHERE FA.date = $date AND FA.facultyId = FL.id";
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