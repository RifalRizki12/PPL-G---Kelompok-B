<?php
    include 'koneksi.php';

    if(isset($_GET['idpk'])) {
        $update = mysqli_query($conn, "UPDATE users SET user_ver = 1 WHERE id = '".$_GET['idpk']."' ");
        echo "Pencari kerja berhasil Diverifikasi";
        echo '<script>window.location="verifikasi_user.php"</script>';
    }

    if(isset($_GET['idpu'])) {
        $update = mysqli_query($conn, "UPDATE owners SET owner_ver = 1 WHERE owner_id = '".$_GET['idpu']."' ");
        echo "Pemilik Usaha berhasil Diverifikasi";
        echo '<script>window.location="verifikasi_pemilik.php"</script>';
    }

    if(isset($_GET['idp'])) {
        $lowongan = mysqli_query($conn, "SELECT job_image FROM jobs WHERE job_id = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($lowongan);

        unlink('./job_img/'.$p->job_image);

        $delete = mysqli_query($conn, "DELETE FROM jobs WHERE job_id = '".$_GET['idp']."' ");

        mysqli_query($conn,"SELECT * FROM jobs ORDER BY job_id");
        mysqli_query($conn,"ALTER TABLE jobs ORDER BY job_id");
        mysqli_query($conn,"SET @count:=0");
        mysqli_query($conn,"UPDATE jobs SET job_id=@count:=@count+1");
        mysqli_query($conn,"ALTER TABLE jobs AUTO_INCREMENT=1");
        echo '<script>window.location="lowongan.php"</script>';
    }

?>