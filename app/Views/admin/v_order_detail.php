<!-- Tombol Kembali ke Konfirmasi -->
<div class="container mt-3">
    <a href="<?= base_url('admin/konfirmasi') ?>" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Kembali ke Konfirmasi
    </a>
</div>

<div class="container mt-4">
    <!-- Informasi Pemesan -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Informasi Pemesan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <strong>ID Pesanan</strong>: <?= $orderDetail[0]['id_order'] ?>
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Nama</strong>: <?= $orderDetail[0]['nama'] ?>
                </div>
                <div class="col-md-6 mb-2">
                    <strong>NIM</strong>: <?= $orderDetail[0]['nim'] ?>
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Telepon</strong>: <?= $orderDetail[0]['telepon'] ?>
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Fakultas</strong>: <?= $orderDetail[0]['fakultas'] ?>
                </div>
                <div class="col-md-6 mb-2">
                <strong>Pembayaran</strong> Cash On Delivery
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Lokasi</strong> Pickup Points
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Barang -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Barang</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $totalHarga = 0;
                        foreach ($orderDetail as $item) : 
                            $subtotal = $item['product_price'] * $item['quantity'];
                            $totalHarga += $subtotal;
                    ?>
                    <tr>
                        <td class="fw-bold"><?= $item['product_name'] ?></td>
                        <td>Rp<?= number_format($item['product_price'], 0, ',', '.') ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td class="fw-bold text-success">Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="table-info">
                        <th colspan="3" class="text-end fw-bold">Total Harga</th>
                        <th class="text-success fs-5">Rp<?= number_format($totalHarga, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
