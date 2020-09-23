<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "sa8776";
$dBName = "loginsystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}