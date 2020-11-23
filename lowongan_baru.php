<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="beranda.php"</script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Baru</title>
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
            <h3>Tambah Lowongan Baru</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select name="kategori" class="input-control" required>
                        <option value="" >-- Kategori --</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM category ORDER BY category_id DESC ");
                            while($r = mysqli_fetch_array($kategori)) {
                        ?>
                        <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name'] ?></option>
                            <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Lowongan" required>
                    <textarea name="deskripsi" class="input-control" rows="10" placeholder="Deskripsi"></textarea>
                    <input type="file" name="gambar" class="input-control" required>
                    <input type="text" name="req" class="input-control" placeholder="Requirement" required>
                    <input type="text" name="gaji" class="input-control" placeholder="Gaji" required>
                    <select name="status" class="input-control" >
                        <option value="">-- status --</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Buat Lowongan" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])) {
                        //print_r($_FILES['gambar']);
                        //menampung input form
                        $kategori = $_POST['kategori'];
                        $nama = $_POST['nama'];
                        $deskripsi = $_POST['deskripsi'];
                        $req = $_POST['req'];
                        $gaji = $_POST['gaji'];
                        $status = $_POST['status'];

                        //menampung data file upload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'lowongan'.time().'.'.$type2;
                        
                        //menampung format file yg diizinkan
                        $tipe_diizinkan = array('jpg','JPG', 'jpeg', 'png');

                        //validasi format file
                        if(!in_array($type2, $tipe_diizinkan)) {
                            echo '<script>alert("Format file harus jpg, jpeg, atau png")</script>';
                        }else {
                            move_uploaded_file($tmp_name, './job_img/'.$newname);

                            $insert = mysqli_query($conn, "INSERT INTO jobs VALUES (
                                                            null,
                                                            '".$kategori."',
                                                            '".$nama."',
                                                            '".$deskripsi."',
                                                            '".$newname."',
                                                            '".$req."',
                                                            '".$gaji."',
                                                            '".$status."',
                                                            '".$_SESSION['id']."',
                                                            null
                                                            ) ");
                            if($insert) {
                                echo '<script>alert("Lowongan berhasil dibuat")</script>';
                                echo '<script>window.location="lowongan.php"</script>';
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
</body>
</html>