<h1>Daftar Pesanan</h1>
<table>
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>Status</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= ucfirst($order['status']) ?></td>
                <td><a href="<?= base_url('user/orders/detail/' . $order['id']) ?>">Lihat Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>