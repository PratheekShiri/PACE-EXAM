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
            <img src="assets/images/logo.jpg" height="100" width="100" style="border-radius:50%;" class="d-inline-block align-top" alt="mdb logo"> P.A. College of Engineering Mangaluru | Admin
        </a>
        <a class="btn btn-light" href="admin.php"> back <i class="fas fa-arrow-circle-left"></i></a>
    </nav><br>


    <?php

    include('connection.php');


    //for external squad fellas i mean squad people from other colleges
    echo '
     </tbody><div style="text-align: center;">
        <button style="background-color: skyblue" id="printPageButton"   onclick="window.print();">Print</button></div>
    </table>
    <style>@media print{
        #printPageButton{display: none;}
    }</style>
    <script>
        var c= document.getElementById("mycanvas");
        var ctx=c.getContext("2d");
        ctx.rect(20, 20, 150, 100);
        ctx.stroke();
        </script>

    <img src="assets/images/vtulogo.jpg" height="80" width="80" style="border-radius:50%;  class="d-inline-block align-top" alt="mdb logo"> <h6 <h6 style="text-align:center; font-weight:bold; font-size:25px" > VISVESVARAYA TECHNOLOGICAL UNIVERSITY, BELAGAVI </h6>
    <h6 style="text-align:center; font-weight:bold">CONSOLIDATED ATTENDANCE REPORT & DESPATCH MEMO(In Triplicate) [FORM-A]</h6>
    <h6 style="text-align:center">B.E./ B.Arch./ M.B.A./ M.C.A./ M.Tech./ M.Sc.(Res)/ Ph.D____________________________________ Semester Examination <u style="color:lightgrey;">M M Y Y Y Y</u></h6>
    <h6 style="text-align:center">Branch/ Title of the Course : ______________________________________________ Centre : ______________________________________________</h6>
    <h6 style="text-align:center;">Subject : _________________________________________________________________________ Subject Code : <canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas></h6>
    <h6 style="text-align:center">Date : __________________________ &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspTime : _____________ to ________________<h6> 
    <h6> &nbsp &nbsp  &nbsp  Seat Numbers of the Candidate Present </h6>
    <h6 style="text-align:center;"><canvas id="mycanvas" width="1000" height="600" style="border:1px solid black;"></canvas></h6>
    <h6 style="font-weight:bold; text-align:center;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Total : </h6>
    <h6>  &nbsp &nbsp &nbsp Seat No. of the candidates booked under Malpractice : </h6>
    <h6>  &nbsp &nbsp &nbsp Seat No. of the candidates Absent  </h6>
    <h6 style="text-align:center;"><canvas id="mycanvas" width="1000" height="280" style="border:1px solid black;"></canvas></h6>
    <h6 style="font-weight:bold; text-align:center;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Total : </h6>
    <h6> &nbsp  &nbsp  &nbsp  Total number of answerbooks enclosed : _______________________ &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp    Total number of packets : __________________</h6>
    <h6 style="font-weight:bold;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <u>Deputy Chief Superintendent</u>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp   <u> Chief Superintendent</u></h6>

    <p><h6> Signature with date : &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp ____________________________________ &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ____________________________________</h6></p>
    <p><h6> Name : &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp ____________________________________ &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ____________________________________</h6></p>
    <h6 >NOTE: ANSWER PAPER BUNDLES TO BE SENT TO REGIONAL OFFICE ONLY.</h6>
    <h6>1. Seperate sheet to be used for each subject. 2. Statement shall be sent to a)Regional Center, b)Registrar(Evaluation), c)Retained at the college.</h6>


    

    
        ';

         //for principal or vice principal fellas
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