<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login_admin'] != true) {
        echo '<script>window.location="beranda.php"</script>';
    }

    $kategori = mysqli_query($conn, "SELECT * FROM category WHERE category_id = '".$_GET['id'] ."' ");
    if(mysqli_num_rows($kategori) == 0) {
        echo '<script>window.location="kategori.php"</script>';
    }
    $k = mysqli_fetch_object($kategori);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI.Jobs || Edit Kategori</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda_admin.php">AI.Jobs</a></h1>
            <ul>
                <li><a href="beranda_admin.php">Beranda</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Usaha" class="input-control" value="<?php echo $k -> category_name ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])) {
                        $nama = ucwords($_POST['nama']);

                        $update = mysqli_query($conn, "UPDATE category SET 
                        category_name = '".$nama."'
                        WHERE category_id = '".$k -> category_id."'
                        ");

                        if($update) {
                            echo '<script>alert("Berhasil Edit Kategori") </script>';
                            echo '<script>window.location="kategori.php" </script>';
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