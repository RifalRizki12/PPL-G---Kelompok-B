<?php 
    session_start();
    if($_SESSION['status_login_user'] != true) {
        echo '<script>window.location="beranda.php"</script>';
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
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda_user.php">AI.Jobs</a></h1>
            <ul>
                <li><a href="beranda_user.php">Beranda</a></li>
                <li><a href="profil_user.php">Profil</a></li>
                <li><a href="upload.php">Upload</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Beranda User</h3>
            <div class="box">
                <h4>Welcome <?php echo $_SESSION['user_global']->name ?> to AI.Jobs</h4>
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