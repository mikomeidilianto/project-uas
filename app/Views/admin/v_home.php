<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Green Cloud Kitchen</title>
    <style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h4 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #444;
            cursor: pointer;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        h4:hover {
            background-color: #f0f0f0;
        }

        .category-section {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Border putih ditambahkan ke kategori */
        .category-section>h4 {
            border: 2px solid white;
            padding: 10px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .menu-item {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 15px;
        }

        .menu-item img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            margin-right: 15px;
        }

        .menu-info {
            flex: 1;
            /* Ensures the menu info takes up remaining space */
        }

        .menu-info h5 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .menu-info p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .menu-info b {
            font-size: 16px;
            color: #444;
        }

        /* Hide menu by default */
        .menu-section {
            display: none;
        }

        /* Show the menu when the category is clicked */
        .active+.menu-section {
            display: block;
        }

        /* Status Orderan */
        .order-status {
            padding: 15px;
            border-radius: 8px;
            background-color: #fff;
            border: 2px solid white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: #333;
            font-size: 16px;
            margin-top: 20px;
        }

        .order-status span {
            font-weight: bold;
        }

        /* Button Konfirmasi Pembayaran */
        .status-button {
            background-color: #6200ea;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .status-button:hover {
            background-color: #3700b3;
        }

        .status-button:disabled {
            background-color: #b2b2b2;
            cursor: not-allowed;
        }

        /* Layout untuk menempatkan tombol di samping item pesanan */
        .order-item-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        /* Gambar pada item pesanan di Status Orderan */
        .order-item img {
            width: 80px;
            /* Ukuran gambar yang sama seperti di menu makanan dan minuman */
            height: 80px;
            border-radius: 8px;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <!-- Kategori Makanan (Dropdown) -->
    <div class="category-section">
        <h4 class="dropdown-toggle" onclick="toggleMenu('product')">Product</h4>
        <div id="product" class="menu-section">
            <div class="menu-item">
                <div class="menu-info">
                <table class="table justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto</th>      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 link-underline-primary"><a href="<?= base_url('admin/Product') ?>">View All</a></th>      
                    </tr>
                  </thead>
                  <tbody> 
                    <?php $no = 1; 
                    foreach ($produk as $key => $value) { ?>
                    <tr>
                      <td>
                        <span class="text-xs font-weight-bold text-center"><?= $no++ ?></span>
                    </td>
                      <td>
                      <span class="text-xs font-weight-bold"><?= $value['name'] ?></span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?= $value['description'] ?></span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><img src="<?= base_url('Admin/assets/img/'. $value['foto']) ?>" ></span>
                      </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Minuman (Dropdown) -->
    <div class="category-section">
        <h4 class="dropdown-toggle" onclick="toggleMenu('tenant')">Tenant</h4>
        <div id="tenant" class="menu-section">
            <div class="menu-item">
            <table class="table justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 link-underline-primary"><a href="<?= base_url('admin/Kategori') ?>">View All</a></th>       
                    </tr>
                  </thead>
                  <tbody> 
                    <?php $no = 1; 
                    foreach ($kategori as $key => $value) { ?>
                    <tr>
                      <td>
                        <span class="text-xs font-weight-bold text-center"><?= $no++ ?></span>
                    </td>
                      <td>
                      <span class="text-xs font-weight-bold"><?= $value['name'] ?></span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?= $value['description'] ?></span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><img src="<?= base_url('Admin/assets/img/'. $value['foto']) ?>" ></span>
                      </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
        </div>
    </div>

   

    <script>
        // Toggle visibility of the menu (makanan or minuman)
        function toggleMenu(menuId) {
            var menu = document.getElementById(menuId);
            var isActive = menu.style.display === 'block';

            // Close all menus
            document.getElementById('product').style.display = 'none';
            document.getElementById('tenant').style.display = 'none';

            // If the clicked menu was not active, open it
            if (!isActive) {
                menu.style.display = 'block';
            }
        }

    </script>
</body>

</html>