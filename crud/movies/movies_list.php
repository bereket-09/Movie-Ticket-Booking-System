<?php

include '../includes/functions.php';
include '../includes/db.php';
include '../theme/header.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /movie/login/index.php");
}

if ($_SESSION['role'] == 0) {
    header("Location: /movie/movie.php");
}


$result = mysqli_query($mysqli, "SELECT * FROM movies");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="./css/datatables.css">


    <title>Online Movie Booking | Manage movies</title>
</head>

<body>
    <center>
        <h1> Manage Movies</h1>
        <h3 style="margin-bottom: 50px;">Online Movie Ticket Booking System</h3><br>
    </center>

    <?php
    $query = "SELECT * FROM movies";

    ?>


    <table class="datatable">
        <thead>
            <th> ID </th>
            <th> Title </th>
            <th> Cover </th>
            <th> Details </th>
            <th> Duration </th>
            <th> Trailer </th>
            <th> FUNCTIONS </th>
        </thead>

        <tbody>
            <?php
            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {

                    $id = $row["id"];
                    $title = $row["title"];
                    $cover = $row["cover"];
                    $detail = $row["detail"];
                    $duration = $row["duration"];
                    $trailer = $row["trailer"];


                    // $field5name = $row["col5"];

                    echo '<tr> 
                  <td>' . $id . '</td> 
                  <td>' . $title . '</td> 
                  <td>' . $cover . '</td> 
                  <td style="word-break:break-word;table-layout: fixed;">' . $detail . '</td> 
                  <td> ' . $duration . '</td>  
                  <td><a class="" href="#">' . $trailer . '</a></td> 
                    
                    <td> 
                   <a class="fun" href="updatemovie.php?id=' . $id . '"> Update </a>
                    <a class="fun" href="deletemovie.php?id=' . $id . '" onclick=" confirm("do you want to delete Y/N")> Delete </a>
                    </td>
                  </tr>';
                }
                $result->free();
            }


            ?>
        </tbody>
    </table>




</body>

<?php include '../theme/footer-scripts.php'; ?>

</html>