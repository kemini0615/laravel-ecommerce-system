const inputEl = document.getElementById('image-upload');
const previewEl = document.getElementById('image-preview');

inputEl.addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
        const url = URL.createObjectURL(file);
        previewEl.src = url;
    }
})
