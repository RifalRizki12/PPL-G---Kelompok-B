<?php
    include 'koneksi.php';

    if(isset($_GET['idk'])) {
        $delete = mysqli_query($conn, "DELETE FROM companies WHERE company_id = '".$_GET['idk']."' ");

        mysqli_query($conn,"SELECT * FROM companies ORDER BY company_id");
        mysqli_query($conn,"ALTER TABLE companies ORDER BY company_id");
        mysqli_query($conn,"SET @count:=0");
        mysqli_query($conn,"UPDATE companies SET company_id=@count:=@count+1");
        mysqli_query($conn,"ALTER TABLE companies AUTO_INCREMENT=1");
        echo '<script>window.location="usaha.php"</script>';
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