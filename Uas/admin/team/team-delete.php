<?php

require_once '../functions/functions.php'; 
$id_team = $_GET['id_team'];

if (hapusTeam($id_team)>0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'team.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'team.php';
            </script>";
}


?>