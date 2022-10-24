<?php

include '../includes/functions.php';
include '../includes/db.php';
if ($_SESSION['role'] == 0) {
    header("Location: /movie/movie.php");
}

$user = isset($_GET['id']) ? delete_movie($_GET['id']) : exit();
