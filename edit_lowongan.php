<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    $lowongan = mysqli_query($conn, "SELECT * FROM jobs WHERE job_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($lowongan);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lowongan</title>
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
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="lowongan.php">Lowongan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Lowongan</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select name="kategori" class="input-control" required>
                        <option value="" >-- Kategori --</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM category ORDER BY category_id DESC ");
                            while($r = mysqli_fetch_array($kategori)) {
                        ?>
                        <option value="<?php echo $r['category_id']?>" <?php echo($r['category_id'] == $p->category_id)? 'selected':'' ?>> <?php echo $r['category_name'] ?></option>
                            <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Lowongan" value="<?php echo $p->job_name ?>" required>
                    <textarea name="deskripsi" class="input-control" rows="10" placeholder="Deskripsi"><?php echo $p->job_desc ?></textarea>
                    
                    <img src="job_img/<?php echo $p->job_image ?>" width="300px">
                    <input type="hidden" name="foto" value="<?php echo $p->job_image ?>">
                    <input type="file" name="gambar" class="input-control">
                    <input type="text" name="req" class="input-control" placeholder="Requirement" value="<?php echo $p->job_req ?>" required>
                    <input type="text" name="gaji" class="input-control" placeholder="Gaji" value="<?php echo $p->job_salary ?>" required>
                    <select name="status" class="input-control" >
                        <option value="">-- status --</option>
                        <option value="1" <?php echo($p->job_status == 1)? 'selected':''; ?> >Aktif</option>
                        <option value="0" <?php echo($p->job_status == 0)? 'selected':''; ?> >Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Simpan Perubahan" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])) {

                        //data input dari form
                        $kategori = $_POST['kategori'];
                        $nama = $_POST['nama'];
                        $deskripsi = $_POST['deskripsi'];
                        $req = $_POST['req'];
                        $gaji = $_POST['gaji'];
                        $status = $_POST['status'];
                        $foto = $_POST['foto'];

                        //data gambar yg baru
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        //menampung format file yg diizinkan
                        $tipe_diizinkan = array('jpg','JPG', 'jpeg', 'png');

                        //jika ganti gambar
                        if($filename != '') {
                            $type1 = explode('.', $filename);
                            $type2 = $type1[1];

                            $newname = 'lowongan'.time().'.'.$type2;


                            if(!in_array($type2, $tipe_diizinkan)) {
                                echo '<script>alert("Format file harus jpg, jpeg, atau png")</script>';
                            }else {
                                unlink('./job_img/'.$foto);
                                move_uploaded_file($tmp_name, './job_img/'.$newname);
                                $namagambar = $newname;
                            }
                        }else {
                            //jika tidak ganti gambar
                            $namagambar = $foto;

                        }
                        //query update
                        $update = mysqli_query($conn, "UPDATE jobs SET
                                                category_id = '".$kategori."',
                                                job_name = '".$nama."', 
                                                job_desc = '".$deskripsi."',
                                                job_req = '".$req."',
                                                job_salary = '".$gaji."',
                                                job_status = '".$status."',
                                                job_image = '".$namagambar."'
                                                WHERE job_id = '".$p->job_id."'
                                                ");
                        if($update) {
                            echo '<script>alert("Lowongan berhasil dibuat")</script>';
                            echo '<script>window.location="lowongan.php"</script>';
                        } else {
                            echo 'gagal'.mysqli_error($conn);
                        }
                        
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