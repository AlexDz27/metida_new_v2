// Tabs
$(".product-tabs").each(function(i, el) {
    
  $(el).find(".product-tabs__tab").each(function(index, tab) {
      $(tab).attr("data-tab-id", index)
  })
  $(el).find(".product-tabs__content").each(function(index, tab) {
      $(tab).attr("data-tab-id", index)
  })

});

$(".product-tabs__tab").click(function() {
  let tabId = $(this).attr("data-tab-id")
  $(this).parents(".product-tabs__header").find(".product-tabs__tab").removeClass("product-tabs__tab_active")
  $(this).addClass("product-tabs__tab_active")

  $(this).parents(".product-tabs").find(`.product-tabs__content`).hide()
  $(this).parents(".product-tabs").find(`.product-tabs__content[data-tab-id=${tabId}]`).show()
})

// BURGER
const burgerBtn = document.querySelector('.burger')
const burgerMenu = document.querySelector('.burger-menu')
const burgerBtnClose = burgerMenu.querySelector('.btn-close')
burgerBtn.onclick = () => {
  burgerMenu.classList.add('burger-menu-active')
}
burgerBtnClose.onclick = () => {
  burgerMenu.classList.remove('burger-menu-active')
}
window.addEventListener('click', (e) => {
  // TODO: rem when finishing
  if (e.target.tagName === 'VIDEO') return

  if (e.target === burgerBtn) return
  if (burgerMenu.contains(e.target)) return

  burgerMenu.classList.remove('burger-menu-active')
})

// Оставить заявку
const ostZayavBtn = document.querySelector('#ost-zayav')
const ostZayavFormCnt = document.querySelector('.popup')
const ostZayavFormCntCloseBtn = document.querySelector('#popupClose')
const spasibo = document.querySelector('.spasibo')
ostZayavBtn.addEventListener('click', () => {
  ostZayavFormCnt.style.display = 'flex'
})
ostZayavFormCntCloseBtn.onclick = () => {
  ostZayavFormCnt.style.display = 'none'
}
window.addEventListener('click', (e) => {
  if (e.target === ostZayavBtn) return
  if (ostZayavFormCnt.contains(e.target) && !e.target.classList.contains('popup')) return
  ostZayavFormCnt.style.display = 'none'

  if (spasibo.contains(e.target) && !e.target.classList.contains('popup')) return
  spasibo.style.display = 'none'
})
document.onkeydown = (e) => {
  if (e.key === 'Escape') {
    ostZayavFormCnt.style.display = 'none'
    spasibo.style.display = 'none'
  }
}
spasibo.querySelector('button').addEventListener('click', () => {
  spasibo.style.display = 'none'
})

