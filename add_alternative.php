<?php
include 'header.php';
?>

<head>
    <title>Tambah Alternatif</title>
</head>

<body>
    <h1>Tambah Alternatif</h1>

    <form method="post" action="process_alternative.php">
        <label for="name">Nama Alternatif:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="value1">Nilai 1:</label>
        <input type="number" name="value1" id="value1" step="0.01" required>
        <br>
        <label for="value2">Nilai 2:</label>
        <input type="number" name="value2" id="value2" step="0.01" required>
        <br>
        <label for="value3">Nilai 3:</label>
        <input type="number" name="value3" id="value3" step="0.01" required>
        <br>
        <label for="value4">Nilai 4:</label>
        <input type="number" name="value4" id="value4" step="0.01" required>
        <br>
        <label for="value5">Nilai 5:</label>
        <input type="number" name="value5" id="value5" step="0.01" required>
        <br>
        <input type="submit" value="Tambah">
    </form>


    <a href="alternatif.php">Kembali</a>
</body>

</html>