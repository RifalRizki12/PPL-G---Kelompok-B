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
    <title>AI.Jobs || Kategori</title>
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
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table" style="color: #fff;">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th >Kategori</th>
                            <th width="120px">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM category ORDER BY category_id DESC");
                            if(mysqli_num_rows($kategori) > 0){
                            while($row = mysqli_fetch_array($kategori)) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                                <a href="edit_kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a href="hapus_usaha.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm ('Anda akan menghapus kategori tersebut')">Hapus</a>
                            </td>
                        </tr>
                            <?php }}else { ?>
                                <tr>
                                    <td colspan="3" align="center">Kategori Kosong</td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
                <p class="btn"><a href="kategori_baru.php">Tambah Kategori</a></p>
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