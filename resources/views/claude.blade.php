<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catetan Keuangan Keluarga</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background-color: white;
            padding: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .logo img {
            width: 40px;
            height: 40px;
        }

        .menu-item {
            padding: 12px 20px;
            margin: 5px 0;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
        }

        .active {
            background-color: #ff9f43;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .balance-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .saldo {
            background-color: #ffe4c4;
        }

        .pemasukan {
            background-color: #98d8d8;
        }

        .pengeluaran {
            background-color: #f08080;
        }

        .transaction-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .tabs {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .tab {
            padding: 8px 16px;
            cursor: pointer;
        }

        .tab.active {
            background-color: #ff9f43;
            color: white;
            border-radius: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .submit-btn {
            background-color: #ff9f43;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .transaction-history {
            position: fixed;
            right: 30px;
            top: 30px;
            width: 300px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .amount {
            font-weight: bold;
        }

        .amount.positive {
            color: green;
        }

        .amount.negative {
            color: red;
        }

        .date {
            font-size: 0.8em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="/api/placeholder/40/40" alt="Logo">
            <h2>Catetan Keuangan Keluarga</h2>
        </div>
        <div class="menu-item active">DashBoard</div>
        <div class="menu-item">Laporan</div>
        <div class="menu-item">Pengaturan</div>
    </div>

    <div class="main-content">
        <h1>Home</h1>

        <div class="balance-cards">
            <div class="card saldo">
                <h3>Saldo</h3>
                <p>Rp. 500.000</p>
            </div>
            <div class="card pemasukan">
                <h3>Pemasukan</h3>
                <p>Rp. 500.000</p>
            </div>
            <div class="card pengeluaran">
                <h3>Pengeluaran</h3>
                <p>Rp. 500.000</p>
            </div>
        </div>

        <div class="transaction-section">
            <div class="tabs">
                <div class="tab">Pengeluaran</div>
                <div class="tab">Pemasukan</div>
                <div class="tab active">Transfer</div>
            </div>

            <form>
                <div class="form-group">
                    <label>Kirim ke</label>
                    <input type="text" value="Anak - tifa">
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" value="Rp. 150.000">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" value="jajan sekolah">
                </div>
                <div class="form-group">
                    <label>Masi dipikirkan</label>
                    <input type="text" value="kosong">
                </div>
                <button class="submit-btn">Simpan</button>
            </form>
        </div>
    </div>

    <div class="transaction-history">
        <h3>Pemasukan</h3>
        <div class="transaction-item">
            <div>
                <div>Gaji - Ayah</div>
                <div class="date">15 okt 2024</div>
            </div>
            <div class="amount positive">+ 7.000.000</div>
        </div>

        <h3>Pengeluaran</h3>
        <div class="transaction-item">
            <div>
                <div>Sekolah - Anak</div>
                <div class="date">15 okt 2024</div>
            </div>
            <div class="amount negative">- 20.000</div>
        </div>
    </div>
</body>
</html>
