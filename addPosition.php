<?php
$servername = "localhost";
$username = "root";  // Ubah jika diperlukan
$password = "";  // Ubah jika diperlukan
$dbname = "vehicle_db";  // Sesuaikan nama database

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari request (latitude dan longitude)
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$vehicle_id = $_POST['vehicle_id'];

// Tambahkan data ke database
$sql = "INSERT INTO vehicle_positions (vehicle_id, latitude, longitude) VALUES ($vehicle_id, $latitude, $longitude)";
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
