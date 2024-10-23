const darkModeToggle = document.getElementById("darkModeToggle");
const body = document.body;
const navMenu = document.getElementById("navMenu");
const hamburger = document.getElementById("hamburger");
const agePop = document.getElementById("agePop");
const yesBtn = document.getElementById("yesBtn");
const noBtn = document.getElementById("noBtn");
const contactUsBtn = document.getElementById("contactUsBtn");
const closeModal = document.getElementById("closeModal");
const contactModal = document.getElementById("contactModal");

// Dark Mode
darkModeToggle.addEventListener("click", () => {
  body.classList.toggle("dark");
  const icon = darkModeToggle.querySelector("i");
  icon.classList.toggle("bx-sun");
  icon.classList.toggle("bx-moon");
});

// Hamburger Menu
hamburger.addEventListener("click", () => {
  navMenu.classList.toggle("show");
});

// Age Verif
window.onload = function () {
  if (!localStorage.getItem("ageVerified")) {
    agePop.style.display = "flex";
  }

  yesBtn.addEventListener("click", function () {
    localStorage.setItem("ageVerified", "true");
    agePop.style.display = "none";
  });

  noBtn.addEventListener("click", function () {
    alert("Maaf, Anda tidak diizinkan mengakses situs ini.");
    window.location.href = "https://google.com";
  });
};

// Show Contact Us
contactUsBtn.addEventListener("click", function () {
  contactModal.classList.add("show");
});

// Close Contact Us
closeModal.addEventListener("click", function () {
  contactModal.classList.remove("show");
});

document.getElementById('contactUsBtn').addEventListener('click', function() {
  document.getElementById('contactModal').style.display = 'block';
});

document.getElementById('closeModal').addEventListener('click', function() {
  document.getElementById('contactModal').style.display = 'none';
});

// Tambahkan ini untuk login modal
document.querySelector('.login_btn').addEventListener('click', function() {
  document.getElementById('loginModal').style.display = 'block';
});

document.getElementById('closeLoginModal').addEventListener('click', function() {
  document.getElementById('loginModal').style.display = 'none';
});
