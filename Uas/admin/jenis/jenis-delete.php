<?php

require_once '../functions/functions.php'; 
$id_jenis = $_GET['id'];

if (hapusJenis($id_jenis)>0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'jenis.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'jenis.php';
            </script>";
}


?>