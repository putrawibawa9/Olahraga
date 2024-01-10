<?php
require_once '../functions/functions.php'; 
require_once '../header.php'; 
 $team = query("SELECT tb_team.nama AS 'nama_team' , tb_pemain.nama AS 'nama_pemain', id_team, jenis, keterangan, gambar
 FROM tb_team
 INNER JOIN tb_jenis ON tb_team.id_jenis = tb_jenis.id_jenis
 INNER JOIN tb_pemain ON tb_team.id_pemain = tb_pemain.id_pemain;");



 ?>

<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
      <h3>Team</h3>
        <a href="team-tambah.php" class="btn btn-primary mb-3">Tambah</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Team</th>
                    <th>Jenis Olahraga</th>
                    <th>Nama Team</th>
                    <th>Nama Pemain</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($team as $row):?>
                <tr>
                    <td><?=$row['id_team']?></td>
                    <td><?=$row['jenis']?></td>
                    <td><?=$row['nama_team']?></td>
                    <td><?=$row['nama_pemain']?></td>
                    <td><?=$row['keterangan']?></td>
                    <td><img src="../img/<?=$row['gambar']?>" alt="" width="100px" height="100px"></td>
                    <td>
                    <a href="team-form.php?id_team=<?= $row['id_team'] ?>" class="btn btn-warning btn-sm"> Edit</a>
                    <a href="team-delete.php?id_team=<?= $row['id_team'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini?')"> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  </div>
</div>

<?php require_once '../footer.php'; ?>
