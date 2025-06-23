const dropzone = document.getElementById('customDropzone');
const fileInput = document.getElementById('fileInput');
const previewContainer = document.getElementById('preview');

// Handle click to open file dialog
dropzone.addEventListener('click', () => fileInput.click());

// Handle file selection
fileInput.addEventListener('change', () => handleFiles(fileInput.files));

// Handle drag over
dropzone.addEventListener('dragover', (e) => {
  e.preventDefault();
  dropzone.classList.add('dragover');
});

// Handle drag leave
dropzone.addEventListener('dragleave', () => {
  dropzone.classList.remove('dragover');
});

// Handle drop
dropzone.addEventListener('drop', (e) => {
  e.preventDefault();
  dropzone.classList.remove('dragover');
  handleFiles(e.dataTransfer.files);
});

// Preview function
function handleFiles(files) {
  Array.from(files).forEach(file => {
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = (e) => {
        const img = document.createElement('img');
        img.src = e.target.result;
        previewContainer.appendChild(img);
      };
      reader.readAsDataURL(file);
    } else {
      const div = document.createElement('div');
      div.textContent = file.name;
      div.classList.add('text-light');
      previewContainer.appendChild(div);
    }
  });
}

