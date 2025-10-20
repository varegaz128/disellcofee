// Toggle vlass active
const navbarNav = document.querySelector(".navbar-nav");
// ketika hamburger menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// klik di luar sidebar untuk menghilangkan nav
const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

const row = document.querySelector(".menu .row");

let isDown = false;
let startX;
let scrollLeft;

row.addEventListener("mousedown", (e) => {
  isDown = true;
  row.classList.add("active");
  startX = e.pageX - row.offsetLeft;
  scrollLeft = row.scrollLeft;
});

row.addEventListener("mouseleave", () => {
  isDown = false;
  row.classList.remove("active");
});

row.addEventListener("mouseup", () => {
  isDown = false;
  row.classList.remove("active");
});

row.addEventListener("mousemove", (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - row.offsetLeft;
  const walk = (x - startX) * 1.5; // kecepatan geser
  row.scrollLeft = scrollLeft - walk;
});

// kirim pesan

function sendToWhatsApp() {
  const nama = document.getElementById("nama").value.trim();
  const email = document.getElementById("email").value.trim();
  const nomor = document.getElementById("nomor").value.trim();

  if (!nama || !email || !nomor) {
    alert("Harap isi semua kolom sebelum mengirim pesan 😊");
    return;
  }

  const pesan = `Halo, saya ingin menghubungi Anda.%0A
Nama: ${nama}%0A
Email: ${email}%0A
Nomor HP: ${nomor}%0A
Terima kasih 🙏`;

  const whatsappUrl = `https://wa.me/62881080335428?text=${pesan}`;
  window.open(whatsappUrl, "_blank");
} // Popup Gambar Menu
const popup = document.getElementById("menuPopup");
const popupImage = document.getElementById("popupImage");
const popupTitle = document.getElementById("popupTitle");
const popupPrice = document.getElementById("popupPrice");
const closePopup = document.getElementById("closePopup");

document.querySelectorAll(".menu-card").forEach((card) => {
  card.addEventListener("click", () => {
    const img = card.querySelector("img").src;
    const title = card.querySelector(".menu-card-tittle").textContent;
    const price = card.querySelector(".menu-card-price").textContent;

    popupImage.src = img;
    popupTitle.textContent = title;
    popupPrice.textContent = price;
    popup.classList.add("active");
  });
});

// Tutup popup saat klik tombol X atau area luar konten
closePopup.addEventListener("click", () => popup.classList.remove("active"));
popup.addEventListener("click", (e) => {
  if (e.target === popup) popup.classList.remove("active");
});

const menuPoster = document.getElementById("menu-poster");
const closeMenuBtn = document.querySelector(".menu-close-btn");
const menuLink = document.querySelector('.navbar-nav a[href="#menu"]');

// Saat tombol Menu diklik → tampilkan poster
menuLink.addEventListener("click", (e) => {
  e.preventDefault();
  menuPoster.style.display = "flex";
});

// Tombol X untuk menutup
closeMenuBtn.addEventListener("click", () => {
  menuPoster.style.display = "none";
});

// Klik area luar untuk menutup
window.addEventListener("click", (e) => {
  if (e.target === menuPoster) {
    menuPoster.style.display = "none";
  }
});

document.getElementById("scrollToMenu").addEventListener("click", function (e) {
  e.preventDefault();
  document.querySelector(".menu, menu-card").scrollIntoView({
    behavior: "smooth",
    block: "start",
  });
});

// User Popup
const userIcon = document.getElementById("user-icon");
const userPopup = document.getElementById("user-popup");
const closeUserPopup = document.getElementById("closeUserPopup");

userIcon.addEventListener("click", function (e) {
  e.preventDefault();
  userPopup.style.display = "flex";
});

closeUserPopup.addEventListener("click", function () {
  userPopup.style.display = "none";
});

// Tutup popup saat klik di luar area konten
window.addEventListener("click", function (e) {
  if (e.target === userPopup) {
    userPopup.style.display = "none";
  }
});
document.addEventListener("DOMContentLoaded", () => {
  const overlay = document.getElementById("overlay");
  const loginModal = document.getElementById("loginModal");
  const registerModal = document.getElementById("registerModal");
  const btnLogin = document.getElementById("btn-login");
  const showRegister = document.getElementById("showRegister");
  const showLogin = document.getElementById("showLogin");

  function openModal(modal) {
    overlay.style.display = "block";
    modal.style.display = "block";
  }

  function closeModal() {
    overlay.style.display = "none";
    loginModal.style.display = "none";
    registerModal.style.display = "none";
  }

  overlay.addEventListener("click", closeModal);
  btnLogin.addEventListener("click", () => openModal(loginModal));
  showRegister.addEventListener("click", () => {
    closeModal();
    openModal(registerModal);
  });
  showLogin.addEventListener("click", () => {
    closeModal();
    openModal(loginModal);
  });

  // 🌟 Register Form
  document.getElementById("registerForm").addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    fetch("php/register.php", { method: "POST", body: formData })
      .then((res) => res.text())
      .then((data) => {
        if (data.trim() === "success") {
          alert("Pendaftaran berhasil! Silakan login.");
          closeModal();
          openModal(loginModal);
        } else {
          alert(data);
        }
      });
  });

  // 🌟 Login Form
  document.getElementById("loginForm").addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    fetch("php/login.php", { method: "POST", body: formData })
      .then((res) => res.text())
      .then((data) => {
        if (data.trim() === "success") {
          alert("Login berhasil!");
          closeModal();
          location.reload();
        } else {
          alert(data);
        }
      });
  });
});
