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

while ($row = $result->fetch_assoc()) {
    // Ambil data dari setiap baris
    $nama_penyewa = $row['nama_penyewa'];
    $mobil = $row['mobil'];
    $durasi_sewa = $row['durasi_sewa'];
    $program = $row['program'];
    $jam_tambahan = $row['jam_tambahan'];
    $total_biaya = $row['total_biaya'];

    // Ambil biaya dari database
    $sql_biaya = "SELECT Biaya_Rental_per_Hari, Diskon, Biaya_Extra_per_Hour FROM t_biaya_Rental WHERE Mobil = '$mobil' AND Program = '$program'";
    $result_biaya = $conn->query($sql_biaya);
    $data_biaya = $result_biaya->fetch_assoc();

    if ($data_biaya) {
        $biaya_per_hari = $data_biaya['Biaya_Rental_per_Hari'];
        $diskon_persen = $data_biaya['Diskon'];
        $biaya_per_jam = $data_biaya['Biaya_Extra_per_Hour'];

        // Hitung biaya dasar
        $biaya_dasar = $biaya_per_hari * $durasi_sewa;
        
        // Hitung diskon
        $diskon = $biaya_dasar * ($diskon_persen / 100);
        
        // Hitung biaya tambahan
        $biaya_tambahan = $biaya_per_jam * $jam_tambahan;
        
        // Total biaya
        $total_biaya = ($biaya_dasar - $diskon) + $biaya_tambahan;

        // Inisialisasi biaya untuk setiap paket
        $biaya_paket_1 = ($durasi_sewa == 4) ? "Rp " . number_format($biaya_per_hari * 4 * (1 - 0.1), 0, ',', '.') : "-";
        $biaya_paket_2 = ($durasi_sewa == 7) ? "Rp " . number_format($biaya_per_hari * 7 * (1 - 0.2), 0, ',', '.') : "-";
        $biaya_paket_3 = ($durasi_sewa == 10) ? "Rp " . number_format($biaya_per_hari * 10 * (1 - 0.25), 0, ',', '.') : "-";
        $biaya_harian = ($durasi_sewa == 1) ? "Rp " . number_format($biaya_per_hari, 0, ',', '.') : "-";
        $biaya_extra = ($jam_tambahan > 0) ? "Rp " . number_format($biaya_per_jam * $jam_tambahan, 0, ',', '.') : "-";

        echo "<tr>
                <td>$no</td>
                <td>$nama_penyewa</td>
                <td>$mobil</td>
                <td>$program</td>
                <td>$durasi_sewa</td>
                <td>$biaya_paket_1</td>
                <td>$biaya_paket_2</td>
                <td>$biaya_paket_3</td>
                <td>$biaya_harian</td>
                <td>$biaya_extra</td>
                <td>Rp " . number_format($total_biaya, 0, ',', '.') . "</td>
              </tr>";
        $no++;
    }
}
echo "</table>";
