<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>
<div class="col-sm-12">
   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Beranda</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php 
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo session()->getFlashdata('pesan');
                    echo '</h5></div>';
                    }
                ?>
              <?php echo form_open('admin/saveBeranda') ?>
                <div class="form-group">
                    <textarea name="beranda" id="summernote">
                    <?= $beranda['beranda'] ?>
                    </textarea>
                </div>
              <div class="form-group">
                <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              </div>
             <?php echo form_open() ?>
            </div>
              <!-- /.card-body -->
      </div>
</div>
<?= $this->endSection() ?>