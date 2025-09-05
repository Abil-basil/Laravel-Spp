const container = document.querySelector('.container');

container.addEventListener('click', (e) => {
    if (e.target.classList.contains('delete-warning')) {
        if (!confirm('yakin ingin menghapus')) {
            e.preventDefault()
        }
    }
});