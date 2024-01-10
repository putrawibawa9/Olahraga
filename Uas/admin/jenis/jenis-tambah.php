<?php 
    require_once '../header.php';
    require_once '../functions/functions.php';

    if(isset($_POST['submit'])){    
        if (tambahJenis($_POST)>0){
            echo "
                <script>
                alert('data berhasil ditambah');
                document.location.href = 'jenis.php';
                </script>
            ";
        }else{
            echo " <script>
            alert('data gagal ditambah');
            document.location.href = 'jenis.php';
            </script>
        ";
    
        }
    
    }
?>

<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Tambah jenis Olahraga</h3>
        <form method="post">  
            <div class="mb-3">
                <input type="text" name="jenis" placeholder="Jenis Olaharaga" class="form-control" required>
            </div>
            <a href="jenis.php" class="btn btn-success" >Kembali</a>
            <button type="submit" class="btn btn-primary" name="submit" >Simpan</button>
        </form>
    </div>
  </div>
</div>


<?php require_once '../footer.php'; ?>