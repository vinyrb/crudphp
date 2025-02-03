<?php
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UKK To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="mt-3">   
            <h3 class="text-center">To do List</h3>
        </div> 
        <div class="card mt-3">
        <div class="card-header bg-primary text-white">
                What to do?
       </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Add Task
            </button>
            
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>

                <?php
                $no = 1;
                $tampil = mysqli_query($koneksi,"SELECT * from task ORDER BY id DESC");
                while($data = mysqli_fetch_array($tampil)) :
                
                ?>
                

                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <span class="<?= $data['status'] == 1 ? 'completed-task' : '' ?>">
                                <?= $data['task'] ?>
                        </span>
                    </td>
                    <td><?= $data['status'] ?></td>
                    <td><?= $data['date'] ?></td>
                    <td>
                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Finished</a>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Delete</a>
                    </td>
                </tr>

                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Confirm Delete task</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form method="POST" action="aksi_crud.php">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    
                    <div class="modal-body">
                    

                        <h5 class="text-center"> Apakah anda yakin akan menghapus data ini? <br>
                            <span class="text-danger"><?= $data['task'] ?></span>
                        </h5>
                            
                            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="bhapus">Ya,Hapus</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
<?php endwhile; 
                
                ?>
            </table>
            <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add To do List</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="aksi_crud.php">
                    
                        <div class="mb-3">
                            <label for=exampleFormControlInput1 class="form-label">Task</label>
                            <input type="text" class="form-control" name="task" placeholder="Add your task"
                        </div>
                        <div class="mb-3">
                            <label for=exampleFormControlInput1 class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" placeholder="Masukkan Kelas Anda"       
                        </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="bsimpan">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Exit</button>
            </div>
             </form>         
                    </div>
                 </div>
             </div>
         </div>
     </div>
 </div>        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>