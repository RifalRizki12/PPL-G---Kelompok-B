<?php
    include 'koneksi.php';

    if(isset($_GET['idk'])) {
        $delete = mysqli_query($conn, "DELETE FROM category WHERE category_id = '".$_GET['idk']."' ");

        mysqli_query($conn,"SELECT * FROM category ORDER BY category_id");
        mysqli_query($conn,"ALTER TABLE category ORDER BY category_id");
        mysqli_query($conn,"SET @count:=0");
        mysqli_query($conn,"UPDATE category SET category_id=@count:=@count+1");
        mysqli_query($conn,"ALTER TABLE category AUTO_INCREMENT=1");
        echo '<script>window.location="kategori.php"</script>';
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