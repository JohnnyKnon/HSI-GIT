"use strict";

// Handle scrolling when tapping on the navbar menu
const navbarMenu = document.querySelector('.navbar__menu');
navbarMenu.addEventListener('click', (event)=>{ // 클릭한 이벤트 추가
    const target = event.target; //target (눌렀을때에 해당 타겟에 이벤트)
    const link = target.dataset.link; //눌려진 타켓에 링크 값
    if(link == null){
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

// MouseOver Out
const workLogos = document.querySelector('.work__logos');
const workWrap = document.querySelector('.work__logo__wrap');
const logoBtnWrap = document.querySelector('.work__bottom');


function isMobile(){
	let UserAgent = navigator.userAgent;
	if (UserAgent.match(/iPhone|iPod|Android|Windows CE|BlackBerry|Symbian|Windows Phone|webOS|Opera Mini|Opera Mobi|POLARIS|IEMobile|lgtelecom|nokia|SonyEricsson/i) != null || UserAgent.match(/LG|SAMSUNG|Samsung/) != null)   
	{
		return true;
	}else{
	    return false;
	}
}

if(isMobile()){
	
}else{
	logoBtnWrap.addEventListener('mouseover', (event)=>{
        const worktarget = event.target;
        const logos = worktarget.dataset.logo;
        if(logos == null){
            return;
        }
        ClassListOver(logos); 

        // Product Introduce
        let x = document.getElementsByClassName("company__introduce")[0];
        if(logos === "sonats"){
            x.innerText="JS"; 
        }else if(logos === "thyss"){
            x.innerText="HTML"; 
        }else if(logos === "plasan"){
            x.innerText="PHP";
        }else{
            x.innerText="Node.js"
        }

    });

    logoBtnWrap.addEventListener('mouseout', (event)=>{
        const worktarget = event.target;
        const logos = worktarget.dataset.logo;
        ClassListOut(logos);
    });
    
}

// Mouse over out
function ClassListOver(selector){
    workLogos.classList.add(selector);
    workWrap.classList.add('logo__wrap--visible');
}

function ClassListOut(selector){
    workLogos.classList.remove(selector);
    workWrap.classList.remove('logo__wrap--visible');
}
// Nav Scroll
function scrollIntoView(selector){
    const scrollTo = document.querySelector(selector); //scrollIntoView엘리멘트 의 부모 컨테이너로 스크롤되는 메소드
    scrollTo.scrollIntoView({behavior: "smooth"});
}
