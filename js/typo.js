
// Typo Animation
const CONTENT = '글로벌 비즈니스의 미래를 열어가는 HSI';
const HOME_TITLE = document.querySelector('#kr-title');
let n = 0;

const TYPING = function () {
  HOME_TITLE.innerHTML += CONTENT[n++];
  if (n == CONTENT.length) {
    clearInterval(SPEED);
  }
};

const SPEED = setInterval(TYPING, 100);


const ENG_CONTENT = 'Surge ahead of the competition with HSI';
const ENG_TITLE = document.querySelector('#en-title');
let m = 0

const ENG_TYPING = function () {
  ENG_TITLE.innerHTML += ENG_CONTENT[m++];
  if (m == ENG_CONTENT.length) {
    clearInterval(ENG_SPEED);
  }
};

const ENG_SPEED = setInterval(ENG_TYPING, 100);
