<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<div class="col-sm-9">

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Setting Tahun Ajaran</h3>

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
      <table class="table table-sm">
        <thead>
            <tr>
              <th width="70px">No</th>
              <th>Tahun</th>
              <th>Tahun Ajaran</th>
              <th>Status</th>
              <th class="text-center">Aktif-Nonaktif</th>
              <th class="text-center" width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($tahun_ajaran as $key => $value) { ?>
              <tr>
               <td><?= $no++ ?></td>
               <td><?= $value['tahun'] ?></td>
               <td><?= $value['ta'] ?></td>
               <td>
                <?= ($value['status'] == 1) ? '<small class="badge badge-success"><i class="far fa-clock"></i> Aktif</small>' : '<small class="badge badge-danger"><i class="far fa-clock"></i> Non Aktif</small>' ?>
               </td>
               <td class="text-center">
                    <?php if ($value['status'] == 1) { ?>
                        <a href="<?= base_url('tahun_ajaran/statusNonaktif/'.$value['id_ta']) ?>" class="btn btn-danger btn-xs">Nonaktifkan</a>
                    <?php }else { ?>
                        <a href="<?= base_url('tahun_ajaran/statusAktif/'.$value['id_ta']) ?>" class="btn btn-success btn-xs">Aktifkan</a>
                    <?php } ?>
               </td>
               <td>
                    <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_ta'] ?>"><i class="fas fa-trash"></i></button>
                    <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_ta'] ?>"><i class="fas fa-edit"></i></button>
               </td>
              </tr>
          <?php } ?> 
        </tbody>
    </table>
 </div>
</div>
</div>  

<!-- modal tambah -->
<div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Tahun Ajaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <?php echo form_open('Tahun_ajaran/insertData') ?>
            <div class="modal-body">
               <div class="form-group">
                    <label>Tahun</label>
                    <select class="form-control select2bs4" style="width: 100%;">
                        <?php $now = date('Y');
                            for ($i=2018; $i <= $now ; $i++) { ?>
                                <option selected="selected" value="<?= $i ?>" <?= ($now == $i) ? 'selected': '' ?>><?= $i ?></option>;
                            <?php } ?> 
                    </select>
                 </div>
               <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="ta" class="form-control" placeholder="Tahun Ajaran" required>
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
<?php foreach ($tahun_ajaran as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_ta'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tahun Ajaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <?php echo form_open('tahun_ajaran/editData/'. $value['id_ta']) ?>
            <div class="modal-body">
            <div class="form-group">
                    <label>Tahun</label>
                    <select class="form-control select2bs4" style="width: 100%;">
                        <?php $now = date('Y');
                            for ($i=2018; $i <= $now ; $i++) { ?>
                                <option value="<?= $i ?>" <?= ($i == $value['tahun']) ? 'selected': '' ?>><?= $i ?></option>;
                            <?php } ?> 
                    </select>
                 </div>

               <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="ta" value="<?= $value['ta'] ?>" class="form-control" placeholder="Tahun Ajaran" required>
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
<?php foreach ($tahun_ajaran as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_ta'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
               Apakah Anda Ingin Menghapus Data <b class="btn btn-danger btn-sm"><?= $value['ta'] ?></b>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
              <a href="<?= base_url('tahun_ajaran/deleteData/'. $value['id_ta']) ?>" class="btn btn-danger btn-sm">Delete</a>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- /.modal -->

<?= $this->endSection() ?>