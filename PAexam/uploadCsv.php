<?php

session_start();

if (!isset($_SESSION['adminId'])) {
    header('location:logout.php');
}

if (isset($_POST['tt'])) {
    upload_time_table();
}

if (isset($_POST['sl'])) {
    upload_student_list();
}

if (isset($_POST['rd'])) {
    upload_room_details();
}

if (isset($_POST['fd'])) {
    upload_faculty_details();
}

if (isset($_POST['sc'])) {
    upload_subject_code();
}

function upload_time_table()
{

    include('connection.php');

    if (isset($_FILES['timeTable'])) {
        $file_name = $_FILES['timeTable']['name'];
    }

    $handle = fopen('csv/' . $file_name, "r");
    $i = 0;
    while (($row = fgetcsv($handle, 1000, ",")) != false) {
        $table = rtrim($_FILES['timeTable']['name'], ".csv");
        if ($i == 0) {

            $id = $row[0];
            $date = $row[1];
            $sub1 = $row[2];
            $sub2 = $row[3];

            $query = "CREATE TABLE IF NOT EXISTS $table ($id int primary key ,$date varchar(255),$sub1 varchar(255),$sub2 varchar(255))";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("<b>Uploaded","Time table details uploaded successfully</b>","success");';
                echo '}, 500);</script>';
            }
        } else {
            $sql = "INSERT INTO $table ($id,$date,$sub1,$sub2)VALUES('$row[0]','$row[1]','$row[2]','$row[3]')";
            mysqli_query($conn, $sql);
        }
        $i++;
    }
}

