<?php
include 'header.php';
require 'criteria.php';
require 'alternatives.php';

// Mendapatkan daftar kriteria
$criterias = getCriterias();

// Mendapatkan daftar alternatif
$alternatives = getAlternatives();

// Langkah pertama: Menjumlahkan nilai bobot
$totalWeight = 0;
foreach ($criterias as $criteria) {
    $totalWeight += $criteria['weight'];
}

// Langkah kedua: Menghitung bobot kepentingan
$criteriaWeights = array();
foreach ($criterias as $criteria) {
    $criteriaWeights[$criteria['id']] = $criteria['weight'] / $totalWeight;
}

// Langkah ketiga: Mengalikan bobot kepentingan dengan nilai alternatif
$sVector = array();
foreach ($alternatives as $alternative) {
    $s = 1;
    foreach ($criterias as $criteria) {
        $value = $alternative['value' . $criteria['id']];
        $weight = $criteriaWeights[$criteria['id']];
        if ($criteria['type'] === 'benefit') {
            $s *= pow($value, $weight);
        } else {
            $s *= pow($value, -$weight);
        }
    }
    $sVector[$alternative['id']] = $s;
}

// Langkah keempat: Menjumlahkan nilai vektor s
$totalS = array_sum($sVector);

// Langkah kelima: Menghitung nilai vektor v
$vVector = array();
foreach ($alternatives as $alternative) {
    $vVector[$alternative['id']] = $sVector[$alternative['id']] / $totalS;
}

// Langkah keenam: Meranking alternatif berdasarkan nilai vektor v
arsort($vVector);

?>

<div class="panel panel-container" style="padding: 20px; box-shadow: 2px 2px 5px #888888;">
    <h4>Tabel Ranking</h4>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ranking</th>
                    <th>Nama Alternatif</th>
                    <th>Nilai S</th>
                    <th>Nilai Vektor V</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $rank = 1;
                foreach ($vVector as $alternativeId => $value) {
                    $alternative = getAlternative($alternativeId);
                    echo "<tr>";
                    echo "<td>" . $alternative['id'] . "</td>";
                    echo "<td>" . $rank . "</td>";
                    echo "<td>" . $alternative['name'] . "</td>";
                    echo "<td>" . $sVector[$alternative['id']] . "</td>";
                    echo "<td>" . $value . "</td>";
                    echo "</tr>";
                    $rank++;
                }
                ?>
            </tbody>
        </table>
    </div>

</div>

<?php
include 'footer.php';
?>