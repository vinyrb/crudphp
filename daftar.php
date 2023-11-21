<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>


   <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header text-center">
                      Register
                </div>
                <form action="" method="post">
            <div class="card-body">
                <label for="username" class="form-label">Username</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg></span>
                    <input type="text" class="form-control" id="username" name="username" require
                    placeholder="Masukkan username"aria-describedby="basic-addon3">
                </div>
                    <label for="password" class="form-label">Password</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z"/>
                    </svg></span>
                    <input type="password" class="form-control" id="password" name="password" require
                    placeholder="Masukkan password"aria-describedby="basic-addon3">
                </div> 
                <div class="row mb-3">
                  <button type="submit" class="btn btn-primary" name="btnRegister">Register</button> 
                </div>
                </form>
                
            </div>
        </div>


    

   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php
include 'koneksi.php';
if (isset($_POST['btnRegister'])) {
    $username=$_POST['username'];
    $password= password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query=mysqli_query($koneksi,"INSERT INTO user VALUES ('$username', '$password')");

    if ($query) {
      echo "
      <script>
        alert('Registrasi user Berhasil!');
        window.location.href='login.php';
      </script>
      ";
    }
}

?>