
    <!-- Swiper JS -->
    <!----------------------jquery and js links------------------------------>
    <script src="js/jquary3.6.0.js"></script>
    <script src="js/owl.carousel.min.js"></script>                    
    <script src="js/script.js"></script>
    <script src="js/bar.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
        // when window width is >= 600
        breakpoints: {
            600: {
                slidesPerView: 2,
            }
        }
      });
    </script>
</body>
</html>