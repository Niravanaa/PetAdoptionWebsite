function updateDate() {
    const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const now = new Date();
    const dateElement = document.getElementById('current-date');
    const timeElement = document.getElementById('current-time');
    const timeString = now.toLocaleTimeString();
    dateElement.innerHTML = days[now.getDay()] + ", " + months[now.getMonth()] + " " + now.getDate() + " " + now.getFullYear();
    timeElement.innerHTML = timeString;
  }

function validateTextArea() {
  const form = document.querySelector('form');
  const textarea = form.querySelector('textarea');
    
  form.addEventListener('submit', function(event) {
    if (textarea.value.trim() === '') {
      alert(`Please fill in the ${textarea.name} field.`);
      event.preventDefault();
    }
  });
}

function validateGiveForm() {
  const form = document.getElementById("giveForm");
  const emailInput = document.getElementById("ownerEmail");
  const selectInputs = form.querySelectorAll("select");
  const imageInput = document.getElementById("image-file");

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  form.addEventListener('submit', function(event) {
    if (!emailRegex.test(emailInput.value)) {
      alert("Please enter a valid email address.");
      event.preventDefault();
      return;
    }
    
    for (let i = 0; i < selectInputs.length; i++) {
      if (selectInputs[i].value === "") {
        alert(`Please select an option for every dropdown.`);
        event.preventDefault();
        return;
      }
    }

    if (imageInput.files.length === 0) {
      alert(`Please select an image file.`);
      event.preventDefault();
      return;
    }

    const file = imageInput.files[0];
    if (!file.type.startsWith("image/")) {
      alert(`Please select an image file.`);
      event.preventDefault();
      return;
    }

    const inputs = form.querySelectorAll("input");
    for (let i = 0; i < inputs.length; i++) {
      if (inputs[i].value.trim() === "") {
        alert(`Please fill out the ` + inputs[i].id + ` field.`);
        event.preventDefault();
        return;
      }
    }
  });
}

const dog = document.getElementById("dog");
const dogWidth = dog.offsetWidth;
const dogHeight = dog.offsetHeight;

dog.addEventListener("mouseover", function() {
  dog.style.backgroundImage = "url('./Images/doge-scream.png')";
})

dog.addEventListener("mouseleave", function() {
  dog.style.backgroundImage = "url('./Images/doge.png')";
})

let posX = 0;
let posY = 0;
let dirX = 1;
let dirY = 1;

function moveDog() {
  const maxWidth = window.innerWidth - dogWidth;
  const maxHeight = window.innerHeight - dogHeight;
  
  posX += dirX;
  posY += dirY;

  if (posX >= maxWidth || posX <= 0) {
      dirX = -dirX;
  }

  if (posY >= maxHeight || posY <= 0) {
      dirY = -dirY;
  }

  dog.style.left = posX + "px";
  dog.style.top = posY + "px";
}

const staringArray = ["Dog1_Staring.png\"", "Dog2_Staring.png\"", "Dog3_Staring.png\""];

document.getElementById("staring").style.backgroundImage="url(\"./Images/" + staringArray[Math.floor(Math.random() * 3)];

setInterval(moveDog, 10);
updateDate();
setInterval(updateDate, 1000);
  