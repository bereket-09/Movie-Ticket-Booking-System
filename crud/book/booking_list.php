<?php

session_start();



if (!isset($_SESSION['username'])) {
    header("Location: ../welcome.php");
}
if ($_SESSION['role'] == 0) {
    header("Location: /movies/movie.php");
}

include '../includes/db.php';
include '../includes/functions.php';
include '../theme/header.php';
$id = $_SESSION['id'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage BOOKINGS</title>

    <link rel="stylesheet" type="text/css" href="datatables.css">
</head>

<?php
$query = "SELECT * FROM booking";

?>

<body>

    <center>
        <h1>ALL BOOKINGS</h1>
        <h3 style="margin-bottom: 20px;">Online Movie Ticket Booking System</h3><br>
        <h5><a href="/movie/movie.php" style="margin-top:0 ;">ADD MORE BOOKING!</a></h5>
    </center>


    <table class="datatable">
        <thead>
            <th> ID </th>
            <th> USER NAME </th>
            <th> MOVIE NAME </th>
            <th> CINEMA NAME </th>
            <th> NUMBER OF SEATS </th>
            <th> TIME </th>
            <th> STATUS OF PAYMENT </th>
            <th> CHANGE STATUS </th>
        </thead>

        <tbody>
            <?php
            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $user = $row['uid'];
                    $mid = $row["mid"];
                    $cid = $row["cid"];
                    $seat = $row["Qty"];
                    $time = $row["time"];
                    $current = $row["status"];
                    $stat = "";
                    if ($row["status"] == 0) {

                        $stat = "Upaid";
                    } else {
                        $stat = "Paid";
                    }


                    $query = "SELECT * FROM users where id=$user";
                    $users = mysqli_query($mysqli, $query);
                    $username = $users->fetch_assoc();


                    $query = "SELECT * FROM movies where id=$mid";
                    $movies = mysqli_query($mysqli, $query);
                    $title = $movies->fetch_assoc();

                    $query = "SELECT * FROM cinema where id=$cid";
                    $cinemas = mysqli_query($mysqli, $query);
                    $cname = $cinemas->fetch_assoc();

                    // $row["username"];
                    // $email = $row["email"];
                    // $password = $row["passwords"];
                    // $field5name = $row["col5"];

                    echo '<tr> 
                  <td>' . $id . '</td> 
                  <td>' . $username['username'] . '</td> 
                  <td>' . $title['title'] . '</td> 
                  <td>' . $cname['name'] . '</td> 
                  <td>' . $seat . ' Seats </td> 
                  <td>' . $time . ':00 LT </td>  
                  <td>' . $stat . '</td> 
                  <td>
                    <a class="fun" href="updatebook.php?id=' . $id . '"> Update Status </a>
                     <a class="fun" href="deletebooking.php?id=' . $id . '&cid=' . $cid . '&seat=' . $seat . '" onclick=" confirm("do you want to delete Y/N")> Delete </a>
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