<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Kopi</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .container {
            width: 100%;
            padding: 20px;
            background: white;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #214836;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-row {
            margin-bottom: 15px;
        }

        .form-input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            width: 100%;
            margin-right: 5px;
            box-sizing: border-box;
            /* Ensure padding is included in width */
        }

        .form-input.half {
            width: calc(50% - 5px);
            display: inline-block;
        }

        select {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            width: 100%;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        .order-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 10px;
        }

        .order-item img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            margin-right: 10px;
        }

        .order-item div {
            flex: 1;
        }

        .order-item p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .order-item p b {
            color: #214836;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: white;
            background-color: #214836;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #1a3c2b;
        }

        .label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .fakultas-container {
            margin-left: 30px;
            /* Jarak antara NIM dan Fakultas */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Pesanan</h1>
        <form>
            <!-- Data Diri -->
            <div class="form-section">
                <h2>Data Diri</h2>
                <div class="form-row">
                    <div style="flex: 1;">
                        <label class="label" for="name">Nama</label>
                        <input type="text" id="name" placeholder="Masukkan nama Anda" class="form-input">
                    </div>
                </div>
                <div class="form-row">
                    <div style="flex: 1;">
                        <label class="label" for="nim">NIM</label>
                        <input type="text" id="nim" placeholder="Masukkan NIM Anda" class="form-input">
                    </div>
                    <div class="fakultas-container" style="flex: 1;">
                        <label class="label" for="fakultas">Fakultas</label>
                        <select id="fakultas" class="form-input">
                            <option value="">Pilih Fakultas</option>
                            <option value="fakultas1">FIK</option>
                            <option value="fakultas2">FK</option>
                            <option value="fakultas3">FH</option>
                            <option value="fakultas3">FEB</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div style="flex: 1;">
                        <label class="label" for="phone">Nomor Telepon</label>
                        <input type="text" id="phone" placeholder="Contoh: 081234567890" class="form-input">
                    </div>
                </div>
            </div>

            <!-- Detail Pesanan -->
            <div class="form-section">
                <h2>Detail Pesanan</h2>
                <div class="order-item">
                    <img src="<?= base_url('Admin') ?>/assets/img/kopi susu.jpg" alt="Es Kopi Susu">
                    <div>
                        <p>Es Kopi Susu </p>
                        <p><b>Rp 15.000</b></p>
                        <p>x 1</p>
                    </div>
                </div>
                <div class="order-item">
                    <img src="<?= base_url('Admin') ?>/assets/img/sate kalajengking.jpg" alt="sate kalajengking">
                    <div>
                        <p>sate kalajengking</p>
                        <p><b>Rp 10.000</b></p>
                        <p>x 1</p>
                    </div>
                </div>
                <textarea placeholder="Tuliskan catatan di sini" class="form-input"></textarea>
            </div>

            <!-- Total dan Tombol -->
            <div class="form-section">
                <div class="total-row">
                    <span>Total</span>
                    <span><b>Rp 35.000</b></span>
                </div>
                <button type="submit" class="submit-button">Konfirmasi Pesanan</button>
            </div>
        </form>
    </div>
</body>

</html>