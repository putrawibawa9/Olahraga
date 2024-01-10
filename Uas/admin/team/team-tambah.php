<?php 
    require_once '../header.php';
    require_once '../functions/functions.php'; 

    $jenis = query("SELECT * FROM tb_jenis");
    $pemain = query("SELECT * FROM tb_pemain");






//check whether the button has been click or not
if(isset($_POST['submit'])){

    
    //check the progress
    if (tambahTeam($_POST)>0){
        echo "
            <script>
            alert('data berhasil ditambah');
            document.location.href = 'team.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'team.php';
        </script>
    ";

    }

}
?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Tambah Team</h3>


        <form method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <select class="form-select" name="id_jenis" required>
            <option> Pilih Jenis Olahraga </option>
            <?php foreach ($jenis as $jns) : ?>
                <option value="<?= $jns['id_jenis'] ?>"><?= $jns['Jenis'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <select class="form-select" name="id_pemain" required>
            <option> Pilih Pemain </option>
            <?php foreach ($pemain as $pmn) : ?>
                <option value="<?= $pmn['id_pemain'] ?>"><?= $pmn['nama'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
            <div class="mb-3">
                <label class="form-label">Nama Team</label>
                <input type="text" name="nama_team" class="form-control">
            </div>
            

            <div class="mb-3">
            <textarea class="form-control" name="keterangan_team" rows="3" placeholder="Keterangan Team"  required></textarea>
            </div>

            <div class="mb-3">
            <label for="gambar">Gambar :</label>
          <input type="file" name="gambar" id="gambar" required >
            </div>

            <a href="team.php" class="btn btn-success" >Kembali</a>
            <button type="submit" class="btn btn-primary" name="submit" >Simpan</button>
        </form>
    </div>
  </div>
</div>


<?php require_once '../footer.php'; ?>
