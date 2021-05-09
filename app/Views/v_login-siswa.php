<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div class="col-sm-5">
<img class="img-fluid pad" src="<?= base_url('logo/login.svg') ?>" alt="">
</div>

<div class="col-sm-6">
<?php echo form_open('Auth/cek_login_siswa') ?>
<div class="card card-outline card-success">
     <div class="card-header text-center">
       <a class="h1"><b>Login</b> Pendaftar</a>
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
            <div class="form-group">
            <p class="text-danger text-center">**Masukkan NISN Sebagai Password**</p>
            </div>

            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NISN</label>
                    <div class="input-group col-sm-10">
                      <input type="text" name="nisn" class="form-control" placeholder="<?= $validation->hasError('nisn') ? $validation->getError('nisn') : '' ?>" >
                      
                       <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
              </div>
           
            <div class="form-group row">
                    <label type="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="input-group col-sm-10">
                    
                      <input type="password" name="password" class="form-control" placeholder="<?= $validation->hasError('nisn') ? $validation->getError('password') : '' ?>">
                       <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
              </div>
             
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"> Login</button>
                </div>
        </div> 
     </div>
<?php echo form_close() ?>
</div>
<!-- jQuery -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<script>
    window.setTimeout(function(){
      $('.alert').fadeTo(500,0).slideUp(500,function(){
        $(this).remove();
      });
    },2000);
</script>
<?= $this->endSection() ?>
