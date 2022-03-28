'use strict';

// Handle scrolling when tapping on the navbar menu
const navbarMenu = document.querySelector('.navbar__menu');
navbarMenu.addEventListener('click', (event) => {
  const target = event.target;
  const link = target.dataset.link;
  if (link == null) {
    return;
  }
  scrollIntoView(link);

  navbarMenu.classList.remove('open');
  toggleA.classList.remove('times-a');
  toggleB.classList.remove('times-b');
  toggleC.classList.remove('times-c');
});

// Toggle
const toggleA = document.querySelector('.toggle-a');
const toggleB = document.querySelector('.toggle-b');
const toggleC = document.querySelector('.toggle-c');
const navbarToggleBtn = document.querySelector('.toggle__btn');
navbarToggleBtn.addEventListener('click', () => {
  navbarMenu.classList.toggle('open');
  toggleA.classList.toggle('times-a');
  toggleB.classList.toggle('times-b');
  toggleC.classList.toggle('times-c');
});

// Nav Scroll
function scrollIntoView(selector) {
  const scrollTo = document.querySelector(selector); //scrollIntoView엘리멘트 의 부모 컨테이너로 스크롤되는 메소드
  scrollTo.scrollIntoView({ behavior: 'smooth' });
}
