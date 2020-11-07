<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="worker_email" placeholder="Email" class="input-control">
            <input type="password" name="worker_password" placeholder="Password" class="input-control">
            <input type="submit" name="submit" placeholder="Login" class="btn">
        </form>
        <?php
            if(isset($_POST['submit'])) {
                session_start();
                include 'koneksi.php';

                $email =  $_POST['worker_email'];
                $password =  $_POST['worker_password'];

                $cek = mysqli_query($conn, "SELECT * FROM workers WHERE worker_email = '$email' AND worker_password = '$password'");
                $cekuser = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
                if(mysqli_num_rows($cek) > 0) {
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['worker_global'] = $d;
                    $_SESSION['id'] = $d -> worker_id;
                    echo '<script>window.location="beranda.php"</script>';
                }else if(mysqli_num_rows($cekuser) > 0) {
                    $d = mysqli_fetch_object($cekuser);
                    $_SESSION['status_login_user'] = true;
                    $_SESSION['user_global'] = $d;
                    $_SESSION['id_user'] = $d -> id;
                    echo '<script>window.location="beranda_user.php"</script>';
                } else {
                    echo '<script>alert("Email atau Password Anda Salah")</script>';
                }
            }
        ?>
    </div>
</body>
</html>