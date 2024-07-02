<?php
require 'alternatives.php';

$id = $_GET['id'];

$result = deleteAlternative($id);
if ($result) {
    echo "Alternatif berhasil dihapus.";
} else {
    echo "Gagal menghapus alternatif.";
}
?>
<br>
<a href="alternatif.php">Kembali</a>