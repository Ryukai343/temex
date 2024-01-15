// const slider = document.querySelector(".image-comparison .slider");
// const beforeImage = document.querySelector(".image-comparison .before-image");
// const sliderLine = document.querySelector(".image-comparison .slider-line");
// const sliderIcon = document.querySelector(".image-comparison .slider-icon");

slider = document.getElementsByClassName("slider");
beforeImage = document.getElementsByClassName("before-image");
sliderLine = document.getElementsByClassName("slider-line");
sliderIcon = document.getElementsByClassName("slider-icon");

for (let i = 0; i < slider.length; i++) {
    slider[i].addEventListener("input", (e) => {
        let sliderValue = e.target.value + "%";

        beforeImage[i].style.width = sliderValue;
        sliderLine[i].style.left = sliderValue;
        sliderIcon[i].style.left = sliderValue;
    });
}

