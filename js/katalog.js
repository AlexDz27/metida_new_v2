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
  if (e.target.classList.contains('dot')) return

  burgerMenu.classList.remove('burger-menu-active')
})

// Оставить заявку
const ostZayavBtn = document.querySelector('#ost-zayav')
const ostZayavBtnBurg = document.querySelector('#ost-zayav-burg')
const ostZayavFormCnt = document.querySelector('.popup')
const ostZayavFormCntCloseBtn = document.querySelector('#popupClose')
const ostZayavForm = document.querySelector('#ostZayavForm')
const spasibo = document.querySelector('.spasibo')
ostZayavBtn.addEventListener('click', () => {
  ostZayavFormCnt.style.display = 'flex'
})
ostZayavFormCntCloseBtn.onclick = () => {
  ostZayavFormCnt.style.display = 'none'
}
window.addEventListener('click', (e) => {
  if (e.target === ostZayavBtn) return
  if (e.target === ostZayavBtnBurg) return
  if (ostZayavFormCnt.contains(e.target) && !e.target.classList.contains('popup')) return
  if (e.target.classList.contains('dot')) return
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

ostZayavBtnBurg.addEventListener('click', (e) => {
  ostZayavFormCnt.style.display = 'flex'
})

// Form in Оставить заявку popup
const formOZ = document.querySelector('form.popup__inner')
const submitBtnOZ = formOZ.querySelector('button[type=submit]')
formOZ.onsubmit = (e) => {
  e.preventDefault()
  const formData = new FormData(ostZayavForm)
  fetch('/receive-applications.php', {
    method: 'POST',
    body: formData
  })
    .then(r => r.text())
    .then(r => {
      ostZayavFormCnt.style.display = 'none'
      spasibo.style.display = 'flex'
    })
    .catch(err => {
      alert("Ошибка отправки формы: сайт не отвечает. Попробуйте связаться с нами по телефону или почте")
    })

  setTimeout(() => {
    alert(`
Примерно так будет выглядеть заявка:

${getDateTime()}
Иван Иванов
+375 (33) 819 12 24 ${formData.get('email') ? '\nivanivanov@myorg.by' : ''}
ООО "Яблоневый сад"

Хочу закупить средство защиты растений "СУПРА, СЭ". Свяжитесь со мной и сделайте коммерческое предложение…
`)
  }, 1000)
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
    id: 'nitrat-kaltsiya',
    name: 'Нитрат кальция',
    img: '/img/katalog/udobreniya/kalc.png',
    url: '/katalog/udobreniya/nitrat-kaltsiya'
  },
  {
    id: 'monokaliyfosfat',
    name: 'Монокалийфосфат',
    img: '/img/katalog/udobreniya/mono.jpg',
    url: '/katalog/udobreniya/monokaliyfosfat'
  },
  {
    id: 'sulfat-kaliya',
    name: 'Сульфат калия',
    img: '/img/katalog/udobreniya/sulf.jpg',
    url: '/katalog/udobreniya/sulfat-kaliya'
  },

  {
    id: 'supra-se',
    name: 'Супра, СЭ',
    img: '/img/katalog/szr/supra-se-transp.png',
    url: '/katalog/szr/supra-se'
  },
  {
    id: 'chugur-sk',
    name: 'Чугур, СК',
    img: '/img/katalog/szr/chugur-sk.jpg',
    url: '/katalog/szr/chugur-sk'
  },
  {
    id: 'kunicza-ks',
    name: 'Куница, КС',
    img: '/img/katalog/szr/kunicza-ks.jpg',
    url: '/katalog/szr/kunicza-ks'
  },
  {
    id: 'metatron-ks',
    name: 'Метатрон, КС',
    img: '/img/katalog/szr/metatron-ks.jpg',
    url: '/katalog/szr/metatron-ks'
  },
  {
    id: 'groza-vr',
    name: 'Гроза, ВР',
    img: '/img/katalog/szr/groza-vr.jpg',
    url: '/katalog/szr/groza-vr'
  },
  {
    id: 'groza-ultra-vr',
    name: 'Гроза Ультра, ВР',
    img: '/img/katalog/szr/groza-ultra-vr.jpg',
    url: '/katalog/szr/groza-ultra-vr'
  },
  {
    id: 'gerbisan-se',
    name: 'Гербисан, СЭ',
    img: '/img/katalog/szr/gerbisan-se.jpg',
    url: '/katalog/szr/gerbisan-se'
  },
  {
    id: 'betrisan-ke',
    name: 'Бетрисан, КЭ',
    img: '/img/katalog/szr/bretiskan-big__jpg.jpg',
    url: '/katalog/szr/betrisan-ke'
  },
]
const search = document.querySelector('input[type=search]')
const searchResultsCnt = document.querySelector('.search-input-results')
search.addEventListener('input', (e) => {
  searchResultsCnt.innerHTML = ''
  const input = e.target.value
  if (input === '') return

  products.forEach(p => {
    if (p.name.toLowerCase().includes(input.toLowerCase())) {
      console.debug(p.name)
      searchResultsCnt.innerHTML += `
        <a href="${p.url}" class="search-input-result">
          <img src="${p.img}" alt="">
          <span>${p.name}</span>
        </a>
      `
    }
  })
  console.debug('-----')
})
search.addEventListener('focus', () => {
  searchResultsCnt.innerHTML = ''
  searchResultsCnt.style.display = 'block'
  if (search.value === '') return

  products.forEach(p => {
    if (p.name.toLowerCase().includes(search.value.toLowerCase())) {
      searchResultsCnt.innerHTML += `
        <a href="${p.url}" class="search-input-result">
          <img src="${p.img}" alt="">
          <span>${p.name}</span>
        </a>
      `
    }
  })
})
window.addEventListener('click', (e) => {
  if (e.target === search) return

  searchResultsCnt.style.display = 'none'
})

// Показать/спрятать продукты СЗР в зависимости от подкатегории
const sidebarItems = document.querySelectorAll('.catalog-sidebar__item')
sidebarItems.forEach((i) => {
  i.addEventListener('click', () => {
    document.querySelector('.catalog-sidebar__item_active').classList.remove('catalog-sidebar__item_active')
    i.classList.add('catalog-sidebar__item_active')
    document.querySelectorAll('.catalog__product').forEach(p => {
      p.style.display = 'block'
    })

    if (i.innerText === 'Гербициды') {
      document.querySelector('#chugur').style.display = 'none'
    } else if (i.innerText === 'Фунгициды') {
      document.querySelectorAll('.catalog__product').forEach(p => {
        p.style.display = 'none'
      })
      document.querySelector('#chugur').style.display = 'block'
    }
  })
})

// TODO: везде подобавлять айдишники
// Функционал, чтоб когда нажал на кнопку ЗАКАЗАТЬ, которая находится ниже, заполнялась textarea с выбранным продуктом
const windowLocPathSplit = window.location.pathname.split('/')
const curProductRoute = windowLocPathSplit.pop() // unused
const curProductCat = windowLocPathSplit.pop()
const productCatToReadable = {
  'udobreniya': 'удобрение',
  'szr': 'средство защиты растений',
}
const productName = document.querySelector('.product__title')?.innerText
zakazBtn?.addEventListener('click', () => {
  ostZayavFormCnt.style.display = 'flex'
  ostZayavFormCnt.querySelector('textarea').value = `Хочу закупить ${productCatToReadable[curProductCat]} "${productName}". Свяжитесь со мной и сделайте коммерческое предложение…`
})

function getDateTime() {
  var now     = new Date(); 
  var year    = now.getFullYear();
  var month   = now.getMonth()+1; 
  var day     = now.getDate();
  var hour    = now.getHours();
  var minute  = now.getMinutes();
  var second  = now.getSeconds(); 
  if(month.toString().length == 1) {
       month = '0'+month;
  }
  if(day.toString().length == 1) {
       day = '0'+day;
  }   
  if(hour.toString().length == 1) {
       hour = '0'+hour;
  }
  if(minute.toString().length == 1) {
       minute = '0'+minute;
  }
  if(second.toString().length == 1) {
       second = '0'+second;
  }   
  var dateTime = day+'.'+month+'.'+year+' '+hour+':'+minute+':'+second;
  return dateTime;
}