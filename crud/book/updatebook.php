<?php

include '../includes/db.php';


$id=$_GET['id'];

$query = "select * from booking where id=$id";
$book = mysqli_query($mysqli, $query);
$booked = $book->fetch_assoc();


if($booked['status'] == 0){


$query = "update booking SET status=1 where id=$id";
$res=mysqli_query($mysqli, $query);
}
else{
    $query = "update booking SET status=0 where id=$id";
    $res = mysqli_query($mysqli, $query);
}

if($res){
header('Location: /movie/crud/book/booking_list.php');}
?>
