<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
<?php 
if (session()->getFlashdata('pesan')) {
      echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i>';
      echo session()->getFlashdata('pesan');
      echo '</h5></div>';
    }
?>
</div>

<div class="col-sm-4">
    <div class="card card-outline card-primary">
       <div class="card-header">
         <h3 class="card-title">Setting</h3>
        </div>
        <div class="card-body">
        <?php echo form_open_multipart('admin/saveSetting') ?>
            <div class="text-center">
             <img id="gambar_load" class="img-fluit pad" src="<?= base_url('logo/'. $setting['logo']) ?>" width="80px" height="80px">
            </div>
            <div class="form-group">
                <label>Ganti Logo</label>
                <input id="preview_gambar" name="logo" type="file" class="form-control" accept="image/*">
            </div>
        </div> 
     </div>
</div>

<div class="col-sm-8">
    <div class="card card-outline card-primary">
       <div class="card-header">
         <h3 class="card-title">Data Sekolah</h3>
        </div>
            
        <div class="card-body">
         
                <div class="row">
                 <di class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input name="nama_sekolah" value="<?= $setting['nama_sekolah'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" value="<?= $setting['email'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Web</label>
                        <input name="web" value="<?= $setting['web'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input name="no_telpon" value="<?= $setting['no_telpon'] ?>" class="form-control">
                    </div>
                 </di>
                 <di class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input name="kecamatan" value="<?= $setting['kecamatan'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kabupaten</label>
                        <input name="kabupaten" value="<?= $setting['kabupaten'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input name="provinsi" value="<?= $setting['provinsi'] ?>" class="form-control">
                    </div>
                 </di>
                </div>
        </div> 
     </div>
</div>

<div class="col-sm-12">
    <div class="card card-outline card-primary">
       <div class="card-header">
         <h3 class="card-title">Deskripsi Sekolah</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <textarea name="deskripsi" rows="5" class="form-control"><?= $setting['deskripsi'] ?></textarea>
            </div>
        </div> 
         <div class="card-body">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </div> 
     </div>
</div>
<?php form_close() ?>
<?= $this->endSection() ?>