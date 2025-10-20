<?php
$host = "localhost";
$user = "root"; // username default XAMPP
$pass = "";     // password default XAMPP biasanya kosong
$db   = "disellcoffee";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>
