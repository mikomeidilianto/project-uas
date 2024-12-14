<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Konfirmasi Pesanan</h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2">
                <?php
                // Notifikasi pesan berhasil/tidak
                if (session()->getFlashdata('insert')) {
                    echo '<div class="alert alert-success">' . session()->getFlashdata('insert') . '</div>';
                }
                if (session()->getFlashdata('delete')) {
                    echo '<div class="alert alert-danger">' . session()->getFlashdata('delete') . '</div>';
                }
                ?>
                <div class="table-responsive p-0">
                    <table class="table justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIM</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor Telepon</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pesanan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Harga</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Konfirmasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($orders)) : ?>
                                <?php foreach ($orders as $order) : ?>
                                    <tr>
                                        <td><span class="text-xs font-weight-bold"><?= $order['order_id'] ?></span></td>
                                        <td><span class="text-xs font-weight-bold"><?= $order['user_nama'] ?></span></td>
                                        <td><span class="text-xs font-weight-bold"><?= $order['user_nim'] ?></span></td>
                                        <td><span class="text-xs font-weight-bold"><?= $order['user_telepon'] ?></span></td>
                                              <td>
          <a href="<?= base_url('admin/konfirmasi/detail/' . $order['order_id']) ?>" class="btn btn-info btn-sm">Lihat Pesanan</a>
      </td>
                                        <td><span class="text-xs font-weight-bold">Rp<?= number_format($order['total_price'], 0, ',', '.') ?></span></td>
                                        <td><span class="badge bg-gradient-secondary"><?= ucfirst($order['status']) ?></span></td>
                                        <td>
    <a href="<?= base_url('admin/konfirmasi/confirm/' . $order['order_id']) ?>" class="btn btn-success">Terima</a>
    <a href="<?= base_url('admin/konfirmasi/reject/' . $order['order_id']) ?>" class="btn btn-danger">Tolak</a>
</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada pesanan untuk dikonfirmasi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
