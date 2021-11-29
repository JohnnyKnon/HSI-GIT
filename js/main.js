"use strict";


// Handle scrolling when tapping on the navbar menu
const navbarMenu = document.querySelector('.navbar__menu');
navbarMenu.addEventListener('click', (event)=>{ 
    const target = event.target; 
    const link = target.dataset.link; 
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
const companyIntroduce = document.querySelector('company__introduce');

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
            x.innerText="SONATS는 초음파(Stressonic®)를 이용한 금속·비금속의 표면처리로 경·강도 강화, 압축·잔류응력 제어, 피로수명 연장 등에서 세계 최고의 기술을 보유한 기업입니다"; 
        }else if(logos === "thyss"){
            x.innerText="“Engineering. Tomorrow. Together.” 차별화된 솔루션으로 고객과 함께 성장하는 Thyssenkrupp는 방탄강(Ballistic Armor) - SECURE, TRISECURE, 내마모강(Wear-Resistant Steel) - XAR, 고강도미세립강(Fine Grain) - N-A-XTRA, XABO 등 경도 및 중량 절감에 대한 고객 요구를 동시에 충족시키는 다양한 제품군을 보유하고 있습니다."; 
        }else if(logos === "plasan"){
            x.innerText="Plasan은 전투생존성(Survivability)을 높이는 장비방탄 전문기업으로서 육상 및 항공 운송수단의 기본 장갑부터 부가장갑까지 기동장비의 방호력 향상 부문에 세계 최고 기술력을 보유한 종합 장비방탄 솔루션 기업입니다. Plasan의 고경도, 경량화 제품군은 분열 및 파쇄 현상이 없으면서도 최대 STANAG level 5, 6의 보호도를 유지하는 고객 맞춤형 솔루션을 제공합니다. Plasan은 다음 소재의 제품군을 취급합니다.";
        }else{
            x.innerText="Havelsan은 방위산업 IT 소프트웨어 및 솔루션을 제공하는 터키 공군이 설립한 공영 기업입니다. 첨단 레이저 기술을 필두로 항공기 조종 시뮬레이팅 시스템 커맨드 컨트롤 시스템(C4ISR), 함정 전투 시스템, 감시 정찰 시스템 등을 제공하며 군수 정보 시스템 분야에서 우수한 기술력을 자랑하고 있습니다.";
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
