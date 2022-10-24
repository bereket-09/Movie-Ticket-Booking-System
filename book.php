<?php

error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login/index.php");
}

include './crud/includes/functions.php';

$movie = selectSingle_movie($_GET['id']);

$get = mysqli_query($mysqli, "SELECT * FROM cinema");


if (isset($_POST['submit'])) {



    $name = $_SESSION['username'];
    $email = $_SESSION['email'];
    $uid = $_SESSION["id"];
    $cid = $_POST['cinema'];
    $mid = $movie['id'];
    $qty = $_POST['seats'];
    $times = $_POST['times'];
    $dates = $_POST['dates'];

    $query = "SELECT * FROM cinema where id=$cid";
    $cinemas = mysqli_query($mysqli, $query);
    $cname = $cinemas->fetch_assoc();
    $id = $cname['id'];
    $current = $cname['current'];
    $free = $cname['free'];

    
$sql= "INSERT INTO booking (uid,cid,mid,Qty,dates,time,status) VALUES ($uid,$cid,$mid,$qty,$dates,$times,0)";

$result=mysqli_query($mysqli,$sql);

    if (!$result) {

    
    }else{

      
        if($qty<=$free){
            $current=$current+$qty;
            $free=$free-$qty;
            $sql= "update cinema SET current=$current ,free=$free where id=$id";
            $res=mysqli_query($mysqli,$sql);
        }
        
        header('Location: /movie/profile.php');
    }

}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            display: flex;
            background: url(/movie/Assets/images/blank-bg.jpg);
        }

        .img {
            border-radius: 10px;
        }

        .img:hover {
            position: relative;
            top: -2em;

            /* height: 52vh; */
            /* width: 16vw; */
            box-shadow: 0 0 5px 2px #ee3e0d;
            border-radius: 25px;
        }

        .left {
            display: flex;
            padding: 15px;
            padding-top: 50px;
            margin-left: 35px;
            margin-right: 50px;
            width: 25%;
        }

        .right {
            margin-left: 15px;
            width: 100%;

        }

        .right .top_bar {
            background: #f4623a;
            color: white;
        }


        .right .bottom_bar {
            background: white;
            height: 60%;
        }

        input[type="submit"] {
            margin-left: 150px;
            margin-right: 35px;
            margin-bottom: 150px;
            padding-top: 15px;
            padding-bottom: 15px;
            border-radius: 20px;
            padding-left: 5px;
            padding-right: 5px;
            color: #fff;
            background-color: #f4623a;
            border-color: #f4623a;
        }

        input[type="submit"]:hover {
            box-shadow: 0 0 5px 2px #ee3e0d;
            border-radius: 25px;

        }

        .bottom_bar h3 {
            text-decoration: orangered;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: large;
        }

        b {
            color: dodgerblue;
        }

        em {
            color: orange;
        }

        table {
            margin-left: 100px;
        }
    </style>
</head>

<body>
    <div class="left">
        <img class="img" src="./crud/movies/images/<?php echo $movie['cover']  ?>" alt="<?php echo $movie['title'] ?>" width="250" height="350">
    </div>

    <div class="right">

        <div class="top_bar">
            <h1 style="padding-left: 100px;"><?php echo $movie['title'] ?></h1>
            <hr>
            <h2 style="padding-left: 50px;">Description : <i><?php echo $movie['detail'] ?></i></h2>
            <h4 style="padding-left: 50px;"> Duration :<?php echo $movie['duration'] ?></h4>
            <br>

        </div>

        <div class="bottom_bar">


            <form action="" method="post">
                <center>
                    <h2><b>BOOK YOUR SEAT HERE!</b></h2>
                </center>

                <table>

                    <tr>
                        <td>
                            <h3><em>Name of User :</em></h3>
                        </td>
                        <td>
                            <h3><?php echo $_SESSION['username'] ?></h3>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h3><em>Email Address :</em>

                            </h3>
                        </td>
                        <td>
                            <h3><?php echo $_SESSION['email'] ?></h3>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h3><em>Choose A Cinema :</em></h3>
                        </td>

                        <td>

                            <h3> <select class="cinema" name="cinema" style="width: 300px;padding:5px">

                                    <?php
                                    while ($row = mysqli_fetch_assoc($get)) {
                                    ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </h3>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <h3><em>Choose a Time you prefer:</em>
                        </td>
                        <td>
                            <h3>
                                <!-- <select class="times" style="width: 300px;padding:5px">

                                    <option value="8">8:00 LT</option>

                                    <option value="10">10:00 LT</option>

                                    <option value="12">12:00 LT</option>
                                </select> -->

                                <input type="radio" name="times" value="8" required >8:00 LT
                                <input type="radio" name="times" value="10">10:00 LT
                                <input type="radio" name="times" value="12">12:00 LT
                            </h3>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <h3><em>Number of Seats: </em>
                        </td>
                        <td> <input type="number" name="seats" min="1" id="seats" required></h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3><em>Booked For : </em>
                        </td>
                        <td><input type="date" name="dates" id="seats" required style="width: 200px;"></h3>
                        </td>
                    </tr>


                    <tr>


                        <td colspan="2"> <input type="submit" value="BOOK A SEAT" name="submit"></td>

                    </tr>



                </table>
            </form>

        </div>
    </div>
</body>

</html>