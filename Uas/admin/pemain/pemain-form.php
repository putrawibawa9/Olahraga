<?php 
    require_once '../header.php';
    require_once '../functions/functions.php'; 
?>

<?php
$id_pemain = $_GET['id_pemain'];

$pemain = query("SELECT * FROM tb_pemain JOIN tb_jenis ON tb_pemain.id_jenis = tb_jenis.id_jenis WHERE id_pemain = $id_pemain;")[0];

$cabor = query("SELECT * FROM tb_jenis");



if(isset($_POST['submit'])){


    
    //check the progress
    if (ubahPemain($_POST)>0){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'pemain.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'pemain.php';
        </script>
    ";

    }

}
?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Edit Pemain</h3>
        <form method="post">  
        <input type="hidden" name="id_pemain" value="<?= $id_pemain ?>;">
                
        <div class="mb-3">
                <label class="form-label">Nama Pemain</label>
                <input type="text" name="nama" class="form-control" value="<?= $pemain['nama']?>">
            </div>

            <div class="mb-3">
            <label class="form-label">Cabor</label>
        <select class="form-select" name="id_jenis" required>
            <option value="<?= $pemain['id_jenis'] ?>"><?= $pemain['Jenis'] ?> </option>
            <?php foreach ($cabor as $cbr) : ?>
                <option value="<?= $cbr['id'] ?>"><?= $cbr['Jenis'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>

            <a href="jenis.php" class="btn btn-success" >Kembali</a>
            <button type="submit" class="btn btn-primary" name="submit" >Simpan</button>
        </form>
    </div>
  </div>
</div>


<?php require_once '../footer.php'; ?>
