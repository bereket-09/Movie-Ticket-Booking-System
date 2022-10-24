<?php

session_start();



if (!isset($_SESSION['username'])) {
    header("Location: /movie/welcome.php");
}
include './crud/includes/functions.php';
include './crud/includes/db.php';
include './crud/theme/header_user.php';
$movies = $mysqli->query("SELECT * FROM movies");

if (isset($_GET['searchbtn'])) {
    $word = $_GET['search'];
    header("Location: /movie/search.php?name=$word");
}


?>




<head>
    <title>ONLINE MOVIE TICKET BOOKING | MOVIES</title>
    <style>
        body {
            /* margin: 0; */
            background: url(/movie/Assets/images/blank-bg.jpg);
        }

        .list {

            text-align: center;
            margin-left: 50px;

        }

        header.masthead {
            padding-top: 10rem;
            padding-bottom: calc(10rem - 4.5rem);

            background: url(/movie/Assets/images/blank-bg.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-size: cover;
        }

        header.masthead h1 {
            font-size: 2.25rem;
        }



        #movies .movie-item {
            position: relative;
            float: left;
            margin-left: 18px;
            margin-top: 20px;
            padding-right: 0px;


        }


        #movies .movie-item {

            margin: .5em;
            float: left;
        }

        #movies .movie-item .mov-det {
            position: absolute;
        }

        .movie-item:hover {
            position: relative;
            top: -2em;

            /* height: 52vh; */
            /* width: 16vw; */
            box-shadow: 0 0 5px 2px #ee3e0d;
            border-radius: 50px;
        }

        .mov-det {
            position: absolute;
            bottom: 0;
            transition: .5s ease;
            opacity: 0;
            display: none
        }

        .movie-item:hover .mov-det {
            display: block;
            opacity: 1;
            right: 3vw;
            top: 28vh;
            ;


        }


        .reserve-img {
            height: 53vh;
            width: 20vw;
            border: 2px solid #f4623a;
            border-radius: 3px
        }

        .btnBOOK {
            text-decoration: none;
            margin-right: 15px;
            margin-bottom: 150px;
            padding-top: 15px;
            padding-bottom: 15px;
            border-radius: 15px;
            padding-left: 5px;
            padding-right: 5px;
            color: #fff;
            background-color: #f4623a;
            border-color: #f4623a;
        }

        .btnBOOK:hover {
            color: #fff;
            background-color: #f24516;
            border-color: #ee3e0d;
        }

        .btnBOOK:focus,
        .btnBOOK.focus {
            color: #fff;
            background-color: #f24516;
            border-color: #ee3e0d;
            box-shadow: 0 0 0 0.2rem rgba(246, 122, 88, 0.5);
        }

        .title {
            margin-top: -100px;
        }

        h1,
        h3 {
            color: white;
        }

        .serach {
            margin-bottom: 450px;
        }

        input[type='search'],
        input[type='submit'] {
            padding: 5px;
        }

        input[type='submit'] {
            background: #f24516;
            color: white;
        }
    </style>
</head>

<header class="masthead">
    <div class="container-fluid">

        <center>
            <br><br>
            <h1 class="title">ALL &nbsp; MOVIES</h1>
            <h3 class="subtitle">Select or Search a Movie to Book</h3>
            <form action="" method="get">
                <input type="search" name="search" class="search">

                <input type="submit" name="searchbtn" value="Search">
            </form><br><br><br><br><br><br>
        </center>
        <div class="list">


            <div id="movies">

                <?php while ($row = mysqli_fetch_assoc($movies)) : ?>
                    <div class="movie-item">

                        <?php $movie = selectSingle_movie($row['id']);
                        ?>

                        <img class="img" src="./crud/movies/images/<?php echo $row['cover']  ?>" alt="<?php echo $row['title'] ?>" width="200" height="300">
                        <div class="mov-det">
                            <?php echo '<a class="btnBOOK" href="book.php?id=' . $movie['id'] . '"> BOOK A TICKET </a>' ?>
                        </div>
                    </div>
                <?php endwhile;
                ?>

            </div>
        </div>

    </div>
</header>