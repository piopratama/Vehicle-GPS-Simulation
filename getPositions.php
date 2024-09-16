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

// Ambil semua posisi kendaraan dari database
$sql = "SELECT vehicle_id, latitude, longitude FROM vehicle_positions ORDER BY timestamp ASC";
$result = $conn->query($sql);

$positions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $positions[] = $row;
    }
}

// Kembalikan data sebagai JSON
echo json_encode($positions);

$conn->close();
?>