// SLIDER
// load нужен чтобы slideWidth четко брался из того положения, когда видео уже реально встало как надо благодаря CSS. Иначе может быть "баг", что slideWidth берется меньший чем нужно из-за, как я понимаю, того что CSS еще не придал тегу video нужные размеры
window.addEventListener('load', () => {
  const track = document.querySelector('.slider-track')
  void document.querySelector('.slider-track video').clientWidth
  let slideWidth = document.documentElement.clientWidth
  const timeLine = document.querySelector('.time-line')
  const dots = document.querySelector('.dots').children
  const videos = document.querySelectorAll('.slider-track video')
  let activeSlideIdx = 0
  // const TIME = 2500
  // const TIME = 8000
  const TIME = 3500 // 3500 вроде норм
  let timeLineAnimStartTime = new Date()
  let timeLineAnimTimeLeft = TIME
  let isSliderStopped = false // behavior of first true is undefined
  let sliderTimeout

  // fix того, что слайдер ебется слайдами при +зуме и -зуме
  console.debug(slideWidth)
  window.onresize = () => {
    void document.querySelector('.slider-track video').clientWidth
    void document.documentElement.clientWidth
    slideWidth = document.documentElement.clientWidth
    console.debug(slideWidth)
    console.debug(document.documentElement.clientWidth, 'document.documentElement.clientWidth')
    track.style.transform = `translate3d(-${document.documentElement.clientWidth * activeSlideIdx}px, 0, 0)`
  }

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

// Photogallery slider
// const photoGalleryStageReal = document.querySelector('.photogallery-cont-stage-real')
// photoGalleryStageReal.style.width = document.documentElement.clientWidth + 'px'

// const photoGallery = document.querySelector('.photogallery')
// const photogalleryContTrack = photoGallery.querySelector('.photogallery-cont-stage')
// const prevBtnP = photoGallery.querySelector('.photogallery-btn-prev')
// const nextBtnP = photoGallery.querySelector('.photogallery-btn-next')
// let stageSlideP = 1
// prevBtnP.onclick = () => {
  // stageSlideP--;
  // prevBtnP.disabled = !(stageSlideP > 0)
  // nextBtnP.disabled = stageSlideP === 2

  // photogalleryContTrack.style.transform = `translate3d(-${(638) * stageSlideP}px, 0, 0)`
// }
// nextBtnP.onclick = () => {
  // stageSlideP++;
  // prevBtnP.disabled = !(stageSlideP > 0)
  // nextBtnP.disabled = stageSlideP === 2

  // stuff2Track.style.transform = `translate3d(-${(638) * stageSlideP}px, 0, 0)`
// }

// Click and view photos
// TODO: rem)
// const imgs = photoGallery.querySelectorAll('img')
// const overlay = document.querySelector('.overlay')
// const overlayImgCont = overlay.querySelector('.overlay-img-cont')
// imgs.forEach(img => {
//   img.addEventListener('click', () => {
//     overlay.style.display = 'block'

//     const cloned = img.cloneNode()
//     overlayImgCont.style.top = `calc(50% - ${675}px / 2)`
//     overlayImgCont.style.left = `calc(50% - ${1100}px / 2)`

//     overlayImgCont.insertAdjacentElement('afterbegin', cloned)
//     overlayImgCont.querySelector('img').style.maxWidth = '1100px'
//   })
// })
// overlay.addEventListener('click', (e) => {
//   if (e.target.tagName === 'IMG') return

//   overlay.style.display = 'none'
//   overlay.querySelector('img').remove()
// })
// document.onkeydown = (e) => {
//   if (e.key === 'Escape') {
//     overlay.style.display = 'none'
//     overlay.querySelector('img').remove()
//   }
// }

// Slider logos
// const stuff2 = document.querySelector('.stuff-2')
// const stuff2Track = stuff2.querySelector('.stuff-2-track')
// const stuff2TrackWidth = stuff2.querySelector('.stuff-2-track').clientWidth
// const prevBtn = stuff2.querySelector('#stuff2-prev')
// const nextBtn = stuff2.querySelector('#stuff2-next')
// let stageSlide = 0
// prevBtn.onclick = () => {
//   stageSlide--;
//   prevBtn.disabled = !(stageSlide > 0)
//   nextBtn.disabled = stageSlide === 2

//   stuff2Track.style.transform = `translate3d(-${(stuff2TrackWidth) * stageSlide}px, 0, 0)`
// }
// nextBtn.onclick = () => {
//   stageSlide++;
//   prevBtn.disabled = !(stageSlide > 0)
//   nextBtn.disabled = stageSlide === 2

//   stuff2Track.style.transform = `translate3d(-${(stuff2TrackWidth) * stageSlide}px, 0, 0)`
// }

// Form in Оставить заявку popup
const formOZ = document.querySelector('form.popup__inner')
const submitBtnOZ = formOZ.querySelector('button[type=submit]')
formOZ.onsubmit = (e) => {
  e.preventDefault()
  ostZayavFormCnt.style.display = 'none'
  spasibo.style.display = 'flex'
}

// Form in section
const form = document.querySelector('form.cont')
const submitBtn = form.querySelector('button[type=submit]')
form.onsubmit = (e) => {
  e.preventDefault()
  submitBtn.disabled = true

  const formData = new FormData(form)
  fetch('/receive-applications.php', {
    method: 'POST',
    body: formData
  })
    .then(r => r.text())
    .then(r => {
      submitBtn.disabled = false
      spasibo.style.display = 'flex'
    })
}

// iframe
document.querySelector('.iframe').ondblclick = () => {
  document.querySelector('iframe').style.pointerEvents = 'auto'
  document.querySelector('.iframe-text').style.display = 'none'
}

// Sasha
const swiper = new Swiper('.greeting-slider', {
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 500,
  freeMode: true,
  loop: true,


  pagination: {
      el: ".greeting-slider-pagination",
      clickable: true,
  }
  
});

const swiperPh = new Swiper('.photogallery-cont-stage', {
  slidesPerView: 1.2,
  spaceBetween: 10,
  speed: 500,

  navigation: {
      nextEl: '.photogallery-btn-next',
      prevEl: '.photogallery-btn-prev',
  },

  breakpoints: {
      992: {
          slidesPerView: 2.5,
      },
      768: {
          spaceBetween: 15,
      },
      576: {
          slidesPerView: 1.8,
      }
  }

  
  
});


$('.photogallery .img-cont').magnificPopup({
  type: 'image',
  gallery:{
    enabled:true
  }
  
});

const swiperL = new Swiper('.stuff-2-stage', {
  slidesPerView: 1,
  slidesPerGroup: 1,
  spaceBetween: 10,
  // speed: 500,
  // freeMode: true,
  // loop: true,

  breakpoints: {
      992: {
          slidesPerView: 4,
          slidesPerGroup: 4,
          spaceBetween: 30
      },
      768: {
          slidesPerView: 3,
          slidesPerGroup: 3,
          spaceBetween: 20
      },
      480: {
          slidesPerView: 2,
          slidesPerGroup: 2
      }
  },


  navigation: {
      nextEl: '#stuff2-next',
      prevEl: '#stuff2-prev',
  },

  
});
