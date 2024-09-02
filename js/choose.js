// Event listener for drag start
document.querySelectorAll('.catalogue-item').forEach(item => {
  item.addEventListener('dragstart', dragStart);
});

// Event listeners for the drop zone
const dropzone = document.querySelector('.floating');
dropzone.addEventListener('dragover', dragOver);
dropzone.addEventListener('drop', drop);

// Function to handle the drag start event
function dragStart(e) {
  console.log(e.target)
  e.dataTransfer.setData('text/plain', e.target.id);
}

// Function to allow the drop by preventing default behavior
function dragOver(e) {
  e.preventDefault();
}

// Function to handle the drop event
function drop(e) {
  e.preventDefault();
  const id = e.dataTransfer.getData('text');
  const draggableElement = document.getElementById(id);
  draggableElement.querySelector('p').remove()

  e.target.appendChild(draggableElement);
}
