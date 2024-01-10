<?php
  // session_start();
  // if(!$_SESSION['auth']) {
  //   header('Location: index.php?auth=0');
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">



  </head>
<body class="admin-body">
    <div class="container p-0">
        <div class="row">
            <div class="col-12">


            <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/UAS/admin/index.php">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link  text" aria-current="page" href="http://localhost/UAS/admin/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/UAS/admin/jenis/jenis.php">Jenis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/UAS/admin/team/team.php">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/UAS/admin/pemain/pemain.php">Pemain</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/UAS/admin/logout.php">logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/UAS/admin/team/userView.php">User</a>
        </li>
    </div>
  </div>
</nav>