<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<!-- /.col -->
  <div class="col-sm-8">  
              <!-- /.card-header -->
              
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  
                  <ol class="carousel-indicators">
                  <?php $no_a = 1; foreach ($banner as $key => $value) { 
                     $a = $no_a;  
                  ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $no_a++ ?>" class="<?= ($a == 1) ? 'active' : '' ?>"></li>
                  <?php } ?>
                    
                  </ol>
                  <div class="carousel-inner">

                  <?php $no_b = 1; foreach ($banner as $key => $value) { 
                    $b = $no_b; ?>
                    <div class="carousel-item <?= ($b == 1) ? 'active' : '' ?>">
                      <img class="d-block w-100" height="350px" src="<?= base_url('ppdb_banner/' . $value['banner']) ?>" alt="<?= $no_b++ ?>">
                    </div>
                  <?php } ?>

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
            <!-- /.card -->
   </div>
<!-- /.col -->



<div class="col-md-4">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">Estimasi Pendaftaran</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-blue"></i>
                <div class="timeline-item">
                  <!-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> -->
                  <h3 class="timeline-header"><a href="#">Jumlah Pendaftar :</a> 0 </h3>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <!-- <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span> -->
                  <h3 class="timeline-header no-border"><a href="#">Jumlah Laki-laki :</a> 0 </h3>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-yellow"></i>
                <div class="timeline-item">
                  <!-- <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span> -->
                  <h3 class="timeline-header"><a href="#">Jumlah Perempuan :</a> 0 </h3>
                  
                  <!-- <div class="timeline-footer">
                    <a class="btn btn-warning btn-sm">View comment</a>
                  </div> -->
                </div>
              </div>
              <div>
                <i class="fas fa-file-alt bg-dark"></i>
                <div class="timeline-item">
                  <!-- <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span> -->
                  <!-- <h3 class="timeline-header"><a href="#"></a> </h3> -->
                  <div class="timeline-footer">
                    <a href="<?= base_url('pendaftaran') ?>" class="btn btn-primary btn-sm-3">Mendaftar</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<?= $this->endSection() ?>