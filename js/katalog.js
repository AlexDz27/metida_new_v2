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

// Form in Оставить заявку popup
const formOZ = document.querySelector('form.popup__inner')
const submitBtnOZ = formOZ.querySelector('button[type=submit]')
formOZ.onsubmit = (e) => {
  e.preventDefault()
  ostZayavFormCnt.style.display = 'none'
  spasibo.style.display = 'flex'
}

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

// Search
const products = [
  {
    name: 'Нитрат кальция',
    img: '/img/katalog/udobreniya/kalc.png',
    url: '/katalog/udobreniya/nitrat-kaltsiya'
  },
  {
    name: 'Монокалийфосфат',
    img: '/img/katalog/udobreniya/mono.jpg',
    url: '/katalog/udobreniya/monokaliyfosfat'
  },
  {
    name: 'Сульфат калия',
    img: '/img/katalog/udobreniya/sulf.jpg',
    url: '/katalog/udobreniya/sulfat-kaliya'
  },

  {
    name: 'Супра, СЭ',
    img: '/img/katalog/szr/supra-se-transp.png',
    url: '/katalog/szr/supra-se'
  },
  {
    name: 'Чугур, СК',
    img: '/img/katalog/szr/chugur-sk.jpg',
    url: '/katalog/szr/chugur-sk'
  },
  {
    name: 'Куница, КС',
    img: '/img/katalog/szr/kunicza-ks.jpg',
    url: '/katalog/szr/kunicza-ks'
  },
  {
    name: 'Метатрон, КС',
    img: '/img/katalog/szr/metatron-ks.jpg',
    url: '/katalog/szr/metatron-ks'
  },
  {
    name: 'Гроза, ВР',
    img: '/img/katalog/szr/groza-vr.jpg',
    url: '/katalog/szr/groza-vr'
  },
  {
    name: 'Гроза Ультра, ВР',
    img: '/img/katalog/szr/groza-ultra-vr.jpg',
    url: '/katalog/szr/groza-ultra-vr'
  },
  {
    name: 'Гербисан, СЭ',
    img: '/img/katalog/szr/gerbisan-se.jpg',
    url: '/katalog/szr/gerbisan-se'
  },
  {
    name: 'Бетрисан, КЭ',
    img: '/img/katalog/szr/bretiskan-big__jpg.jpg',
    url: '/katalog/szr/betrisan-ke'
  },
]
// TODO: LINKS