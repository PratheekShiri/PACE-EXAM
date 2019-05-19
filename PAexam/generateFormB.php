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

    <img src="assets/images/vtulogo.jpg" height="100" width="100" style="border-radius:50%;  class="d-inline-block align-top" alt="mdb logo"> <h6 style="text-align:center; font-weight:bold; font-size:25px" > VISVESVARAYA TECHNOLOGICAL UNIVERSITY, BELAGAVI </h6>
    <h6 style="text-align:center; font-weight:bold">ATTENDANCE & ROOM SUPERINTENDENT S/ PRACTICAL EXAMINER S REPORT (In Triplicate) [FORM-B]</h6>
    <h6 style="text-align:center">B.E./ B.Arch./ M.B.A./ M.C.A./ M.Tech./ M.Arch/ Ph.D/ M.Sc.(Res) ____________________________________ Semester Examination <u style="color:lightgrey;">M M Y Y Y Y</u></h6>
    <h6> &nbsp &nbsp &nbsp &nbsp &nbsp &nbspBranch/ Title of the Course : ___________________________________________________________________________________</h6>

    <h6> &nbsp &nbsp &nbsp &nbsp &nbsp &nbspSubject : ___________________________________________________________________________________ Subject Code : <canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas><canvas id="mycanvas" width="25" height="25" style="border:1px solid black;"></canvas></h6>
    <h6> &nbsp &nbsp &nbsp &nbsp &nbsp &nbspCentre : ___________________________________________________________________________ USNs from ___________________ to ______________________</h6>
    <h6>&nbsp &nbsp &nbsp &nbsp &nbsp &nbspDate : __________________________ &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Time : _____________ to ________________<h6> 
    
    <table class="table table-bordered " style="text-align:center; color:black">
        <thead class=" black-text">
            <tr>
                <th scope="col" style="font-weight:bold">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp USN &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </th>
                <th scope="col" style="font-weight:bold">Booklet/Dwg. Sheet Number</th>
                <th scope="col" style="font-weight:bold">Signature</th>
                <th scope="col" style="font-weight:bold">Addl. booklet/Drawing/Graph Sheet Number</th>
                <th scope="col" style="font-weight:bold">Total</th>
            </tr>

            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>

            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
            <tr>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
                <th scope="col">  </th>
            </tr>
        </thead>
        <tbody>
        </table>
        <h6> &nbsp &nbsp  &nbsp  &nbsp &nbsp USNs (absentees) :_______________________________________________________________________________
         </h6>
        <h6> &nbsp &nbsp  &nbsp  &nbsp &nbsp USNs (candidates b/u malpractice) :_______________________________________________________________________________
        <h6 style="font-weight:bold;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp  <u>Room Superintendent / Examiner-i</u>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   <u> Examiner-ii</u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <u>Chief/Deputy Superintendent</u></h6>
         <p><h6> Signature: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp ____________________________________ &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp ____________________________________&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp____________________________________</h6></p>
        <p><h6> Name:&nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp ____________________________________ &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp ____________________________________&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp____________________________________</h6></p>
        <p><h6> Affiliation: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp ____________________________________ &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp ____________________________________&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp____________________________________</h6></p>
    
        <h6 >NOTE: ANSWER PAPER BUNDLES TO BE SENT TO REGIONAL OFFICE ONLY.</h6>
    <h6>1. Seperate sheet to be used for each subject. 2. Statement shall be sent to a)Regional Center, b)Registrar(Evaluation), c)Retained at the college.</h6>

    
                 

    
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