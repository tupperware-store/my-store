const productContainers = [...document.querySelectorAll('#pro-con')];
const nxtBtn = [...document.querySelectorAll('.pre-btn')];
const preBtn = [...document.querySelectorAll('.next-btn')];
productContainers.forEach((item, i) => {
    let containerDimenstions = item.getBoundingClientRect();
    let containerWidth = containerDimenstions.width;
    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })
    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})