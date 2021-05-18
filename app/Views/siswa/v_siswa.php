<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
   <br>
   <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Biodata Siswa</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="row">
                     <div class="col-sm-3">
                            <br>
                         <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Foto Siswa</h3>
                                    <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                        <div class="text-center">
                                            <img class="img-fluid pad" src="<?= base_url('foto/logo.png') ?>" alt="User profile picture" width="150px"> 
                                        </div>
                                        <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>No Ijazah</b> <a class="float-right">212121543</a>
                                                </li>
                                        </ul>
                                    <a href="" class="btn btn-sm btn-primary btn-block"><i class="fas fa-pencil"></i> Ganti Foto</a>
                                </div>
                                <!-- /.card-body -->
                         </div>
                     </div>

                      <div class="col-sm-9">
                            <br>
                         <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Identitas Peserta Didik</h3>
                                    <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <strong><i class="fas fa-book mr-1"></i> Nama Lengkap</strong>
                                            <p class="text-muted">
                                            B.S. in Computer
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</strong>
                                            <p class="text-muted">Malibu, California</p>
                                            <hr>
                                            <strong><i class="fas fa-pencil-alt mr-1"></i> NIK</strong>
                                            <p class="text-muted">
                                            <span class="tag tag-danger">UI Design</span>
                                            </p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i> Agama</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                                        </div>

                                        <div class="col-sm-6">
                                            <strong><i class="fas fa-book mr-1"></i> Nama Panggilan</strong>
                                            <p class="text-muted">
                                            B.S. in Computer
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Tanggal Lahir</strong>
                                            <p class="text-muted">Malibu, California</p>
                                            <hr>
                                            <strong><i class="fas fa-pencil-alt mr-1"></i> Jenis Kelamin</strong>
                                            <p class="text-muted">
                                            <span class="tag tag-danger">UI Design</span>
                                            </p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i> NISN</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                         </div>
                     </div>
                </div>

              </div>
              <!-- /.card-body -->
      </div>
  </div>

<?= $this->endSection() ?>