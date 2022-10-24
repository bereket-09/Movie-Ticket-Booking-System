<?php

include '../includes/functions.php';
include '../includes/db.php';

$user = isset($_GET['id']) ? delete_cinema($_GET['id']) : exit();
