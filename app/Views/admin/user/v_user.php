<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tabel Master User</h3>

    <div class="card-tools">
        <div class="input-group input-group-sm" data-toggle="modal" data-target="#add" style="width: 100px;">
          <button class="btn btn-block btn-outline-primary btn-sm"><i class="fas fa-plus"></i> 
          Tambah 
          </button>
         </div>
     </div>         
  </div>

<div class="card-body p-0">
 <br>
 <?php 
    if (session()->getFlashdata('pesan')) {
      echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i>';
      echo session()->getFlashdata('pesan');
      echo '</h5></div>';
    }

    if (session()->getFlashdata('pesan_edit')) {
      echo '<div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i>';
      echo session()->getFlashdata('pesan_edit');
      echo '</h5></div>';
    }

    if (session()->getFlashdata('pesan_delete')) {
      echo '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i>';
      echo session()->getFlashdata('pesan_delete');
      echo '</h5></div>';
    }
 ?>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th width="70px">No</th>
              <th>Nama User</th>
              <th>E-mail</th>
              <th>Foto</th>
              <th class="text-center" width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($user as $key => $value) { ?>
              <tr>
               <td><?= $no++ ?></td>
               <td><?= $value['nama_user'] ?></td>
               <td><?= $value['email'] ?></td>
               <td class="text-center"><img class="img-circle img-fluid" src="<?= base_url('foto/' . $value['foto']) ?>" width="50px"></td>
               <td>
                    <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fas fa-trash"></i></button>
                    <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fas fa-edit"></i></button>
               </td>
              </tr>
          <?php } ?> 
        </tbody>
    </table>
 </div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <?php echo form_open_multipart('user/insertData') ?>
            <div class="modal-body">
               <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="nama_user" class="form-control" placeholder="Nama User" required>
                 </div>
               <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                 </div>
               <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                 </div>
               <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" placeholder="Foto" required>
                 </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
<!-- /.modal -->

<!-- modal edit -->
<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_user'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <?php echo form_open_multipart('user/editData/'. $value['id_user']) ?>
            <div class="modal-body">
               <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" value="<?= $value['nama_user'] ?>" name="nama_user" class="form-control" placeholder="Nama User" required>
                 </div>
               <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="<?= $value['email'] ?>" name="email" class="form-control" placeholder="E-mail" required>
                 </div>
               <div class="form-group">
                    <label>Password</label>
                    <input type="password" value="<?= $value['password'] ?>" name="password" class="form-control" placeholder="Password" required>
                 </div>
               <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" placeholder="Foto">
                    <br>
                    <img src="<?= base_url('foto/' . $value['foto']) ?>" width="50px">
                 </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
            <?php echo form_close() ?>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal -->

<!-- modal delete -->
<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_user'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
               Apakah Anda Ingin Menghapus Data User <b class="btn btn-danger btn-sm"><?= $value['nama_user'] ?></b>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
              <a href="<?= base_url('user/deleteData/'. $value['id_user']) ?>" class="btn btn-danger btn-sm">Delete</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal -->

<?= $this->endSection() ?>