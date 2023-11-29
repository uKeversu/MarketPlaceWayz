const passwordInput = document.getElementById("password-input");
const showPasswordButton = document.getElementById("show-password");

showPasswordButton.addEventListener("click", () => {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
});

// DARK/LIGHT MODE
function myFunction() {
  var element = document.body;
  element.classList.toggle("dark-mode");
}

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})

// NAVBAR
function navBar() {
  var x = document.getElementById("navbar");
  if (x.className === "navbar") {
    x.className += " responsive";
  } else {
    x.className = "navbar";
  }
}
