<div style="max-width: 800px; margin: 2rem auto; margin-top: 80px;">
    <h1 style="margin-bottom: 1.5rem; color:#214836; font-family: Arial, sans-serif;">Pesanan</h1>

    <!-- Container with two columns -->
    <div style="display: flex; justify-content: space-between; color:#214836; margin-top: 30px;">

        <!-- Left Column for Data Diri -->
        <div style="width: 48%; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="margin-bottom: 1rem;">Data Diri</h2>

            <!-- Nama Input -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Nama</label>
                <input type="text" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;">
            </div>

            <!-- NIM Input -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">NIM</label>
                <input type="text" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;">
            </div>

            <!-- Fakultas Dropdown -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Fakultas</label>
                <select style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;">
                    <option>Pilih fakultas</option>
                    <option>Fakultas A</option>
                    <option>Fakultas B</option>
                    <option>Fakultas C</option>
                </select>
            </div>

            <!-- Nomor Telepon Input -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem;">Nomor Telepon</label>
                <input type="tel" style="width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 0.25rem;">
            </div>
        </div>

        <!-- Right Column for Detail Pesanan -->
        <div style="width: 48%; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="margin-bottom: 1rem;">Detail Pesanan</h2>

            <!-- Product 1 -->
            <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                <img src="<?= base_url('Admin') ?>/assets/img/kopi susu.jpg" alt="Es Kopi Susu Beska" style="width: 80px; height: 80px; margin-right: 1rem; border-radius: 8px;">
                <div>
                    <h5 style="margin-top: 0; margin-bottom: 0.5rem;">Es Kopi Susu Beska</h5>
                    <p style="margin-bottom: 0.25rem;">Rp. 18.000</p>
                    <p style="margin-bottom: 0;">x1</p>
                </div>
            </div>

            <!-- Product 2 -->
            <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                <img src="<?= base_url('Admin') ?>/assets/img/kopi susu.jpg" alt="Ice Cappuccino" style="width: 80px; height: 80px; margin-right: 1rem; border-radius: 8px;">
                <div>
                    <h5 style="margin-top: 0; margin-bottom: 0.5rem;">Ice Cappuccino</h5>
                    <p style="margin-bottom: 0.25rem;">Rp. 22.000</p>
                    <p style="margin-bottom: 0;">x1</p>
                </div>
            </div>

            <!-- Total Price -->
            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #ccc; padding-top: 1rem;">
                <h3 style="margin-bottom: 0;">Total</h3>
                <h3 style="margin-bottom: 0;">Rp. 40.000</h3>
            </div>
        </div>
    </div>

    <!-- Confirm Order Button -->
    <div style="text-align: right; margin-top: 2rem;">
        <button style="background-color: #214836; color: #fff; border: none; padding: 0.8rem 1.5rem; border-radius: 0.25rem; cursor: pointer; font-size: 1rem;">Konfirmasi Pesanan</button>
    </div>
</div>
