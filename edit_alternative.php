<?php
include 'header.php';
?>

<head>
    <title>Edit Alternatif</title>
</head>

<body>
    <h1>Edit Alternatif</h1>

    <?php
    require 'alternatives.php';

    $id = $_GET['id'];
    $alternative = getAlternative($id);
    if ($alternative) {
    ?>
        <form method="post" action="process_alternative.php?mode=update&id=<?php echo $id; ?>">
            <label for="name">Nama Alternatif:</label>
            <input type="text" name="name" id="name" value="<?php echo $alternative['name']; ?>" required>
            <br>
            <label for="value1">Nilai 1:</label>
            <input type="text" name="value1" id="value1" value="<?php echo $alternative['value1']; ?>" required>
            <br>
            <label for="value2">Nilai 2:</label>
            <input type="text" name="value2" id="value2" value="<?php echo $alternative['value2']; ?>" required>
            <br>
            <label for="value3">Nilai 3:</label>
            <input type="text" name="value3" id="value3" value="<?php echo $alternative['value3']; ?>" required>
            <br>
            <label for="value4">Nilai 4:</label>
            <input type="text" name="value4" id="value4" value="<?php echo $alternative['value4']; ?>" required>
            <br>
            <label for="value5">Nilai 5:</label>
            <input type="text" name="value5" id="value5" value="<?php echo $alternative['value5']; ?>" required>
            <br>
            <input type="submit" value="Simpan">
        </form>
    <?php
    } else {
        echo "Alternatif tidak ditemukan.";
    }
    ?>

    <a href="alternatif.php">Kembali</a>
</body>

</html>