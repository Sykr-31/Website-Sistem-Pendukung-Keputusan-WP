<?php
include 'header.php';

require 'alternatives.php';

// Mendapatkan daftar alternatif
$alternatives = getAlternatives();
?>

<div class="panel panel-container" style="padding: 20px; box-shadow: 2px 2px 5px #888888;">
    <h4>Tabel Alternatif</h4>
    <a href="add_alternative.php" class="btn btn-primary"><span class="fa fa-plus"></span>&emsp; Tambah Data</a>
    <br>
    <br>

    <div class="table-responsive">
        <table class="table table-bordered">
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
                        <td class="text-center"><?php echo $alternative['id']; ?></td>
                        <td class="text-center"><?php echo $alternative['name']; ?></td>
                        <td class="text-center"><?php echo $alternative['value1']; ?></td>
                        <td class="text-center"><?php echo $alternative['value2']; ?></td>
                        <td class="text-center"><?php echo $alternative['value3']; ?></td>
                        <td class="text-center"><?php echo $alternative['value4']; ?></td>
                        <td class="text-center"><?php echo $alternative['value5']; ?></td>
                        <td class="text-center">
                            <a href="edit_alternative.php?id=<?php echo $alternative['id']; ?> &aksi=ubah" class="btn btn-info"><span class="fa fa-pencil"></span>Edit</a>
                            <a href="delete_alternative.php?id=<?php echo $alternative['id']; ?> &proses=proses-hapus" class="btn btn-danger"><span class="fa fa-trash"></span>Hapus</a>
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