const editor = new EditorJS({
  holder: 'editorjs',
  tools: {
    header: {
      class: Header,
      inlineToolbar: true
    },
    image: {
      class: ImageTool,
      inlineToolbar: true,
      config: {
        endpoints: {
          byFile: 'http://localhost/04ksdi9qsLjp1467jq-write-uploadimage.php'
        }
      }
    }
  },
  autofocus: true,
  placeholder: 'Напишите текст здесь...'
})

// TODO: TITLE для новости + заглавная img (url)
const titleInput = document.querySelector('.input-title')
const imgInput = document.getElementById('inputImg')
document.querySelector('button[type=button]').onclick = () => {
  editor.save().then(outputData => {
    console.log(titleInput.value)
    console.log(imgInput.value)
    console.log(imgInput.files[0])

    const editorParser = edjsHTML()
    let html = editorParser.parse(outputData);
    let htmlString = html.join('\n')
    fetch('/receive-news.php', {
      method: 'POST',
      body: htmlString
    })
      .then(r => r.text())
      .then(r => console.log(r))
  }).catch(e => {
    console.log('Saving failed: ', e)
    alert('Произошла ошибка сохранения новости')
  })
}

window.addEventListener('beforeunload', (e) => {
  e.preventDefault()
  e.returnValue = ''
})