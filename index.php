<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Disselkopi</title>
    <link rel="icon" type="image/png" href="img/disellogo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sacramento&family=Work+Sans&display=swap"
      rel="stylesheet"
    />

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- My style -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- navbar start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">
        <img src="img/disellkopi.png" alt="Logo Disselkopi" />
      </a>

      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">Tentang kami</a>
        <a href="#menu">Menu</a>
        <a href="#contact">Kontak</a>
      </div>
      <div class="navbar-extra">
  <?php if (isset($_SESSION['username'])): ?>
    <div class="user-menu">
      <button class="username-display" id="userMenuBtn">
        👤 <?php echo htmlspecialchars($_SESSION['username']); ?>
        <i data-feather="chevron-down" class="arrow-icon"></i>
      </button>

      <!-- Dropdown menu -->
      <div class="user-dropdown" id="userDropdown">
        <a href="profile.php" class="dropdown-item">Akun</a>
        <a href="php/logout.php" class="dropdown-item">Logout</a>
      </div>
    </div>
  <?php else: ?>
    <a href="#" id="user-icon"><i data-feather="user"></i></a>
    <div id="user-popup" class="user-popup">
      <div class="user-popup-content">
        <span class="close-btn" id="closeUserPopup">&times;</span>
        <h3>Selamat Datang!</h3>
        <button class="user-btn" onclick="window.location.href='login.html'">Login</button>
        <button class="user-btn" onclick="window.location.href='register.html'">Daftar</button>
      </div>
    </div>
  <?php endif; ?>

  <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
</div>


      <!-- Popup Poster untuk Menu -->
<div id="menu-poster" class="menu-poster">
  <div class="menu-poster-content">
    <img src="img/poster-menu.png" alt="Poster Menu" />
    <span class="menu-close-btn">&times;</span>
  </div>
</div>

    </nav>
    <!-- navbar end -->
    <!-- Hero section start -->
    <section class="hero" id="home">
  <main class="content">
    <h1>Nikmati Segarnya Segelas <span>Kopi</span> Alami</h1>
    <p>
      Temukan kami di dekatmu dan rasakan langsung secangkir Disell di hari mu.
    </p>
    <a href="#menu" class="cta" id="scrollToMenu">Beli Sekarang</a>
  </main>
</section>

    <!-- Hero section end -->
    <!-- About Section Start -->
    <section id="about" class="about">
      <h2><span>Tentang</span>Kami</h2>
      <div class="row">
        <div class="about-img">
          <img src="img/about-img.png" alt="Tentang Kami" />
        </div>
        <div class="content">
          <h3>Kenapa Memilih Kopi Kami</h3>
          <p>
            Kami percaya, kopi bukan sekadar minuman — tapi cerita dari tanah,
            petani, dan proses yang penuh dedikasi. Setiap seduhan kopi kami
            menghadirkan cita rasa terbaik dari biji pilihan Indonesia,
            disajikan dengan konsistensi dan kehangatan yang tak tergantikan.
          </p>
        </div>
      </div>
    </section>
    <!-- About Section End -->
     
    <!--Menu Section start  -->
    <section id="menu" class="menu">
      <h2><span>Menu</span>Kami</h2>
      <p>Segarkan Harimu Dengan Segelas Disselcofee</p>
      <div class="row">
        <div class="menu-card">
          <div class="menu-img-container">
            <img
              src="img/menu/Americanoice.png"
              alt="menu"
              class="menu-card-img1"
            />
          </div>
          <h3 class="menu-card-tittle">- Americano Ice -</h3>
          <p class="menu-card-price">Rp 8.000</p>
        </div>
        <div class="menu-card">
          <div class="menu-img-container">
            <img
              src="img/menu/Butterscothseasalt.png"
              alt="menu"
              class="menu-card-img2"
            />
          </div>
          <h3 class="menu-card-tittle">- Butterscoth Sea Salt -</h3>
          <p class="menu-card-price">Rp 12.000</p>
        </div>
        <div class="menu-card">
          <div class="menu-img-container">
            <img
              src="img/menu/Caramelsalted.png"
              alt="menu"
              class="menu-card-img3"
            />
          </div>
          <h3 class="menu-card-tittle">- Caramel Salted -</h3>
          <p class="menu-card-price">Rp 10.000</p>
        </div>
        <div class="menu-card">
          <div class="menu-img-container">
            <img
              src="img/menu/Chocolatte .png"
              alt="menu"
              class="menu-card-img4"
            />
          </div>
          <h3 class="menu-card-tittle">- Chocolatte -</h3>
          <p class="menu-card-price">Rp 10.000</p>
        </div>
        <div class="menu-card">
          <div class="menu-img-container">
            <img
              src="img/menu/Kopisusudisell(KSD).png"
              alt="menu"
              class="menu-card-img5"
            />
          </div>
          <h3 class="menu-card-tittle">- Kopis Susu Disell (KSD) -</h3>
          <p class="menu-card-price">Rp 8.000</p>
        </div>
        <div class="menu-card">
          <div class="menu-img-container">
            <img
              src="img/menu/Matchalatte.png"
              alt="menu"
              class="menu-card-img6"
            />
          </div>
          <h3 class="menu-card-tittle">- Matchalatte -</h3>
          <p class="menu-card-price">Rp 10.000</p>
        </div>
        <div class="menu-card">
          <div class="menu-img-container">
            <img src="img/menu/Thaitea.png" alt="menu" class="menu-card-img7" />
          </div>
          <h3 class="menu-card-tittle">- Thaitea -</h3>
          <p class="menu-card-price">Rp 10.000</p>
        </div>
        <div class="menu-card">
          <div class="menu-img-container">
            <img
              src="img/menu/Vanillalatte.png"
              alt="menu"
              class="menu-card-img8"
            />
          </div>
          <h3 class="menu-card-tittle">- Vanilla Latte -</h3>
          <p class="menu-card-price">Rp 10.000</p>
        </div>
        <div class="menu-card">
          <div class="menu-img-container">
            <img
              src="img/menu/Matchacoconut.png"
              alt="menu"
              class="menu-card-img5"
            />
          </div>
          <h3 class="menu-card-tittle">- Matcha Coconut -</h3>
          <p class="menu-card-price">Rp 12.000</p>
        </div>
      </div>
    </section>

    <!--Menu Section end  -->
    <!-- Popup Menu -->
