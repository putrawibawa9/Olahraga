<?php
require_once '../functions/functions.php'; 

 $team = query("SELECT tb_team.nama AS 'nama_team' , tb_pemain.nama AS 'nama_pemain', id_team, jenis, keterangan, gambar
 FROM tb_team
 INNER JOIN tb_jenis ON tb_team.id_jenis = tb_jenis.id_jenis
 INNER JOIN tb_pemain ON tb_team.id_pemain = tb_pemain.id_pemain;");



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">

    <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand mx-auto">SISTEM INFORMASI OLAHRAGA</a>
  </div>
</nav>



<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
      <h3>Team</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Jenis Olahraga</th>
                    <th>Nama Team</th>
                    <th>Nama Pemain</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($team as $row):?>
                <tr>
                    <td><?=$row['jenis']?></td>
                    <td><?=$row['nama_team']?></td>
                    <td><?=$row['nama_pemain']?></td>
                    <td><?=$row['keterangan']?></td>
                    <td><img src="../img/<?=$row['gambar']?>" alt="" width="100px" height="100px"></td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
      <a href="../logout.php">logout</a>
      <br>
      <a href="../../index.php">Klik Untuk Admin</a>
</div>
    </div>
  </div>
</div>



<?php require_once '../footer.php'; ?>
