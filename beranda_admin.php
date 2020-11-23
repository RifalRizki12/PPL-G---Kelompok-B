<?php 
    session_start();
    if($_SESSION['status_login_admin'] != true) {
        echo '<script>window.location="beranda.php"</script>';
    }

    include "koneksi.php";
?>
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
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda_admin.php">AI.Jobs</a></h1>
            <ul>
                <li><a href="beranda_admin.php">Beranda</a></li>
                <li><a href="kategori.php">kategori</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="detail_lowongan.php">
                <input type="text" name="search" placeholder="Cari Lowongan">
                <input type="submit" name="cari" value="Cari Lowongan">
            </form>
        </div>
    </div>

    <!-- kategori -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM category ORDER BY category_id DESC ");
                    if(mysqli_num_rows($kategori) > 0) {
                        while($k = mysqli_fetch_array($kategori)){
                ?>
                    <a href="detail_lowongan.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-5">
                            <img src="img/category.png" width="50px" style="margin-bottom: 5px;">
                            <p><?php echo $k['category_name'] ?></p>
                        </div>
                    </a>
                <?php }}else { ?>
                    <p>Kategori Kosong</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- lowongan baru -->
    <div class="section">
        <div class="container">
            <h3>Lowongan Baru</h3>
            <div class="box">
                <?php
                    $lowongan = mysqli_query($conn, "SELECT * FROM jobs WHERE job_status = 1 ORDER BY job_id DESC LIMIT 8");
                    if(mysqli_num_rows($lowongan) > 0){
                        while($p = mysqli_fetch_array($lowongan)){
                ?>
                    <a href="detail_lowongan.php?id=<?php echo $p['job_id'] ?>">
                        <div class="col-4">
                            <img src="job_img/<?php echo $p['job_image'] ?>" alt="">
                            <p class="nama"><?php echo $p['job_name'] ?></p>
                            <p class="harga">Rp <?php echo $p['job_salary'] ?></p>
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