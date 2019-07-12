<?php

$servername = "localhost";
$database = "merve-talep";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn,'utf8');
// Check connection
if (!$conn) {
    echo "Bağlantı Yapılamadı. Hata :" . mysqli_connect_error();
    exit;
}



