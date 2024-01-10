<?php 


require_once '../functions/functions.php'; 
require_once '../header.php'; 
$jenis = query("SELECT * FROM tb_jenis");

?>


<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
      <h3>Jenis</h3>
     
        <a href="jenis-tambah.php" class="btn btn-primary mb-3">Tambah</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($jenis as $row):?>
                <tr>
                    <td><?=$row['id_jenis']?></td>
                    <td><?=$row['Jenis']?></td>
                    <td>
                    <a href="jenis-form.php?id=<?= $row['id_jenis'] ?>" class="btn btn-warning btn-sm"> Edit</a>
                    <a href="jenis-delete.php?id=<?= $row['id_jenis'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini?')"> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  </div>
</div>

<?php require_once '../footer.php'; ?>
