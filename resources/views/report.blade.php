<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Financial Tracker</title>
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
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
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

        .margin-bottom-sub-item {
            margin-bottom: 0.2rem;
        }

        .nav-link {
            display: block;
            padding: 0.75rem 1rem;
            text-decoration: none;
            color: #333;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
        }

        .nav-link:hover {
            background-color: rgba(0, 0, 0, 0.05);
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

        .margin-bottom-span {
            margin-bottom: 2rem;
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

        .tab-button:hover {
            background-color: rgba(0, 0, 0, 0.05);
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
                /* flex-direction: column; */
            }

            .sidebar {
                /* width: 100%; */
                display: none;
            }

            .summary-cards {
                /* grid-template-columns: 1fr; */
            }
        }
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            /* margin-bottom: 2rem; */
        }

        .breadcrumb-separator {
            color: #666;
        }

        .period-filter {
            display: flex;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .filter-button {
            padding: 0.5rem 1.5rem;
            border: none;
            background: none;
            cursor: pointer;
            /* border-radius: 0.5rem;
            color: #666; */
        }

        .filter-button:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .filter-button.active {
            /* background-color: #ff9f43;
            color: white; */
            color: #ff9f43;
            border-bottom: 2px solid #ff9f43;
        }

        .table-container {
            background: white;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .data-table th {
            font-weight: 500;
            color: #666;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .page-button {
            padding: 0.5rem 1rem;
            border: none;
            background: none;
            cursor: pointer;
            color: #666;
        }

        .page-button:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .page-button.active {
            color: #ff9f43;
            font-weight: 600;
        }

        /* Settings styles */
        .settings-section {
            background: white;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .settings-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .settings-form {
            display: grid;
            gap: 1rem;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .toggle-slider {
            background-color: #ff9f43;
        }

        input:checked + .toggle-slider:before {
            transform: translateX(26px);
        }

        .amount-positive {
            color: #28a745;
        }

        .amount-negative {
            color: #dc3545;
        }

        .sub-menu {
            margin-left: 1.5rem;
            margin-top: 0.5rem;
        }

        .sub-menu .nav-link {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
    </style>
</head>
<body>
    {{-- <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <div class="logo-text">
                Catatan Keuangan<br>
                Keluarga
            </div>
        </div>
        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active" data-page="dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-page="laporan">Laporan</a>
                    <div class="sub-menu">
                        <a href="#" class="nav-link">Umum</a>
                        <a href="#" class="nav-link">Pribadi</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-page="pengaturan">Pengaturan</a>
                </li>
            </ul>
        </nav>
    </aside> --}}

    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <div class="logo-text">
                Catatan Keuangan<br>
                Keluarga
            </div>
        </div>
        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active" data-page="dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-page="laporan">Laporan</a>
                    <div class="sub-menu">
                        <a href="#" class="nav-link sub-link margin-bottom-sub-item" data-page="laporan-umum">Umum</a>
                        <a href="#" class="nav-link sub-link" data-page="laporan-pribadi">Pribadi</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-page="pengaturan">Pengaturan</a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="main-content" id="dashboard-page">
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

    <!-- Laporan Page Content -->
    <main class="main-content" id="laporan-umum" style="display: none;">
        <div class="breadcrumb">
            <h1 class="page-title">Laporan</h1>
            <span class="breadcrumb-separator margin-bottom-span">&gt;</span>
            <span class="margin-bottom-span">Umum</span>
        </div>

        <div class="summary-cards">
            <div class="summary-card saldo-card">
                <div class="card-title">Saldo</div>
                <div class="card-amount">Rp. 500.000</div>
            </div>
            <div class="summary-card pemasukan-card">
                <div class="card-title">Total Pemasukan</div>
                <div class="card-amount">Rp. 500.000</div>
            </div>
            <div class="summary-card pengeluaran-card">
                <div class="card-title">Total Pengeluaran</div>
                <div class="card-amount">Rp. 500.000</div>
            </div>
        </div>

        <div class="table-container">
            <h2>Rincian Pemasukan</h2>
            <div class="period-filter">
                <button class="filter-button">Harian</button>
                <button class="filter-button active">Mingguan</button>
                <button class="filter-button">Bulanan</button>
                <select class="form-input" style="margin-left: auto; width: auto;">
                    <option>OKT 2024</option>
                </select>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengguna</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ayah</td>
                        <td>Gaji kantor</td>
                        <td>02-10-2024</td>
                        <td>Rp.500.000,00</td>
                        <td>⋮</td>
                    </tr>
                    <!-- More rows... -->
                </tbody>
            </table>
            <div class="pagination">
                <button class="page-button">←</button>
                <button class="page-button active">1</button>
                <button class="page-button">2</button>
                <button class="page-button">3</button>
                <button class="page-button">4</button>
                <button class="page-button">5</button>
                <button class="page-button">→</button>
            </div>
        </div>

        <div class="table-container">
            <h2>Rincian Pengeluaran</h2>
            <div class="period-filter">
                <button class="filter-button active">Harian</button>
                <button class="filter-button">Mingguan</button>
                <button class="filter-button">Bulanan</button>
                <select class="form-input" style="margin-left: auto; width: auto;">
                    <option>OKT 2024</option>
                </select>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengguna</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ibu</td>
                        <td>Belanja bulanan</td>
                        <td>02-10-2024</td>
                        <td>Rp.500.000,00</td>
                        <td>⋮</td>
                    </tr>
                    <!-- More rows... -->
                </tbody>
            </table>
            <div class="pagination">
                <button class="page-button">←</button>
                <button class="page-button active">1</button>
                <button class="page-button">2</button>
                <button class="page-button">3</button>
                <button class="page-button">4</button>
                <button class="page-button">5</button>
                <button class="page-button">→</button>
            </div>
        </div>
    </main>

    <main class="main-content" id="laporan-pribadi" style="display: none;">
        <div class="breadcrumb">
            <h1 class="page-title">Laporan</h1>
            <span class="breadcrumb-separator margin-bottom-span">&gt;</span>
            <span class="margin-bottom-span">Pribadi</span>
        </div>

        <div class="summary-cards">
            <div class="summary-card saldo-card">
                <div class="card-title">Saldo</div>
                <div class="card-amount">Rp. 500.000</div>
            </div>
            <div class="summary-card pemasukan-card">
                <div class="card-title">Total Pemasukan</div>
                <div class="card-amount">Rp. 500.000</div>
            </div>
            <div class="summary-card pengeluaran-card">
                <div class="card-title">Total Pengeluaran</div>
                <div class="card-amount">Rp. 500.000</div>
            </div>
        </div>

        <div class="table-container">
            <h2>Rincian Pemasukan</h2>
            <div class="period-filter">
                <button class="filter-button">Harian</button>
                <button class="filter-button active">Mingguan</button>
                <button class="filter-button">Bulanan</button>
                <select class="form-input" style="margin-left: auto; width: auto;">
                    <option>OKT 2024</option>
                </select>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengguna</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ayah</td>
                        <td>Gaji kantor</td>
                        <td>02-10-2024</td>
                        <td>Rp.500.000,00</td>
                        <td>⋮</td>
                    </tr>
                    <!-- More rows... -->
                </tbody>
            </table>
            <div class="pagination">
                <button class="page-button">←</button>
                <button class="page-button active">1</button>
                <button class="page-button">2</button>
                <button class="page-button">3</button>
                <button class="page-button">4</button>
                <button class="page-button">5</button>
                <button class="page-button">→</button>
            </div>
        </div>

        <div class="table-container">
            <h2>Rincian Pengeluaran</h2>
            <div class="period-filter">
                <button class="filter-button active">Harian</button>
                <button class="filter-button">Mingguan</button>
                <button class="filter-button">Bulanan</button>
                <select class="form-input" style="margin-left: auto; width: auto;">
                    <option>OKT 2024</option>
                </select>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengguna</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ibu</td>
                        <td>Belanja bulanan</td>
                        <td>02-10-2024</td>
                        <td>Rp.500.000,00</td>
                        <td>⋮</td>
                    </tr>
                    <!-- More rows... -->
                </tbody>
            </table>
            <div class="pagination">
                <button class="page-button">←</button>
                <button class="page-button active">1</button>
                <button class="page-button">2</button>
                <button class="page-button">3</button>
                <button class="page-button">4</button>
                <button class="page-button">5</button>
                <button class="page-button">→</button>
            </div>
        </div>
    </main>

    <!-- Settings Page Content -->
    <main class="main-content" id="pengaturan-page" style="display: none;">
        <h1 class="page-title">Pengaturan</h1>

        <div class="settings-section">
            <h2 class="settings-title">Profil</h2>
            <form class="settings-form">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-input" value="John Doe">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input" value="john@example.com">
                </div>
                <button type="submit" class="save-button">Simpan Perubahan</button>
            </form>
        </div>

        <div class="settings-section">
            <h2 class="settings-title">Keamanan</h2>
            <form class="settings-form">
                <div class="form-group">
                    <label class="form-label">Password Lama</label>
                    <input type="password" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Password Baru</label>
                    <input type="password" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-input">
                </div>
                <button type="submit" class="save-button">Ubah Password</button>
            </form>
        </div>

        <div class="settings-section">
            <h2 class="settings-title">Notifikasi</h2>
            <div class="settings-form">
                <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
                    <label class="form-label">Email Notifikasi</label>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
                    <label class="form-label">Pengingat Harian</label>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Navigation handling
        // const navLinks = document.querySelectorAll('.nav-link[data-page]');
        // const pages = {
        //     dashboard: document.getElementById('dashboard-page'),
        //     laporan: document.getElementById('laporan-page'),
        //     pengaturan: document.getElementById('pengaturan-page')
        // };

        // navLinks.forEach(link => {
        //     link.addEventListener('click', (e) => {
        //         e.preventDefault();
        //         const targetPage = link.dataset.page;

        //         // Update active states
        //         navLinks.forEach(l => l.classList.remove('active'));
        //         link.classList.add('active');

        //         // Show/hide pages
        //         Object.values(pages).forEach(page => {
        //             if (page) page.style.display = 'none';
        //         });
        //         if (pages[targetPage]) {
        //             pages[targetPage].style.display = 'block';
        //         }
        //     });
        // });

        // Navigation handling
        const navLinks = document.querySelectorAll('.nav-link[data-page]');
const subLinks = document.querySelectorAll('.sub-link[data-page]');
const pages = {
    dashboard: document.getElementById('dashboard-page'),
    'laporan-umum': document.getElementById('laporan-umum'),
    'laporan-pribadi': document.getElementById('laporan-pribadi'),
    pengaturan: document.getElementById('pengaturan-page')
};

// Track if "Laporan" is being opened for the first time
let laporanFirstClick = true;

// Main navigation links
navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetPage = link.dataset.page;

        // Update active states for main navigation links
        navLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');

        // Show/hide main pages
        Object.values(pages).forEach(page => {
            if (page) page.style.display = 'none';
        });

        if (targetPage === 'laporan') {
            // If "Laporan" is clicked, show "laporan-umum" by default
            setActiveSubPage('laporan-umum');
            laporanFirstClick = false; // Prevent reactivating by default on subsequent clicks
        } else if (pages[targetPage]) {
            pages[targetPage].style.display = 'block';
        }
    });
});

// Sub-links for "Laporan"
subLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetSubPage = link.dataset.page;

        // Set active state for sub-links
        subLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');

        // Show the selected subpage
        setActiveSubPage(targetSubPage);
    });
});

// Function to handle subpage display
function setActiveSubPage(subPage) {
    Object.values(pages).forEach(page => {
        if (page) page.style.display = 'none';
    });
    if (pages[subPage]) {
        pages[subPage].style.display = 'block';
    }

    // Keep "Laporan" tab active when navigating within its subpages
    navLinks.forEach(link => link.classList.remove('active'));
    document.querySelector('.nav-link[data-page="laporan"]').classList.add('active');

    // Update active state for the sub-link
    subLinks.forEach(link => link.classList.remove('active'));
    document.querySelector(`.sub-link[data-page="${subPage}"]`).classList.add('active');
}


        const filterButtons = document.querySelectorAll('.filter-button');
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                button.parentElement.querySelectorAll('.filter-button').forEach(btn => {
                    btn.classList.remove('active');
                });
                button.classList.add('active');
            });
        });

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
