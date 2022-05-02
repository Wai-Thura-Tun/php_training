const pass1Tag = document.querySelector('#p1');
const pass2Tag = document.querySelector('#p2');
const buttonTag = document.querySelector('.chpassbtn');
pass2Tag.addEventListener('keyup', () => {
  if (pass1Tag.value != pass2Tag.value) {
    pass1Tag.style.borderColor = "red";
    pass2Tag.style.borderColor = "red";
    buttonTag.disabled = true;
  } else {
    pass1Tag.style.borderColor = "blue";
    pass2Tag.style.borderColor = "blue";
    buttonTag.disabled = false;
  }
});

pass1Tag.addEventListener('keyup', () => {
  if (pass1Tag.value != pass2Tag.value) {
    pass1Tag.style.borderColor = "red";
    pass2Tag.style.borderColor = "red";
    buttonTag.disabled = true;
  } else {
    pass1Tag.style.borderColor = "blue";
    pass2Tag.style.borderColor = "blue";
    buttonTag.disabled = false;
  }
});