<?php 
    session_start();
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="beranda.php"</script>';
    }
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI.Jobs || Pemilik Usaha</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <div class="bgcolor"></div>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda_pemilik.php">AI.Jobs || PEMILIK USAHA</a></h1>
            <ul>
                <li><a href="beranda_pemilik.php">Beranda</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="lowongan.php">Lowongan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>


    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="detail_lowongan.php">
                <input type="text" name="search" placeholder="Cari Pekerja">
                <input type="submit" name="cari" value="Cari Pekerja">
            </form>
        </div>
    </div>

    <!-- lowongan baru -->
    <div class="section">
        <div class="container">
            <h3>Pekerja Baru</h3>
            <div class="box">
                <?php
                    $lowongan = mysqli_query($conn, "SELECT * FROM users WHERE user_ver = 1 ORDER BY id ");
                    if(mysqli_num_rows($lowongan) > 0){
                        while($p = mysqli_fetch_array($lowongan)){
                ?>
                    <a href="detail_lowongan.php?id=<?php echo $p['id'] ?>">
                        <div class="col-4">
                            <img src="user_img/<?php echo $p['picture'] ?>" alt="">
                            <p class="nama"><?php echo $p['name'] ?></p>
                            <p class="harga"><?php echo $p['category'] ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                    <p>Pencari Kerja Kosong</p>
                <?php } ?>
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