<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Daftar Pesanan yang Dikonfirmasi</h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2">
                <?php if (!empty($orders)) : ?>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Telepon</th>
                                    <th>Status</th>
                                    <th>Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $item): ?>
                                    <tr>
                                        <td><?= esc($item['id_order']) ?></td>
                                        <td><?= esc($item['user_nama']) ?></td>
                                        <td><?= esc($item['nim']) ?></td>
                                        <td><?= esc($item['telepon']) ?></td>
                                        <td><span class="badge bg-gradient-success"><?= ucfirst($item['status']) ?></span></td>
                                        <td>
                                          <a href="<?= base_url('admin/order/detail/' . $item['id_order']) ?>" 
                                            class="btn btn-info btn-sm">Lihat Detail</a>
                                      </td> 
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <p class="text-center text-muted">Tidak ada pesanan yang dikonfirmasi.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
