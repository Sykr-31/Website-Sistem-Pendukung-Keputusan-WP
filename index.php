<?php
require_once 'criteria.php';
require 'alternatives.php';

// Mendapatkan daftar kriteria
$criterias = getCriterias();

// Mendapatkan daftar alternatif
$alternatives = getAlternatives();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sistem Pendukung Keputusan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h2>Daftar Alternatif</h2>

    <a href="add_alternative.php">Tambah Alternatif</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Alternatif</th>
                <th>Nilai 1</th>
                <th>Nilai 2</th>
                <th>Nilai 3</th>
                <th>Nilai 4</th>
                <th>Nilai 5</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alternatives as $alternative) : ?>
                <tr>
                    <td><?php echo $alternative['id']; ?></td>
                    <td><?php echo $alternative['name']; ?></td>
                    <td><?php echo $alternative['value1']; ?></td>
                    <td><?php echo $alternative['value2']; ?></td>
                    <td><?php echo $alternative['value3']; ?></td>
                    <td><?php echo $alternative['value4']; ?></td>
                    <td><?php echo $alternative['value5']; ?></td>
                    <td>
                        <a href="edit_alternative.php?id=<?php echo $alternative['id']; ?>">Edit</a>
                        <a href="delete_alternative.php?id=<?php echo $alternative['id']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>




    <h2>Daftar Kriteria</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($criterias as $criteria) : ?>
                <tr>
                    <td><?php echo $criteria['id']; ?></td>
                    <td><?php echo $criteria['name']; ?></td>
                    <td><?php echo $criteria['weight']; ?></td>
                    <td><?php echo $criteria['type']; ?></td>
                    <td>
                        <a href="edit_criteria.php?id=<?php echo $criteria['id']; ?>">Edit</a>
                        <a href="delete_criteria.php?id=<?php echo $criteria['id']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>




    <h2>Peringkat Alternatif</h2>
    <table>
        <thead>
            <tr>
                <th>Ranking</th>
                <th>ID</th>
                <th>Nama Alternatif</th>
                <th>Nilai S</th>
                <th>Nilai Vektor V</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rank = 1;
            foreach ($alternatives as $alternative) {
                $s = 1;
                foreach ($criterias as $criteria) {
                    $value = $alternative['value' . $criteria['id']];
                    if ($criteria['type'] === 'benefit') {
                        $s *= pow($value, $criteria['weight']);
                    } else {
                        $s *= pow($value, -$criteria['weight']);
                    }
                }
                $sVector[$alternative['id']] = $s;
            }

            $totalS = array_sum($sVector);
            $vVector = [];
            foreach ($alternatives as $alternative) {
                $vVector[$alternative['id']] = $sVector[$alternative['id']] / $totalS;
            }

            arsort($vVector);

            foreach ($vVector as $alternativeId => $value) {
                $alternative = getAlternative($alternativeId);
                echo "<tr>";
                echo "<td>" . $rank . "</td>";
                echo "<td>" . $alternative['id'] . "</td>";
                echo "<td>" . $alternative['name'] . "</td>";
                echo "<td>" . $sVector[$alternative['id']] . "</td>";
                echo "<td>" . $value . "</td>";
                echo "</tr>";
                $rank++;
            }
            ?>
        </tbody>
    </table>

</body>

</html>