<div class="popup" id="menuPopup">
  <div class="popup-content">
    <span class="close-btn" id="closePopup">&times;</span>
    <img id="popupImage" src="" alt="Menu Besar" />
    <h3 id="popupTitle"></h3>
    <p id="popupPrice"></p>
    <button class="buy-btn">Beli Sekarang</button>
  </div>
</div>

    <!-- kontak section Start -->
    <section id="contact" class="contact">
      <h2><span>Kontak</span>Kami</h2>
      <p>Temukan Kami Di</p>

      <div class="row">
  <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1982.6386624264096!2d107.105373!3d-6.358139!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1760902819530!5m2!1sid!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  <form id="waForm">
    <div class="input-group">
      <i data-feather="user"></i>
      <input type="text" id="nama" placeholder="Nama" required />
    </div>
    <div class="input-group">
      <i data-feather="mail"></i>
      <input type="email" id="email" placeholder="Email" required />
    </div>
    <div class="input-group">
      <i data-feather="phone"></i>
      <input type="text" id="nomor" placeholder="Nomor HP" required />
    </div>
    <button type="button" class="btn" onclick="sendToWhatsApp()">Kirim Pesan</button>
  </form>
</div>

    <!-- kontak section end -->

    <!-- footer start -->
    <footer>
      <div class="socials">
        <a
          href="https://www.instagram.com/disellcoffee?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
          target="_blank"
          rel="noopener noreferrer"
          ><i data-feather="instagram"></i
        ></a>
        <a
          href="https://wa.me/62881080335428"
          target="_blank"
          rel="noopener noreferrer"
        >
          <i data-feather="message-circle"></i>
        </a>
        <a
          href="https://www.tiktok.com/@disellcoffee"
          target="_blank"
          rel="noopener noreferrer"
          class="tiktok-icon"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 50 50"
            width="24"
            height="24"
            fill="white"
          >
            <path
              d="M41,18c-3.2,0-6.3-1-9-3v14c0,6.1-4.9,11-11,11S10,35.1,10,29s4.9-11,11-11c0.7,0,1.4,0.1,2,0.2v4.1c-0.6-0.1-1.3-0.2-2-0.2
      c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7V7h4c0.2,0,0.4,0,0.6,0c1.2,3.9,4.6,6.8,8.7,7.4V18z"
            />
          </svg>
        </a>
      </div>
      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Menu</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>Created By <a href="">YoVi</a>. | &copy; 2025.</p>
      </div>
    </footer>
    <!-- footer end -->

    <!--Feathers icons  -->
    <script>
      feather.replace();
    </script>

    <!--My Javascript  -->
    <script src="js/script.js"></script>
    <script>
  const userMenuBtn = document.getElementById('userMenuBtn');
  const userDropdown = document.getElementById('userDropdown');

  if (userMenuBtn && userDropdown) {
    userMenuBtn.addEventListener('click', (e) => {
      e.stopPropagation(); // cegah tutup langsung
      userDropdown.style.display =
        userDropdown.style.display === 'block' ? 'none' : 'block';
      userMenuBtn.classList.toggle('active');
    });

    // Klik di luar dropdown → tutup menu
    window.addEventListener('click', (e) => {
      if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
        userDropdown.style.display = 'none';
        userMenuBtn.classList.remove('active');
      }
    });
  }

  feather.replace();
</script>

  </body>
</html>
