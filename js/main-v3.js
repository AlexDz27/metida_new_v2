// SLIDER
const slider = document.querySelector('.slider')
const track = document.querySelector('.slider-track')
let slideWidth = document.querySelector('.slider-track img').clientWidth
let activeSlideIdx = 0
const TIME = 3000
// const TIME = 2500 // 8000
let isSliderStopped = false // behavior of first true is undefined
let sliderTimeout

window.onresize = () => {
  void document.querySelector('.slider-track img').clientWidth
  slideWidth = document.querySelector('.slider-track img').clientWidth
  console.log(slideWidth)
}

// let sliderInterval = set Interval(sliderIntervalF, TIME)

function sliderIntervalF() {
  activeSlideIdx++; if (activeSlideIdx > 2) activeSlideIdx = 0;
  slide(activeSlideIdx)
}

function slide(mult) {
  track.style.transform = `translate3d(-${slideWidth * mult}px, 0, 0)`
}
