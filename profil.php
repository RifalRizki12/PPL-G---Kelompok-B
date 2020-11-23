<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="beranda.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM workers WHERE worker_id = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda.php">AI.Jobs</a></h1>
            <ul>
                <li><a href="beranda_pemilik.php">Beranda</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="lowongan.php">Lowongan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d -> worker_name ?>" required>
                    <input type="text" name="username" placeholder="Username" class="input-control" value="<?php echo $d -> worker_username ?>" required>
                    <input type="text" name="category" placeholder="Category" class="input-control" value="<?php echo $d -> worker_category ?>" required>
                    <input type="text" name="email" placeholder="E-mail" class="input-control" value="<?php echo $d -> worker_email ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])) {
                        $nama = ucwords($_POST['nama']);
                        $username = $_POST['username'];
                        $category = ucwords($_POST['category']);
                        $email = $_POST['email'];

                        $update = mysqli_query($conn, "UPDATE workers SET 
                                                worker_name = '".$nama."',
                                                worker_username = '".$username."',
                                                worker_category = '".$category."',
                                                worker_email = '".$email."'
                                                WHERE worker_id = '".$d -> worker_id."'
                                                ");
                        if($update) {
                            echo '<script>alert("Profil berhasil di ubah")</script>' ;
                            echo '<script>window.location = "profil.php"</script>' ;
                        }else {
                            echo 'gagal'.mysqli_error($conn);
                        }
                    }
                ?>
            </div>

            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php
                    if(isset($_POST['ubah_password'])) {
                        $pass1 = $_POST['pass1'];
                        $pass2 = $_POST['pass2'];

                        if ($pass2 != $pass1) {
                            echo '<script>alert("Konfirmasi Password Salah")</script>';
                        } else{
                            $update_password = mysqli_query($conn, "UPDATE workers SET
                                                worker_password = '".$pass1."'
                                                WHERE worker_id = '".$d -> worker_id."'
                                                ");
                            if($update_password) {
                                echo '<script>alert("Password berhasil di ubah")</script>' ;
                                echo '<script>window.location = "profil.php"</script>' ;
                            }else {
                                echo 'gagal'.mysqli_error($conn);
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2020 - AI.Jobs</small>
        </div>
    </footer>
</body>
</html>