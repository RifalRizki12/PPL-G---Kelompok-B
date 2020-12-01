<?php
    include 'koneksi.php';

    if(isset($_GET['idl'])&&($_GET['idu'])) {
        $update = mysqli_query($conn, "UPDATE users SET job_id = '".$_GET['idl']."' WHERE id = '".$_GET['idu']."' ");
        $update2 = mysqli_query($conn, "SELECT job_user FROM jobs WHERE job_id = '".$_GET['idl']."' ");
        echo '<script>window.location="beranda_user.php"</script>';
        echo "Lamaran Berhasil dikirim";    
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

        echo '<script>window.location="lowongan.php"</script>';
    }

?>