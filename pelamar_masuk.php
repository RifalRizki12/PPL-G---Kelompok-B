<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="beranda.php"</script>';
    }
    $lowongan = mysqli_query($conn, "SELECT * FROM jobs WHERE job_id = '".$_GET['idpm']."' ");
    if(mysqli_num_rows($lowongan) == 0){
        echo '<script>window.location="lowongan.php"</script>';
    }
    $p = mysqli_fetch_object($lowongan);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI.Jobs || Pelamar Masuk</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
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
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Pelamar Masuk</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table" style="color: #fff;">
                    <thead style="background-color: rgba(93, 163, 187, 0.7)">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th>Resume</th>
                            <th>Email</th>
                            <th width="120px">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $lowongan = mysqli_query($conn, "SELECT * FROM users WHERE job_id = '".$_GET['idpm']."' AND user_ver = 1 ORDER BY id DESC");
                            

                            if(mysqli_num_rows($lowongan) > 0) {
                            while($row = mysqli_fetch_array($lowongan)) {
                        ?>
                        <tr>
                        <td align="center" width="40px"><?php echo $no++ ?></td>
                            <td width="70px"><?php echo $row['name'] ?></td>
                            <td width="300px"><?php echo $row['address'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['category'] ?></td>
                            <td><a href="user_img/<?php echo $row['picture'] ?>" target="_blank"><img src="user_img/<?php echo $row['picture'] ?>" width="200px"></a></td>
                            <td><a href="user_img/<?php echo $row['resume'] ?>" target="_blank"><img src="user_img/<?php echo $row['resume'] ?>" width="200px"></a></td>
                            <td align="center" width="100px"><?php echo $row['email'] ?></td>
                            <td align="center" width = "150px">
                            <a href="edit_lowongan.php?id=<?php echo $row['job_id'] ?>">Pelamar</a>||<a href="edit_lowongan.php?id=<?php echo $row['job_id'] ?>">Edit</a> || <a href="hapus_usaha.php?idp=<?php echo $row['job_id'] ?>" onclick="return confirm ('Anda akan menghapus lowongan tersebut')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else { ?>
                            <tr>
                                <td colspan="9" align="center">Lowongan kosong</td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <p class="btn"><a href="lowongan_baru.php">Lowongan Baru</a></p>
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