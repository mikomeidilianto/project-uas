<div style="max-width: 800px; margin: 2rem auto; margin-top: 80px;">
<?php
    session();
    $validation = \Config\Services::validation();
    ?>
    <?php echo form_open_multipart('user/Keranjang/prosesCheckout')?>
    <h1 style="margin-bottom: 1.5rem; color:#214836; font-family: poppins, sans-serif; ">Pesanan</h1>

    <!-- Container with two columns -->
    <div style="display: flex; justify-content: space-between; color:#214836; margin-top: 30px;">

        <!-- Left Column for Data Diri -->
        <div style="width: 48%; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="margin-bottom: 1rem;">Data Diri</h2>

            <!-- Nama Input -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;" value="<?= old('nama') ?>">
                <p class="text-danger"><?= isset($errors['nama']) == isset($errors['nama']) ? validation_show_error('nama') : '' ?></p>
            </div>

            <!-- NIM Input -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">NIM</label>
                <input type="text" name="nim" id="nim" placeholder="NIM" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;" value="<?= old('nim') ?>">
                <p class="text-danger"><?= isset($errors['nim']) == isset($errors['nim']) ? validation_show_error('nim') : '' ?></p>
            </div>

            <!-- Fakultas Dropdown -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Fakultas</label>
                <select id="fakultas" name="fakultas" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;">
                    <option value=""selected disabled>Pilih fakultas</option>
                    <option value="FIK">FIK</option>
                    <option value="FT">FT</option>
                    <option value="FEB">FEB</option>
                    <option value="FH">FH</option>
                    <option value="FK">FK</option>
                    <option value="FIKES">FIKES</option>
                </select>
                <p class="text-danger"><?= isset($errors['fakultas']) == isset($errors['fakultas']) ? validation_show_error('fakultas') : '' ?></p>
            </div>

            <!-- Nomor Telepon Input -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Nomor Telepon</label>
                <input type="tel" name="telepon" id="telepon" placeholder="Nomor Telepon" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;" value="<?= old('telepon') ?>">
            </div>
            <p class="text-danger"><?= isset($errors['telepon']) == isset($errors['telepon']) ? validation_show_error('telepon') : '' ?></p>
        </div>
        

        <!-- Detail Pesanan -->
        <div style="width: 48%; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="margin-bottom: 1rem;">Detail Pesanan</h2>

            <!-- Product List -->
            <?php foreach ($cart as $item) : ?>
                <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                    <img src="<?= base_url('Admin') ?>\assets\img\<?= $item['foto'] ?>" alt="<?= $item['product_name'] ?>" style="width: 80px; height: 80px; margin-right: 1rem; border-radius: 8px;">
                    <div>
                        <h5 style="margin-top: 0; margin-bottom: 0.5rem;"><?= $item['product_name'] ?></h5>
                        <p style="margin-bottom: 0.25rem;">Rp<?= number_format($item['price'], 2, ',', '.') ?></p>
                        <p style="margin-bottom: 0;">x<?= $item['quantity'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Total Price -->
            <?php 
            $totalCart = 0;
            foreach ($cart as $item) {
                $itemTotal = $item['price'] * $item['quantity'];
                $totalCart += $itemTotal;
                ?>
                
            <?php } ?>

            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #ccc; padding-top: 1rem;">
                <h3 style="margin-bottom: 0;">Total</h3>
                <h3 style="margin-bottom: 0;">Rp<?= number_format($totalCart, 2, ',', '.') ?></h3>
            </div>
        </div>
    </div>

    <!-- Confirm Order Button -->
    <div style="text-align: right; margin-top: 2rem;">
        <button type="submit" style="background-color: #214836; color: #fff; border: none; padding: 0.8rem 1.5rem; border-radius: 0.25rem; cursor: pointer; font-size: 1rem;">Konfirmasi Pesanan</button>
    </div>
    <?php echo form_close() ?>
</div>

Modal Popup
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Pesanan Anda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="orderDetails">
                <!-- Detail pesanan akan dimuat melalui AJAX -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


