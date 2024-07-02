<?php
include 'header.php';
?>

<head>
    <title>Edit Kriteria</title>
</head>

<body>
    <h1>Edit Kriteria</h1>

    <?php
    require_once 'criteria.php';

    $id = $_GET['id'];
    $criteria = getCriteria($id);
    if ($criteria) {
    ?>
        <form method="post" action="process_criteria.php?id=<?php echo $id; ?>">
            <label for="name">Nama Kriteria:</label>
            <input type="text" name="name" id="name" value="<?php echo $criteria['name']; ?>" required>
            <br>
            <label for="weight">Bobot:</label>
            <input type="text" name="weight" id="weight" value="<?php echo $criteria['weight']; ?>" required>
            <br>
            <label for="type">Tipe:</label>
            <select name="type" id="type" required>
                <option value="benefit" <?php if ($criteria['type'] === 'benefit') echo 'selected'; ?>>Benefit</option>
                <option value="cost" <?php if ($criteria['type'] === 'cost') echo 'selected'; ?>>Cost</option>
            </select>
            <br>
            <input type="submit" value="Simpan">
        </form>
    <?php
    } else {
        echo "Kriteria tidak ditemukan.";
    }
    ?>

    <a href="kriteria.php">Kembali</a>
</body>

<?php
include 'footer.php';
?>