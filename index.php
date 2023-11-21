<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}


include 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUGAS SOAL 1 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="mt-3">   
            <h3 class="text-center">SOAL 1 CRUD</h3>
        </div> 
        <div class="card mt-3">
        <div class="card-header bg-primary text-white">
                Data Siswa
       </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Data
            </button>
            
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
                
                <?php
                $no = 1;
                $tampil = mysqli_query($koneksi,"SELECT * from tmhs ORDER BY id_siswa DESC");
                while($data = mysqli_fetch_array($tampil)) :
                
                ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nis'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['kelas'] ?></td>
                    <td>
                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                    </td>
                </tr>

            
            <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Siswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <form method="POST" action="aksi_crud.php">
                        <input type="hidden" name="id_siswa" value="<?= $data['id_siswa'] ?>">
                            <div class="mb-3">
                                <label for=exampleFormControlInput1 class="form-label">NIS</label>
                                <input type="text" class="form-control" name="tnis" value="<?= $data['nis']?>">
                            </div>
                            <div class="mb-3">
                                <label for=exampleFormControlInput1 class="form-label">Nama</label>
                                <input type="text" class="form-control" name="tnama" value="<?= $data['nama']?>"placeholder="Masukkan Nama anda!">
                            </div>
                            <div class="mb-3">
                                <label for=exampleFormControlInput1 class="form-label">Kelas</label>
                                <input type="text" class="form-control" name="tkelas" value="<?= $data['kelas']?>">
                            </div>
                        </form>
                    </div>    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    </div>                        
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form method="POST" action="aksi_crud.php">
                    <input type="hidden" name="id_siswa" value="<?= $data['id_siswa'] ?>">
                    
                    <div class="modal-body">
                    

                        <h5 class="text-center"> Apakah anda yakin akan menghapus data ini? <br>
                            <span class="text-danger"><?= $data['nis'] ?> - <?= $data['nama'] ?></span>
                        </h5>
                            
                            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="bhapus">Ya,Hapus</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </form>
    </div>
  </div>
</div>        

<?php endwhile; 
                
                ?>
            </table>
            <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="aksi_crud.php">
                    
                        <div class="mb-3">
                            <label for=exampleFormControlInput1 class="form-label">NIS</label>
                            <input type="text" class="form-control" name="tnis" placeholder="Masukkan NIS Anda"
                        </div>
                        <div class="mb-3">
                            <label for=exampleFormControlInput1 class="form-label">Nama</label>
                            <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Anda"
                        </div>
                        <div class="mb-3">
                            <label for=exampleFormControlInput1 class="form-label">Kelas</label>
                            <input type="text" class="form-control" name="tkelas" placeholder="Masukkan Kelas Anda"       
                        </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </form>
         
    </div>
  </div>
</div>

         </div>
    </div>
    </div>
    <a href="logout.php" class="btn btn-dark">Logout</a>                  



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>