const xItems = document.querySelectorAll('.x-item');
const xScroll = document.getElementById('x-scroll');
let imgPreviews;

const modalContent = document.getElementById('modal-content');
const modalImage = document.getElementById('modal-img');

const changeImg = document.getElementById('changeImage');
const removeImg = document.getElementById('removeImage');

let currentIndex = 0;

function handlePreviewClick(fileInput, imgPreviewIndex, clicked) {
    const previewActive = imgPreviews[imgPreviewIndex];
    const reader = new FileReader();

    const handleAddEvent = function (changeEvent) {
        let selectedFile = changeEvent.target.files[0];

        reader.onload = function(readerEvent) {
            var readerResult = readerEvent.target.result;

            const dliPlus = previewActive.querySelector('.dli-plus-wrap');
            dliPlus.classList.add('d-none');

            var image = document.createElement('img');
            image.src = readerResult;
            image.classList.add('preview-image', 'rounded');
            previewActive.appendChild(image);
            
            const imgAddElement = document.createElement('div');
            imgAddElement.classList.add('x-item', 'd-inline-block', 'border', 'border-secondary', 'rounded', 'mx-2');
            imgAddElement.innerHTML = `
                <a href="javascript:imgBlockClick(${imgPreviewIndex + 1})" class="img-preview w-100 h-100 d-inline-block position-relative">
                    <input type="file" accept="image/*">
                    <div class="dli-plus-wrap">
                        <span class="dli-plus"></span>
                    </div>
                </a>
            `;
            xScroll.appendChild(imgAddElement);
            
            currentIndex++;
            xScroll.scrollLeft = xScroll.scrollWidth - xScroll.clientWidth;
            fileInput.removeEventListener('change', handleAddEvent);
        };
        
        reader.readAsDataURL(selectedFile);
    }

    const handleChangeEvent = function (changeEvent) {
        let selectedFile = changeEvent.target.files[0];
        
        reader.onload = function(readerEvent) {
            var readerResult = readerEvent.target.result;
            let previewChangeImg = previewActive.querySelector('img');
            previewChangeImg.setAttribute('src', readerResult);
        };

        reader.readAsDataURL(selectedFile);
        fileInput.removeEventListener('change', handleChangeEvent);
    }

    if (clicked) {
        fileInput.addEventListener('change', handleAddEvent);
    } else {
        fileInput.addEventListener('change', handleChangeEvent);
        modalContent.classList.remove('active');
    }
}


xItems[0].classList.add('active');

function imgBlockClick(imgPreviewIndex) {
    imgPreviews = document.querySelectorAll('div .img-preview');
    const fileInput = imgPreviews[imgPreviewIndex].querySelector('input');
    let clicked;

    if (imgPreviewIndex === currentIndex) {
        if (fileInput) {
            fileInput.click();
            clicked = true;
            handlePreviewClick(fileInput, imgPreviewIndex, clicked);
        }
    } else {
        modalImage.innerHTML = '';
        modalContent.classList.add('active');
        modalContent.addEventListener('click', (exitEvent) => {
            if (exitEvent.target == modalContent) {
                modalContent.classList.remove('active');
            }
        });
        
        const currentImg = imgPreviews[imgPreviewIndex].querySelector('img');
        const currentImgSrc = currentImg.getAttribute('src');

        var image = document.createElement('img');
        image.src = currentImgSrc;
        image.classList.add('w-100');
        modalImage.appendChild(image);

        changeImg.onclick = () => {
            fileInput.click();
            clicked = false;
            handlePreviewClick(fileInput, imgPreviewIndex, clicked);
        }

        removeImg.onclick = () => {
            imgPreviews[imgPreviewIndex].parentNode.remove();
            imgPreviews = document.querySelectorAll('div .img-preview');
            for (let i = 0; i < imgPreviews.length; i++) {
                let newLink = "javascript:imgBlockClick(" + i +")";
                imgPreviews[i].setAttribute('href', newLink);
            }
            modalContent.classList.remove('active');
            currentIndex--;
        }
    }
}
