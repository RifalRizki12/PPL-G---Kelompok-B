<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    $usaha = mysqli_query($conn, "SELECT * FROM companies WHERE company_id = '".$_GET['id'] ."' ");
    if(mysqli_num_rows($usaha) == 0) {
        echo '<script>window.location="usaha.php"</script>';
    }
    $k = mysqli_fetch_object($usaha);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI.Jobs || Edit Usaha</title>
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
                <li><a href="usaha.php">Usaha</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="upload.php">Upload</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Usaha</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Usaha" class="input-control" value="<?php echo $k -> company_name ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $k -> company_address ?>" required>
                    <input type="text" name="no_telp" placeholder="No HP/Telp" class="input-control" value="<?php echo $k -> company_phone ?>" required>
                    <input type="text" name="email" placeholder="E-mail" class="input-control" value="<?php echo $k -> company_email ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])) {
                        $nama = ucwords($_POST['nama']);
                        $alamat = ucwords($_POST['alamat']);
                        $no_telp = ucwords($_POST['no_telp']);
                        $email = ucwords($_POST['email']);

                        $update = mysqli_query($conn, "UPDATE companies SET 
                        company_name = '".$nama."',
                        company_address = '".$alamat."',
                        company_phone = '".$no_telp."',
                        company_email = '".$email."'
                        WHERE company_id = '".$k -> company_id."'
                        ");

                        if($update) {
                            echo '<script>alert("Berhasil Edit Usaha") </script>';
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