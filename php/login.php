<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Ambil data user berdasarkan kolom username
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Simpan data ke session
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];

            echo "<script>alert('Login berhasil! Selamat datang, {$row['username']}'); window.location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Password salah!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
