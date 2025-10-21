<?php
session_start();
include("php/koneksi.php"); // pastikan koneksi menghasilkan $conn (mysqli)

// Pastikan user sudah login
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
  header("Location: login.html"); // atau login.php sesuai yang kamu pakai
  exit();
}

// Ambil data user dari database berdasarkan id
$user_id = (int) $_SESSION['user_id'];

$sql = "SELECT username, email, created_at FROM users WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
} else {
    // Jika prepare gagal, redirect / tampilkan pesan
    // Untuk debugging sementara:
    // echo "DB error: " . $conn->error;
    header("Location: index.php");
    exit();
}

// Jika user tidak ditemukan (mis. id salah), redirect ke login
if (!$user) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="css/profile.css"> <!-- sesuaikan path -->
</head>
<body>
  <nav class="navbar">
    <a href="index.php" class="navbar-logo">
      <img src="img/disellkopi.png" alt="Logo Disselkopi" />
    </a>
    <div class="navbar-extra">
      <a href="profile.php" class="username-display">👤 <?php echo htmlspecialchars($_SESSION['username']); ?></a>
      <a href="php/logout.php" id="logout-btn" title="Logout"><i data-feather="log-out"></i></a>
    </div>
  </nav>

  <section class="profile">
    <h2>Profil Pengguna</h2>
    <div class="profile-box">
      <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
      <p><strong>Tanggal Bergabung:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
    </div>

    <button class="btn" onclick="window.location.href='index.php'">⬅ Kembali ke Beranda</button>
  </section>

  <script src="https://unpkg.com/feather-icons"></script>
  <script>feather.replace();</script>
</body>
</html>
