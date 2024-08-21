// 🎯 TODO щас: ДУМАТЬ КАК ПРАВИЛЬНО РАСКИДАТЬ changeActive - там нужен будет аргумент для кликов)

// SLIDER
const slider = document.querySelector('.slider')
const track = document.querySelector('.slider-track')
const slideWidth = document.querySelector('.slider-track video').clientWidth
const timeLine = document.querySelector('.time-line')
const dots = document.querySelector('.dots').children
let activeSlideIdx = 0
const TIME = 2500 // 8000

function resetTimeLine() {
  timeLine.style.transition = ''
  timeLine.classList.remove('time-line--disappear')

  // Force reflow to ensure the changes are applied
  void timeLine.offsetWidth; // TODO: ?

  // Reapply the transition and the class to restart the animation
  timeLine.style.transition = `width ${TIME / 1000}s linear`;
  requestAnimationFrame(() => {
    timeLine.classList.add('time-line--disappear');
  });
}

let timeLineAppearIdx = 0
timeLine.style.transition = `width ${TIME / 1000 + 's'} linear`
timeLine.classList.add('time-line--disappear')
let sliderInterval = setInterval(() => {
  if (timeLineAppearIdx === 0) {
    timeLine.style.transition = ''
    timeLine.classList.remove('time-line--disappear')
  } else {
    resetTimeLine()
  }

  activeSlideIdx++
  if (activeSlideIdx > 2) activeSlideIdx = 0
  dots[activeSlideIdx].click()

  timeLineAppearIdx++
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
    
    resetTimeLine()

    document.querySelector('.dot--active').classList.remove('dot--active')
    dot.classList.add('dot--active')
    dot.classList.remove('dot--hovered')
  })
}

function slide(mult) {
  track.style.transform = `translate3d(-${slideWidth * mult}px, 0, 0)`
}
