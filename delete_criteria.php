<?php
require 'criteria.php';

$id = $_GET['id'];

$result = deleteCriteria($id);
if ($result) {
    echo "Kriteria berhasil dihapus.";
} else {
    echo "Gagal menghapus kriteria.";
}
?>
<br>
<a href="kriteria.php">Kembali</a>