function upload_student_list()
{
    include('connection.php');

    if (isset($_FILES['studentList'])) {
        $file_name = $_FILES['studentList']['name'];
    }

    $handle = fopen('csv/' . $file_name, "r");
    $i = 0;
    while (($row = fgetcsv($handle, 1000, ",")) != false) {
        $table = rtrim($_FILES['studentList']['name'], ".csv");
        if ($i == 0) {

            $id = "S".$row[0];
            $usn = "S".$row[1];
            $sub1 = "S".$row[2];
            $sub2 = "S".$row[3];
            $sub3 = "S".$row[4];
            $sub4 = "S".$row[5];
            $sub5 = "S".$row[6];
            $sub6 = "S".$row[7];
            $sub7 = "S".$row[8];
            $sub8 = "S".$row[9];
            $sub9 = "S".$row[10];
            $sub10 = "S".$row[11];
            $sub11 = "S".$row[12];
            $sub12 = "S".$row[13];
            $sub13 = "S".$row[14];
            $sub14 = "S".$row[15];
            $sub15 = "S".$row[16];
            $sub16 = "S".$row[17];
            $sub17 = "S".$row[18];
            $sub18 = "S".$row[19];
            $sub19 = "S".$row[20];
            $sub20 = "S".$row[21];
            $sub21 = "S".$row[22];
            $sub22 = "S".$row[23];
            $sub23 = "S".$row[24];
            $sub24 = "S".$row[25];
            $sub25 = "S".$row[26];
            $sub26 = "S".$row[27];
            $sub27 = "S".$row[28];
            $sub28 = "S".$row[29];
            $sub29 = "S".$row[30];
            $sub30 = "S".$row[31];
            $sub31 = "S".$row[32];
            $sub32 = "S".$row[33];
            $sub33 = "S".$row[34];
            $sub34 = "S".$row[35];
            $sub35 = "S".$row[36];
            $sub36 = "S".$row[37];
            $sub37 = "S".$row[38];
            $sub38 = "S".$row[39];
            $sub39 = "S".$row[40];
            $sub40 = "S".$row[41];
            $sub41 = "S".$row[42];
            $sub42 = "S".$row[43];
            $sub43 = "S".$row[44];
            $sub44 = "S".$row[45];
            $sub45 = "S".$row[46];
            $sub46 = "S".$row[47];
            $sub47 = "S".$row[48];
            $sub48 = "S".$row[49];
            $sub49 = "S".$row[50];
            $sub50 = "S".$row[51];
            $sub51 = "S".$row[52];
            $sub52 = "S".$row[53];
            $sub53 = "S".$row[54];
            $sub54 = "S".$row[55];
            $sub55 = "S".$row[56];
            $sub56 = "S".$row[57];
            $sub57 = "S".$row[58];
            $sub58 = "S".$row[59];
            $sub59 = "S".$row[60];
            $sub60 = "S".$row[61];
            $sub61 = "S".$row[62];
            $sub62 = "S".$row[63];
            $sub63 = "S".$row[64];
            $sub64 = "S".$row[65];
            $sub65 = "S".$row[66];
            $sub66 = "S".$row[67];
            $sub67 = "S".$row[68];
            $sub68 = "S".$row[69];
            $sub69 = "S".$row[70];
            $sub70 = "S".$row[71];
            $sub71 = "S".$row[72];
            $sub72 = "S".$row[73];
            $sub73 = "S".$row[74];
            $sub74 = "S".$row[75];
            $sub75 = "S".$row[76];
            $sub76 = "S".$row[77];
            $sub77 = "S".$row[78];
            $sub78 = "S".$row[79];
            $sub79 = "S".$row[80];
            $sub80 = "S".$row[81];
            $sub81 = "S".$row[82];
            $sub82 = "S".$row[83];
            $sub83 = "S".$row[84];
            $sub84 = "S".$row[85];
            $sub85 = "S".$row[86];
            $sub86 = "S".$row[87];
            $sub87 = "S".$row[88];
            $sub88 = "S".$row[89];
            $sub89 = "S".$row[90];
            $sub90 = "S".$row[91];
            $sub91 = "S".$row[92];
            $sub92 = "S".$row[93];
            $sub93 = "S".$row[94];
            $sub94 = "S".$row[95];
            $sub95 = "S".$row[96];
            $sub96 = "S".$row[97];
            $sub97 = "S".$row[98];
            $sub98 = "S".$row[99];
            $sub99 = "S".$row[100];
            $sub100 = "S".$row[101];
            $sub101 = "S".$row[102];
            $sub102= "S".$row[103];
            $sub103= "S".$row[104];
            $sub104= "S".$row[105];
            $sub105= "S".$row[106];
            $sub106= "S".$row[107];
            $sub107= "S".$row[108];
            $sub108= "S".$row[109];
            $sub109 = "S".$row[110];
            $sub110 = "S".$row[111];
            $sub111 = "S".$row[112];
            $sub112= "S".$row[113];
            $sub113= "S".$row[114];
            $sub114= "S".$row[115];
            $sub115 = "S".$row[116];
            $sub116= "S".$row[117];
            $sub117= "S".$row[118];
            $sub118= "S".$row[119];
            $sub119 = "S".$row[120];
            $sub120= "S".$row[121];
            $sub121 = "S".$row[122];
            $sub122 = "S".$row[123];
            $sub123 = "S".$row[124];
            $sub124 = "S".$row[125];
            $sub125 = "S".$row[126];
            $sub126 = "S".$row[127];
            $sub127 = "S".$row[128];
            $sub128 = "S".$row[129];
            $sub129 = "S".$row[130];
            $sub130 = "S".$row[131];
            $sub131 = "S".$row[132];
            $sub132 = "S".$row[133];

            $query = "CREATE TABLE IF NOT EXISTS $table ($id int primary key,$usn varchar(255),$sub1 varchar(10),$sub2 varchar(10),$sub3 varchar(10),$sub4 varchar(10),$sub5 varchar(10),$sub6 varchar(10),$sub7 varchar(10),$sub8 varchar(10),$sub9 varchar(10),$sub10 varchar(10),
                        $sub11 varchar(10),$sub12 varchar(10),$sub13 varchar(10),$sub14 varchar(10),$sub15 varchar(10),$sub16 varchar(10),$sub17 varchar(10),$sub18 varchar(10),$sub19 varchar(10),$sub20 varchar(10),
                        $sub21 varchar(10),$sub22 varchar(10),$sub23 varchar(10),$sub24 varchar(10),$sub25 varchar(10),$sub26 varchar(10),$sub27 varchar(10),$sub28 varchar(10),$sub29 varchar(10),$sub30 varchar(10),
                        $sub31 varchar(10),$sub32 varchar(10),$sub33 varchar(10),$sub34 varchar(10),$sub35 varchar(10),$sub36 varchar(10),$sub37 varchar(10),$sub38 varchar(10),$sub39 varchar(10),$sub40 varchar(10),
                        $sub41 varchar(10),$sub42 varchar(10),$sub43 varchar(10),$sub44 varchar(10),$sub45 varchar(10),$sub46 varchar(10),$sub47 varchar(10),$sub48 varchar(10),$sub49 varchar(10),$sub50 varchar(10),
                        $sub51 varchar(10),$sub52 varchar(10),$sub53 varchar(10),$sub54 varchar(10),$sub55 varchar(10),$sub56 varchar(10),$sub57 varchar(10),$sub58 varchar(10),$sub59 varchar(10),$sub60 varchar(10),
                        $sub61 varchar(10),$sub62 varchar(10),$sub63 varchar(10),$sub64 varchar(10),$sub65 varchar(10),$sub66 varchar(10),$sub67 varchar(10),$sub68 varchar(10),$sub69 varchar(10),$sub70 varchar(10),
                        $sub71 varchar(10),$sub72 varchar(10),$sub73 varchar(10),$sub74 varchar(10),$sub75 varchar(10),$sub76 varchar(10),$sub77 varchar(10),$sub78 varchar(10),$sub79 varchar(10),$sub80 varchar(10),
                        $sub81 varchar(10),$sub82 varchar(10),$sub83 varchar(10),$sub84 varchar(10),$sub85 varchar(10),$sub86 varchar(10),$sub87 varchar(10),$sub88 varchar(10),$sub89 varchar(10),$sub90 varchar(10),
                        $sub91 varchar(10),$sub92 varchar(10),$sub93 varchar(10),$sub94 varchar(10),$sub95 varchar(10),$sub96 varchar(10),$sub97 varchar(10),$sub98 varchar(10),$sub99 varchar(10),$sub100 varchar(10),
                        $sub101 varchar(10),$sub102 varchar(10),$sub103 varchar(10),$sub104 varchar(10),$sub105 varchar(10),$sub106 varchar(10),$sub107 varchar(10),$sub108 varchar(10),$sub109 varchar(10),$sub110 varchar(10),
                        $sub111 varchar(10),$sub112 varchar(10),$sub113 varchar(10),$sub114 varchar(10),$sub115 varchar(10),$sub116 varchar(10),$sub117 varchar(10),$sub118 varchar(10),$sub119 varchar(10),$sub120 varchar(10),
                        $sub121 varchar(10),$sub122 varchar(10),$sub123 varchar(10),$sub124 varchar(10),$sub125 varchar(10),$sub126 varchar(10),$sub127 varchar(10),$sub128 varchar(10),$sub129 varchar(10),$sub130 varchar(10),$sub131 varchar(10),$sub132 varchar(10))";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("<b>Uploaded","Student details uploaded successfully</b>","success");';
                echo '}, 500);</script>';
            }
        }
        else {
            $sql = "INSERT INTO $table ($id,$usn,$sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$sub7,$sub8,$sub9,$sub10,
                    $sub11,$sub12,$sub13,$sub14,$sub15,$sub16,$sub17,$sub18,$sub19,$sub20,
                    $sub21,$sub22,$sub23,$sub24,$sub25,$sub26,$sub27,$sub28,$sub29,$sub30,
                    $sub31,$sub32,$sub33,$sub34,$sub35,$sub36,$sub37,$sub38,$sub39,$sub40,
                    $sub41,$sub42,$sub43,$sub44,$sub45,$sub46,$sub47,$sub48,$sub49,$sub50,
                    $sub51,$sub52,$sub53,$sub54,$sub55,$sub56,$sub57,$sub58,$sub59,$sub60,
                    $sub61,$sub62,$sub63,$sub64,$sub65,$sub66,$sub67,$sub68,$sub69,$sub70,
                    $sub71,$sub72,$sub73,$sub74,$sub75,$sub76,$sub77,$sub78,$sub79,$sub80,
                    $sub81,$sub82,$sub83,$sub84,$sub85,$sub86,$sub87,$sub88,$sub89,$sub90,
                    $sub91,$sub92,$sub93,$sub94,$sub95,$sub96,$sub97,$sub98,$sub99,$sub100,
                    $sub101,$sub102,$sub103,$sub104,$sub105,$sub106,$sub107,$sub108,$sub109,$sub110,
                    $sub111,$sub112,$sub113,$sub114,$sub115,$sub116,$sub117,$sub118,$sub119,$sub120,
                    $sub121,$sub122,$sub123,$sub124,$sub125,$sub126,$sub127,$sub128,$sub129,$sub130,$sub131,$sub132)
                    VALUES('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]',
                    '$row[12]','$row[13]','$row[14]','$row[15]','$row[16]','$row[17]','$row[18]','$row[19]','$row[20]','$row[21]',
                    '$row[22]','$row[23]','$row[24]','$row[25]','$row[26]','$row[27]','$row[28]','$row[29]','$row[30]','$row[31]',
                    '$row[32]','$row[33]','$row[34]','$row[35]','$row[36]','$row[37]','$row[38]','$row[39]','$row[40]','$row[41]',
                    '$row[42]','$row[43]','$row[44]','$row[45]','$row[46]','$row[47]','$row[48]','$row[49]','$row[50]','$row[51]',
                    '$row[52]','$row[53]','$row[54]','$row[55]','$row[56]','$row[57]','$row[58]','$row[59]','$row[60]','$row[61]',
                    '$row[62]','$row[63]','$row[64]','$row[65]','$row[66]','$row[67]','$row[68]','$row[69]','$row[70]','$row[71]',
                    '$row[72]','$row[73]','$row[74]','$row[75]','$row[76]','$row[77]','$row[78]','$row[79]','$row[80]','$row[81]',
                    '$row[82]','$row[83]','$row[84]','$row[85]','$row[86]','$row[87]','$row[88]','$row[89]','$row[90]','$row[91]',
                    '$row[92]','$row[93]','$row[94]','$row[95]','$row[96]','$row[97]','$row[98]','$row[99]','$row[100]','$row[101]',
                    '$row[102]','$row[103]','$row[104]','$row[105]','$row[106]','$row[107]','$row[108]','$row[109]','$row[110]','$row[111]',
                    '$row[112]','$row[113]','$row[114]','$row[115]','$row[116]','$row[117]','$row[118]','$row[119]','$row[120]','$row[121]',
                    '$row[122]','$row[123]','$row[124]','$row[125]','$row[126]','$row[127]','$row[128]','$row[129]','$row[130]','$row[131]','$row[132]','$row[133]')";

            mysqli_query($conn, $sql);
        }
        $i++;
    }
}

