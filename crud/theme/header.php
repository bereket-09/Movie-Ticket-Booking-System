<?php

error_reporting(0);
session_start();

$welcome = "Welecome , " . $_SESSION['username'];

?>

<header>
    <style>
        header {
            margin: 0;
        }

        .bar {
            font: bold;
            background: red;
        }

        nav {
            background: green;
        }

        ul {
            margin-top: 0;
            /* width: 100%; */
            margin-left: 0;
            padding: 5px;
            background: gray;
            /* background: gray; */
        }

        li {
            /* padding: 15px; */
            color: white;

            display: inline-block;
            text-decoration: none;
        }

        li a {
            color: white;

            display: block;
            padding: 5px;
            text-decoration: none;
        }

        li a:hover {
            background: #f4623a;
            color: white;

        }

        li b {
            color: dodgerblue;
            font-size: x-large;
            font: bold;
        }


        ul {
            float: right;
        }
    </style>

    <div class="navigation">
        <nav>

            <div class="bar">
                <center>
                    <ul>
                        <li> <a href="/movie/movie.php">HOME</a> </li>
                        <li><a href="/movie/crud/movies/movies_list.php">Manage MOVIES</a></li>
                        <li><a href="/movie/crud/movies/addmovie.php">Add Movie</a></li>
                        <li><a href="/movie/crud/index.php">Manage User Accounts</a></li>
                        <li><a href="/movie/crud/cinema/cinema_list.php">Manage Cinema</a></li>
                        <li><a href="/movie/crud/book/booking_list.php">Manage Bookings</a></li>
                        <li><a href="/movie/profile.php">MY PROFILE</a></li>
                        <li><b><?php echo $welcome ?><b></li>
                        <li><a href="/movie/login/logout.php">LOGOUT</a></li>

                    </ul>
                </center>
            </div>
        </nav>
    </div>
</header>