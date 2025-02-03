<?php
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
  ?>  