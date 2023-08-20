var swiper = new Swiper(".mySwiper", {
    loop: true,
    pagination: {
        el: ".swiper-pagination",
    },
    keyboard: {
        enabled: true,
    },
    autoplay: {
        delay: 7000,
        disableOnInteraction: false,
    },
});