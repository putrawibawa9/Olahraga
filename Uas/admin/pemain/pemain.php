<?php 


require_once '../functions/functions.php'; 
require_once '../header.php'; 
$pemain = query("SELECT * FROM tb_pemain JOIN tb_jenis ON tb_pemain.id_jenis = tb_jenis.id_jenis;");

?>


<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
      <h3>Pemain</h3>
     
        <a href="pemain-tambah.php" class="btn btn-primary mb-3">Tambah</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pemain</th>
                    <th>Nama Pemain</th>
                    <th>Cabang Olahraga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pemain as $row):?>
                <tr>
                    <td><?=$row['id_pemain']?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['Jenis']?></td>
                    <td>
                    <a href="pemain-form.php?id_pemain=<?= $row['id_pemain'] ?>" class="btn btn-warning btn-sm"> Edit</a>
                    <a href="pemain-delete.php?id_pemain=<?= $row['id_pemain'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini?')"> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  </div>
</div>

<?php require_once '../footer.php'; ?>
