<<<<<<< HEAD
<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<!-- /.col -->
  <div class="col-md-8">  
              <!-- /.card-header -->
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" height="400px" src="<?= base_url('ppdb/ppdb6.jpg') ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" height="400px" src="<?= base_url('ppdb/ppdb2.jpg') ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" height="400px" src="<?= base_url('ppdb/ppdb3.jpg') ?>" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
   </div>
<!-- /.col -->


<?= $this->endSection() ?>
=======
<div class="row">
<div class="col-sm-12">

    <div class="text-center ">
        <h1><b>Selamat Datang</b></h1>
    </div>
</div>

<div class="col-sm-12 ">
<div class="text-center">
    <img class="img-responsive pad" src="<?= base_url('gambar/about.svg') ?>" width="800px" alt="Photo">     
</div> 
</div> 
</div>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
