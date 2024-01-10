<?php

require_once '../functions/functions.php'; 
$id_pemain = $_GET['id_pemain'];

if (hapusPemain($id_pemain)>0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'pemain.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'pemain.php';
            </script>";
}


?>