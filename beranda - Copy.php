

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI.Jobs</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <div class="bgcolor"></div>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda.php">AI.Jobs</a></h1>
            <ul>
                <li><button onclick="document.getElementById('login').style.display='block'">Login</button></li>
                <li><button onclick="document.getElementById('register').style.display='block'">Register</button></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <div class="tulis">
                <table>
                <tr>
                <td><img src="img/job.png" width="400px"></td>
                <td><h4>Welcome to AI.Jobs<br>Bergabunglah Bersama Kami</h4></td>
                </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2020 - AI.Jobs</small>
        </div>
    </footer>

    <div id="login" class="popup">
		<div id="klik" class="bgbox">
			<div class="img">
				<span onclick="document.getElementById('login').style.display='none'" class="close" title="Close PopUp">&times;</span>
			</div>
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

                        $email =  mysqli_real_escape_string($conn, $_POST['worker_email'] );
                        $password =  mysqli_real_escape_string($conn, $_POST['worker_password'] );

                        $cek = mysqli_query($conn, "SELECT * FROM workers WHERE worker_email = '$email' AND worker_password = '$password'");
                        $cekuser = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
                        if(mysqli_num_rows($cek) > 0) {
                            $d = mysqli_fetch_object($cek);
                            $_SESSION['status_login'] = true;
                            $_SESSION['worker_global'] = $d;
                            $_SESSION['id'] = $d -> worker_id;
                            echo '<script>window.location="beranda_pemilik.php"</script>';
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
		</div>
	</div>
    
</body>
</html>