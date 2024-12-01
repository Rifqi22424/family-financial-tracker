<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catatan Keuangan Keluarga</title>
  <link rel="stylesheet" href="styles.css">

  <style>
    /* styles.css */

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.container {
  display: flex;
}

.sidebar {
  width: 250px;
  background-color: #f8f9fa;
  padding: 20px;
}

.logo {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.logo img {
  width: 50px;
  margin-right: 10px;
}

.menu {
  display: flex;
  flex-direction: column;
}

.menu-item {
  text-decoration: none;
  padding: 10px;
  color: #333;
  margin-bottom: 10px;
  border-radius: 5px;
}

.menu-item.active,
.menu-item:hover {
  background-color: #ffad34;
  color: #fff;
}

.main-content {
  flex: 1;
  padding: 20px;
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.summary {
  display: flex;
  gap: 20px;
  margin-bottom: 20px;
}

.summary-box {
  flex: 1;
  padding: 15px;
  border-radius: 10px;
  text-align: center;
}

.saldo {
  background-color: #fdefcd;
}

.pemasukan {
  background-color: #cde6e8;
}

.pengeluaran {
  background-color: #f8d1d3;
}

.summary-box h3 {
  font-size: 18px;
  margin-bottom: 10px;
}

.summary-box p {
  font-size: 24px;
  font-weight: bold;
}

.transaction {
  margin-bottom: 20px;
}

.transaction-tabs {
  display: flex;
  gap: 10px;
  margin-bottom: 15px;
}

.tab {
  padding: 10px;
  background-color: #f0f0f0;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

.tab.active,
.tab.transfer {
  background-color: #ffad34;
  color: white;
}

.transaction-form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.transaction-form label {
  font-size: 14px;
}

.transaction-form input {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.save-button {
  background-color: #ffad34;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

.history {
  background-color: #f8f9fa;
  padding: 15px;
  border-radius: 10px;
}

.history h3 {
  font-size: 16px;
  margin-bottom: 5px;
}

.history p {
  font-size: 14px;
  margin-bottom: 5px;
}

.income {
  color: green;
  font-weight: bold;
}

.expense {
  color: red;
  font-weight: bold;
}

  </style>
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="logo">
        <img src="path/to/logo.png" alt="Logo">
        <h2>Catatan Keuangan Keluarga</h2>
      </div>
      <nav class="menu">
        <a href="#" class="menu-item active">Dashboard</a>
        <a href="#" class="menu-item">Laporan</a>
        <a href="#" class="menu-item">Pengaturan</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <h1>Home</h1>

      <!-- Summary Boxes -->
      <div class="summary">
        <div class="summary-box saldo">
          <h3>Saldo</h3>
          <p>Rp. 500,000</p>
        </div>
        <div class="summary-box pemasukan">
          <h3>Pemasukan</h3>
          <p>Rp. 500,000</p>
        </div>
        <div class="summary-box pengeluaran">
          <h3>Pengeluaran</h3>
          <p>Rp. 500,000</p>
        </div>
      </div>

      <!-- Transaction Form -->
      <div class="transaction">
        <div class="transaction-tabs">
          <button class="tab active">Pengeluaran</button>
          <button class="tab">Pemasukan</button>
          <button class="tab transfer">Transfer</button>
        </div>
        <form class="transaction-form">
          <label>Kirim ke</label>
          <input type="text" placeholder="Anak - Tifa">
          <label>Jumlah</label>
          <input type="text" placeholder="Rp. 150,000">
          <label>Keterangan</label>
          <input type="text" placeholder="jajan sekolah">
          <label>Masa dipikirkan</label>
          <input type="text" placeholder="kosong">
          <button type="submit" class="save-button">Simpan</button>
        </form>
      </div>

      <!-- Transaction History -->
      <div class="history">
        <h3>Pemasukan</h3>
        <p>15 Okt 2024 - Gaji Ayah <span class="income">+7,000,000</span></p>
        <h3>Pengeluaran</h3>
        <p>15 Okt 2024 - Sekolah Anak <span class="expense">-20,000</span></p>
      </div>
    </main>
  </div>
</body>
</html>