function upload_room_details()
{

    include('connection.php');

    if (isset($_FILES['roomDetails'])) {
        $file_name = $_FILES['roomDetails']['name'];
    }

    $handle = fopen('csv/' . $file_name, "r");
    $i = 0;
    while (($row = fgetcsv($handle, 1000, ",")) != false) {
        $table = rtrim($_FILES['roomDetails']['name'], ".csv");
        if ($i == 0) {

            $id = $row[0];
            $room_num = $row[1];

            $query = "CREATE TABLE IF NOT EXISTS $table ($id int primary key ,$room_num varchar(10))";
            mysqli_query($conn, $query);

            if ($query) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("<b>Uploaded","Room details uploaded successfully</b>","success");';
                echo '}, 500);</script>';
            }
        } else {
            $sql = "INSERT INTO $table ($id,$room_num)VALUES('$row[0]','$row[1]')";
            mysqli_query($conn, $sql);
        }
        $i++;
    }
}

function upload_faculty_details()
{

    include('connection.php');

    if (isset($_FILES['faculyDetails'])) {
        $file_name = $_FILES['faculyDetails']['name'];
    }

    $handle = fopen('csv/' . $file_name, "r");
    $i = 0;
    while (($row = fgetcsv($handle, 1000, ",")) != false) {
        $table = rtrim($_FILES['faculyDetails']['name'], ".csv");
        if ($i == 0) {

            $id = $row[0];
            $name = $row[1];
            $facultyId = $row[2];
            $password = $row[3];
            $status = $row[4];

            $query = "CREATE TABLE IF NOT EXISTS $table ($id int primary key ,$name varchar(255),$facultyId varchar(20),$password varchar(20),$status int)";
            mysqli_query($conn, $query);

            if ($query) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("<b>Uploaded","Faculty details uploaded successfully</b>","success");';
                echo '}, 500);</script>';
            }
        } else {
            $sql = "INSERT INTO $table ($id,$name,$facultyId,$password,$status)VALUES('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]')";
            mysqli_query($conn, $sql);
        }
        $i++;
    }
}

