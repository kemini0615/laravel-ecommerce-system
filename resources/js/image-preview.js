const inputs = document.querySelectorAll('.input-image');

inputs.forEach(input => {
    input.addEventListener('change', function () {
        const file = this.files[0];

        const previewId = this.getAttribute('data-preview-id'); // this 객체는 이벤트가 발생한 자신(input 태그)을 참조한다
        const preview = document.getElementById(previewId);

        if (file && preview) {
            const url = URL.createObjectURL(file);
            preview.src = url;
        }
    })
})
