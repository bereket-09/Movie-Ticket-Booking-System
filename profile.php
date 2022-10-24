<?php

session_start();



if (!isset($_SESSION['username'])) {
    header("Location: ../welcome.php");
}



include './crud/includes/db.php';
include './crud/includes/functions.php';

if ($_SESSION['role']==0) {
    include './crud/theme/header_user.php'; 
}

if ($_SESSION['role'] == 1 ) {
    include './crud/theme/header.php'; 
}


$id = $_SESSION['id'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY profile</title>

    <link rel="stylesheet" type="text/css" href="./styles/datatables.css">
</head>

<?php
$query = "SELECT * FROM booking where uid=$id";

?>

<body>

    <center>
        <h1> MY TICKETS</h1>
        <h3 style="margin-bottom: 2px;">Online Movie Ticket Booking System</h3><br>

    </center>


    <center>
        <div class="user_profile" style="box-shadow:15px  ;background:dodgerblue; padding:15px; margin:50px;color:white    ">

            <h1>USER'S ACCOUNT </h1>
            <br><br>
            <table>
                <tr>
                    <td>
                        <lable>Name:</lable>
                    </td>
                    <td>
                        <?php echo $_SESSION['username']; ?></td>
                </tr>


                <tr>
                    <td>
                        <lable>Email:</lable>
                    </td>
                    <td>
                        <?php echo $_SESSION['email']; ?></td>
                </tr>

                <tr>
                    <td>
                        <lable>ROLE:</lable>
                    </td>

                    <td>
                        <?php if( $_SESSION['role']==0){
                                echo "NORMAL USER";
                        }
                        else{
                            echo "Administrator User";
                        } ?></td>
                </tr>
            </table>



        </div>
    </center>


    <center>
        <h5><a href="./movie.php" style="margin-top:0 ;">ADD MORE BOOKING!</a></h5>
    </center>

    <table class="datatable">
        <thead>
            <th> ID </th>
            <th> MOVIE NAME </th>
            <th> CINEMA NAME </th>
            <th> NUMBER OF SEATS </th>
            <th> TIME </th>
            <th> STATUS OF PAYMENT </th>
        </thead>

        <tbody>
            <?php
            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $mid = $row["mid"];
                    $cid = $row["cid"];
                    $seat = $row["Qty"];
                    $time = $row["time"];
                    $stat = "";
                    if ($row["status"] == 0) {

                        $stat = " UNPAID ";
                    } else {
                        $stat = " PAID ";
                    }


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
                  <td>' . $title['title'] . '</td> 
                  <td>' . $cname['name'] . '</td> 
                  <td>' . $seat . '</td> 
                  <td>' . $time . ':00 LT</td>  
                  <td>' . $stat . '</td> 
                    
                  </tr>';
                }
                $result->free();
            }


            ?>
        </tbody>
    </table>



</body>

<?php
include '/movie/crud/theme/footer-scripts.php'; 
?>

</html>