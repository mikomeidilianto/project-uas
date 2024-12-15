<div class="container mt-5">
    <h1 class="mb-4">Detail Pesanan</h1>

    <!-- Detail Pesanan -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Informasi Pesanan
        </div>
        <div class="card-body">
            <p><strong>ID Pesanan:</strong> <?= $orderDetail[0]['id_order'] ?></p>
            <p><strong>Status:</strong> <?= ucfirst($orderDetail[0]['status']) ?></p>
            <p><strong>Nama:</strong> <?= $orderDetail[0]['user_nama'] ?></p>
            <p><strong>NIM:</strong> <?= $orderDetail[0]['nim'] ?></p>
            <p><strong>Telepon:</strong> <?= $orderDetail[0]['telepon'] ?></p>
        </div>
    </div>

    <!-- Daftar Produk Pesanan -->
    <h3>Detail Produk</h3>
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
            foreach ($orderDetail as $item) {
                $itemTotal = $item['price'] * $item['quantity'];
                $totalHarga += $itemTotal;
            ?>
            <tr>
                <td><?= $item['product_name'] ?></td>
                <td>Rp<?= number_format($item['price'], 2, ',', '.') ?></td>
                <td><?= $item['quantity'] ?></td>
                <td>Rp<?= number_format($itemTotal, 2, ',', '.') ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="3" class="text-end fw-bold">Total</td>
                <td class="fw-bold">Rp<?= number_format($totalHarga, 2, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Invoice -->
    <h3 class="mt-5">Invoice</h3>
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
            $totalInvoice = 0;
            foreach ($invoiceDetail as $invoice) {
                $invoiceTotal = $invoice['price'] * $invoice['quantity'];
                $totalInvoice += $invoiceTotal;
            ?>
            <tr>
                <td><?= $invoice['product_name'] ?></td>
                <td>Rp<?= number_format($invoice['price'], 2, ',', '.') ?></td>
                <td><?= $invoice['quantity'] ?></td>
                <td>Rp<?= number_format($invoiceTotal, 2, ',', '.') ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="3" class="text-end fw-bold">Total Invoice</td>
                <td class="fw-bold">Rp<?= number_format($totalInvoice, 2, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>
</div>
