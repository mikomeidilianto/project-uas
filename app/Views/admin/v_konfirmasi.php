<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Konfimasi Pesanan</h6>
            </div>
            
            <div class="card-body px-4 pt-0 pb-2">
              <?php
              // notif pesan berhasil ditambahkan
              if (session()->getFlashdata('insert')){
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('insert');
                echo '</div>';
              }

              if (session()->getFlashdata('update')){
                echo '<div class="alert alert-light">';
                echo session()->getFlashdata('update');
                echo '</div>';
              }
              
              if (session()->getFlashdata('delete')){
                echo '<div class="alert alert-danger">';
                echo session()->getFlashdata('delete');
                echo '</div>';
              }
              ?>
              <div class="table-responsive p-0">
                  <table class="table justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIM</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">nomor telepon</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pesanan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Konfirmasi</th>
                      
                      
                      
                    </tr>
                  </thead>
                  <tbody> 
                    <tr>
                      <td><span class="text-xs font-weight-bold">1</span></td>
                      <td><span class="text-xs font-weight-bold">Miko Meidilianto</span></td>
                      <td><span class="text-xs font-weight-bold">2310512133</span></td>
                      <td><span class="text-xs font-weight-bold">081310944581</span></td>
                      <td><span class="text-xs font-weight-bold">x2 Americano <br>Rp.38.000,00</span></td>
                      <td><span class="text-xs font-weight-bold badge badge-sm bg-gradient-secondary">Pending</span></td>
                      <td>
                      
                        
                        <a href="" class="btn btn-success">Terima</a>
                        <a href="" class="btn btn-danger">Tolak</a>
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>