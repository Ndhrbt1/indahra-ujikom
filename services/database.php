<?php 
 // Koneksi ke database
 $conn = new mysqli("localhost", "root", "", "Rental_Mobil");

 if ($conn->connect_error) {
     die("Koneksi gagal: " . $conn->connect_error);
 }

?>