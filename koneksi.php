<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'decision_support';

$conn = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
