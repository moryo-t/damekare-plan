const inputBody = document.querySelector('.body_input');

inputBody.addEventListener('input', () => {
    inputBody.style.height = 'auto';
    inputBody.style.height = inputBody.scrollHeight + 'px';
})