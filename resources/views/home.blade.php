<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Catatan Keuangan Keluarga</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            background-color: #f5f5f5;
        }

        .sidebar {
            width: 250px;
            background-color: white;
            padding: 1.5rem;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .logo img {
            width: 40px;
            height: 40px;
        }

        .logo-text {
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.2;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: block;
            padding: 0.75rem 1rem;
            text-decoration: none;
            color: #333;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
        }

        .nav-link.active {
            background-color: #ff9f43;
            color: white;
        }

        .main-content {
            flex: 1;
            padding: 2rem;
        }

        .page-title {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .summary-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .summary-card {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .card-amount {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .saldo-card { background-color: #FFE5CC; }
        .pemasukan-card { background-color: #98D8D8; }
        .pengeluaran-card { background-color: #FF9999; }

        .transaction-container {
            display: grid;
            grid-template-columns: 3fr 1fr;
            gap: 2rem;
        }

        .transaction-form,
        .transaction-history {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tab-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .tab-button {
            padding: 0.5rem 1rem;
            border: none;
            background: none;
            cursor: pointer;
            color: #666;
        }

        .tab-button.active {
            color: #ff9f43;
            border-bottom: 2px solid #ff9f43;
        }

        .form-content {
            display: none;
        }

        .form-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }

        .save-button {
            background-color: #ff9f43;
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            cursor: pointer;
            display: block;
            margin: 1.5rem auto 0;
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }

        .transaction-info {
            display: flex;
            flex-direction: column;
        }

        .transaction-title {
            font-weight: 500;
        }

        .transaction-date {
            font-size: 0.875rem;
            color: #666;
        }

        .transaction-amount {
            font-weight: 500;
        }

        .amount-positive {
            color: #28a745;
        }

        .amount-negative {
            color: #dc3545;
        }

        @media (max-width: 1024px) {
            .transaction-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .summary-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="/placeholder.svg?height=40&width=40" alt="Logo">
            <div class="logo-text">
                Catatan Keuangan<br>
                Keluarga
            </div>
        </div>
        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Laporan</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Pengaturan</a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <h1 class="page-title">Home</h1>

        <div class="summary-cards">
            <div class="summary-card saldo-card">
                <div class="card-title">Saldo</div>
                <div class="card-amount">Rp. 500.000</div>
            </div>
            <div class="summary-card pemasukan-card">
                <div class="card-title">Pemasukan</div>
                <div class="card-amount">Rp. 500.000</div>
            </div>
            <div class="summary-card pengeluaran-card">
                <div class="card-title">Pengeluaran</div>
                <div class="card-amount">Rp. 500.000</div>
            </div>
        </div>

        <div class="transaction-container">
            <div class="transaction-form">
                <div class="tab-group">
                    <button class="tab-button" data-tab="pengeluaran">Pengeluaran</button>
                    <button class="tab-button" data-tab="pemasukan">Pemasukan</button>
                    <button class="tab-button active" data-tab="transfer">Transfer</button>
                </div>

                <form class="form-content" id="pengeluaran-form">
                    <div class="form-group">
                        <label class="form-label" for="pengeluaran-tanggal">Tanggal</label>
                        <input type="date" id="pengeluaran-tanggal" class="form-input" value="2024-10-15">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pengeluaran-keterangan">Keterangan</label>
                        <input type="text" id="pengeluaran-keterangan" class="form-input" placeholder="Masukkan keterangan">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pengeluaran-jumlah">Jumlah</label>
                        <input type="text" id="pengeluaran-jumlah" class="form-input" placeholder="Rp. 0">
                    </div>
                    <button type="submit" class="save-button">Simpan</button>
                </form>

                <form class="form-content" id="pemasukan-form">
                    <div class="form-group">
                        <label class="form-label" for="pemasukan-tanggal">Tanggal</label>
                        <input type="date" id="pemasukan-tanggal" class="form-input" value="2024-10-15">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pemasukan-keterangan">Keterangan</label>
                        <input type="text" id="pemasukan-keterangan" class="form-input" placeholder="Masukkan keterangan">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pemasukan-jumlah">Jumlah</label>
                        <input type="text" id="pemasukan-jumlah" class="form-input" placeholder="Rp. 0">
                    </div>
                    <button type="submit" class="save-button">Simpan</button>
                </form>

                <form class="form-content active" id="transfer-form">
                    <div class="form-group">
                        <label class="form-label" for="transfer-kirim-ke">Kirim ke</label>
                        <input type="text" id="transfer-kirim-ke" class="form-input" value="Anak - tifa">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="transfer-jumlah">Jumlah</label>
                        <input type="text" id="transfer-jumlah" class="form-input" value="Rp. 150.000">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="transfer-keterangan">Keterangan</label>
                        <input type="text" id="transfer-keterangan" class="form-input" value="jajan sekolah">
                    </div>
                    <button type="submit" class="save-button">Simpan</button>
                </form>
            </div>

            <div class="transaction-history">
                <h2 class="card-title">Riwayat Transaksi</h2>
                <div class="transaction-item">
                    <div class="transaction-info">
                        <div class="transaction-title">Gaji - Ayah</div>
                        <div class="transaction-date">15 okt 2024</div>
                    </div>
                    <div class="transaction-amount amount-positive">+ 7.000.000</div>
                </div>
                <div class="transaction-item">
                    <div class="transaction-info">
                        <div class="transaction-title">Sekolah - Anak</div>
                        <div class="transaction-date">15 okt 2024</div>
                    </div>
                    <div class="transaction-amount amount-negative">- 20.000</div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const tabButtons = document.querySelectorAll('.tab-button');
        const formContents = document.querySelectorAll('.form-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                tabButtons.forEach(btn => btn.classList.remove('active'));
                formContents.forEach(form => form.classList.remove('active'));

                button.classList.add('active');
                const formId = `${button.dataset.tab}-form`;
                document.getElementById(formId).classList.add('active');
            });
        });
    </script>
</body>
</html>
