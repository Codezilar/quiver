const nav = document.querySelector('.nav');
const thirdNav = document.querySelector('.third-nav');
window.addEventListener('scroll', function(){
    if(window.scrollY > 40){
        thirdNav.style.position = 'fixed';
        // nav.style.paddingTop = '20rem;';
    }else{
        thirdNav.style.position = 'relative';
    }
});


$(document).ready (function() {

    let navText =["<i class='bx bx-chevron-left'></i>", "<i class='bx bx-chevron-right'></i> "]

    $('#top-movies-slide').owlCarousel({
        items: 2,
        dots: false,
        loop: true, 
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            500: {
                items: 2
            },
            1280: {
                items: 4
            },
            1600: {
                items: 6
            },
        }     
    })
})

