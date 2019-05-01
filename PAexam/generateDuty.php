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

    echo '
                <h3 style="text-align:center">Generate Duty allotment</h3>
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

    $query = mysqli_query($conn, "SELECT * FROM calculateddata");

    $roomQuery = mysqli_query($conn, "SELECT * FROM room");
    $roomArray = array();

    while ($roomRow = mysqli_fetch_array($roomQuery)) {
        array_push($roomArray, $roomRow['room_num']);
    }

    $totalDutyForSub1 = 0;
    $totalDutyForSub2 = 0;

    while ($row = mysqli_fetch_array($query)) {

        $i = 0;

        $date = $row['date'];
        $sub1 = $row['sub1'];
        $sub1Count = $row['student1'];
        $sub2 = $row['sub2'];
        $sub2Count = $row['student2'];

        echo '
                <tr>
                    <td style="font-weight:bold;">' . substr($date,0,2).'-'.substr($date,2,2).'-'.substr($date,4,2).' ['.substr($date,6).']</td>
                    <td style="font-weight:bold;">' . $sub1 . '</td>';

        if ($sub1Count > 0) {
            $roomsToBeAlloted1 = ceil($sub1Count / 30);

            echo '<form method="post" action="generateDuty.php" class="form-check-inline">';
            echo '<td style="font-weight:bold;">';

            while ($roomsToBeAlloted1 != 0) {
                $totalDutyForSub1++;
                echo '<input type="radio" name="" value="" style="width:25px;height:25px;margin-left:15px;" disabled>' . $roomArray[$i++];
                $roomsToBeAlloted1--;
            }

            echo '</td>';
            echo '</form>';
        } else {
            echo '<td></td>';
        }

        echo '<td style="font-weight:bold ; ">' . $sub2 . ' </ td>';

        if ($sub2Count > 0) {
            $roomsToBeAlloted2 = ceil($sub2Count / 30);

            echo '<form method="post" action="generateDuty.php" class="form-check-inline">';
            echo '<td style="font-weight:bold;">';

            while ($roomsToBeAlloted2 != 0) {
                $totalDutyForSub2++;
                echo '<input type="radio" name="" value="" style="width:25px;height:25px;margin-left:15px;" disabled>' . $roomArray[$i++];
                $roomsToBeAlloted2--;
            }

            echo '</td>';
            echo '</form>';
        } else {
            echo '<td></td>';
        }
    }

    echo '      
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight:bold;">Total Duty = '.$totalDutyForSub1.' </td>
                    <td></td>
                    <td style="font-weight:bold;"> Total Duty = '.$totalDutyForSub2.'</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight:bold;">
                    <div class="custom-control custom-switch">
                        <form method="post" action="faculty.php">
                            <input type="checkbox" name="enable" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Enable/Disable</label>
                        </form>
                    </div>
                    </td>
                </tr>
                </tbody>
              </table>';

              $query = mysqli_query($conn,"SELECT * FROM facultylist WHERE status = '0' ");
              $countOfFaculties = mysqli_num_rows($query);

            //   echo $countOfFaculties;

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