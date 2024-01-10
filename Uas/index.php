<?php

// session_start();


// if (isset($_SESSION['login'])){
//     header("Location: admin/index.php");
//     exit;
// }

include_once "admin/functions/functions.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

   $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username';");

   //cek username
   if(mysqli_num_rows($result)===1){

    //cek password
    $row = mysqli_fetch_assoc($result);
   if($password == $row['password']){


    // $_SESSION['is_auth'] = true;
    header("Location: admin/index.php");
    exit;
   }
   }


   $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    
    
    <div class="container mt-5">
   
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-center">
                        Login
                    </div>

                    <div class="card-body">
                    <?php if(isset($error)): ?>
                <p style="color : red">Username / Password salah</p>
                <?php endif; ?>
                         <form action="" method="post">
                            <div class="mb-3">
                                <input type="text" name="username" placeholder="username" class="form-control">
                            </div>

                            <div class="mb-3">
                                <input type="password" name="password" placeholder="password" class="form-control">
                            </div> 

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="login" name="login">Login</button>
                                </div>

                                <div>
                                <a href="admin/registrasi.php">Klik untuk buat akun</a>
                                </div>
                         </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>