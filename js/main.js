// SLIDER
const track = document.querySelector('.slider-track')
const slideWidth = document.querySelector('.slider-track video').clientWidth
const timeLine = document.querySelector('.time-line')
const dots = document.querySelector('.dots').children
let activeSlideIdx = 0
const TIME = 5000 // 8000

timeLine.style.transition = `width ${TIME / 1000 + 's'} linear`
timeLine.classList.add('time-line--disappear')
let sliderInterval = setInterval(() => {
  timeLine.style.width = ''
  timeLine.classList.add('time-line--disappear')

  activeSlideIdx++
  if (activeSlideIdx > 2) activeSlideIdx = 0

  dots[activeSlideIdx].click()

  timeLine.style.width = '100%'
}, 5000)

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

    document.querySelector('.dot--active').classList.remove('dot--active')
    dot.classList.add('dot--active')
    dot.classList.remove('dot--hovered')
  })
}

function slide(mult) {
  track.style.transform = `translate3d(-${slideWidth * mult}px, 0, 0)`
}
