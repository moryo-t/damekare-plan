const callback = (entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting) {
            entry.target.classList.add('active');
            observer.unobserve(entry.target);
        }
    });
};
const options = {
    threshold: .8
};
const manualOptions = {
    threshold: .5
};

const observer = new IntersectionObserver(callback, options);
const manualObserver = new IntersectionObserver(callback, manualOptions);

const fadeElements = document.querySelectorAll('.fade-element, .lecture-bar');
const manualElements = document.querySelectorAll('.manual-element');

fadeElements.forEach((element) => {
    observer.observe(element);
});
manualElements.forEach((element) => {
    manualObserver.observe(element);
});