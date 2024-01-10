<?php 
    require_once '../header.php';
    require_once '../functions/functions.php';

    if(isset($_POST['submit'])){    
        if (tambahPemain($_POST)>0){
            echo "
                <script>
                alert('data berhasil ditambah');
                document.location.href = 'pemain.php';
                </script>
            ";
        }else{
            echo " <script>
            alert('data gagal ditambah');
            document.location.href = 'pemain.php';
            </script>
        ";
    
        }
    
    }

    $cabor = query("SELECT * FROM tb_jenis");
?>

<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Tambah Pemain</h3>
        <form method="post">  

        <div class="mb-3">
                <label class="form-label">Nama Pemain</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="mb-3">
        <select class="form-select" name="id_jenis" required>
            <option> Pilih Jenis Olahraga </option>
            <?php foreach ($cabor as $cbr) : ?>
                <option value="<?= $cbr['id_jenis'] ?>"><?= $cbr['Jenis'] ?> </option>
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