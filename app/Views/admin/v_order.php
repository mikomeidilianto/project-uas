<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Order</h6>
            </div>
            
            <div class="card-body px-4 pt-0 pb-2">
        
              <div class="table-responsive p-0">
                  <table class="table justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIM</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Program Studi</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor Telepon</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pesanan</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php if (!empty($orders)) : ?>
                      <?php foreach ($orders as $index => $order) : ?>
                        <tr>
                          <td><span class="text-xs font-weight-bold"><?= $index + 1 ?></span></td>
                          <td><span class="text-xs font-weight-bold"><?= $order['user_nama'] ?></span></td>
                          <td><span class="text-xs font-weight-bold"><?= $order['user_nim'] ?></span></td>
                          <td><span class="text-xs font-weight-bold"><?= $order['user_fakultas'] ?></span></td>
                          <td><span class="text-xs font-weight-bold"><?= $order['user_telepon'] ?></span></td>
                          <td>
                            <span class="text-xs font-weight-bold badge badge-sm 
                              <?= $order['status'] === 'completed' ? 'bg-gradient-success' : 
                                 ($order['status'] === 'cancelled' ? 'bg-gradient-danger' : 'bg-gradient-secondary') ?>">
                              <?= ucfirst($order['status']) ?>
                            </span>
                          </td>
                          <td>
                            <a href="<?= base_url('admin/konfirmasi/detail/' . $order['order_id']) ?>" class="btn btn-warning">Detail</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else : ?>
                      <tr>
                        <td colspan="7" class="text-center">Tidak ada pesanan.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
