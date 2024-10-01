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

document.querySelector('button[type=button]').onclick = () => {
  editor.save().then(outputData => {
    console.log('Article data: ', outputData)
    const editorParser = edjsHTML()
    let html = editorParser.parse(outputData);
    console.log(html)
  }).catch(e => {
    console.log('Saving failed: ', e)
  })
}

window.addEventListener('beforeunload', (e) => {
  e.preventDefault()
  e.returnValue = ''
})