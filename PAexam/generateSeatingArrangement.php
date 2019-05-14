<?php

session_start();

if (!isset($_SESSION['adminId'])) {
    header('location:logout.php');
}

if (isset($_POST['generate'])) {
    generateSeatingArrangement();
}

function generateSeatingArrangement() {
    include('connection.php');

    // Truncate table before use
    $truncategeneratedSeats = mysqli_query($conn,"TRUNCATE TABLE generatedSeats");

    $sub1 = mysqli_real_escape_string($conn, $_POST['sub1']);
    $sub2 = mysqli_real_escape_string($conn, $_POST['sub2']);

    if (!empty($sub2)) {
        $exeSub1 = mysqli_query($conn, "SELECT EXISTS(SELECT * from sub_code WHERE sub_code=$sub1)");
        $rowSub1 = mysqli_fetch_array($exeSub1);
        $exeSub2 = mysqli_query($conn, "SELECT EXISTS(SELECT * from sub_code WHERE sub_code=$sub2)");
        $rowSub2 = mysqli_fetch_array($exeSub2);
        // echo($rowSub1[0]); echo('==');echo($rowSub2[0]);
        $sub1 = 'S'.$sub1;
        $sub2 = 'S'.$sub2;      
        
        if($rowSub1[0] == 1 && $rowSub2[0] == 1){
            $UsnList = array();

            $sub3 = "SELECT SUSN FROM studentlist WHERE $sub1 = '1'";
            $sub3Result = mysqli_query($conn, $sub3);
            while ($sub3ResultRow = mysqli_fetch_array($sub3Result)) {
                array_push($UsnList,$sub3ResultRow['SUSN']);           
            }

            array_push($UsnList,'MIDDLE'); 

            $sub4 = "SELECT SUSN FROM studentlist WHERE $sub2 = '1'";
            $sub4Result = mysqli_query($conn, $sub4);
            while ($sub4ResultRow = mysqli_fetch_array($sub4Result)) {
                array_push($UsnList,$sub4ResultRow['SUSN']);           
            }

            $room = "SELECT room_num FROM room";
            $roomResult = mysqli_query($conn, $room);
            $RoomList = array();

            while ($roomResultRow = mysqli_fetch_array($roomResult)) {
                array_push($RoomList,$roomResultRow['room_num']);           
            }

            $odd = array('01','03','05','07','09','11','13','15','17','19','21','23','25','27','29');
            $even = array('02','04','06','08','10','12','14','16','18','20','22','24','26','28','30');

            // print_r($even);
            // print_r($odd);

            $currentUsnListIndex = 0;
            $currentRoomListIndex = 0;
            
            $currentRoomListIndex_ODD = 0;
            $currentRoomListIndex_EVEN = 0;

            $currentOddIndex = 0;
            $currentEvenIndex = 0;

            $seatNumber = 0;
            $previousBranch = 'NONE';
            $previousBranchState = 'ODD';  // ODD || EVEN

            while(($currentRoomListIndex_ODD < count($RoomList)) || ($currentRoomListIndex_EVEN < count($RoomList))){
                if($currentUsnListIndex < count($UsnList)){

                    if($UsnList[$currentUsnListIndex] == 'MIDDLE') {
                        $currentOddIndex = 0;
                        $currentEvenIndex = 0;

                        if($currentRoomListIndex_ODD >= $currentRoomListIndex_EVEN){
                            $currentRoomListIndex_ODD++;
                            $currentRoomListIndex_ODD = $currentRoomListIndex_ODD;
                            $currentRoomListIndex_EVEN = $currentRoomListIndex_ODD;
                        } else {
                            $currentRoomListIndex_EVEN++;
                            $currentRoomListIndex_ODD = $currentRoomListIndex_EVEN;
                            $currentRoomListIndex_EVEN = $currentRoomListIndex_EVEN;
                        } 

                        $currentUsnListIndex++;
                        $previousBranchState = 'ODD';
                        $previousBranch = 'NONE';
                    }

                    $currentBranch = substr($UsnList[$currentUsnListIndex],5,2);

                    if($currentOddIndex > 14){
                        $currentOddIndex = 0;
                        $currentRoomListIndex_ODD++;
                    }
                    if($currentEvenIndex > 14){
                        $currentEvenIndex = 0;
                        $currentRoomListIndex_EVEN++;
                    }          

                    if(($currentBranch != $previousBranch) && ($previousBranch == 'NONE') && ($previousBranchState == 'ODD')){
                        $seatNumber = $odd[$currentOddIndex];
                        $currentOddIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_ODD;

                    } else if(($currentBranch != $previousBranch) && ($previousBranch != 'NONE') && ($previousBranchState == 'ODD')){
                        $seatNumber = $even[$currentEvenIndex];
                        $currentEvenIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_EVEN;
                        $previousBranchState = 'EVEN';
                        
                    } else if(($currentBranch != $previousBranch) && ($previousBranchState == 'EVEN')) {
                        $seatNumber = $odd[$currentOddIndex];
                        $currentOddIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_ODD;
                        $previousBranchState = 'ODD';

                    } else if (($currentBranch == $previousBranch) && ($previousBranchState == 'EVEN') && ($previousBranch != 'NONE')) {
                        $seatNumber = $even[$currentEvenIndex];
                        $currentEvenIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_EVEN;
                    } else if (($currentBranch == $previousBranch) && ($previousBranchState == 'ODD') && ($previousBranch != 'NONE')) {
                        $seatNumber = $odd[$currentOddIndex];
                        $currentOddIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_ODD;
                    }


                    // echo('<br>Room Number: '.$RoomList[$currentRoomListIndex]);
                    // echo('<br>Seat Number: '.$seatNumber);
                    // echo('<br>USN: '.$UsnList[$currentUsnListIndex]);
                    // echo('<br>currentOddIndex: '.$currentOddIndex);
                    // echo('<br>currentEvenIndex: '.$currentEvenIndex);
                    // echo('<br>currentRoomListIndex_ODD: '.$currentRoomListIndex_ODD);
                    // echo('<br>currentRoomListIndex_EVEN: '.$currentRoomListIndex_EVEN);
                    // echo('<br>currentUsnListIndex: '.$currentUsnListIndex);
                    // echo('<hr>');

                    $sql = mysqli_query($conn,"INSERT INTO generatedSeats(`SUSN`,`room_num`,`seat_number`)VALUES('$UsnList[$currentUsnListIndex]','$RoomList[$currentRoomListIndex]','$seatNumber')");

                    $currentUsnListIndex++;
                    $previousBranch = $currentBranch;



                }else{
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("<b>Oops...! "," No Rooms Available.</b>");';
                    echo '}, 500);</script>';
                }

                if($currentUsnListIndex >= count($UsnList)){
                    // echo("All students are alloted");
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("<b>Success","Seating Arrangement is Generated!</b>");';
                    echo '}, 500);</script>';
                    break;
                }
            }

        } else {
            // echo($rowSub1[0]); echo('==');echo($rowSub2[0]);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("<b>Invalid Subject Code! "," Please check and try again.</b>");';
            echo '}, 500);</script>';
        }
    } else {
        $exeSub1 = mysqli_query($conn, "SELECT EXISTS(SELECT * from sub_code WHERE sub_code=$sub1)");
        $rowSub1 = mysqli_fetch_array($exeSub1);

        $sub1 = 'S'.$sub1;

        if($rowSub1[0] == 1){
            $sub3 = "SELECT SUSN FROM studentlist WHERE $sub1 = '1'";
            $sub3Result = mysqli_query($conn, $sub3);
            $UsnList = array();
            while ($sub3ResultRow = mysqli_fetch_array($sub3Result)) {
                array_push($UsnList,$sub3ResultRow['SUSN']);           
            }

            $room = "SELECT room_num FROM room";
            $roomResult = mysqli_query($conn, $room);
            $RoomList = array();
            while ($roomResultRow = mysqli_fetch_array($roomResult)) {
                array_push($RoomList,$roomResultRow['room_num']);           
            }

            $odd = array('01','03','05','07','09','11','13','15','17','19','21','23','25','27','29');
            $even = array('02','04','06','08','10','12','14','16','18','20','22','24','26','28','30');

            $currentUsnListIndex = 0;
            $currentRoomListIndex = 0;
            
            $currentRoomListIndex_ODD = 0;
            $currentRoomListIndex_EVEN = 0;

            $currentOddIndex = 0;
            $currentEvenIndex = 0;

            $seatNumber = 0;
            $previousBranch = 'NONE';
            $previousBranchState = 'ODD';  // ODD || EVEN

            while(($currentRoomListIndex_ODD < count($RoomList)) || ($currentRoomListIndex_EVEN < count($RoomList))){
                if($currentUsnListIndex < count($UsnList)){
                    $currentBranch = substr($UsnList[$currentUsnListIndex],5,2);

                    if($currentOddIndex > 14){
                        $currentOddIndex = 0;
                        $currentRoomListIndex_ODD++;
                    }
                    if($currentEvenIndex > 14){
                        $currentEvenIndex = 0;
                        $currentRoomListIndex_EVEN++;
                    }          

                    if(($currentBranch != $previousBranch) && ($previousBranch == 'NONE') && ($previousBranchState == 'ODD')){
                        $seatNumber = $odd[$currentOddIndex];
                        $currentOddIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_ODD;

                    } else if(($currentBranch != $previousBranch) && ($previousBranch != 'NONE') && ($previousBranchState == 'ODD')){
                        $seatNumber = $even[$currentEvenIndex];
                        $currentEvenIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_EVEN;
                        $previousBranchState = 'EVEN';
                        
                    } else if(($currentBranch != $previousBranch) && ($previousBranchState == 'EVEN')) {
                        $seatNumber = $odd[$currentOddIndex];
                        $currentOddIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_ODD;
                        $previousBranchState = 'ODD';

                    } else if (($currentBranch == $previousBranch) && ($previousBranchState == 'EVEN') && ($previousBranch != 'NONE')) {
                        $seatNumber = $even[$currentEvenIndex];
                        $currentEvenIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_EVEN;
                    } else if (($currentBranch == $previousBranch) && ($previousBranchState == 'ODD') && ($previousBranch != 'NONE')) {
                        $seatNumber = $odd[$currentOddIndex];
                        $currentOddIndex++;
                        $currentRoomListIndex = $currentRoomListIndex_ODD;
                    }

                    $sql = mysqli_query($conn,"INSERT INTO generatedSeats(`SUSN`,`room_num`,`seat_number`)VALUES('$UsnList[$currentUsnListIndex]','$RoomList[$currentRoomListIndex]','$seatNumber')");

                    $currentUsnListIndex++;
                    $previousBranch = $currentBranch;

                }else{
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("<b>Oops...! "," No Rooms Available.</b>");';
                    echo '}, 500);</script>';
                }

                if($currentUsnListIndex >= count($UsnList)){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { sweetAlert("<b>Success","Seating Arrangement is Generated!</b>");';
                    echo '}, 500);</script>';
                    break;
                }
            }

        } else {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { sweetAlert("<b>Invalid Subject Code! "," Please check and try again.</b>");';
            echo '}, 500);</script>';
        }

    }

    // echo '<script type="text/javascript">';
    // echo 'setTimeout(function () { sweetAlert("<b>Success","Seating Arrangement is Generated!</b>");';
    // echo '}, 500);</script>';
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

    <!-- <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
        <div class="form-area">
        <form role="form" action="generateSeatingArrangement.php" method="POST">
        <br style="clear: both">
        <h2 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Seating Arrangement Generation </h2><br>

        <div class="form-group">
            <input type="text" class="form-control" id="sub1" name="sub1" placeholder="Enter Subject1 Code" required autofocus="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="sub2" name="sub2" placeholder="Enter Subject2 Code">
        </div>

        <button type="button" id="generate" name="generate" class="btn btn-primary pull-right"> Generate</button> 

        </form>
    </div>
    </div>
    </div> -->
    <div class="col-md-5" style="float: none; margin: 0 auto;">    
    <form method="post" action="generateSeatingArrangement.php">
        <div class="modal-body mb-1">
            <div class="md-form form-sm mb-5">
                <i class="fas fa-book prefix"></i>
                <input type="text" id="modalLRInput10" name="sub1" class="form-control form-control-sm validate" required>
                <label data-error="wrong" data-success="right" for="modalLRInput10">Enter Subject1 Code</label>
            </div>

            <div class="md-form form-sm mb-4">
                <i class="fas fa-book prefix"></i>
                <input type="text" id="modalLRInput11" name="sub2" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="modalLRInput11"> Enter Subject2 Code</label>
                </div>
            <div class="text-center mt-2">
                <button type="submit" name="generate" class="btn btn-info">Generate <i class="fas fa-arrow-alt-circle-right"></i></button>
            </div>
        </div>

    </form>
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