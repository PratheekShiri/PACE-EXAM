<?php

session_start();

if (!isset($_SESSION['adminId'])) {
    header('location:logout.php');
}

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
        <a class="btn btn-light" href="viewCSv.php"> back <i class="fas fa-arrow-circle-left"></i></a>
    </nav><br>

    <h3 style="text-align:center">Subject Name Details</h3>
    <table class="table table-bordered" style="text-align:center;">
        <thead class="black white-text">
            <tr>
                <th scope="col">Branch</th>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Names</th>
            </tr>
        </thead>
        <tbody>

            <?php

            include('connection.php');

            $query = "SELECT * FROM subjectname";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) {

                $branch = $row['branch'];
                $sub_code = $row['sub_code'];
                $sub_name = $row['sub_name'];

                echo '
                        <tr>
                            <td>' . $branch . '</td>
                            <td>' . $sub_code . '</td>
                            <td>' . $sub_name . '</td>
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