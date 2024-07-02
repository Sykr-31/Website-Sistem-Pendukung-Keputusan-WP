<?php
require 'criteria.php';
require 'alternatives.php';

// Perbaikan: Memeriksa keberhasilan pengambilan data kriteria
if (empty($criteria)) {
    echo "Gagal mendapatkan data kriteria";
    exit();
}

// Mendapatkan alternatif
$alternatives = getAlternatives();

// Memeriksa keberhasilan pengambilan data kriteria dan alternatif
if (empty($criteria) || empty($alternatives)) {
    echo "Gagal mendapatkan data kriteria atau alternatif";
    exit();
}

// Mendapatkan bobot kriteria
$criteriaWeights = array(
    1 => 5,
    2 => 4,
    3 => 3,
    4 => 2,
    5 => 3
);

// Mendapatkan nilai-nilai alternatif
$alternativeValues = array(
    1 => array(3, 3, 1, 2, 1),
    2 => array(2, 2, 2, 2, 0),
    3 => array(1, 3, 1, 1, 3),
    4 => array(1, 2, 2, 3, 2)
);

// Mendapatkan jenis kriteria (benefit atau cost)
$criteriaTypes = array();
foreach ($criteria as $criterion) {
    $criteriaTypes[$criterion['id']] = $criterion['type'];
}

// Menghitung nilai vektor S
$vectorS = array();
foreach ($alternatives as $alternative) {
    $s = 1;
    foreach ($criteria as $criterion) {
        $criterionId = $criterion['id'];
        $criterionType = $criteriaTypes[$criterionId];
        $weight = $criteriaWeights[$criterionId];
        $value = $alternativeValues[$alternative['id']][$criterionId - 1];

        if ($criterionType == 'benefit') {
            $s *= pow($value, $weight);
        } else if ($criterionType == 'cost') {
            $s *= pow($value, -$weight);
        }
    }
    $vectorS[$alternative['id']] = $s;
}

// Menghitung total nilai vektor S
$totalS = array_sum($vectorS);

// Menghitung nilai vektor V
$vectorV = array();
foreach ($alternatives as $alternative) {
    if ($totalS > 0) {
        $vectorV[$alternative['id']] = $vectorS[$alternative['id']] / $totalS;
    } else {
        $vectorV[$alternative['id']] = 0;
    }
}

// Meranking alternatif berdasarkan nilai vektor V
arsort($vectorV);

// Menampilkan hasil ranking
echo "<h1>Ranking Alternatif</h1>";
echo "<table>";
echo "<tr><th>No</th><th>Nama Alternatif</th><th>Nilai Vektor V</th></tr>";
$rank = 1;
foreach ($vectorV as $alternativeId => $value) {
    $alternative = getAlternative($alternativeId);
    if ($alternative) {
        echo "<tr><td>{$rank}</td><td>{$alternative['name']}</td><td>{$value}</td></tr>";
        $rank++;
    }
}
echo "</table>";
?>

<a href="index.php">Kembali</a>