function upload_subject_code()
{

    include('connection.php');

    if (isset($_FILES['subjectCode'])) {
        $file_name = $_FILES['subjectCode']['name'];
    }

    $handle = fopen('csv/' . $file_name, "r");
    $i = 0;
    while (($row = fgetcsv($handle, 1000, ",")) != false) {
        $table = rtrim($_FILES['subjectCode']['name'], ".csv");
        if ($i == 0) {

            $id = $row[0];
            $sub_code = $row[1];

            $query = "CREATE TABLE IF NOT EXISTS $table ($id int primary key ,$sub_code varchar(255))";
            mysqli_query($conn, $query);

            if ($query) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { sweetAlert("<b>Uploaded","Subject code uploaded successfully</b>","success");';
                echo '}, 500);</script>';
            }
        } else {
            $sql = "INSERT INTO $table ($id,$sub_code)VALUES('$row[0]','$row[1]')";
            mysqli_query($conn, $sql);
        }
        $i++;
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
                    <h2>Upload time table details</h2>
                    <form method="post" action="uploadCsv.php" enctype="multipart/form-data">
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="timeTable" required>
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="tt">upload <i class="fas fa-file-upload"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>Upload student details</h2>
                    <form method="post" action="uploadCsv.php" enctype="multipart/form-data">
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="studentList" required>
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="sl">upload <i class="fas fa-file-upload"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>Upload room details</h2>
                    <form method="post" action="uploadCsv.php" enctype="multipart/form-data">
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="roomDetails" required>
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="rd">upload <i class="fas fa-file-upload"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>Upload faculty details </h2>
                    <form method="post" action="uploadCsv.php" enctype="multipart/form-data">
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="faculyDetails" required>
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="fd">upload <i class="fas fa-file-upload"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron">
                    <h2>Upload Subject code </h2>
                    <form method="post" action="uploadCsv.php" enctype="multipart/form-data">
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="subjectCode" required>
                        <button type="submit" class="btn btn-primary btn-lg btn1" name="sc">upload <i class="fas fa-file-upload"></i></button>
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