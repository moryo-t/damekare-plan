const images = document.querySelectorAll('.img-style');
let imageWidth = images[0].width;

images.forEach(image => {
    image.style.height = imageWidth + 'px';
});

window.addEventListener('resize', function() {
    imageWidth = images[0].width;
    images.forEach(image => {
        image.style.height = imageWidth + 'px';
    });
})