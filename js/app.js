const nav = document.querySelector('.nav');
const thirdNav = document.querySelector('.third-nav');
window.addEventListener('scroll', function(){
    if(window.scrollY > 70){
        thirdNav.style.position = 'fixed';
        thirdNav.style.marginTop = '-8rem';
    }else{
        thirdNav.style.position = 'relative';
        thirdNav.style.marginTop = '0';
    }
});
