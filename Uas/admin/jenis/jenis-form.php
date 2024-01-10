<?php 
    require_once '../header.php';
    require_once '../functions/functions.php'; 
?>

<?php
$Id_jenis = $_GET['id'];

$jenis = query("SELECT * FROM tb_jenis WHERE id_jenis= $Id_jenis")[0];

if(isset($_POST['submit'])){


    
    //check the progress
    if (ubahJenis($_POST)>0){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'jenis.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'jenis.php';
        </script>
    ";

    }

}
?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Edit Jenis Olaharaga</h3>
        <form method="post">  
        <input type="hidden" name="id_jenis" value="<?= $Id_jenis ?>;">
                
            <div class="mb-3">
                <input type="text" name="jenis" placeholder="Jenis" class="form-control" value ="<?= $jenis['Jenis']?> " required>
            </div>
            <a href="jenis.php" class="btn btn-success" >Kembali</a>
            <button type="submit" class="btn btn-primary" name="submit" >Simpan</button>
        </form>
    </div>
  </div>
</div>


<?php require_once '../footer.php'; ?>
