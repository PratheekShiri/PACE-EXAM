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

    <h3 style="text-align:center">Generated Seats</h3>
    <table class="table table-bordered" style="text-align:center;">
        <thead class="black white-text">
            <tr>
                <th scope="col">Room Number</th>
                <th scope="col">Seat Number</th>
                <th scope="col">USN</th>     
            </tr>
        </thead>
        <tbody>

            <?php

            include('connection.php');

            $query = "SELECT * FROM `generatedSeats` ORDER BY room_num, seat_number";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) {

                $SUSN = $row['SUSN'];
                $room_num = $row['room_num'];
                $seat_num = $row['seat_number'];

                echo '
                        <tr>               
                            <td>' . $room_num . '</td>
                            <td>' . $seat_num . '</td>
                            <td>' . $SUSN . '</td>
                        </tr>
            
                ';
            }

            ?></tbody><div style="text-align: center;">
        <button style="background-color: skyblue" id="printPageButton"   onclick="window.print();">Print</button></div>
    </table>
    <style>@media print{
        #printPageButton{display: none;}
    }</style>


        </script>

        


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