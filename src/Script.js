function openSide(a) {
    document.getElementById(a).style.width = "350px";
}

function closeSide(a) {
    document.getElementById(a).style.width = "0";
}

function currentSlide(n, Class) {
    showSlides(slideIndex = n, Class);
}  


let slideIndexSlide = 1;
let slideIndexPopular = 1;
let slideIndexNew = 1
let slideIndexDeal = 1;
let slideIndexOther = 1;

showSlides(slideIndexSlide, "slide");
showSlides(slideIndexPopular, "popular-products");
showSlides(slideIndexNew, "new-products");
showSlides(slideIndexDeal, "deal-products");
showSlides(slideIndexOther, "other-products");


function plusSlide(n, Class) {
    if (Class === "slide") {
        slideIndexSlide += n;
        showSlides(slideIndexSlide, Class);
    } 
    
    else if (Class === "popular-products") {
        slideIndexPopular += n;
        showSlides(slideIndexPopular, Class);
    }

    else if (Class === "new-products") {
        slideIndexNew += n;
        showSlides(slideIndexNew, Class);
    }

    else if (Class === "deal-products") {
        slideIndexDeal += n;
        showSlides(slideIndexDeal, Class);
    }

    else if (Class === "other-products") {
        slideIndexOther += n;
        showSlides(slideIndexOther, Class);
    }
}

function showSlides(n, Class) {
    let slides = document.getElementsByClassName(Class);
    let slideIndex = (Class === "slide" ? slideIndexSlide : Class === "popular-products" ? slideIndexPopular : Class === "new-products" ? slideIndexNew : Class === "deal-products" ? slideIndexDeal : slideIndexOther);

    if (n > slides.length) {
        slideIndex = 1
    }

    if (n < 1) {
        slideIndex = slides.length
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    if (Class=="slide") {
        slideIndexSlide = slideIndex;
        slides[slideIndex-1].style.display = "block";
    }

    else if (Class=="popular-products") {
        slideIndexPopular = slideIndex;
        slides[slideIndex-1].style.display = "flex";
    }

    else if (Class=="new-products") {
        slideIndexNew = slideIndex;
        slides[slideIndex-1].style.display = "flex";
    }

    else if (Class=="deal-products") {
        slideIndexDeal = slideIndex;
        slides[slideIndex-1].style.display = "flex";
    }

    else if (Class=="other-products") {
        slideIndexOther = slideIndex;
        slides[slideIndex-1].style.display = "flex";
    }
}

function syncQuantity() {
    var quantity = document.getElementById("quantity").value;
    document.getElementById("cartQuantity").value = quantity;
}


setInterval(() => {
    plusSlide(1, "slide");
}, 2000);

setInterval(() => {
    plusSlide(1, "deal-products");
}, 2000);