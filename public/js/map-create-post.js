const postCreateBtn = document.getElementById('postCreateButton');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

postCreateBtn.addEventListener('click', () => {
    const formData = new FormData();

    const previewsInputs = document.querySelectorAll('div .img-preview input');
    previewsInputs.forEach(imgInput => {
        formData.append('images[]', imgInput.files[0]);
    });

    formData.append('title', document.getElementsByName('title')[0].value);
    formData.append('body', document.getElementsByName('body')[0].value);
    formData.append('price', document.getElementById('price').textContent);

    fetch('/post-create/upload', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        }
    })
    .then((response) => {
        return response.json();
    })
    .then((data) => {
    })

})
