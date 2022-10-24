<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../welcome.php");
}
if ($_SESSION['role'] == 0) {
    header("Location: /movie/movie.php");
}
?>


<?php

include 'includes/functions.php';
include 'theme/header.php'

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/datatables.css">


    <title>Online Movie Booking | Manage User Accounts</title>
</head>

<body>
    <!-- <img src="/Assets/images/avatar.png" alt=""> -->
    <center>
        <h1>Online Movie Ticket Booking System</h1>
        <h3 style="margin-bottom: 50px;">Manage User Accounts</h3>
    </center>
    <?php
    $query = "SELECT * FROM users";

    ?>

    <table class="datatable">
        <thead>
            <th> ID </th>
            <th> Name </th>
            <th> EMail </th>
            <th> PASSWORD </th>
            <th> User Roles </th>
            <th> FUNCTIONS </th>
        </thead>

        <tbody>
            <?php
            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $username = $row["username"];
                    $email = $row["email"];
                    $password = $row["passwords"];
                    if ($row['role'] == 0) {
                        $role = "Normal User";
                    } else {
                        $role = "Administrator";
                    }
                    // $field5name = $row["col5"];

                    if ($row['id'] == $_SESSION['id']) continue;
                    echo '<tr> 
                  <td>' . $id . '</td> 
                  <td>' . $username . '</td> 
                  <td>' . $email . '</td> 
                  <td>' . $password . '</td>  
                   <td>' . $role . '</td>  
                    <td>
                     
                   <a class="fun" href="update.php?id=' . $id . '&role=' . $row['role'] . '"> Update </a>
                    <a class="fun" href="delete.php?id=' . $id . '"> Delete </a>
                    </td>
                  </tr>';
                }
                $result->free();
            }


            ?>
        </tbody>
    </table>

    <?php include './theme/footer-scripts.php'; ?>
</body>

</html>