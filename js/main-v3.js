// SLIDER
const slider = document.querySelector('.slider')
const track = document.querySelector('.slider-track')
let slideWidth = document.querySelector('.slider-track img').clientWidth
let activeSlideIdx = 0
const TIME = 3000
// const TIME = 2500 // 8000
let isSliderStopped = false // behavior of first true is undefined
let sliderTimeout

let sliderInterval = setInterval(sliderIntervalF, TIME)

// fix того, что слайдер ебется слайдами при +зуме и -зуме
console.debug(slideWidth)
window.onresize = () => {
  void document.querySelector('.slider-track img').clientWidth
  slideWidth = document.querySelector('.slider-track img').clientWidth
  console.debug(slideWidth)
  console.debug(document.documentElement.clientWidth, 'document.documentElement.clientWidth')
  track.style.transform = `translate3d(-${document.documentElement.clientWidth * activeSlideIdx}px, 0, 0)`
}

function sliderIntervalF() {
  activeSlideIdx++; if (activeSlideIdx > 2) activeSlideIdx = 0;
  slide(activeSlideIdx)
}

function slide(mult) {
  track.style.transform = `translate3d(-${slideWidth * mult}px, 0, 0)`
}
