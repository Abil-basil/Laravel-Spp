<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('warning'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="/penjualan" method="POST" id="form-penjualan"> {{-- form-penjualan --}}
                @csrf
                
                <!-- Header Informasi -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="kasir" class="form-label">Kasir</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="pembeli" class="form-label">Pembeli <span class="text-danger">*</span></label>
                        <select name="pelangganId" id="pembeli" class="form-control" required>
                            <option value="">Pilih pelanggan</option>
                            @foreach ($pelanggan as $item)
                            <option value="{{ $item->id }}">{{ $item->NamaPelanggan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Form Tambah Item -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Tambah Item</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="produk" class="form-label">Produk</label>
                                <select id="produk" class="form-control">
                                    <option value="">Pilih produk</option>
                                    @foreach ($produk as $item)
                                    <option value="{{ $item->id }}" data-nama="{{ $item->NamaProduk }}" data-harga="{{ $item->Harga }}" data-stok="{{ $item->Stok }}">
                                        {{ $item->NamaProduk }} - Rp {{ number_format($item->Harga, 0, ',', '.') }} (Stok: {{ $item->Stok }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" min="1" placeholder="Masukan Jumlah">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                {{-- button ini tidak mengirimkan form karena type button bukan submit" --}}
                                <button type="button" class="btn btn-primary w-100" onclick="tambahItem()">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Item -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Daftar Item</h6>
                        <span id="total-items" class="badge bg-primary">0 Item</span> {{-- total-items --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-items">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="items-container"> {{-- items-container --}}
                                <tr id="empty-row"> {{-- empty-row --}}
                                    <td colspan="6" class="text-center text-muted">Belum ada item ditambahkan</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="row mt-3">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="mb-2">Total Pembayaran:</h6>
                                        <h4 class="text-primary mb-0" id="total-harga">Rp 0</h4> {{-- total-harga --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="/penjualan" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success" id="btn-submit" disabled>Simpan Penjualan</button>
                </div>

            </form>
        </div>
    </div>

    {{-- akan menyimpan data data nya di memori terlebih dahulu kecuali halaman di refresh--}}
    <script>
        // menyimpan data sebelum nya di simpan
        let items = [];
        let itemCounter = 0;

        function tambahItem() {
            // select produk dan jumlah
            const produkSelect = document.getElementById('produk');
            const jumlahInput = document.getElementById('jumlah');
            
            // mengambil value/isi yang di input kan produk dan jumlah
            const produkId = produkSelect.value;
            const jumlah = parseInt(jumlahInput.value);
            
            // pengecekan jika produk tidak ada
            if (!produkId) {
                alert('Pilih produk terlebih dahulu!');
                return;
            }
            
            // pengecekan jika jumlah tidak ada atau kurang dari 1
            if (!jumlah || jumlah < 1) {
                alert('Masukan jumlah yang valid!');
                return;
            }

            // mengambil data select option dari produk
            // mengambil atribut custom yang isinya nama, harga dan stok
            const selectedOption = produkSelect.selectedOptions[0];
            const nama = selectedOption.getAttribute('data-nama');
            const harga = parseInt(selectedOption.getAttribute('data-harga'));
            const stok = parseInt(selectedOption.getAttribute('data-stok'));

            // findIndex() = untuk mencari data yang sesuai dengan kondisi dari suatu array, jika ada yang sesuai maka akan mengembalikan
            // index array yang sesuai dengan data, jika tidak maka akan mengembalikan -1
            
            // contoh : 
            // const angka = [10, 20, 30, 40, 50];
            // const index = angka.findIndex(num => num === 30);
            // console.log(index); // 2

            // Cek apakah produk sudah ada
            const existingItemIndex = items.findIndex(item => item.produkId === produkId);
            // jika item tidak di temukan maka akan menghasilkan -1
            
            // jika items ada isinya atau bukan bernilai -1
            if (existingItemIndex !== -1) {
                // Update jumlah jika produk sudah ada
                const totalJumlah = items[existingItemIndex].jumlah + jumlah;
                
                // cek apakah stok mencukupi? jika jumlah lebih banyak dari stok
                if (totalJumlah > stok) {
                    alert(`Stok tidak mencukupi! Stok tersedia: ${stok}, Total yang diminta: ${totalJumlah}`);
                    return;
                }
                
                items[existingItemIndex].jumlah = totalJumlah;
                items[existingItemIndex].subtotal = totalJumlah * harga;
                
            } else {
                // Cek stok
                if (jumlah > stok) {
                    alert(`Stok tidak mencukupi! Stok tersedia: ${stok}`);
                    return;
                }
                
                // Tambah item baru
                // items.push({}) akan menambahkan data seperti array assoc di js namanya objek
                items.push({ 
                    id: ++itemCounter,
                    produkId: produkId,
                    nama: nama,
                    harga: harga,
                    jumlah: jumlah,
                    subtotal: jumlah * harga
                });
            }

            // Reset form
            produkSelect.value = '';
            jumlahInput.value = '';
            
            updateTable();
        }

        function hapusItem(itemId) {
            // untuk memfilter array
            // .filter() = method array yang membuat array baru berisi hanya elemen yang lolos kondisi.
            // Kondisi di sini: item.id !== itemId → artinya ambil semua item yang id-nya tidak sama dengan itemId.
            // Hasilnya: array baru tanpa item yang mau dihapus.

            // items = items.filter(item => item.id !== 2)
            // maka ini akan berisi array yang lolos kondisi seperti 1,3,4,5

            // items = items.filter(item => item.id === 2)
            // maka ini akan berisi array yang lolos kondisi hanya id yang sama dengan 2

            items = items.filter(item => item.id !== itemId);


            updateTable();
        }

        function updateTable() {
            const container = document.getElementById('items-container');
            const emptyRow = document.getElementById('empty-row');
            const totalItems = document.getElementById('total-items');
            const totalHarga = document.getElementById('total-harga');
            const btnSubmit = document.getElementById('btn-submit');

            // Clear container
            container.innerHTML = '';

            // jika items kosong atau tidak ada isinya
            // if (items.length === 0) {
            //     container.appendChild(emptyRow);
            //     totalItems.textContent = '0 Item';
            //     totalHarga.textContent = 'Rp 0';
            //     btnSubmit.disabled = true;
            //     return;
            // }

            let total = 0;
            items.forEach((item, index) => {
                total += item.subtotal;
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="text-center">${index + 1}</td>
                    <td>${item.nama}</td>
                    <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
                    <td class="text-center">${item.jumlah}</td>
                    <td>Rp ${item.subtotal.toLocaleString('id-ID')}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger" onclick="hapusItem(${item.id})">
                            Hapus
                        </button>
                    </td>
                    <input type="hidden" name="items[${index}][produkId]" value="${item.produkId}">
                    <input type="hidden" name="items[${index}][jumlah]" value="${item.jumlah}">
                `;
                container.appendChild(row);
            });

            totalItems.textContent = `${items.length} Item`;
            totalHarga.textContent = `Rp ${total.toLocaleString('id-ID')}`;
            btnSubmit.disabled = false;
        }

        // Validasi form sebelum submit
        document.getElementById('form-penjualan').addEventListener('submit', function(e) {
            const pelangganId = document.getElementById('pembeli').value;
            
            if (!pelangganId) {
                e.preventDefault();
                alert('Pilih pelanggan terlebih dahulu!');
                return;
            }
            
            if (items.length === 0) {
                e.preventDefault();
                alert('Tambahkan minimal satu item!');
                return;
            }
        });
    </script>
</x-layout>