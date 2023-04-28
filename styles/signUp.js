const slidePage = document.querySelector(".slidepage");
const firstNextBtn = document.querySelector(".nextBtn");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const nextBtnFourth = document.querySelector(".next-3");
const prevBtnFifth = document.querySelector(".prev-4");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .fa-check");
const bullet = document.querySelectorAll(".step .bullet");


let max = 5;
let current = 1;

firstNextBtn.addEventListener("click", function (event) {
  event.preventDefault();

  var lastName = document.getElementById("lname").value;
  var firstName = document.getElementById("fname").value;
  var middleInitial = document.getElementById("mid-init").value;

  if (
    lastName.trim() === "" ||
    firstName.trim() === "" ||
    middleInitial.trim() === ""
  ) {
    alert("Please fill all fields...");
    return;
  }

  slidePage.style.marginLeft = "-25%";
  bullet[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  current += 1;
});

nextBtnSec.addEventListener("click", function (event) {
  event.preventDefault();

  var age = document.getElementById("age").value;
  var birthDate = document.getElementById("bdate").value;
  var gender = document.getElementById("gender").value;
  var bloodType = document.getElementById("blood-type").value;

  if (
    age.trim() === "" ||
    birthDate.trim() === "" ||
    gender.trim() === "" ||
    bloodType.trim() === ""
  ) {
    alert("Please fill all fields...");
    return;
  }

  slidePage.style.marginLeft = "-50%";
  bullet[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  current += 1;
});

nextBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  var address = document.getElementById("address").value;
  var email = document.getElementById("e-mail").value;
  var contact = document.getElementById("contact").value;

  if (address.trim() === "" || email.trim() === "" || contact.trim() === "") {
    alert("Please fill all fields...");
    return;
  }
  slidePage.style.marginLeft = "-75%";
  bullet[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  current += 1;
});
nextBtnFourth.addEventListener("click", function (event) {
  event.preventDefault();

  var fullname = document.getElementById("e-fullname").value;
  var phoneNum = document.getElementById("phone-num").value;
  var emailAdd = document.getElementById("email-add").value;
  var relationship = document.getElementById("relationship").value;

  if (
    fullname.trim() === "" ||
    phoneNum.trim() === "" ||
    emailAdd.trim() === "" ||
    relationship.trim() === ""
  ) {
    alert("Please fill all fields...");
    return;
  }
  slidePage.style.marginLeft = "-100%";
  bullet[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  current += 1;
});

submitBtn.addEventListener("click", function (event) {
  event.preventDefault();
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var confirmPass = document.getElementById("confirm-pass").value;

  if (username.trim() === "" || password.trim() === "" || confirmPass.trim() === "") {
    alert("Please fill all fields...");
    return;
  }

  setTimeout(function () {
    alert("You're successfully registered!");
    document.location = "login.php";
  }, 800);
});

prevBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnFourth.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnFifth.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-75%";
  bullet[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  current -= 1;
});
