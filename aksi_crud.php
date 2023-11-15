<?php

    include "koneksi.php";


    if (isset($_POST['bsimpan']))  {


        $simpan = mysqli_query($koneksi,"INSERT into tmhs(nis, nama, kelas)
                                VALUES ('$_POST[tnis]'
                                       ('$_POST[tnama]'
                                       ('$_POST[tkelas]')");
        if($simpan){
            echo "<script>
                    alert('Simpan data Sukses!');
                    document.location='index.php';
                   </script>";
        }else{
            echo "<script>
                    alert('Simpan data Gagal!');
                    document.location='index.php';
                   </script>";
                }
    }

?>    