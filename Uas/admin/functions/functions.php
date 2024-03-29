<?php


$conn =mysqli_connect("localhost","root","","olahraga");


function query($query){
    global $conn;
    $result =mysqli_query($conn, $query);
    
    //make an empty array
    $rows = [];
    //loop the $result

    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambahProduk__($data) {
    global $conn;
  
    $Nama_produk = $data['Nama_produk'];
    $Foto_produk = $data['Foto_produk'];
    $Stok_produk = $data['Stok_produk'];
    $Deskripsi_produk = $data['Deskripsi_produk'];
    $Harga_produk = $data['Harga_produk'];
  

//make the insert syntax
$query = "INSERT INTO produk VALUES 
            ('','$Nama_produk','$Foto_produk','$Stok_produk','$Deskripsi_produk','$Harga_produk')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function tambahProduk($data) {
  global $conn;
  $Nama_produk = $data['Nama_produk'];
  $Stok_produk = $data['Stok_produk'];
  $Deskripsi_produk = $data['Deskripsi_produk'];
  $Harga_produk = $data['Harga_produk'];

  //upload gambar
  $Foto_produk = upload();
  if(!$Foto_produk){
    return false;
  }

//make the insert syntax
$query = "INSERT INTO produk VALUES 
          ('','$Nama_produk','$Foto_produk','$Stok_produk',' $Deskripsi_produk','$Harga_produk')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}

function upload(){
  $namaFile = $_FILES['Foto_produk']['name'];
  $ukuranFile =  $_FILES['Foto_produk']['size'];
  $error =  $_FILES['Foto_produk']['error'];  
  $tmp =  $_FILES['Foto_produk']['tmp_name'];  

  //cek apakah user sudah menambah gambar

  if($error ===4){
    echo "<script>
        alert ('pilih gambar dulu');
          </script>";
          return false;
  }

  //cek apakah yang diupload adalah gambar
  $ekstensiGambarValid =['jpg','jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile); 
  $ekstensiGambar = strtolower(end($ekstensiGambar)); 
  if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo "<script>
        alert ('format gambar salah!');
          </script>";
          return false;
  }

  //cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000){
    echo "<script>
        alert ('Ukuran terlalu besar');
          </script>";
  }

  //generate nama file random
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;


  //lolos semua hasil cek, lalu dijalankan
  move_uploaded_file($tmp, '../img/'.$namaFileBaru);

  return $namaFileBaru;
}

function hapusProduk($Id_produk){
  global $conn;
  mysqli_query($conn,"DELETE FROM produk WHERE Id_produk = $Id_produk");
  return mysqli_affected_rows($conn);
}




function ubahProduk__($data){
  global $conn;
  $Id_produk = $data['Id_produk'];
  $Nama_produk = $data['Nama_produk'];
  $Foto_produk = $data['Foto_produk'];
  $Stok_produk = $data['Stok_produk'];
  $Deskripsi_produk = $data['Deskripsi_produk'];
  $Harga_produk = $data['Harga_produk'];

//make the insert syntax
$query = "UPDATE produk SET
        Nama_produk = '$Nama_produk',
        Foto_produk = '$Foto_produk',
        Stok_produk = $Stok_produk,
        Deskripsi_produk = '$Deskripsi_produk',
        Harga_produk = $Harga_produk
        WHERE Id_produk =$Id_produk
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}











function regristrasiPelanggan($data){
  global $conn;
  $Nama_pelanggan = strtolower(stripslashes($data['Nama_pelanggan'])); 
  $Alamat_pelanggan = $data['Alamat_pelanggan']; 
  $password = $data['password']; 
  $password2 = $data['password2']; 

  //cek username udah ada atau belum
  $result =mysqli_query($conn,"SELECT Nama_pelanggan FROM pelanggan WHERE Nama_pelanggan = '$Nama_pelanggan';");
  if(mysqli_fetch_assoc($result)){
  echo "<script>
  alert('user sudah ada');
  </script>";
  return false;
}

  //cek  konfirmasi password
  if($password != $password2){
    echo "<script>
        alert('konfirmasi password tidak sesuai');
          </script>";
          return false;
  }

  //enkripsi passrod
  // $password = password_hash($password, PASSWORD_DEFAULT);

  //tambah user baru ke database
  mysqli_query($conn,"INSERT INTO pelanggan VALUES('','$password','$Nama_pelanggan','', '$Alamat_pelanggan')");
  return mysqli_affected_rows($conn);
}




function tambahPesanan($data) {
  global $conn;
  $Id_pelanggan = $data['Id_pelanggan'];
  $Id_produk = $data['Id_produk'];
  $Alamat_pesanan = $data['Alamat_pesanan'];
  $Total_pesanan = $data['Total_pesanan'];
  $Tgl_pesanan = $data['Tgl_pesanan'];

  //upload gambar
  // $Foto_produk = upload();
  // if(!$Foto_produk){
  //   return false;
  // }

//make the insert syntax
global $conn;
$result = mysqli_query($conn, 
    "SELECT AUTO_INCREMENT
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = 'goodang_thrifting' AND TABLE_NAME = 'pesanan';"
);
$row = mysqli_fetch_assoc($result);
$id = $row["AUTO_INCREMENT"];
$query = "INSERT INTO pesanan VALUES 
          ('$id','$Id_pelanggan','$Id_produk','$Alamat_pesanan',' $Total_pesanan','$Tgl_pesanan')";

mysqli_query($conn,$query);
if (mysqli_affected_rows($conn)) {
  return $id;
} else {
  return 0;
}
}


function detail_query($query){
  global $conn;
  $result =mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);

  return $data;
}


