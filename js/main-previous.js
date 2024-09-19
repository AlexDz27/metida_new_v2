// SLIDER
const slider = document.querySelector('.slider')
const track = document.querySelector('.slider-track')
const doubleSliderTrack = document.querySelector('.double-slider-slider-track')
// TODO: uncom and rem
// const slideWidth = document.querySelector('.slider-track video').clientWidth
const slideWidth = document.querySelector('.slider-track img').clientWidth
const timeLine = document.querySelector('.time-line')
const dots = document.querySelector('.dots').children
const videos = document.querySelectorAll('.slider-track video')
let activeSlideIdx = 0
const TIME = 6000
// const TIME = 2500 // 8000
let timeLineAnimStartTime = new Date()
let timeLineAnimTimeLeft = TIME
let isSliderStopped = false // behavior of first true is undefined
let sliderTimeout

// TODO: uncom
// makeTimeLineDisappear()
// let sliderInterval = setInterval(sliderIntervalF, TIME)

// TODO: rem
// setTimeout(() => {
//   videos[0].click()
// }, 200)

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
    // TODO: uncom
    // clearInterval(sliderInterval)
    makeTimeLineAppear()

    document.querySelector('.dot--active').classList.remove('dot--active')
    dot.classList.add('dot--active')
    dot.classList.remove('dot--hovered')

    timeLineAnimStartTime = new Date()
    timeLineAnimTimeLeft = TIME
    if (!isSliderStopped) {
      // TODO: uncom
      // makeTimeLineDisappear()
      // sliderInterval = setInterval(sliderIntervalF, TIME)
    }
  })
}

for (let video of videos) {
  video.addEventListener('click', () => {
    isSliderStopped = !isSliderStopped
    if (isSliderStopped) {
      clearTimeout(sliderTimeout)
      // clearInterval(sliderInterval)
      makeTimeLineStop()
      const elapsedTime = new Date() - timeLineAnimStartTime
      timeLineAnimTimeLeft = timeLineAnimTimeLeft - elapsedTime

      videos.forEach((video) => {
        video.pause()
        video.title = 'Запустить видео'
      })
    } else {
      timeLineAnimStartTime = new Date()
      makeTimeLineGoAgain()
      sliderTimeout = setTimeout(() => {
        timeLineAnimStartTime = new Date()
        timeLineAnimTimeLeft = TIME
        sliderIntervalF()
      }, timeLineAnimTimeLeft)

      videos.forEach((video) => {
        video.play()
        video.title = 'Остановить видео'
      })
    }
  })
}


function sliderIntervalF() {
  makeTimeLineAppear()

  activeSlideIdx++
  if (activeSlideIdx > 2) activeSlideIdx = 0
  dots[activeSlideIdx].click()

  makeTimeLineDisappear()
}

function slide(mult) {
  track.style.transform = `translate3d(-${slideWidth * mult}px, 0, 0)`
  doubleSliderTrack.style.transform = `translate3d(-${slideWidth * mult}px, 0, 0)`
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

// CATALOGUE
// Dropdown fix
// const ddLabel = document.querySelector('.catalogue-cat label')
// const dd = ddLabel.querySelector('select')
// const GOOD_DESIGN_AMOUNT = 8
// dd.onchange = (e) => {
//   console.log(e.target.value)
//   console.log(e.target.value.length)
//   if (e.target.value.length !== GOOD_DESIGN_AMOUNT) {
//     const delta = e.target.value.length - GOOD_DESIGN_AMOUNT
//     // ddLabel.style.width = `${ddLabel.style.width + (delta * 5)}px`
//     ddLabel.style.width = `${ddLabel.offsetWidth + (delta * 5)}px`
//   }
// }

const db = {
  categories: {
    'Кукуруза': [],
    'Пшеница': [],
    'Рожь озимая': []
  }
}

const dd = document.querySelector('.catalogue-cat label select')
const kuk = document.querySelector('.kuk')
const psh = document.querySelector('.psh')
const rozh = document.querySelector('.rozh')
dd.onchange = (evt) => {
  if (evt.target.value === 'Кукуруза') {
    kuk.style.display = 'grid'
    psh.style.display = 'none'
    rozh.style.display = 'none'
  } else if (evt.target.value === 'Пшеница') {
    psh.style.display = 'grid'
    kuk.style.display = 'none'
    rozh.style.display = 'none'
  } else if (evt.target.value === 'Рожь озимая') {
    rozh.style.display = 'grid'
    kuk.style.display = 'none'
    psh.style.display = 'none'
  }
}
