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
