// SLIDER
// load нужен чтобы slideWidth четко брался из того положения, когда видео уже реально встало как надо благодаря CSS. Иначе может быть "баг", что slideWidth берется меньший чем нужно из-за, как я понимаю, того что CSS еще не придал тегу video нужные размеры
window.addEventListener('load', () => {
  const track = document.querySelector('.slider-track')
  void document.querySelector('.slider-track video').clientWidth
  let slideWidth = document.querySelector('.slider-track video').clientWidth
  const timeLine = document.querySelector('.time-line')
  const dots = document.querySelector('.dots').children
  const videos = document.querySelectorAll('.slider-track video')
  let activeSlideIdx = 0
  const TIME = 2500
  // const TIME = 8000
  let timeLineAnimStartTime = new Date()
  let timeLineAnimTimeLeft = TIME
  let isSliderStopped = false // behavior of first true is undefined
  let sliderTimeout

  // fix того, что слайдер ебется слайдами при +зуме и -зуме
  console.debug(slideWidth)
  window.onresize = () => {
    void document.querySelector('.slider-track video').clientWidth
    slideWidth = document.querySelector('.slider-track video').clientWidth
    console.debug(slideWidth)
    console.debug(document.documentElement.clientWidth, 'document.documentElement.clientWidth')
    track.style.transform = `translate3d(-${document.documentElement.clientWidth * activeSlideIdx}px, 0, 0)`
  }

  // TODO: uncom
  makeTimeLineDisappear()
  let sliderInterval = setInterval(sliderIntervalF, TIME)

  // TODO: rem
  setTimeout(() => {
    videos[0].click()
  }, 200)

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

  for (let video of videos) {
    video.addEventListener('click', () => {
      isSliderStopped = !isSliderStopped
      if (isSliderStopped) {
        clearTimeout(sliderTimeout)
        clearInterval(sliderInterval)
        makeTimeLineStop()
        const elapsedTime = new Date() - timeLineAnimStartTime
        timeLineAnimTimeLeft = timeLineAnimTimeLeft - elapsedTime

        videos.forEach((video) => {
          video.pause()
          video.title = 'Запустить видео'
        })
        // video.pause()
        // video.title = 'Запустить видео'
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
        // video.play()
        // video.title = 'Остановить видео'
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
})
