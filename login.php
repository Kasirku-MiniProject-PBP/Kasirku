<?php
session_start();
require_once('db_login.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($password == '' || $username == '') {
        $error = '<div class="alert alert-danger">Masukkan Username dan Password!</div>';
    } else {
        $query = " SELECT * FROM user WHERE nama_user='" . $username . "' AND password='" . $password . "' ";

        $result = mysqli_query($con, $query);
        if (!$result) {
            die("Could not query the database <br />" . mysqli_error($con));
        } else {
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['username'] = $username;
                header('Location: view_dashboard.php');
                exit;
            } else {
                $error = '<div class="alert alert-danger">Username atau Password yang dimasukkan salah</div>';
            }
        }
        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            background: #f8f9fa;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h3 class="card-title text-center mb-5 fw-bold">LOGIN</h3>
                        <form method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
                                <label for="floatingInput" class="opacity-75">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword" class="opacity-75">Password</label>
                            </div>
                            <div class="error p-2">
                                <?php if (isset($error)) echo $error ?>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-login fw-normal" name="submit" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>