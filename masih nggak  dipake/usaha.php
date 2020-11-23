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
    <title>Usaha</title>
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
                <li><a href="lowongan.php">Lowongan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Usaha</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th width="120px">Nama Usaha</th>
                            <th>Alamat</th>
                            <th>No HP/Telp</th>
                            <th>Email</th>
                            <th width="120px">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $usaha = mysqli_query($conn, "SELECT * FROM companies ORDER BY company_id DESC");
                            while($row = mysqli_fetch_array($usaha)) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td><?php echo $row['company_name'] ?></td>
                            <td><?php echo $row['company_address'] ?></td>
                            <td><?php echo $row['company_phone'] ?></td>
                            <td><?php echo $row['company_email'] ?></td>
                            <td>
                                <a href="edit_usaha.php?id=<?php echo $row['company_id'] ?>">Edit</a> || <a href="hapus_usaha.php?idk=<?php echo $row['company_id'] ?>" onclick="return confirm ('Anda akan menghapus usaha tersebut')">Hapus</a>
                            </td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
                <p class="btn"><a href="usaha_baru.php">Usaha Baru</a></p>
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