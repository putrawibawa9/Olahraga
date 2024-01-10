<?php 
    require_once '../header.php';
    require_once '../functions/functions.php'; 

    $id_team = $_GET['id_team'];

    $jns_olahraga = query("SELECT * FROM tb_team JOIN tb_jenis ON tb_team.id_jenis = tb_jenis.id_jenis WHERE tb_team.id_team = $id_team")[0];


    $pemain = query("SELECT * FROM tb_team JOIN tb_pemain ON tb_team.id_pemain = tb_pemain.id_pemain WHERE tb_team.id_team = $id_team")[0];

    $semua_olga = query("SELECT * FROM tb_jenis");

    $semua_pemain =query("SELECT * FROM tb_pemain");

?>

<?php
   if(isset($_POST['submit'])){

    
    //check the progress
    if (ubahTeam($_POST)>0){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'team.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'team.php';
        </script>
    ";

    }

}
?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Edit Team</h3>


        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_team" value="<?= $id_team ?>;">
        <input type="hidden" name="gambarLama" value="<?= $pemain['gambar']?>">

    <div class="mb-3">
        <select class="form-select" name="id_jenis" required>
            <option value="<?= $jns_olahraga['id_jenis'] ?>"><?= $jns_olahraga['Jenis'] ?> </option>
            <?php foreach ($semua_olga as $jns) : ?>
                <option value="<?= $jns['id_jenis'] ?>"><?= $jns['Jenis'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <select class="form-select" name="id_pemain" required>
            <option value="<?= $pemain['id_pemain'] ?>"><?= $pemain['nama'] ?> </option>
            <?php foreach ($semua_pemain as $pmn) : ?>
                <option value="<?= $pmn['id_pemain'] ?>"><?= $pmn['nama'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>

            <div class="mb-3">
                <label class="form-label">Nama Team</label>
                <input type="text" name="nama_team" class="form-control" value="<?= $jns_olahraga['nama']?>">
            </div>
            

            <div class="mb-3">
            <textarea class="form-control" name="keterangan_team" rows="3" placeholder="Keterangan Team"  required><?= $jns_olahraga['keterangan']?></textarea>
            </div>

            <img src="../img/<?= $pemain['gambar'] ?>" width="100px" height="100px">

            <div class="mb-3">
            <label for="gambar">Gambar :</label>
          <input type="file" name="gambar" id="gambar" >
            </div>


            <a href="team.php" class="btn btn-success" >Kembali</a>
            <button type="submit" class="btn btn-primary" name="submit" >Simpan</button>
        </form>
    </div>
  </div>
</div>


<?php require_once '../footer.php'; ?>
