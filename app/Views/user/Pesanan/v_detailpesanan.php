<div style="max-width: 800px; margin: 2rem auto; margin-top: 80px;">
    <h1 style="margin-bottom: 1.5rem; color:#214836; font-family: poppins, sans-serif; ">Pesanan</h1>

    <!-- Container with two columns -->
    <div style="display: flex; justify-content: space-between; color:#214836; margin-top: 30px;">

        <!-- Left Column for Data Diri -->
        <div style="width: 48%; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="margin-bottom: 1rem;">Data Diri</h2>

            <!-- Nama Input -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Nama</label>
                <input type="text" id="nama" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;">
            </div>

            <!-- NIM Input -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">NIM</label>
                <input type="text" id="nim" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;">
            </div>

            <!-- Fakultas Dropdown -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Fakultas</label>
                <select id="fakultas" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;">
                    <option value="">Pilih fakultas</option>
                    <option value="FIK">FIK</option>
                    <option value="FT">FT</option>
                    <option value="FEB">FEB</option>
                    <option value="FH">FH</option>
                    <option value="FK">FK</option>
                    <option value="FIKES">FIKES</option>
                </select>
            </div>

            <!-- Nomor Telepon Input -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Nomor Telepon</label>
                <input type="tel" id="telepon" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;">
            </div>
        </div>

        <!-- Right Column for Detail Pesanan -->
        <div style="width: 48%; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="margin-bottom: 1rem;">Detail Pesanan</h2>

            <!-- Product List -->
            <?php foreach ($cart as $item) : ?>
                <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                    <img src="<?= base_url('Admin') ?>\assets\img\<?= $item['foto'] ?>" alt="<?= $item['product_name'] ?>" style="width: 80px; height: 80px; margin-right: 1rem; border-radius: 8px;">
                    <div>
                        <h5 style="margin-top: 0; margin-bottom: 0.5rem;"><?= $item['product_name'] ?></h5>
                        <p style="margin-bottom: 0.25rem;">Rp<?= number_format($item['price'], 2, ',', '.') ?></p>
                        <p style="margin-bottom: 0;">x<?= $item['quantity'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Total Price -->
            <?php 
            $totalCart = 0;
            foreach ($cart as $item) {
                $itemTotal = $item['price'] * $item['quantity'];
                $totalCart += $itemTotal;
                ?>
                
            <?php } ?>

            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #ccc; padding-top: 1rem;">
                <h3 style="margin-bottom: 0;">Total</h3>
                <h3 style="margin-bottom: 0;">Rp<?= number_format($totalCart, 2, ',', '.') ?></h3>
            </div>
        </div>
    </div>

    <!-- Confirm Order Button -->
    <div style="text-align: right; margin-top: 2rem;">
        <button id="konfirmasi-pesanan" style="background-color: #214836; color: #fff; border: none; padding: 0.8rem 1.5rem; border-radius: 0.25rem; cursor: pointer; font-size: 1rem;">Konfirmasi Pesanan</button>
    </div>
</div>

<!-- Modal Invoice -->
<div id="invoice-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div style="background: #fff; padding: 2rem; border-radius: 0.5rem; width: 90%; max-width: 500px;">
        <h2 style="margin-top: 0;">Invoice Pesanan</h2>
        <p>Terima kasih atas pesanan Anda!</p>
        <div id="invoice-content">
            <!-- Detail invoice akan dimuat di sini -->
        </div>
        <button id="close-invoice" style="background-color: #214836; color: #fff; border: none; padding: 0.5rem 1rem; border-radius: 0.25rem; cursor: pointer; margin-top: 1rem;">Tutup</button>
    </div>
</div>

<script>
    document.getElementById('konfirmasi-pesanan').addEventListener('click', function () {
        // Data pesanan (simulasikan data atau gunakan server-side rendering)
        const dataPesanan = {
            nama: "Miko Meidilianto",
            nim: "2310512133",
            fakultas: "FIK",
            nomorTelepon: "081310944581",
            produk: "Americano",
            jumlah: 2,
            harga: 19000,
            total: 38000
        };

        // Format isi invoice
        const invoiceHTML = `
            <p><strong>Nama:</strong> ${dataPesanan.nama}</p>
            <p><strong>NIM:</strong> ${dataPesanan.nim}</p>
            <p><strong>Fakultas:</strong> ${dataPesanan.fakultas}</p>
            <p><strong>Nomor Telepon:</strong> ${dataPesanan.nomorTelepon}</p>
            <hr>
            <p><strong>Produk:</strong> ${dataPesanan.produk}</p>
            <p><strong>Jumlah:</strong> ${dataPesanan.jumlah}</p>
            <p><strong>Harga Satuan:</strong> Rp${dataPesanan.harga.toLocaleString("id-ID")}</p>
            <p><strong>Total:</strong> Rp${dataPesanan.total.toLocaleString("id-ID")}</p>
        `;

        // Masukkan detail invoice ke dalam modal
        document.getElementById('invoice-content').innerHTML = invoiceHTML;

        // Tampilkan modal
        document.getElementById('invoice-modal').style.display = 'flex';
    });

    // Tombol untuk menutup modal
    document.getElementById('close-invoice').addEventListener('click', function () {
        document.getElementById('invoice-modal').style.display = 'none';
    });

    // Tutup modal jika pengguna mengklik di luar area modal
    window.addEventListener('click', function (event) {
        const modal = document.getElementById('invoice-modal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>