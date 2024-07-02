<?php
include 'header.php';
?>

<head>
    <title>Tambah Kriteria</title>
</head>

<body>
    <h1>Tambah Kriteria</h1>

    <form method="post" action="process_criteria.php">
        <label for="name">Nama Kriteria:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="weight">Bobot:</label>
        <input type="text" name="weight" id="weight" required>
        <br>
        <label for="type">Tipe:</label>
        <select name="type" id="type" required>
            <option value="benefit">Benefit</option>
            <option value="cost">Cost</option>
        </select>
        <br>
        <input type="submit" value="Tambah">
    </form>

    <a href="kriteria.php">Kembali</a>
</body>

</html>