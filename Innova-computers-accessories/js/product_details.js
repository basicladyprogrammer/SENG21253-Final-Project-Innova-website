const productImages = document.querySelectorAll(".product-images img");
const productImagesSlide = document.querySelector(".image-slider");

let activeImageSlide = 0;

productImages.forEach((item,i)=>{
    item.addEventListener('click',()=>{
        productImages[activeImageSlide].classList.remove('active');
        item.classList.add('active');
        productImagesSlide.style.backgroundImage = `url('${item.src}')`
        activeImageSlide =i;
    })
})


//toggle size button
const colorBtns = document.querySelectorAll('.color-radio-btn');
let checkedBtn =0;

colorBtns.forEach((item,i)=>{
    item.addEventListener('click', () =>{
        colorBtns[checkedBtn].add('check');
        checkedBtn=i;
    })
})