<?php 
    session_start();
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
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
    <div class="bgcolor"></div>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda.php">AI.Jobs</a></h1>
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
            <div class="tulis">
                <table>
                <tr>
                <td><img src="img/job.png" width="400px"></td>
                <td><h4>Welcome <?php echo $_SESSION['worker_global']->worker_name ?> to AI.Jobs<br><a href="lowongan.php">Buat Lowongan Baru</a></h4></td>
                </tr>
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