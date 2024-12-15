<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Konfirmasi Pesanan</h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2">
                <!-- Notifikasi Pesan Berhasil/Tidak -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php elseif (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <!-- Tabel Konfirmasi Pesanan -->
                <div class="table-responsive p-0">
                    <table class="table table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIM</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telepon</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pesanan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($orders)) : ?>
                                <?php foreach ($orders as $item): ?>
                                    <tr>
                                        <!-- ID Pesanan -->
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= esc($item['id_order']) ?></span>
                                        </td>
                                        <!-- Nama Pemesan -->
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= esc($item['user_nama']) ?></span>
                                        </td>
                                        <!-- NIM -->
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= esc($item['nim']) ?></span>
                                        </td>
                                        <!-- Nomor Telepon -->
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= esc($item['telepon']) ?></span>
                                        </td>
                                        <!-- Lihat Pesanan -->
                                        <td>
                                            <a href="<?= base_url('admin/konfirmasi/detail/' . $item['id_order']) ?>" 
                                               class="btn btn-info btn-sm" title="Lihat detail pesanan">
                                                <i class="fas fa-eye"></i> Lihat Pesanan
                                            </a>
                                        </td>
                                        <!-- Total Harga -->
                                        <td>
                                            <span class="text-xs font-weight-bold text-primary">
                                                Rp<?= number_format($item['total_price'], 0, ',', '.') ?>
                                            </span>
                                        </td>
                                        <!-- Status Pesanan -->
                                        <td>
                                            <span class="badge 
                                                <?= $item['status'] == 'pending' ? 'bg-gradient-secondary' : 
                                                    ($item['status'] == 'completed' ? 'bg-gradient-success' : 'bg-gradient-danger') ?>">
                                                <?= ucfirst(esc($item['status'])) ?>
                                            </span>
                                        </td>
                                        <!-- Tombol Aksi -->
                                        <td>
                                            <a href="<?= base_url('admin/konfirmasi/confirmOrder/' . $item['id_order']) ?>" 
                                               class="btn btn-success btn-sm" title="Terima pesanan">
                                                <i class="fas fa-check"></i> Terima
                                            </a>
                                            <a href="<?= base_url('admin/konfirmasi/cancelOrder/' . $item['id_order']) ?>" 
                                               class="btn btn-danger btn-sm" title="Tolak pesanan">
                                                <i class="fas fa-times"></i> Tolak
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
                                        Tidak ada pesanan untuk dikonfirmasi.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
