<?php 
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI.Jobs || Registrasi Pemilik Usaha</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="beranda.php">AI.Jobs</a></h1>
            <ul>
                <li><button class="btn2" onclick="document.getElementById('login').style.display='block'">Login</button></li>
                <li><a href="register_user.php" class="btn2">Daftar Pencari Pekerjaan</a></li>
                <li><a href="register_pemilik.php" class="btn2">Daftar Pemilik Usaha</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Registrasi Pemilik Usaha</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" class="input-control" placeholder="Nama Lengkap" required>
                    <input type="text" name="kategori" class="input-control" placeholder="Kategori" required>
                    <h3>Foto</h3><input type="file" name="gambar" class="input-control" required>
                    <input type="text" name="email" class="input-control" placeholder="Email" required>
                    <input type="password" name="password" class="input-control" placeholder="Password" required>
                    <input type="submit" name="submit" value="Daftar" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])) {
                        //print_r($_FILES['gambar']);
                        //menampung input form
                        $nama = $_POST['nama'];
                        $kategori = $_POST['kategori'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        //menampung data file upload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'resume_pemilik'.time().'.'.$type2;
                        
                        //menampung format file yg diizinkan
                        $tipe_diizinkan = array('jpg','JPG', 'jpeg', 'png');

                        //validasi format file

                        if(!in_array($type2, $tipe_diizinkan)) {
                            echo '<script>alert("Format file harus jpg, jpeg, atau png")</script>';

                        }else {
                            move_uploaded_file($tmp_name, './owner_img/'.$newname);

                            $insert = mysqli_query($conn, "INSERT INTO owners VALUES (
                                                            null,
                                                            '".$nama."',
                                                            '".$kategori."',
                                                            '".$email."',
                                                            '".$password."',
                                                            '".$newname."',
                                                            0
                                                            ) ");
                            if($insert) {
                                echo '<script>alert("Anda Berhasil Daftar silahkan tunggu Verifikasi dari Admin")</script>';
                                echo '<script>window.location="beranda.php"</script>';
                            } else {
                                echo 'gagal'.mysqli_error($conn);
                            }
                        }

                        //proses upload file
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
    <script>
        //CKEDITOR.replace( 'deskripsi' );
    </script>
    <div id="login" class="popup">
		<div id="klik" class="bgbox">
			<div class="img">
				<span onclick="document.getElementById('login').style.display='none'" class="close" title="Close PopUp">&times;</span>
			</div>
			<div class="box-login">
                <h2>Login</h2>
                <form action="" method="POST">
                    <input type="text" name="owner_email" placeholder="Email" class="input-control">
                    <input type="password" name="owner_password" placeholder="Password" class="input-control">
                    <input type="submit" name="submit2" placeholder="Login" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit2'])) {
                        session_start();
                        include 'koneksi.php';

                        $email =  mysqli_real_escape_string($conn, $_POST['owner_email'] );
                        $password =  mysqli_real_escape_string($conn, $_POST['owner_password'] );

                        $cek = mysqli_query($conn, "SELECT * FROM owners WHERE owner_email = '$email' AND owner_password = '$password' AND owner_ver = 1");
                        $cekuser = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND user_ver = 1");
                        $cekver = mysqli_query($conn, "SELECT * FROM owners WHERE owner_email = '$email' AND owner_password = '$password' AND owner_ver = 0");
                        $cekuserver = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND user_ver = 0");
                        $cekadmin = mysqli_query($conn, "SELECT * FROM admins WHERE admin_email = '$email' AND admin_password = '$password'");
                        if(mysqli_num_rows($cek) > 0) {
                            $d = mysqli_fetch_object($cek);
                            $_SESSION['status_login'] = true;
                            $_SESSION['owner_global'] = $d;
                            $_SESSION['id'] = $d -> owner_id;
                            echo '<script>window.location="beranda_pemilik.php"</script>';
                        }else if(mysqli_num_rows($cekver) > 0) {
                            echo '<script>alert("Maaf akun anda blm diverivikasi oleh admin")</script>';
                            echo '<script>window.location="beranda.php"</script>';
                        }else if(mysqli_num_rows($cekuser) > 0) {
                            $d = mysqli_fetch_object($cekuser);
                            $_SESSION['status_login_user'] = true;
                            $_SESSION['user_global'] = $d;
                            $_SESSION['id_user'] = $d -> id;
                            echo '<script>window.location="beranda_user.php"</script>';
                        }else if(mysqli_num_rows($cekuserver) > 0) {
                            echo '<script>alert("Maaf akun anda blm diverivikasi oleh admin")</script>';
                            echo '<script>window.location="beranda.php"</script>';
                        }else if(mysqli_num_rows($cekadmin) > 0) {
                            $d = mysqli_fetch_object($cekadmin);
                            $_SESSION['status_login_admin'] = true;
                            $_SESSION['admin_global'] = $d;
                            $_SESSION['id_admin'] = $d -> admin_id;
                            echo '<script>window.location="beranda_admin.php"</script>';
                        } else {
                            echo '<script>alert("Email atau Password Anda Salah")</script>';
                        }
                    }
                ?>
            </div>
		</div>
    </div>
</body>
</html>