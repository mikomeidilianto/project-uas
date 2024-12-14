<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Detail Pesanan</h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2">
                <p><strong>Nama:</strong> <?= $order[0]['user_nama'] ?></p>
                <p><strong>NIM:</strong> <?= $order[0]['user_nim'] ?></p>
                <p><strong>Fakultas:</strong> <?= $order[0]['user_fakultas'] ?></p>
                <p><strong>Telepon:</strong> <?= $order[0]['user_telepon'] ?></p>
                <p><strong>Status:</strong> <?= ucfirst($order[0]['status']) ?></p>
                <h6>Produk yang Dipesan:</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order as $item) : ?>
                            <tr>
                                <td><?= $item['product_name'] ?></td>
                                <td>Rp<?= number_format($item['product_price'], 0, ',', '.') ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td>Rp<?= number_format($item['total_price'], 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
