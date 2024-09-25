const darkModeToggle = document.getElementById("darkModeToggle");
const body = document.body;
const navMenu = document.getElementById("navMenu");
const hamburger = document.getElementById("hamburger");


darkModeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    const icon = darkModeToggle.querySelector("i");
    icon.classList.toggle("bx-sun");
    icon.classList.toggle("bx-moon");
});

hamburger.addEventListener("click", () => {
    navMenu.classList.toggle("show");
});

window.onload = function() {
    if (!localStorage.getItem("ageVerified")) {
        document.getElementById("agePop").style.display = "flex";
    }

    document.getElementById("yesBtn").addEventListener("click", function() {
        localStorage.setItem("ageVerified", "true");
        document.getElementById("agePop").style.display = "none";
    });

    document.querySelector('.pop').classList.add('show');

    document.getElementById("noBtn").addEventListener("click", function() {
        alert("Maaf, Anda tidak diizinkan mengakses situs ini.");
        window.location.href = "https://google.com"; 
    });
};

