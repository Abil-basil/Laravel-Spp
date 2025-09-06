const container = document.querySelector('.container');

container.addEventListener('click', (e) => {
    if (e.target.classList.contains('delete-warning')) {
        if (!confirm('yakin ingin menghapus')) {
            e.preventDefault()
        }
    }

    if (e.target.classList.contains('add-list')) {
        e.preventDefault();

        // select
        let form = document.querySelector('#form-input');
        const tr = document.querySelector('tr.text-center');
        const pelangganId = document.querySelector('#pembeli');
        const produkId = document.querySelector('#produk');

        // untuk mengambil data yang di klik di select
        const pelanggan = pelangganId.options[pelangganId.selectedIndex].text;
        const produk = produkId.options[produkId.selectedIndex].text;
        // ambil data langsung
        const pengguna = document.querySelector('input[readonly]').value;
        // console.log(pelanggan);

        // untuk mengambil data dari form
        form = new FormData(form);
        const penggunaIsi = form.get('penggunaId');
        const pelangganIsi = form.get('pelangganId');
        const produkIsi = form.get('produkId');
        const jumlahIsi = form.get('jumlah');

        const newTr = document.createElement('tr');
        // [] di name di gunakan agar request bisa menampung lebih dari 1 value/data (array)
        newTr.innerHTML = `
            <td>
                <span>${pengguna}</span>
                <input type='hidden' name='penggunaId' value='${penggunaIsi}'>
            </td>
            <td>
                <span>${pelanggan}</span>
                <input type='hidden' name='pelangganId' value='${pelangganIsi}'>
            </td>
            <td>
                <span>${produk}</span>
                <input type='hidden' name='produkId[]' value='${produkIsi}'>
            </td>
            <td>
                <span>${jumlahIsi}</span>
                <input type='hidden' name='jumlah[]' value='${jumlahIsi}'>
            </td>
            <td>
                <a href="#" class="text-decoration-none delete-list">x</a>
            </td>
        `;

        tr.after(newTr);
    }

    if (e.target.classList.contains('delete-list')) {
        e.preventDefault();
        e.target.parentElement.parentElement.remove()
    }
});