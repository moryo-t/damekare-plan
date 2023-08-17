const rangeSlider = document.querySelector('.gauge-slider');
const baseColor = '#EFEFEF';
const activeColor = '#89EAFFCC';
const price = document.getElementById('price');
const priceList = [0, 500, 1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000, 15000, 20000, 25000, 30000, 35000, 40000, 45000, 50000, 60000, 70000, 80000, 90000, 100000];

rangeSlider.addEventListener('input', (event) => {
    const amount = event.target;
    const progressRatio = (amount.value / amount.max) * 100;
    
    rangeSlider.style.background = `linear-gradient(to right, ${activeColor} ${progressRatio}%, ${baseColor} ${progressRatio}%)`;

    if (amount.value < priceList.length -1) {
        let priceMolding = priceList[amount.value].toLocaleString();
        price.textContent = priceMolding + "円";
    } else {
        price.textContent = "10万円以上";
    }
})