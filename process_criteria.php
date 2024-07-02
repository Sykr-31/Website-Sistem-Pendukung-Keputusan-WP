<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spk_kemal";

$conn = new mysqli($servername, $username, $password, $dbname);

require_once 'criteria.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id'])) {
        // Proses update kriteria
        $id = $_GET['id'];
        $name = $_POST['name'];
        $weight = $_POST['weight'];
        $type = $_POST['type'];

        $result = updateCriteria($id, $name, $weight, $type);
        if ($result) {
            echo "Kriteria berhasil diupdate.";
        } else {
            echo "Gagal mengupdate kriteria.";
        }
    } else {
        // Proses tambah kriteria
        $name = $_POST['name'];
        $weight = $_POST['weight'];
        $type = $_POST['type'];

        $result = createCriteria($name, $weight, $type);
        if ($result) {
            echo "Kriteria berhasil ditambahkan.";
        } else {
            echo "Gagal menambahkan kriteria.";
        }
    }
}

?>
<br>
<a href="kriteria.php">Kembali</a>