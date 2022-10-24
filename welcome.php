<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <center>
        <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
        <a href="./login/logout.php">Logout</a>


        <p>GO TO CRUD</p>
        <a href="./crud/">TO USER ACCOUNTS MANAGER</a> <br>
        <a href="./crud/movies/movies_list.php">MOVIES LIST</a>
    </center>
<!-- 
    <?php
    // header("Location: /movie/"); ?> 
    
-->
</body>

</html>