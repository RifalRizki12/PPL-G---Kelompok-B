<?php
    include 'koneksi.php';

    if(isset($_GET['idk'])) {
        $delete = mysqli_query($conn, "DELETE FROM category WHERE category_id = '".$_GET['idk']."' ");
        echo '<script>window.location="kategori.php"</script>';
    }

    if(isset($_GET['idpk'])) {
        $picture = mysqli_query($conn, "SELECT picture FROM users WHERE id = '".$_GET['idpk']."' ");
        $p = mysqli_fetch_object($picture);

        $resume = mysqli_query($conn, "SELECT resume FROM users WHERE id = '".$_GET['idpk']."' ");
        $r = mysqli_fetch_object($resume);

        unlink('./user_img/'.$p->picture);
        unlink('./user_img/'.$r->resume);
        $delete = mysqli_query($conn, "DELETE FROM users WHERE id = '".$_GET['idpk']."' ");
        echo '<script>window.location="verifikasi_user.php"</script>';
    }

    if(isset($_GET['idpu'])) {
        $picture = mysqli_query($conn, "SELECT owner_resume FROM owners WHERE owner_id = '".$_GET['idpu']."' ");
        $p = mysqli_fetch_object($picture);

        unlink('./user_img/'.$p->picture);
        $delete = mysqli_query($conn, "DELETE FROM users WHERE id = '".$_GET['idpk']."' ");
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