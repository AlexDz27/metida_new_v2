const form = document.querySelector('form')
const nameInput = form.querySelector('input[name=name]')
form.onsubmit = (e) => {
  e.preventDefault()

  const name = nameInput.value.trim()

  if (name.length === 0) {
    alert('form not filled')
  } else {
    const formData = new FormData(form)
    fetch('/receive-messages.php', {
      method: 'POST',
      body: formData
    })
      .then(r => r.text())
      .then(r => console.log(r))
  }
}