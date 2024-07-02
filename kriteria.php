<?php
include 'header.php';

require_once 'criteria.php';

// Mendapatkan daftar kriteria
$criterias = getCriterias();
?>

<div class="panel panel-container" style="padding: 20px; box-shadow: 2px 2px 5px #888888;">
    <h4>Tabel Kriteria</h4>
    <a href="add_criteria.php" class="btn btn-primary"><span class="fa fa-plus"></span>&emsp; Tambah Data</a>
    <br>
    <br>

    <div class="table-responsive">
        <table class="table table-bordered">
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
                        <td class="text-center"><?php echo $criteria['id']; ?></td>
                        <td class="text-center"><?php echo $criteria['name']; ?></td>
                        <td class="text-center"><?php echo $criteria['weight']; ?></td>
                        <td class="text-center"><?php echo $criteria['type']; ?></td>
                        <td class="text-center">
                            <a href="edit_criteria.php?id=<?php echo $criteria['id']; ?>&aksi=ubah" class="btn btn-info"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="delete_criteria.php?id=<?php echo $criteria['id']; ?> &proses=proses-hapus" class="btn btn-danger"><span class="fa fa-trash"></span>Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php
include 'footer.php';
?>