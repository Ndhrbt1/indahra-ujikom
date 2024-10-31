<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi RentCar by @indahra</title>
    <link rel="stylesheet" href="style.css" />
</body>
    <script>
        function updatePackage() {
            const durasi = parseInt(document.getElementById('durasi').value);
            const programSelect = document.getElementById('program');

            // Clear existing selections
            programSelect.selectedIndex = 0;

            // Set the program based on the duration
            if (durasi === 4) {
                programSelect.selectedIndex = 0; // Paket 1
            } else if (durasi === 7) {
                programSelect.selectedIndex = 1; // Paket 2
            } else if (durasi === 10) {
                programSelect.selectedIndex = 2; // Paket 3
            } else {
                programSelect.selectedIndex = 3; // Harian, no discount
            }
        }



    </script>
</head>
<body>
    <div class="container">
        <h1>Welcome to RentCar 🚓</h1>
        <form action="process.php" method="POST">
            <label for="nama">Nama Penyewa:</label>
            <input type="text" parameter= 'masukan nama'id="nama" name="nama_penyewa" required />

            <label for="mobil">Pilih Mobil:</label>
            <select id="mobil" name="mobil" required>
                <option value="Avanza">Avanza</option>
                <option value="Innova">Innova</option>
                <option value="New Altis">New Altis</option>
                <option value="New Camry">New Camry</option>
                <option value="Alphard">Alphard</option>
            </select>

            <label for="durasi">Durasi Sewa (hari):</label>
            <input type="number" id="durasi" name="durasi_sewa" min="1" required oninput="updatePackage()" />

            <label for="jam">Jam Tambahan (jika ada):</label>
            <input type="number" id="jam" name="jam_tambahan" min="0" value="0" />

            <button type="submit">Hitung Total Biaya</button>
        </form>

        <footer>
     <p>Ujikom: Indah Robiatul Adawiyah<br>
    <a href="mailto:227006059@student.unsil.ac.id">227006059@student.unsil.ac.id</a></p>
            </footer>
    </div>

   
</body>
</html>