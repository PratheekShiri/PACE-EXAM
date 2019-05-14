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


    // Truncate tables before use
    $truncateCountOfStudents = mysqli_query($conn,"TRUNCATE TABLE countofstudents");
    $truncateCalculateddata = mysqli_query($conn,"TRUNCATE TABLE calculateddata");
    $truncatefacultyDuty = mysqli_query($conn,"TRUNCATE TABLE facultyDuty");
    $truncategeneratedslots = mysqli_query($conn,"TRUNCATE TABLE generatedslots");
    $truncatefacultyslots = mysqli_query($conn,"TRUNCATE TABLE facultyslots");
    
    

    $sub1C = 0;
    $sub2C = 0;
    $sub3C = 0;
    $sub4C = 0;
    $sub5C = 0;
    $sub6C = 0;
    $sub7C = 0;
    $sub8C = 0;
    $sub9C = 0;
    $sub10C = 0;
    $sub11C = 0;
    $sub12C = 0;
    $sub13C = 0;
    $sub14C = 0;
    $sub15C = 0;
    $sub16C = 0;
    $sub17C = 0;
    $sub18C = 0;
    $sub19C = 0;
    $sub20C = 0;
    $sub21C = 0;
    $sub22C = 0;
    $sub23C = 0;
    $sub24C = 0;
    $sub25C = 0;
    $sub26C = 0;
    $sub27C = 0;
    $sub28C = 0;
    $sub29C = 0;
    $sub30C = 0;
    $sub31C = 0;
    $sub32C = 0;
    $sub33C = 0;
    $sub34C = 0;
    $sub35C = 0;
    $sub36C = 0;
    $sub37C = 0;
    $sub38C = 0;
    $sub39C = 0;
    $sub40C = 0;
    $sub41C = 0;
    $sub42C = 0;
    $sub43C = 0;
    $sub44C = 0;
    $sub45C = 0;
    $sub46C = 0;
    $sub47C = 0;
    $sub48C = 0;
    $sub49C = 0;
    $sub50C = 0;
    $sub51C = 0;
    $sub52C = 0;
    $sub53C = 0;
    $sub54C = 0;
    $sub55C = 0;
    $sub56C = 0;
    $sub57C = 0;
    $sub58C = 0;
    $sub59C = 0;
    $sub60C = 0;
    $sub61C = 0;
    $sub62C = 0;
    $sub63C = 0;
    $sub64C = 0;
    $sub65C = 0;
    $sub66C = 0;
    $sub67C = 0;
    $sub68C = 0;
    $sub69C = 0;
    $sub70C = 0;
    $sub71C = 0;
    $sub72C = 0;
    $sub73C = 0;
    $sub74C = 0;
    $sub75C = 0;
    $sub76C = 0;
    $sub77C = 0;
    $sub78C = 0;
    $sub79C = 0;
    $sub80C = 0;
    $sub81C = 0;
    $sub82C = 0;
    $sub83C = 0;
    $sub84C = 0;
    $sub85C = 0;
    $sub86C = 0;
    $sub87C = 0;
    $sub88C = 0;
    $sub89C = 0;
    $sub90C = 0;
    $sub91C = 0;
    $sub92C = 0;
    $sub93C = 0;
    $sub94C = 0;
    $sub95C = 0;
    $sub96C = 0;
    $sub97C = 0;
    $sub98C = 0;
    $sub99C = 0;
    $sub100C = 0;
    $sub101C = 0;
    $sub102C =  0;
    $sub103C =  0;
    $sub104C =  0;
    $sub105C =  0;
    $sub106C =  0;
    $sub107C =  0;
    $sub108C =  0;
    $sub109C =  0;
    $sub110C =  0;
    $sub111C =  0;
    $sub112C =  0;
    $sub113C =  0;
    $sub114C =  0;
    $sub115C =  0;
    $sub116C =  0;
    $sub117C =  0;
    $sub118C =  0;
    $sub119C =  0;
    $sub120C =  0;
    $sub121C =  0;
    $sub122C =  0;
    $sub123C =  0;
    $sub124C =  0;
    $sub125C =  0;
    $sub126C =  0;
    $sub127C =  0;
    $sub128C =  0;
    $sub129C =  0;
    $sub130C =  0;
    $sub131C =  0;
    $sub132C = 0;

    $query = "SELECT * FROM studentlist ";
    $result2 = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result2)) {

        if ($rows['S1581'] == 1) {
            $sub1C++;
        }
        if ($rows['S1582'] == 1) {
            $sub2C++;
        }
        if ($rows['S1583'] == 1) {
            $sub3C++;
        }
        if ($rows['S1571'] == 1) {
            $sub4C++;
        }
        if ($rows['S1572'] == 1) {
            $sub5C++;
        }
        if ($rows['S1573'] == 1) {
            $sub6C++;
        }
        if ($rows['S1574'] == 1) {
            $sub7C++;
        }
        if ($rows['S1575'] == 1) {
            $sub8C++;
        }
        if ($rows['S1561'] == 1) {
            $sub9C++;
        }
        if ($rows['S1562'] == 1) {
            $sub10C++;
        }
        if ($rows['S1563'] == 1) {
            $sub11C++;
        }
        if ($rows['S1564'] == 1) {
            $sub12C++;
        }
        if ($rows['S1565'] == 1) {
            $sub13C++;
        }
        if ($rows['S1566'] == 1) {
            $sub14C++;
        }
        if ($rows['S1551'] == 1) {
            $sub15C++;
        }
        if ($rows['S1552'] == 1) {
            $sub16C++;
        }
        if ($rows['S1553'] == 1) {
            $sub17C++;
        }
        if ($rows['S1554'] == 1) {
            $sub18C++;
        }
        if ($rows['S1555'] == 1) {
            $sub19C++;
        }
        if ($rows['S1556'] == 1) {
            $sub20C++;
        }
        if ($rows['S1541'] == 1) {
            $sub21C++;
        }
        if ($rows['S1542'] == 1) {
            $sub22C++;
        }
        if ($rows['S1543'] == 1) {
            $sub23C++;
        }
        if ($rows['S1544'] == 1) {
            $sub24C++;
        }
        if ($rows['S1545'] == 1) {
            $sub25C++;
        }
        if ($rows['S1546'] == 1) {
            $sub26C++;
        }
        if ($rows['S1531'] == 1) {
            $sub27C++;
        }
        if ($rows['S1532'] == 1) {
            $sub28C++;
        }
        if ($rows['S1533'] == 1) {
            $sub29C++;
        }
        if ($rows['S1534'] == 1) {
            $sub30C++;
        }
        if ($rows['S1535'] == 1) {
            $sub31C++;
        }
        if ($rows['S1536'] == 1) {
            $sub32C++;
        }
        if ($rows['S15M1'] == 1) {
            $sub33C++;
        }
        if ($rows['S15M2'] == 1) {
            $sub34C++;
        }
        if ($rows['S15PHY'] == 1) {
            $sub35C++;
        }
        if ($rows['S15CIV'] == 1) {
            $sub36C++;
        }
        if ($rows['S15EME'] == 1) {
            $sub37C++;
        }
        if ($rows['S15ELE'] == 1) {
            $sub38C++;
        }
        if ($rows['S15CPH'] == 1) {
            $sub39C++;
        }
        if ($rows['S15CHE'] == 1) {
            $sub40C++;
        }
        if ($rows['S15PCD'] == 1) {
            $sub41C++;
        }
        if ($rows['S15ELN'] == 1) {
            $sub42C++;
        }
        if ($rows['S15ENV'] == 1) {
            $sub43C++;
        }
        if ($rows['S1781'] == 1) {
            $sub44C++;
        }
        if ($rows['S1782'] == 1) {
            $sub45C++;
        }
        if ($rows['S1783'] == 1) {
            $sub46C++;
        }
        if ($rows['S1771'] == 1) {
            $sub47C++;
        }
        if ($rows['S1772'] == 1) {
            $sub48C++;
        }
        if ($rows['S1773'] == 1) {
            $sub49C++;
        }
        if ($rows['S1774'] == 1) {
            $sub50C++;
        }
        if ($rows['S1775'] == 1) {
            $sub51C++;
        }
        if ($rows['S1761'] == 1) {
            $sub52C++;
        }
        if ($rows['S1762'] == 1) {
            $sub53C++;
        }
        if ($rows['S1763'] == 1) {
            $sub54C++;
        }
        if ($rows['S1764'] == 1) {
            $sub55C++;
        }
        if ($rows['S1765'] == 1) {
            $sub56C++;
        }
        if ($rows['S1766'] == 1) {
            $sub57C++;
        }
        if ($rows['S1751'] == 1) {
            $sub58C++;
        }
        if ($rows['S1752'] == 1) {
            $sub59C++;
        }
        if ($rows['S1753'] == 1) {
            $sub60C++;
        }
        if ($rows['S1754'] == 1) {
            $sub61C++;
        }
        if ($rows['S1755'] == 1) {
            $sub62C++;
        }
        if ($rows['S1756'] == 1) {
            $sub63C++;
        }
        if ($rows['S1741'] == 1) {
            $sub64C++;
        }
        if ($rows['S1742'] == 1) {
            $sub65C++;
        }
        if ($rows['S1743'] == 1) {
            $sub66C++;
        }
        if ($rows['S1744'] == 1) {
            $sub67C++;
        }
        if ($rows['S1745'] == 1) {
            $sub68C++;
        }
        if ($rows['S1746'] == 1) {
            $sub69C++;
        }
        if ($rows['S1731'] == 1) {
            $sub70C++;
        }
        if ($rows['S1732'] == 1) {
            $sub71C++;
        }
        if ($rows['S1733'] == 1) {
            $sub72C++;
        }
        if ($rows['S1734'] == 1) {
            $sub73C++;
        }
        if ($rows['S1735'] == 1) {
            $sub74C++;
        }
        if ($rows['S1736'] == 1) {
            $sub75C++;
        }
        if ($rows['S17KAN'] == 1) {
            $sub76C++;
        }
        if ($rows['S17M1'] == 1) {
            $sub77C++;
        }
        if ($rows['S17M2'] == 1) {
            $sub78C++;
        }
        if ($rows['S17PHY'] == 1) {
            $sub79C++;
        }
        if ($rows['S17CIV'] == 1) {
            $sub80C++;
        }
        if ($rows['S17EME'] == 1) {
            $sub81C++;
        }
        if ($rows['S17ELE'] == 1) {
            $sub82C++;
        }
        if ($rows['S17CPH'] == 1) {
            $sub83C++;
        }
        if ($rows['S17CHE'] == 1) {
            $sub84C++;
        }
        if ($rows['S17PCD'] == 1) {
            $sub85C++;
        }
        if ($rows['S17ELN'] == 1) {
            $sub86C++;
        }
        if ($rows['S17ENV'] == 1) {
            $sub87C++;
        }
        if ($rows['S1881'] == 1) {
            $sub88C++;
        }
        if ($rows['S1882'] == 1) {
            $sub89C++;
        }
        if ($rows['S1883'] == 1) {
            $sub90C++;
        }
        if ($rows['S1871'] == 1) {
            $sub91C++;
        }
        if ($rows['S1872'] == 1) {
            $sub92C++;
        }
        if ($rows['S1873'] == 1) {
            $sub93C++;
        }
        if ($rows['S1874'] == 1) {
            $sub94C++;
        }
        if ($rows['S1875'] == 1) {
            $sub95C++;
        }
        if ($rows['S1861'] == 1) {
            $sub96C++;
        }
        if ($rows['S1862'] == 1) {
            $sub97C++;
        }
        if ($rows['S1863'] == 1) {
            $sub98C++;
        }
        if ($rows['S1864'] == 1) {
            $sub99C++;
        }
        if ($rows['S1865'] == 1) {
            $sub100C++;
        }
        if ($rows['S1866'] == 1) {
            $sub101C++;
        }
        if ($rows['S1851'] == 1) {
            $sub102C++;
        }
        if ($rows['S1852'] == 1) {
            $sub103C++;
        }
        if ($rows['S1853'] == 1) {
            $sub104C++;
        }
        if ($rows['S1854'] == 1) {
            $sub105C++;
        }
        if ($rows['S1855'] == 1) {
            $sub106C++;
        }
        if ($rows['S1856'] == 1) {
            $sub107C++;
        }
        if ($rows['S1841'] == 1) {
            $sub108C++;
        }
        if ($rows['S1842'] == 1) {
            $sub109C++;
        }
        if ($rows['S1843'] == 1) {
            $sub110C++;
        }
        if ($rows['S1844'] == 1) {
            $sub111C++;
        }
        if ($rows['S1845'] == 1) {
            $sub112C++;
        }
        if ($rows['S1846'] == 1) {
            $sub113C++;
        }
        if ($rows['S1831'] == 1) {
            $sub114C++;
        }
        if ($rows['S1832'] == 1) {
            $sub115C++;
        }
        if ($rows['S1833'] == 1) {
            $sub116C++;
        }
        if ($rows['S1834'] == 1) {
            $sub117C++;
        }
        if ($rows['S1835'] == 1) {
            $sub118C++;
        }
        if ($rows['S1836'] == 1) {
            $sub119C++;
        }
        if ($rows['S18KAN'] == 1) {
            $sub120C++;
        }
        if ($rows['S18M1'] == 1) {
            $sub121C++;
        }
        if ($rows['S18M2'] == 1) {
            $sub122C++;
        }
        if ($rows['S18EGH1'] == 1) {
            $sub123C++;
        }
        if ($rows['S18EGH2'] == 1) {
            $sub124C++;
        }
        if ($rows['S18PHY'] == 1) {
            $sub125C++;
        }
        if ($rows['S18ELE'] == 1) {
            $sub126C++;
        }
        if ($rows['S18CIV'] == 1) {
            $sub127C++;
        }
        if ($rows['S18EGDL'] == 1) {
            $sub128C++;
        }
        if ($rows['S18CHE'] == 1) {
            $sub129C++;
        }
        if ($rows['S18CPS'] == 1) {
            $sub130C++;
        }
        if ($rows['S18ELN'] == 1) {
            $sub131C++;
        }
        if ($rows['S18ME'] == 1) {
            $sub132C++;
        }
    }

    $countArray = array();

    array_push($countArray, $sub1C);
    array_push($countArray, $sub2C);
    array_push($countArray, $sub3C);
    array_push($countArray, $sub4C);
    array_push($countArray, $sub5C);
    array_push($countArray, $sub6C);
    array_push($countArray, $sub7C);
    array_push($countArray, $sub8C);
    array_push($countArray, $sub9C);
    array_push($countArray, $sub10C);
    array_push($countArray, $sub11C);
    array_push($countArray, $sub12C);
    array_push($countArray, $sub13C);
    array_push($countArray, $sub14C);
    array_push($countArray, $sub15C);
    array_push($countArray, $sub16C);
    array_push($countArray, $sub17C);
    array_push($countArray, $sub18C);
    array_push($countArray, $sub19C);
    array_push($countArray, $sub20C);
    array_push($countArray, $sub21C);
    array_push($countArray, $sub22C);
    array_push($countArray, $sub23C);
    array_push($countArray, $sub24C);
    array_push($countArray, $sub25C);
    array_push($countArray, $sub26C);
    array_push($countArray, $sub27C);
    array_push($countArray, $sub28C);
    array_push($countArray, $sub29C);
    array_push($countArray, $sub30C);
    array_push($countArray, $sub31C);
    array_push($countArray, $sub32C);
    array_push($countArray, $sub33C);
    array_push($countArray, $sub34C);
    array_push($countArray, $sub35C);
    array_push($countArray, $sub36C);
    array_push($countArray, $sub37C);
    array_push($countArray, $sub38C);
    array_push($countArray, $sub39C);
    array_push($countArray, $sub40C);
    array_push($countArray, $sub41C);
    array_push($countArray, $sub42C);
    array_push($countArray, $sub43C);
    array_push($countArray, $sub44C);
    array_push($countArray, $sub45C);
    array_push($countArray, $sub46C);
    array_push($countArray, $sub47C);
    array_push($countArray, $sub48C);
    array_push($countArray, $sub49C);
    array_push($countArray, $sub50C);
    array_push($countArray, $sub51C);
    array_push($countArray, $sub52C);
    array_push($countArray, $sub53C);
    array_push($countArray, $sub54C);
    array_push($countArray, $sub55C);
    array_push($countArray, $sub56C);
    array_push($countArray, $sub57C);
    array_push($countArray, $sub58C);
    array_push($countArray, $sub59C);
    array_push($countArray, $sub60C);
    array_push($countArray, $sub61C);
    array_push($countArray, $sub62C);
    array_push($countArray, $sub63C);
    array_push($countArray, $sub64C);
    array_push($countArray, $sub65C);
    array_push($countArray, $sub66C);
    array_push($countArray, $sub67C);
    array_push($countArray, $sub68C);
    array_push($countArray, $sub69C);
    array_push($countArray, $sub70C);
    array_push($countArray, $sub71C);
    array_push($countArray, $sub72C);
    array_push($countArray, $sub73C);
    array_push($countArray, $sub74C);
    array_push($countArray, $sub75C);
    array_push($countArray, $sub76C);
    array_push($countArray, $sub77C);
    array_push($countArray, $sub78C);
    array_push($countArray, $sub79C);
    array_push($countArray, $sub80C);
    array_push($countArray, $sub81C);
    array_push($countArray, $sub82C);
    array_push($countArray, $sub83C);
    array_push($countArray, $sub84C);
    array_push($countArray, $sub85C);
    array_push($countArray, $sub86C);
    array_push($countArray, $sub87C);
    array_push($countArray, $sub88C);
    array_push($countArray, $sub89C);
    array_push($countArray, $sub90C);
    array_push($countArray, $sub91C);
    array_push($countArray, $sub92C);
    array_push($countArray, $sub93C);
    array_push($countArray, $sub94C);
    array_push($countArray, $sub95C);
    array_push($countArray, $sub96C);
    array_push($countArray, $sub97C);
    array_push($countArray, $sub98C);
    array_push($countArray, $sub99C);
    array_push($countArray, $sub100C);
    array_push($countArray, $sub101C);
    array_push($countArray, $sub102C);
    array_push($countArray, $sub103C);
    array_push($countArray, $sub104C);
    array_push($countArray, $sub105C);
    array_push($countArray, $sub106C);
    array_push($countArray, $sub107C);
    array_push($countArray, $sub108C);
    array_push($countArray, $sub109C);
    array_push($countArray, $sub110C);
    array_push($countArray, $sub111C);
    array_push($countArray, $sub112C);
    array_push($countArray, $sub113C);
    array_push($countArray, $sub114C);
    array_push($countArray, $sub115C);
    array_push($countArray, $sub116C);
    array_push($countArray, $sub117C);
    array_push($countArray, $sub118C);
    array_push($countArray, $sub119C);
    array_push($countArray, $sub120C);
    array_push($countArray, $sub121C);
    array_push($countArray, $sub122C);
    array_push($countArray, $sub123C);
    array_push($countArray, $sub124C);
    array_push($countArray, $sub125C);
    array_push($countArray, $sub126C);
    array_push($countArray, $sub127C);
    array_push($countArray, $sub128C);
    array_push($countArray, $sub129C);
    array_push($countArray, $sub130C);
    array_push($countArray, $sub131C);
    array_push($countArray, $sub132C);

    $exe = mysqli_query($conn, "SELECT * FROM sub_code");

    $subArray = array();

    $i = 0;
    while ($row = mysqli_fetch_array($exe)) {

        $sub_code = $row['sub_code'];
        $count = $countArray[$i];

        $query = mysqli_query($conn, "INSERT INTO countofstudents(`sub_code`,`count`)VALUES('$sub_code','$count')");
        $i++;
    }

    $sql = "SELECT * FROM timetable";
    $timeTableResult = mysqli_query($conn, $sql);

    echo '
                <h3 style="text-align:center">No of students having exam</h3>
                <table class="table table-bordered" style="text-align:center;font-weight:bold;">
                    <thead class="black white-text">
                        <tr>
                            <th scope="col"> Date </th>
                            <th scope="col"> Subject1 </th>
                            <th scope="col"> No of students </th>
                            <th scope="col"> Subject2 </th>
                            <th scope="col"> No of students </th>
                        </tr>
                    </thead>
                    <tbody>';

    while ($timeTableRow = mysqli_fetch_array($timeTableResult)) {
        $count1 = 0;
        $count2 = 0;

        $date = $timeTableRow['date'];


        $sub1 = $timeTableRow['s1'];
        $sub2 = $timeTableRow['s2'];

        if($sub1 == "")
            $sub1 = "-";
        
        if($sub2 == "")
            $sub2 = "-";

        $sub1Count = 0;
        $sub2Count = 0;

        $sub1Result = mysqli_query($conn, "SELECT * FROM countofstudents WHERE sub_code='$sub1'");
        if (mysqli_num_rows($sub1Result) > 0) {
            $sub1Row = mysqli_fetch_assoc($sub1Result);
            $sub1Count = $sub1Row['count'];
        } 

        $sub2Result = mysqli_query($conn, "SELECT * FROM countofstudents WHERE sub_code='$sub2'");
        if (mysqli_num_rows($sub2Result) > 0) {
            $sub2Row = mysqli_fetch_assoc($sub2Result);
            $sub2Count = $sub2Row['count'];
        } 

        echo '
                            <tr>
                                <td style="font-weight:bold;">' . substr($date,0,2).'-'.substr($date,2,2).'-'.substr($date,4,2).' ['.substr($date,6).']</td>
                                <td style="font-weight:bold;">' . $sub1 . '</td>
                                <td style="font-weight:bold;">'.$sub1Count.'</td>
                                <td style="font-weight:bold;">' . $sub2 . '</td>
                                <td style="font-weight:bold;">'.$sub2Count.'</td>
                            </tr>
                
                    ';

                    $caluculatedDataQuery = mysqli_query($conn,"INSERT INTO calculateddata(`date`,`sub1`,`student1`,`sub2`,`student2`)VALUES('$date','$sub1','$sub1Count','$sub2',$sub2Count)");
    }

    echo '
            </tbody>
        </table>';

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