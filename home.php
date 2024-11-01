<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi RentCar by @indahra</title>
    <link rel="stylesheet" href="styles/style.css" />
    <script src="scripts/script.js" defer></script>
</body>
</head>
<body>
    <div class="container">
    <?php include "layout/header.html"?>
        <h1>RentCar🚘</h1>
        <form action="result.php" method="POST">
            <label for="nama">Nama Penyewa:</label>
            <input type="text" placeholder= 'Masukan nama anda'id="nama" name="nama_penyewa" required class="textfield"/>
            <label for="mobil">Pilih Mobil:</label >
            <select id="mobil" name="mobil" required class="textfield">
                <option value="Avanza">Avanza</option>
                <option value="Innova">Innova</option>
                <option value="New Altis">New Altis</option>
                <option value="New Camry">New Camry</option>
                <option value="Alphard">Alphard</option>
            </select>
            <label for="durasi">Durasi Sewa (hari):</label>
            <input type="number" id="durasi" name="durasi_sewa" min="1" required oninput="updatePackage()" class="textfield" placeholder="Masukan total durasi"/>
            <label for="jam">Jam Tambahan (jika ada):</label>
            <input type="number" id="jam" name="jam_tambahan" min="0" value="0" required / class="textfield">
            <button type="submit">Hitung Total Biaya</button>
        </form>
        <?php include "layout/footer.html"?>
    </div>
</body>
</html>