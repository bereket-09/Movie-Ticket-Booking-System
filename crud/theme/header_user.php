<?php

error_reporting(0);
session_start();

$role = "";

if ($_SESSION['role'] == 0) {
    $role = "Normal User";
}

if ($_SESSION['role'] == 1) {
    $role = "Administrator User";
}
$welcome = "Welecome To our website, <em>" . $_SESSION['username'] . "</em>";

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
            margin: 15px;
            display: block;
            padding: 10px;
            text-decoration: none;
        }

        li a:hover {
            background: #f4623a;
            color: white;

        }

        li b {
            color: dodgerblue;
            font-size: xx-large;
            font: bold;
            margin-top: 15px;
            margin-left: 15px;
            margin-right: 0px;
            padding-right: 0px;
        }


        ul {
            float: center;
        }

        em {
            color: #FF851B;
            text-transform: uppercase;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            font-style: italic;
        }
    </style>

    <div class="navigation">
        <nav>

            <div class="bar">
                <center>
                    <ul>
                        <li><a href="/movie/movie.php">Home</a></li>
                        <li><a href="/movie/profile.php">MY PROFILE</a></li>
                        <li>
                            <?php

                            if($_SESSION['role']==1){

                            echo '<a href="/movie/crud/">MY DASHBOARD</a>';
                            }
                            ?>
                        </li>

                        <li><b><?php echo $welcome ?><b></li>

                        <li><a href="/movie/login/logout.php">LOGOUT</a></li>

                    </ul>
                </center>
            </div>
        </nav>
    </div>
</header>