function konfirmasiPesanan($Id_pesanan){
  global $conn;
  mysqli_query($conn,"DELETE FROM pesanan WHERE Id_pesanan = $Id_pesanan");
  return mysqli_affected_rows($conn);
}





//Punyanya isu

function ubahJenis($data){
  global $conn;
  $id_jenis = $data['id_jenis'];
  $jenis = $data['jenis'];


//make the insert syntax
$query = "UPDATE tb_jenis SET
        Jenis = '$jenis'
        WHERE id_jenis = $id_jenis
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function hapusjenis($Id_jenis){
  global $conn;
  mysqli_query($conn,"DELETE FROM tb_jenis WHERE Id_jenis = $Id_jenis");
  return mysqli_affected_rows($conn);
}


function tambahJenis($data) {
  global $conn;
  $jenis = $data['jenis'];

//make the insert syntax
$query = "INSERT INTO tb_jenis VALUES 
          ('','$jenis')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}



function tambahTeam($data) {
  global $conn;
  $nama_team = $data['nama_team'];
  $keterangan_team = $data['keterangan_team'];
  $id_jenis = $data['id_jenis'];
  $id_pemain = $data['id_pemain'];


  //upload gambar
  $gambar = uploadGambar();
  if(!$gambar){
    return false;
  }

//make the insert syntax
$query = "INSERT INTO tb_team VALUES 
          ('','$nama_team','$keterangan_team','$gambar',' $id_jenis','$id_pemain')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function uploadGambar(){
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile =  $_FILES['gambar']['size'];
  $error =  $_FILES['gambar']['error'];  
  $tmp =  $_FILES['gambar']['tmp_name'];  

  //cek apakah user sudah menambah gambar

  if($error ===4){
    echo "<script>
        alert ('Silahkan pilih gambar');
          </script>";
          return false;
  }

  //cek apakah yang diupload adalah gambar
  $ekstensiGambarValid =['jpg','jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile); 
  $ekstensiGambar = strtolower(end($ekstensiGambar)); 
  if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo "<script>
        alert ('format gambar salah!');
          </script>";
          return false;
  }

  //cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000){
    echo "<script>
        alert ('Ukuran terlalu besar');
          </script>";
  }

  //generate nama file random
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;


  //lolos semua hasil cek, lalu dijalankan
  move_uploaded_file($tmp, '../img/'.$namaFileBaru);

  return $namaFileBaru;
}




function ubahTeam($data){
  global $conn;
  $id_team = $data['id_team'];
  $gambarLama = $data['gambarLama'];
  $id_jenis = $data['id_jenis'];
  $id_pemain = $data['id_pemain'];
  $nama_team = $data['nama_team'];
  $keterangan_team = $data['keterangan_team'];


  //check whether user pick a new image or not
  if($_FILES['gambar']['error']===4){
    $gambar = $gambarLama;
  }else{
    $gambar = uploadGambar();
  }


//make the insert syntax
$query = "UPDATE tb_team SET
        nama = '$nama_team',
        keterangan = '$keterangan_team',
        gambar = '$gambar',
        id_jenis = '$id_jenis',
        id_pemain = '$id_pemain'
        WHERE id_team = $id_team
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function hapusTeam($id_team){
  global $conn;
  mysqli_query($conn,"DELETE FROM tb_team WHERE Id_team = $id_team");
  return mysqli_affected_rows($conn);
}


function tambahPemain($data) {
  global $conn;
  $nama = $data['nama'];
  $id_jenis = $data['id_jenis'];

//make the insert syntax
$query = "INSERT INTO tb_pemain VALUES 
          ('','$nama','$id_jenis')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}

function hapusPemain($id_pemain){
  global $conn;
  mysqli_query($conn,"DELETE FROM tb_pemain WHERE Id_pemain = $id_pemain");
  return mysqli_affected_rows($conn);
}


function ubahPemain($data){
  global $conn;
  $id_pemain = $data['id_pemain'];
  $nama = $data['nama'];
  $id_jenis = $data['id_jenis'];



//make the insert syntax
$query = "UPDATE tb_pemain SET
        nama = '$nama',
        id_jenis = '$id_jenis'
        WHERE id_pemain = $id_pemain
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}



function regristrasiAdmin($data){
  global $conn;
  $username = strtolower(stripslashes($data['username'])); 
  $password = $data['password']; 
  $password2 = $data['password2']; 

  //cek username udah ada atau belum
  $result =mysqli_query($conn,"SELECT username FROM user WHERE username = '$username';");
  if(mysqli_fetch_assoc($result)){
  echo "<script>
  alert('user sudah ada');
  </script>";
  return false;
}

  //cek  konfirmasi password
  if($password != $password2){
    echo "<script>
        alert('konfirmasi password tidak sesuai');
          </script>";
          return false;
  }

  //enkripsi passrod
  // $password = password_hash($password, PASSWORD_DEFAULT);

  //tambah user baru ke database
  mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");
  return mysqli_affected_rows($conn);
}