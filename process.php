<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        session_start(); // Mulai session
        // Koneksi ke database
        $conn = new mysqli("localhost", "root", "", "Rental_Mobil");

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Ambil data dari form jika ada permintaan POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama_penyewa = $_POST['nama_penyewa'];
            $mobil = $_POST['mobil'];
            $durasi_sewa = $_POST['durasi_sewa'];
            $jam_tambahan = $_POST['jam_tambahan'];

            // Menentukan program berdasarkan durasi sewa
            if ($durasi_sewa == 4) {
                $program = "Paket 1"; // Diskon 10%
            } elseif ($durasi_sewa == 7) {
                $program = "Paket 2"; // Diskon 20%
            } elseif ($durasi_sewa == 10) {
                $program = "Paket 3"; // Diskon 25%
            } else {
                $program = "Harian"; // Tidak ada diskon
            }

            // Ambil data dari database
            $sql = "SELECT Biaya_Rental_per_Hari, Diskon, Biaya_Extra_per_Hour FROM t_biaya_Rental WHERE Mobil = '$mobil' AND Program = '$program'";
            $result = $conn->query($sql);
            $data = $result->fetch_assoc();

            if ($data) {
                // Hitung biaya
                $biaya_per_hari = $data['Biaya_Rental_per_Hari'];
                $diskon_persen = $data['Diskon'];
                $biaya_per_jam = $data['Biaya_Extra_per_Hour'];
                
                // Biaya dasar
                $biaya_dasar = $biaya_per_hari * $durasi_sewa;
                
                // Hitung diskon
                $diskon = $biaya_dasar * ($diskon_persen / 100);
                
                // Biaya tambahan
                $biaya_tambahan = $biaya_per_jam * $jam_tambahan;
                
                // Total biaya
                $total_biaya = ($biaya_dasar - $diskon) + $biaya_tambahan;

            

              // Simpan data ke database
              $stmt = $conn->prepare("INSERT INTO t_sewa (nama_penyewa, mobil, durasi_sewa, program, biaya_dasar, diskon, biaya_tambahan, total_biaya) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
              $stmt->bind_param('ssisdddd', $nama_penyewa, $mobil, $durasi_sewa, $program, $biaya_dasar, $diskon, $biaya_tambahan, $total_biaya);

              if ($stmt->execute()) {
                  echo "<p></p>";
              } else {
                  echo "<p>Terjadi kesalahan saat menyimpan data: " . $stmt->error . "</p>";
              }

              $stmt->close();
          } else {
              echo "Data tidak ditemukan.";
          }
        }
        
// Tampilkan semua data yang ada di database
$sql = "SELECT * FROM t_sewa";
$result = $conn->query($sql);

        echo "<h2>Rincian Biaya Rental</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Nama Mobil</th>
                <th>Program</th>
                <th>Lama Sewa (Hari)</th>
                <th>Paket 1</th>
                <th>Paket 2</th>
                <th>Paket 3</th>
                <th>Harian</th>
                <th>Extra/hour</th>
                <th>Total Biaya</th>
              </tr>";
        
        $no = 1; // Nomor urut
        
        // Hitung biaya untuk setiap paket
        $biaya_paket_1 = $biaya_per_hari * 4 * (1 - 0.1); // Paket 1 dengan diskon 10%
        $biaya_paket_2 = $biaya_per_hari * 7 * (1 - 0.2); // Paket 2 dengan diskon 20%
        $biaya_paket_3 = $biaya_per_hari * 10 * (1 - 0.25); // Paket 3 dengan diskon 25%
        $biaya_harian = $biaya_per_hari; // Biaya harian
        $biaya_extra = $biaya_per_jam * $jam_tambahan; 
while ($row = $result->fetch_assoc()) {
        
        echo "<tr>
                <td>$no</td>
                <td>$nama_penyewa</td>
                <td>$mobil</td>
                <td>$program</td>
                <td>$durasi_sewa</td>
                <td>Rp " . number_format($biaya_paket_1, 0, ',', '.') . "</td>
                <td>Rp " . number_format($biaya_paket_2, 0, ',', '.') . "</td>
                <td>Rp " . number_format($biaya_paket_3, 0, ',', '.') . "</td>
                <td>Rp " . number_format($biaya_harian, 0, ',', '.') . "</td>
                <td>Rp " . number_format($biaya_extra, 0, ',', '.') . "</td>
                <td>Rp " . number_format($total_biaya, 0, ',', '.') . "</td>
              </tr>";
        $no++;
}
        echo "</table>";
        
        session_abort();
                $conn->close();
        ?>
    </div>
</body>
</html>