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

    <h3 style="text-align:center">Student Details</h3>
    
    <table class="table table-bordered" style="text-align:center;">
        <thead class="black white-text">
            <tr>
                <th scope="col">id</th>
                <th scope="col">USN</th>
                <th scope="col">1581</th>
                <th scope="col">1582</th>
                <th scope="col">1583</th>
                <th scope="col">1571</th>
                <th scope="col">1572</th>
                <th scope="col">1573</th>
                <th scope="col">1574</th>
                <th scope="col">1575</th>
                <th scope="col">1561</th>
                <th scope="col">1562</th>
                <th scope="col">1563</th>
                <th scope="col">1564</th>
                <th scope="col">1565</th>
                <th scope="col">1566</th>
                <th scope="col">1551</th>
                <th scope="col">1552</th>
                <th scope="col">1553</th>
                <th scope="col">1554</th>
                <th scope="col">1555</th>
                <th scope="col">1556</th>
                <th scope="col">1541</th>
                <th scope="col">1542</th>
                <th scope="col">1543</th>
                <th scope="col">1544</th>
                <th scope="col">1545</th>
                <th scope="col">1546</th>
                <th scope="col">1531</th>
                <th scope="col">1532</th>
                <th scope="col">1533</th>
                <th scope="col">1534</th>
                <th scope="col">1535</th>
                <th scope="col">1536</th>
                <th scope="col">15M1</th>
                <th scope="col">15M2</th>
                <th scope="col">15PHY</th>
                <th scope="col">15CIV</th>
                <th scope="col">15EME</th>
                <th scope="col">15ELE</th>
                <th scope="col">15CPH</th>
                <th scope="col">15CHE</th>
                <th scope="col">15PCD</th>
                <th scope="col">15ELN</th>
                <th scope="col">15ENV</th>
                <th scope="col">1781</th>
                <th scope="col">1782</th>
                <th scope="col">1783</th>
                <th scope="col">1771</th>
                <th scope="col">1772</th>
                <th scope="col">1773</th>
                <th scope="col">1774</th>
                <th scope="col">1775</th>
                <th scope="col">1761</th>
                <th scope="col">1762</th>
                <th scope="col">1763</th>
                <th scope="col">1764</th>
                <th scope="col">1765</th>
                <th scope="col">1766</th>
                <th scope="col">1751</th>
                <th scope="col">1752</th>
                <th scope="col">1753</th>
                <th scope="col">1754</th>
                <th scope="col">1755</th>
                <th scope="col">1756</th>
                <th scope="col">1741</th>
                <th scope="col">1742</th>
                <th scope="col">1743</th>
                <th scope="col">1744</th>
                <th scope="col">1745</th>
                <th scope="col">1746</th>
                <th scope="col">1731</th>
                <th scope="col">1732</th>
                <th scope="col">1733</th>
                <th scope="col">1734</th>
                <th scope="col">1735</th>
                <th scope="col">1736</th>
                <th scope="col">17KAN</th>
                <th scope="col">17M1</th>
                <th scope="col">17M2</th>
                <th scope="col">17PHY</th>
                <th scope="col">17CIV</th>
                <th scope="col">17EME</th>
                <th scope="col">17ELE</th>
                <th scope="col">17CPH</th>
                <th scope="col">17CHE</th>
                <th scope="col">17PCD</th>
                <th scope="col">17ELN</th>
                <th scope="col">17ENV</th>
                <th scope="col">1881</th>
                <th scope="col">1882</th>
                <th scope="col">1883</th>
                <th scope="col">1871</th>
                <th scope="col">1872</th>
                <th scope="col">1873</th>
                <th scope="col">1874</th>
                <th scope="col">1875</th>
                <th scope="col">1861</th>
                <th scope="col">1862</th>
                <th scope="col">1863</th>
                <th scope="col">1864</th>
                <th scope="col">1865</th>
                <th scope="col">1866</th>
                <th scope="col">1851</th>
                <th scope="col">1852</th>
                <th scope="col">1853</th>
                <th scope="col">1854</th>
                <th scope="col">1855</th>
                <th scope="col">1856</th>
                <th scope="col">1841</th>
                <th scope="col">1842</th>
                <th scope="col">1843</th>
                <th scope="col">1844</th>
                <th scope="col">1845</th>
                <th scope="col">1846</th>
                <th scope="col">1831</th>
                <th scope="col">1832</th>
                <th scope="col">1833</th>
                <th scope="col">1834</th>
                <th scope="col">1835</th>
                <th scope="col">1836</th>
                <th scope="col">18KAN</th>
                <td scope="col">18M1</th>
                <th scope="col">18M2</th>
                <th scope="col">18EGH1</th>
                <th scope="col">18EGH2</th>
                <th scope="col">18PHY</th>
                <th scope="col">18ELE</th>
                <th scope="col">18CIV</th>
                <th scope="col">18EGDL</th>
                <th scope="col">18CHE</th>
                <th scope="col">18CPS</th>
                <th scope="col">18ELN</th>
                <th scope="col">18ME</th> 

            </tr>
        </thead>
        <tbody>

            <?php

            include('connection.php');

            $query = "SELECT * FROM studentlist";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) {

                $id =  $row['Sid'];
                $usn =  $row['SUSN'];
                $sub1 =  $row['S1581'];
                $sub2 =  $row['S1582'];
                $sub3 =  $row['S1583'];
                $sub4 =  $row['S1571'];
                $sub5 =  $row['S1572'];
                $sub6 =  $row['S1573'];
                $sub7 =  $row['S1574'];
                $sub8 =  $row['S1575'];
                $sub9 =  $row['S1561'];
                $sub10 =  $row['S1562'];
                $sub11 =  $row['S1563'];
                $sub12 =  $row['S1564'];
                $sub13 =  $row['S1565'];
                $sub14 =  $row['S1566'];
                $sub15 =  $row['S1551'];
                $sub16 =  $row['S1552'];
                $sub17 =  $row['S1553'];
                $sub18 =  $row['S1554'];
                $sub19 =  $row['S1555'];
                $sub20 =  $row['S1556'];
                $sub21 =  $row['S1541'];
                $sub22 =  $row['S1542'];
                $sub23 =  $row['S1543'];
                $sub24 =  $row['S1544'];
                $sub25 =  $row['S1545'];
                $sub26 =  $row['S1546'];
                $sub27 =  $row['S1531'];
                $sub28 =  $row['S1532'];
                $sub29 =  $row['S1533'];
                $sub30 =  $row['S1534'];
                $sub31 =  $row['S1535'];
                $sub32 =  $row['S1536'];
                $sub33 =  $row['S15M1'];
                $sub34 =  $row['S15M2'];
                $sub35 =  $row['S15PHY'];
                $sub36 =  $row['S15CIV'];
                $sub37 =  $row['S15EME'];
                $sub38 =  $row['S15ELE'];
                $sub39 =  $row['S15CPH'];
                $sub40 =  $row['S15CHE'];
                $sub41 =  $row['S15PCD'];
                $sub42 =  $row['S15ELN'];
                $sub43 =  $row['S15ENV'];
                $sub44 =  $row['S1781'];
                $sub45 =  $row['S1782'];
                $sub46 =  $row['S1783'];
                $sub47 =  $row['S1771'];
                $sub48 =  $row['S1772'];
                $sub49 =  $row['S1773'];
                $sub50 =  $row['S1774'];
                $sub51 =  $row['S1775'];
                $sub52 =  $row['S1761'];
                $sub53 =  $row['S1762'];
                $sub54 =  $row['S1763'];
                $sub55 =  $row['S1764'];
                $sub56 =  $row['S1765'];
                $sub57  =  $row['S1766'];
                $sub58 =  $row['S1751'];
                $sub59 =  $row['S1752'];
                $sub60 =  $row['S1753'];
                $sub61 =  $row['S1754'];
                $sub62 =  $row['S1755'];
                $sub63 =  $row['S1756'];
                $sub64 =  $row['S1741'];
                $sub65 =  $row['S1742'];
                $sub66 =  $row['S1743'];
                $sub67 =  $row['S1744'];
                $sub68 =  $row['S1745'];
                $sub69 =  $row['S1746'];
                $sub70 =  $row['S1731'];
                $sub71 =  $row['S1732'];
                $sub72 =  $row['S1733'];
                $sub73 =  $row['S1734'];
                $sub74 =  $row['S1735'];
                $sub75 =  $row['S1736'];
                $sub76 =  $row['S17KAN'];
                $sub77 =  $row['S17M1'];
                $sub78 =  $row['S17M2'];
                $sub79 =  $row['S17PHY'];
                $sub80 =  $row['S17CIV'];
                $sub81 =  $row['S17EME'];
                $sub82 =  $row['S17ELE'];
                $sub83 =  $row['S17CPH'];
                $sub84 =  $row['S17CHE'];
                $sub85 =  $row['S17PCD'];
                $sub86 =  $row['S17ELN'];
                $sub87 =  $row['S17ENV'];
                $sub88 =  $row['S1881'];
                $sub89 =  $row['S1882'];
                $sub90 =  $row['S1883'];
                $sub91 =  $row['S1871'];
                $sub92 =  $row['S1872'];
                $sub93 =  $row['S1873'];
                $sub94 =  $row['S1874'];
                $sub95 =  $row['S1875'];
                $sub96 =  $row['S1861'];
                $sub97 =  $row['S1862'];
                $sub98 =  $row['S1863'];
                $sub99 =  $row['S1864'];
                $sub100 =  $row['S1865'];
                $sub101 =  $row['S1866'];
                $sub102 =  $row['S1851'];
                $sub103 =  $row['S1852'];
                $sub104 =  $row['S1853'];
                $sub105 =  $row['S1854'];
                $sub106 =  $row['S1855'];
                $sub107 =  $row['S1856'];
                $sub108 =  $row['S1841'];
                $sub109 =  $row['S1842'];
                $sub110 =  $row['S1843'];
                $sub111 =  $row['S1844'];
                $sub112 =  $row['S1845'];
                $sub113 =  $row['S1846'];
                $sub114 =  $row['S1831'];
                $sub115 =  $row['S1832'];
                $sub116 =  $row['S1833'];
                $sub117 =  $row['S1834'];
                $sub118 =  $row['S1835'];
                $sub119 =  $row['S1836'];
                $sub120 =  $row['S18KAN'];
                $sub121 =  $row['S18M1'];
                $sub122 =  $row['S18M2'];
                $sub123 =  $row['S18EGH1'];
                $sub124 =  $row['S18EGH2'];
                $sub125 =  $row['S18PHY'];
                $sub126 =  $row['S18ELE'];
                $sub127 =  $row['S18CIV'];
                $sub128 =  $row['S18EGDL'];
                $sub129 =  $row['S18CHE'];
                $sub130 =  $row['S18CPS'];
                $sub131 = $row['S18ELN'];
                $sub132 = $row['S18ME'];

                echo '
                        <tr>
                            <td>' . $id . '</td>
                            <td>' . $usn . '</td>
                            <td>' . $sub1 . '</td>
                            <td>' . $sub2 . '</td>
                            <td>' . $sub3 . '</td>
                            <td>' . $sub4 . '</td>
                            <td>' . $sub5 . '</td>
                            <td>' . $sub6 . '</td>
                            <td>' . $sub7 . '</td>
                            <td>' . $sub8 . '</td>
                            <td>' . $sub9 . '</td>
                            <td>' . $sub10 . '</td>
                            <td>' . $sub11 . '</td>
                            <td>' . $sub12 . '</td>
                            <td>' . $sub13 . '</td>
                            <td>' . $sub14 . '</td>
                            <td>' . $sub15 . '</td>
                            <td>' . $sub16 . '</td>
                            <td>' . $sub17 . '</td>
                            <td>' . $sub18 . '</td>
                            <td>' . $sub19 . '</td>
                            <td>' . $sub20 . '</td>
                            <td>' . $sub21 . '</td>
                            <td>' . $sub22 . '</td>
                            <td>' . $sub23 . '</td>
                            <td>' . $sub24 . '</td>
                            <td>' . $sub25 . '</td>
                            <td>' . $sub26 . '</td>
                            <td>' . $sub27 . '</td>
                            <td>' . $sub28 . '</td>
                            <td>' . $sub29 . '</td>
                            <td>' . $sub30 . '</td>
                            <td>' . $sub31 . '</td>
                            <td>' . $sub32 . '</td>
                            <td>' . $sub33 . '</td>
                            <td>' . $sub34 . '</td>
                            <td>' . $sub35 . '</td>
                            <td>' . $sub36 . '</td>
                            <td>' . $sub37 . '</td>
                            <td>' . $sub38 . '</td>
                            <td>' . $sub39 . '</td>
                            <td>' . $sub40 . '</td>
                            <td>' . $sub41 . '</td>
                            <td>' . $sub42 . '</td>
                            <td>' . $sub43 . '</td>
                            <td>' . $sub44 . '</td>
                            <td>' . $sub45 . '</td>
                            <td>' . $sub46 . '</td>
                            <td>' . $sub47 . '</td>
                            <td>' . $sub48 . '</td>
                            <td>' . $sub49 . '</td>
                            <td>' . $sub50 . '</td>
                            <td>' . $sub51 . '</td>
                            <td>' . $sub52 . '</td>
                            <td>' . $sub53 . '</td>
                            <td>' . $sub54 . '</td>
                            <td>' . $sub55 . '</td>
                            <td>' . $sub56 . '</td>
                            <td>' . $sub57 . '</td>
                            <td>' . $sub58 . '</td>
                            <td>' . $sub59 . '</td>
                            <td>' . $sub60 . '</td>
                            <td>' . $sub61 . '</td>
                            <td>' . $sub62 . '</td>
                            <td>' . $sub63 . '</td>
                            <td>' . $sub64 . '</td>
                            <td>' . $sub65 . '</td>
                            <td>' . $sub66 . '</td>
                            <td>' . $sub67 . '</td>
                            <td>' . $sub68 . '</td>
                            <td>' . $sub69 . '</td>
                            <td>' . $sub70 . '</td>
                            <td>' . $sub71 . '</td>
                            <td>' . $sub72 . '</td>
                            <td>' . $sub73 . '</td>
                            <td>' . $sub74 . '</td>
                            <td>' . $sub75 . '</td>
                            <td>' . $sub76 . '</td>
                            <td>' . $sub77 . '</td>
                            <td>' . $sub78 . '</td>
                            <td>' . $sub79 . '</td>
                            <td>' . $sub80 . '</td>
                            <td>' . $sub81 . '</td>
                            <td>' . $sub82 . '</td>
                            <td>' . $sub83 . '</td>
                            <td>' . $sub84 . '</td>
                            <td>' . $sub85 . '</td>
                            <td>' . $sub86 . '</td>
                            <td>' . $sub87 . '</td>
                            <td>' . $sub88 . '</td>
                            <td>' . $sub89 . '</td>
                            <td>' . $sub90 . '</td>
                            <td>' . $sub91 . '</td>
                            <td>' . $sub92 . '</td>
                            <td>' . $sub93 . '</td>
                            <td>' . $sub94 . '</td>
                            <td>' . $sub95 . '</td>
                            <td>' . $sub96 . '</td>
                            <td>' . $sub97 . '</td>
                            <td>' . $sub98 . '</td>
                            <td>' . $sub99 . '</td>
                            <td>' . $sub100 . '</td>
                            <td>' . $sub101 . '</td>
                            <td>' . $sub102 . '</td>
                            <td>' . $sub103 . '</td>
                            <td>' . $sub104 . '</td>
                            <td>' . $sub105 . '</td>
                            <td>' . $sub106 . '</td>
                            <td>' . $sub107 . '</td>
                            <td>' . $sub108 . '</td>
                            <td>' . $sub109 . '</td>
                            <td>' . $sub110 . '</td>
                            <td>' . $sub111 . '</td>
                            <td>' . $sub112 . '</td>
                            <td>' . $sub113 . '</td>
                            <td>' . $sub114 . '</td>
                            <td>' . $sub115 . '</td>
                            <td>' . $sub116 . '</td>
                            <td>' . $sub117 . '</td>
                            <td>' . $sub118 . '</td>
                            <td>' . $sub119 . '</td>
                            <td>' . $sub120 . '</td>
                            <td>' . $sub121 . '</td>
                            <td>' . $sub122 . '</td>
                            <td>' . $sub123 . '</td>
                            <td>' . $sub124 . '</td>
                            <td>' . $sub125 . '</td>
                            <td>' . $sub126 . '</td>
                            <td>' . $sub127 . '</td>
                            <td>' . $sub128 . '</td>
                            <td>' . $sub129 . '</td>
                            <td>' . $sub130 . '</td>
                            <td>' . $sub131 . '</td>
                            <td>' . $sub132 . '</td>
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