<?php

include '../includes/functions.php';
include '../includes/db.php';


$id=$_GET['cid'];
$qty=$_GET['seat'];

$query = "SELECT * FROM cinema where id=$id";
$cinemas = mysqli_query($mysqli, $query);
$cname = $cinemas->fetch_assoc();
// $id = $cname['id'];
$current = $cname['current'];
$free = $cname['free'];

    $current = $current - $qty;
    $free = $free + $qty;
    $sql = "update cinema SET current=$current ,free=$free where id=$id";
    $res = mysqli_query($mysqli, $sql);




$user = isset($_GET['id']) ? delete_booking($_GET['id']) : false;

?>
