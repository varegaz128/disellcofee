<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $check->bind_param("s", $email);
  $check->execute();
  $result = $check->get_result();

  if ($result->num_rows > 0) {
    echo "Email sudah terdaftar!";
  } else {
    $stmt = $conn->prepare("INSERT INTO users (nama, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $password);

    if ($stmt->execute()) {
      echo "success";
    } else {
      echo "Terjadi kesalahan: " . $conn->error;
    }
  }
}
?>
