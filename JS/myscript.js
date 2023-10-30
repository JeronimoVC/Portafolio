var nav=document.querySelector('nav');
    window.addEventListener('scroll', function(){
       if(window.pageYOffset > 50){
        nav.style.backgroundColor = 'rgba(0, 255, 247, 0.8)'; 
        nav.classList.add('shadow');
       }else{
        nav.style.backgroundColor = 'transparent';
        nav.classList.remove('shadow');
       }
    })

    /*----------------Multiple text-------------------------*/ 
const typed = new Typed('.multiple-text',{
  strings:['Frontend', 'Marketing Digital', 'SEO', 'KPI', 'Róbotica'],
  typeSpeed: 100,
  backSpeed: 100,
  backDelay: 1000,
  loop: true
});
/*--------------------------AOS--------------------------*/
AOS.init({
  easing: 'ease-out-back',
  duration: 1000
});
/*--------------------------/AOS--------------------------*/  