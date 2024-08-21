// 🎯 TODO щас: ДУМАТЬ КАК ПРАВИЛЬНО РАСКИДАТЬ changeActive - там нужен будет аргумент для кликов)

// SLIDER
const slider = document.querySelector('.slider')
const track = document.querySelector('.slider-track')
const slideWidth = document.querySelector('.slider-track video').clientWidth
const timeLine = document.querySelector('.time-line')
const dots = document.querySelector('.dots').children
let activeSlideIdx = 0
const TIME = 2500 // 8000

timeLine.style.transition = `width ${TIME / 1000 + 's'} linear`
timeLine.classList.add('time-line--disappear')
let sliderInterval = setInterval(() => {
  // document.querySelector('.time-line').remove()

  timeLine.style.transition = ''
  timeLine.classList.remove('time-line--disappear')

  activeSlideIdx++
  if (activeSlideIdx > 2) activeSlideIdx = 0
  dots[activeSlideIdx].click()

  // setTimeout(() => {
  //   timeLine.style.transition = `width ${TIME / 1000 + 's'} linear`
  //   timeLine.classList.add('time-line--disappear')
  // }, 10)

  // const newTimeLine = document.createElement('div')
  // newTimeLine.classList.add('time-line')
  // slider.insertAdjacentElement('beforeend', newTimeLine)
  // newTimeLine.style.transition = `width ${TIME / 1000 + 's'} linear`
  // setTimeout(() => {
  //   newTimeLine.classList.add('time-line--disappear')
  // }, 10)
}, TIME)

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

    requestAnimationFrame(() => {
      timeLine.style.transition = `width ${TIME / 1000 + 's'} linear`
      timeLine.classList.add('time-line--disappear')
    })

    document.querySelector('.dot--active').classList.remove('dot--active')
    dot.classList.add('dot--active')
    dot.classList.remove('dot--hovered')
  })
}

function setSlider() {
  let sliderInterval = setInterval(() => {
    document.querySelector('.time-line').remove()
  
    changeActiveSlideIdx()
    dots[activeSlideIdx].click()
  
    destroyCurrentAndCreateNewTimeLine()
  }, TIME)

  return sliderInterval
}

function changeActiveSlideIdx() {
  activeSlideIdx++
  if (activeSlideIdx > 2) activeSlideIdx = 0
}

function slide(mult) {
  track.style.transform = `translate3d(-${slideWidth * mult}px, 0, 0)`
}

function destroyCurrentAndCreateNewTimeLine() {
  const newTimeLine = document.createElement('div')
  newTimeLine.classList.add('time-line')
  slider.insertAdjacentElement('beforeend', newTimeLine)
  newTimeLine.style.transition = `width ${TIME / 1000 + 's'} linear`
  setTimeout(() => {
    newTimeLine.classList.add('time-line--disappear')
  }, 10) // hack. IDK why not working without setTimeout
}