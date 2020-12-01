<?php 
    error_reporting(0);
    session_start();
    if($_SESSION['status_login_user'] != true) {
        echo '<script>window.location="beranda.php"</script>';
    }

    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI.Jobs || Cari Lowongan</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda_user.php">AI.Jobs || PENCARI KERJA</a></h1>
            <ul>
                <li><a href="beranda_user.php">Beranda</a></li>
                <li><a href="profil_user.php">Profil</a></li>
                <li><a href="upload.php">Upload</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="cari_lowongan.php">
                <input type="text" name="search" placeholder="Cari Lowongan" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Lowongan">
            </form>
        </div>
    </div>

    <!-- lowongan baru -->
    <div class="section">
        <div class="container">
            <h3>Lowongan Baru</h3>
            <div class="box">
                <?php
                    if($_GET['search']!= '' || $_GET['kat'] != ''){
                        $where = "AND job_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' OR job_salary LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' OR job_req LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                    }
                    $lowongan = mysqli_query($conn, "SELECT * FROM jobs WHERE job_status = 1 $where ORDER BY job_id DESC ");
                    if(mysqli_num_rows($lowongan) > 0){
                        while($p = mysqli_fetch_array($lowongan)){
                ?>
                    <a href="detail_lowongan.php?id=<?php echo $p['job_id'] ?>">
                        <div class="col-4">
                            <img src="job_img/<?php echo $p['job_image'] ?>" alt="">
                            <p class="nama"><?php echo substr($p['job_name'], 0, 30) ?></p>
                            <p class="harga">Rp <?php echo number_format($p['job_salary'])  ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                    <p>Lowongan Kosong</p>
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