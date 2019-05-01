<?php

// if (!isset($_POST['facultyId'])) {
//     header('location:index.php');
// }

?>

<!doctype html>
<html>

<head>
    <title>Exam Seat Allotment</title>
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
        body {
            font-weight: bold;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <!-- Image and text -->
    <nav class="navbar navbar-dark primary-color">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo.jpg" height="60" width="60" style="border-radius:50%;" class="d-inline-block align-top" alt="mdb logo"> P.A. College of Engineering Mangaluru
        </a>
        <a class="btn btn-light" href="viewCsv.php"> back <i class="fas fa-arrow-circle-left"></i></a>
    </nav><br>

    <h3 style="text-align:center">Time Table Details</h3>
    <table class="table table-bordered" style="text-align:center;">
        <thead class="black white-text">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Subject1</th>
                <th scope="col">Subject2</th>
            </tr>
        </thead>
        <tbody>

            <?php

            include('connection.php');

            $query = "SELECT * FROM timetable";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) {

                $date = $row['date'];
                $sub1 = $row['s1'];
                $sub2 = $row['s2'];

                if ($sub1 == "") {
                    $sub1 = "-";
                }
        
                if ($sub2 == "") {
                    $sub2 = "-";
                }

                echo '
                        <tr>
                            <td>' . substr($date,0,2).'-'.substr($date,2,2).'-'.substr($date,4,2).' ['.substr($date,6).']</td>
                            <td>' . $sub1 . '</td>
                            <td>' . $sub2 . '</td>
                        </tr>
            
                ';
            }

            ?>

        </tbody>
    </table>


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