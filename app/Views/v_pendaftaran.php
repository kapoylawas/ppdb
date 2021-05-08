<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<?php if ($ta['status'] == 1) {?>
    <div class="col-sm-4">
    <img class="img-fluid pad" src="<?= base_url('logo/daftar.svg') ?>" alt="">
    </div>

<div class="col-sm-8">
<?php echo form_open('pendaftaran/simpanPendaftaran') ?>
<div class="card card-outline card-success">
       <div class="card-header">
         <h3 class="card-title">Pendaftaran</h3>
        </div>
        <div class="card-body">

        <?php $error = session()->getFlashdata('errors');
            if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>';
            echo session()->getFlashdata('pesan');
            echo '</h5></div>';
            }
        ?>

         <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                    <label>NISN</label>
                    <input type="text" value="<?= old('nisn') ?>" name="nisn" class="form-control" placeholder="NISN"> 
                    <p class="text-danger"><?= $validation->hasError('nisn') ? $validation->getError('nisn') : '' ?></p>
              </div>
            </div>
           <div class="col-sm-6">
            
              <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" value="<?= old('nama_lengkap') ?>" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                    <p class="text-danger"><?= $validation->hasError('nama_lengkap') ? $validation->getError('nama_lengkap') : '' ?></p>
              </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama Panggilan</label>
                    <input type="text" value="<?= old('nama_panggilan') ?>" name="nama_panggilan" class="form-control" placeholder="Nama Panggilan">
                    <p class="text-danger"><?= $validation->hasError('nama_panggilan') ? $validation->getError('nama_panggilan') : '' ?></p>
                </div>
            </div>

              <div class="col-sm-6">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                     <option value="">--Pilih Jenis Kelamin--</option>
                     <option value="L">Laki-Laki</option>
                     <option value="P">Perempuan</option>
                    </select>
                    <p class="text-danger"><?= $validation->hasError('jk') ? $validation->getError('jk') : '' ?></p>
                </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" value="<?= old('tempat_lahir') ?>" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                    <p class="text-danger"><?= $validation->hasError('tempat_lahir') ? $validation->getError('tempat_lahir') : '' ?></p>
              </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                   <label>Tanggal</label>
                    <select name="tanggal" class="form-control select2bs4" style="width: 100%;">
                         <option value="">--Tanggal--</option>
                           <?php
                            for ($i=1; $i <= 31; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>;
                            <?php } ?> 
                    </select>
                    <p class="text-danger"><?= $validation->hasError('tanggal') ? $validation->getError('tanggal') : '' ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Bulan</label>
                    <select name="bulan" class="form-control select2bs4" style="width: 100%;">
                         <option value="">--Bulan--</option>
                           <?php
                            for ($i=1; $i <= 12; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>;
                            <?php } ?> 
                    </select>
                      <p class="text-danger"><?= $validation->hasError('bulan') ? $validation->getError('bulan') : '' ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tahun</label>
                    <select name="tahun" class="form-control select2bs4" style="width: 100%;">
                        <option value="">--Tahun--</option>
                        <?php $now = date('Y');
                            for ($i=1990; $i <= $now ; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>;
                        <?php } ?> 
                    </select> 
                    <p class="text-danger"><?= $validation->hasError('tahun') ? $validation->getError('tahun') : '' ?></p>
                </div>
            </div>
         
            <div class="col-md-12 col-sm-12 col-12">
                  <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i>  Submit</button>
            </div>
          </div>
        </div> 
     </div>
<?php echo form_close() ?>
</div>
<?php }else { ?>
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible">
                  <h5><i class="icon fas fa-exclamation-triangle"></i><strong> Pemberitahuan!<strong> </h5>
                  Maaf Pendaftaran Sudah Di Tutup.
                  <br>
                  <br>
                    <img src="<?= base_url('logo/tutup.svg') ?>" height="400px">               
         </div>
    </div>
<?php } ?>

<?= $this->endSection() ?>