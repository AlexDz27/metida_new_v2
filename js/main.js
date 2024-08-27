// SLIDER
const slider = document.querySelector('.slider')
const track = document.querySelector('.slider-track')
const slideWidth = document.querySelector('.slider-track video').clientWidth
const timeLine = document.querySelector('.time-line')
const dots = document.querySelector('.dots').children
const videos = document.querySelectorAll('.slider-track video')
let activeSlideIdx = 0
// const TIME = 2500 // 8000
const TIME = 3000 // 8000
let timeLineAnimStartTime = new Date()
let timeLineAnimTimeLeft = TIME
let isSliderStopped = false
let sliderTimeout

makeTimeLineDisappear()
let sliderInterval = setInterval(sliderIntervalF, TIME)

for (let dot of dots) {
  dot.addEventListener('mouseover', () => {
    if (dot.classList.contains('dot--active')) return
    dot.classList.add('dot--hovered')
  })
  dot.addEventListener('mouseout', () => {
    dot.classList.remove('dot--hovered')
  })

  dot.addEventListener('click', () => {
    activeSlideIdx = Number(dot.dataset.idx)
    slide(activeSlideIdx)
    clearTimeout(sliderTimeout)
    clearInterval(sliderInterval)
    makeTimeLineAppear()

    document.querySelector('.dot--active').classList.remove('dot--active')
    dot.classList.add('dot--active')
    dot.classList.remove('dot--hovered')

    timeLineAnimStartTime = new Date()
    timeLineAnimTimeLeft = TIME
    if (!isSliderStopped) {
      makeTimeLineDisappear()
      sliderInterval = setInterval(sliderIntervalF, TIME)
    }
  })
}

// TODO: icon
for (let video of videos) {
  video.addEventListener('click', () => {
    isSliderStopped = !isSliderStopped
    if (isSliderStopped) {
      clearTimeout(sliderTimeout)
      clearInterval(sliderInterval)
      makeTimeLineStop()
      const elapsedTime = new Date() - timeLineAnimStartTime
      console.log('elapsedTime: ' + elapsedTime)
      console.log('calcs: ' + (timeLineAnimTimeLeft - elapsedTime))
      timeLineAnimTimeLeft = timeLineAnimTimeLeft - elapsedTime
    } else {
      timeLineAnimStartTime = new Date()
      makeTimeLineGoAgain()
      sliderTimeout = setTimeout(() => {
        timeLineAnimStartTime = new Date()
        timeLineAnimTimeLeft = TIME
        sliderIntervalF()
      }, timeLineAnimTimeLeft)
    }
  })
}


function sliderIntervalF() {
  console.log('interval function has just run')
  makeTimeLineAppear()

  activeSlideIdx++
  if (activeSlideIdx > 2) activeSlideIdx = 0
  dots[activeSlideIdx].click()

  makeTimeLineDisappear()
}

function slide(mult) {
  track.style.transform = `translate3d(-${slideWidth * mult}px, 0, 0)`
}

function makeTimeLineDisappear() {
  timeLine.style.transition = `width ${TIME / 1000 + 's'} linear`
  timeLine.classList.add('time-line--disappear')
}
function makeTimeLineAppear() {
  timeLine.style.width = ''

  timeLine.style.transition = ''
  timeLine.classList.remove('time-line--disappear')
  void timeLine.offsetWidth
}
function makeTimeLineStop() {
  timeLine.style.width = timeLine.offsetWidth + 'px'
}
function makeTimeLineGoAgain() {
  timeLine.style.width = ''
  timeLine.style.transition = `width ${timeLineAnimTimeLeft / 1000 + 's'} linear`
  // TODO: (ren) makeTimeLineDisappear(ARG)
  timeLine.classList.add('time-line--disappear')
}