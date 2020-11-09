<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usaha Baru</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda.php">AI.Jobs</a></h1>
            <ul>
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="upload.php">Upload</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Usaha Baru</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Usaha" class="input-control" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" required>
                    <input type="text" name="no_telp" placeholder="No HP/Telp" class="input-control" required>
                    <input type="text" name="email" placeholder="E-mail" class="input-control" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])) {
                        $nama = ucwords($_POST['nama']);
                        $alamat = ucwords($_POST['alamat']);
                        $no_telp = ucwords($_POST['no_telp']);
                        $email = ucwords($_POST['email']);

                        $insert = mysqli_query($conn, "INSERT INTO companies (company_id, company_name, company_address, company_phone, company_email) VALUES (
                                            null,
                                            '".$nama."',
                                            '".$alamat."',
                                            '".$no_telp."',
                                            '".$email."'
                                            ) ");
                        if($insert) {
                            echo '<script>alert("Berhasil Tambah Usaha") </script>';
                            echo '<script>window.location="usaha.php" </script>';
                        } else {
                            echo 'Gagal '.mysqli_error($conn);
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