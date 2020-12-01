<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login_admin'] != true) {
        echo '<script>window.location="beranda.php"</script>';
    }

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
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda_admin.php">AI.Jobs || ADMIN</a></h1>
            <ul>
                <li><a href="beranda_admin.php">Beranda</a></li>
                <li><a href="verifikasi.php">Verifikasi</a></li>
                <li><a href="kategori.php">kategori</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Daftar Pemilik Usaha</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table" style="color: #fff;">
                    <thead style="background-color: rgba(93, 163, 187, 0.7)">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Kategori</th>
                            <th>Email</th>
                            <th>Resume</th>
                            <th width="120px">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $verifikasi = mysqli_query($conn, "SELECT * FROM owners WHERE owner_ver = 1 ORDER BY owner_id DESC");
                            if(mysqli_num_rows($verifikasi) > 0) {
                            while($row = mysqli_fetch_array($verifikasi)) {
                        ?>
                        <tr>
                            <td align="center" width="40px"><?php echo $no++ ?></td>
                            <td align="center" width="150px"><?php echo $row['owner_name'] ?></td>
                            <td width="70px"><?php echo $row['owner_category'] ?></td>
                            <td align="center" width="100px"><?php echo $row['owner_email'] ?></td>
                            <td><a href="owner_img/<?php echo $row['owner_resume'] ?>" target="_blank"><img src="owner_img/<?php echo $row['owner_resume'] ?>" width="200px"></a></td>
                            <td align="center" width = "150px">
                                <a href="edit_profilpemilik.php?idpu=<?php echo $row['owner_id'] ?>" onclick="return confirm ('Verifikasi Akun ini?')">Edit</a> || <a href="hapus_usaha.php?idpu=<?php echo $row['owner_id'] ?>" onclick="return confirm ('Anda akan menghapus akun tersebut')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else { ?>
                            <tr>
                                <td colspan="9" align="center">Pencari Baru kosong</td>
                            </tr>

                        <?php } ?>
                    </tbody>
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
</body>
</html>