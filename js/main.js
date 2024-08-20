// SLIDER
const track = document.querySelector('.slider-track')
const slideWidth = document.querySelector('.slider-track video').clientWidth
const timeLine = document.querySelector('.time-line')
const TIME = 1000
function slide(mult) {
  track.style.transform = `translate3d(-${slideWidth * mult}px, 0, 0)`
}

// setInterval(() => {
//   slide(1)

//   setInterval(() => {
//     slide(2)

//     setInterval(() => {
//       slide(3)
//     }, 2000)
//   }, 2000)
// }, 2000)

// const timeLineInterval = setInterval(() => {
//   timeLine.style.width -= 1
// }, 10)

// timeLine.style.width = '700px'