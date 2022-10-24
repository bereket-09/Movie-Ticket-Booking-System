<?php

$mysqli = new mysqli('localhost', 'root', '', 'movie_ticket_booking', '3306');

if ($mysqli->connect_error) {
    exit('Error connecting to database');
}
