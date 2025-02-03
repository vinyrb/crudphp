<?php

    include "koneksi.php";


    if (isset($_POST['bsimpan']))  {

        $simpan = mysqli_query($koneksi,"INSERT INTO task(task, date)
                                VALUES  ('$_POST[task]',
                                         '$_POST[date]')");
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

    if (isset($_POST['bubah']))  {
        $ubah = mysqli_query($koneksi,"UPDATE task SET
                                                        status ='is]',
                                                        nama = '$_POST[tnama]',
                                                        kelas = '$_POST[tkelas]'
                                                    WHERE id_siswa = '$_POST[id_siswa]'   
                                                        ");
        if($ubah){
            echo "<script>
                    alert('Ubah data Sukses!');
                    document.location='index.php';
                   </script>";
        }else{
            echo "<script>
                    alert('Ubah data Gagal!');
                    document.location='index.php';
                   </script>";
                }
    }


    if (isset($_POST['bhapus']))  {

        $hapus = mysqli_query($koneksi,"DELETE FROM task WHERE id = '$_POST[id]' ");  
       
       
        if($hapus) {
            echo "<script>
                    alert('Hapus data Sukses!');
                    document.location='index.php';
                   </script>";
        }else {
            echo "<script>
                    alert('Hapus data Gagal!');
                    document.location='index.php';
                   </script>";
                }
    }
?>    