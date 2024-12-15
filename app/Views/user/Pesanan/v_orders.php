<body style="background-color: #f8f9fa;">

    <div class="container" style="margin-top: 100px;">
        <h1 class="text-center mb-4" style="color: #333;">Detail Pesanan</h1>

        <!-- Tabel Pesanan -->
        <table class="table table-bordered table-striped" style="background-color: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <thead style="background-color: #214836; color: white; ">
                <tr>
                    <th style="font-weight: normal;">ID Pesanan</th>
                    <th style="font-weight: normal;">Nama</th>
                    <th style="font-weight: normal;">NIM</th>
                    <th style="font-weight: normal;">Fakultas</th>
                    <th style="font-weight: normal;">Telepon</th>
                    <th style="font-weight: normal;">Lokasi</th>
                    <th style="font-weight: normal;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $key => $value) { ?>
                    <tr>
                        <td><?= $value['id_order'] ?></td>
                        <td><?= ucfirst($value['user_nama']) ?></td>
                        <td><?= ucfirst($value['nim']) ?></td>
                        <td><?= ucfirst($value['fakultas']) ?></td>
                        <td><?= ucfirst($value['telepon']) ?></td>
                        <td>Pickup Points</td>
                        <td><?= ucfirst($value['status']) ?></td>
                    </tr>
                <?php break;
                } ?>
            </tbody>
        </table>

        <h2 class="text-center mb-4" style="color: #333;">Pesanan Anda</h2>

        <!-- Tabel Pesanan -->
        <table class="table table-bordered table-striped mb-5" style="background-color: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <thead style="background-color: #214836; color: white;">
                <tr>
                    <th style="font-weight: normal;">Nama Produk</th>
                    <th style="font-weight: normal;">Harga Satuan</th>
                    <th style="font-weight: normal;">Jumlah</th>
                    <th style="font-weight: normal;">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalHarga = 0;
                foreach ($keranjang as $key => $value) {
                    $itemTotal = $value['price'] * $value['quantity'];
                    $totalHarga += $itemTotal;
                ?>
                    <tr>
                        <td><?= $value['product_name'] ?></td>
                        <td>Rp<?= number_format($value['price'], 2, ',', '.') ?></td>
                        <td><?= $value['quantity'] ?></td>
                        <td>Rp<?= number_format($itemTotal, 2, ',', '.') ?></td>
                    </tr>
                <?php } ?>

                <!-- Baris Total Harga -->
                <tr style="background-color: #214836; color: white; font-weight: bold;">
                    <td colspan="3" class="text-end" style="color: white !important;">Total</td> 
                    <td style="color: white !important;">Rp<?= number_format($totalHarga, 2, ',', '.') ?></td>
                </tr>

            </tbody>
        </table>
    </div>

</body>