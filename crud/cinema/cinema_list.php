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


$result = mysqli_query($mysqli, "SELECT * FROM cinema");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="./css/datatables.css">


    <title>Online Movie Book</title>
</head>

<body>
    <center>
        <h1> Manage Cinema</h1>
        <h3 style="margin-bottom: 50px;">Online Movie Ticket Booking System</h3><br>
        <h5><a href="./addcinema.php" style="margin-top:0 ;">ADD NEW CINEMA!</a></h5>
    </center>

    <?php
    $query = "SELECT * FROM cinema";

    ?>


    <table class="datatable">
        <thead>
            <th> ID </th>
            <th> Name </th>
            <th> City </th>
            <th> Capacity </th>
            <th> Occopied Seats</th>
            <th> Free seats </th>
            <th> FUNCTIONS </th>
        </thead>

        <tbody>
            <?php
            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {

                    $id = $row["id"];
                    $name = $row["name"];
                    $city = $row["city"];
                    $capacity = $row["capacity"];
                    $current = $row["current"];
                    $free = $row["free"];


                    // $field5name = $row["col5"];

                    echo '<tr> 
                  <td>' . $id . '</td> 
                  <td>' . $name . '</td> 
                  <td>' . $city . '</td> 
                  <td style="word-break:break-word;table-layout: fixed;">' . $capacity . '</td> 
                  <td> ' . $current . '</td>  
                  <td>' . $free . '</td> 
                    
                    <td> 
                   <a class="fun" href="updatecinema.php?id=' . $id . '"> Update </a>
                    <a class="fun" href="deletecinema.php?id=' . $id . '" onclick=" confirm("do you want to delete Y/N")> Delete </a>
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