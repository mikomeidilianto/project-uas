<h1 class="mt-5">Detail Pesanan</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>Status</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $key => $value) { ?>
        <tr>
            <td><?= $value['id_order'] ?></td>
            <td><?= ucfirst($value['status']) ?></td>
            <td><a href="<?= base_url('user/order/detail/' . $value['id_order']) ?>">Lihat Detail</a></td>
        </tr>
        <?php break; } ?>
    </tbody>
</table>

<h2>Pesanan Anda</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
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
                <td>Rp<?= number_format($value['price'], 2, ',' ,'.') ?></td>
                <td><?= $value['quantity'] ?></td>
                <td>Rp<?= number_format ($itemTotal, 2, ',', '.') ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="3" class="text-end fw-bold">Total</td>
                <td class="fw-bold">Rp<?= number_format($totalHarga, 2, ',', '.') ?></td>
            </tr>
            
    </tbody>
</table>
