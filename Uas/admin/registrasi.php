<?php

include_once "functions/functions.php";

if(isset($_POST['register'])){

    if (regristrasiAdmin($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
                document.location.href = '../index.php';
              </script>";
           
    } else {
        echo "<script>
                alert('user gagal ditambahkan');
              </script>";
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

            <div class="container mt-5">

            
                    <div class="card-header text-center">
                        Registrasi
                    </div>

                    <div class="card-body">
                    <form action="" method="post">

                             <div class="mb-3">
                                <input type="text" name="username" placeholder="username" class="form-control">
                            </div>

                            <div class="mb-3">
                                <input type="password" name="password" placeholder="password" class="form-control">
                            </div> 

                            <div class="mb-3">
                                <input type="password" name="password2" placeholder="Confirm Password" class="form-control">
                            </div> 

                            <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="login" name="register">Register</button>
                                </div>

                                <div>
                                <a href="../index.php">Sudah punya akun?</a>
                                </div>
                    </div>
                    </form>
</div>
        

 



</body>
</html>
