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
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <div class="alert alert-warning alert-dismissible">
                      
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan!</h5>
                         Lengkapi Terlebih Dahulu Biodata anda Sebelum Melakukan APPLY Pendaftaran !!
                    </div>
                <div class="row">
                 <div class="col-sm-12">
                            <br>
                         <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Pendaftaran</h3>
                                    <div class="card-tools">

                                    <button type="button" class="btn btn-primary btn-xs">
                                    <i class="fas fa-save"></i> Save</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                  <div class="row">
                                        <div class="col-sm-3">
                                                <strong><i class="fas fa-book mr-1"></i> NISN</strong>
                                                <p class="text-muted">
                                                B.S. in Computer
                                                </p>
                                                <hr>
                                        </div>
                                        <div class="col-sm-3">
                                                <strong><i class="fas fa-book mr-1"></i> No Pendaftaran</strong>
                                                <p class="text-muted">
                                                B.S. in Computer
                                                </p>
                                                <hr>
                                        </div>
                                        <div class="col-sm-3">
                                                <strong><i class="fas fa-book mr-1"></i> Tanggal Pendaftaran</strong>
                                                <p class="text-muted">
                                                B.S. in Computer
                                                </p>
                                                <hr>
                                        </div>
                                        <div class="col-sm-3">
                                                <strong><i class="fas fa-book mr-1"></i> Jalur Pendaftaran</strong>
                                                <p class="text-muted">
                                                B.S. in Computer
                                                </p>
                                                <hr>
                                        </div>
                                  </div>
                                </div>
                                <!-- /.card-body -->
                           </div>
                        </div>

                     <div class="col-sm-3">
                            <br>
                         <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Foto Siswa</h3>
                                    <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-xs">
                                    <i class="fas fa-save"></i> Save</button>
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
                                     <button type="button" class="btn btn-primary btn-xs">
                                    <i class="fas fa-save"></i> Save</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <strong><i class="fas fa-book mr-1"></i> Nama Lengkap</strong>
                                            <p class="text-muted">
                                            B.S. in Computer
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Tempat Lahir</strong>
                                            <p class="text-muted">Malibu, California</p>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> NIK</strong>
                                            <p class="text-muted">
                                            <span class="tag tag-danger">UI Design</span>
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Agama</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <strong><i class="fas fa-book mr-1"></i> Nama Panggilan</strong>
                                            <p class="text-muted">
                                            B.S. in Computer
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Tanggal Lahir</strong>
                                            <p class="text-muted">Malibu, California</p>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Jenis Kelamin</strong>
                                            <p class="text-muted">
                                            <span class="tag tag-danger">UI Design</span>
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> No Telpon</strong>
                                            <p class="text-muted">Lorem ipsum dolor </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <strong><i class="fas fa-book mr-1"></i> Tinggi Badan</strong>
                                            <p class="text-muted">
                                            B.S. in Computer
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Berat Badan</strong>
                                            <p class="text-muted">Malibu, California</p>
                                            <hr>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                         </div>
                        </div>

                     <div class="col-sm-12">
                            <br>
                         <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Data Ayah Kandung</h3>
                                    <div class="card-tools">
                                     <button type="button" class="btn btn-primary btn-xs">
                                    <i class="fas fa-save"></i> Save</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <strong><i class="fas fa-book mr-1"></i> NIK Ayah</strong>
                                            <p class="text-muted">
                                            B.S. in Computer
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Nama Ayah</strong>
                                            <p class="text-muted">Malibu, California</p>
                                            <hr>
                                        </div>

                                        <div class="col-sm-4">
                                            <strong><i class="far fa-file-alt mr-1"></i> Pekerjaan</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i> Pendidikan</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet</p>
                                            <hr>
                                        </div>

                                        <div class="col sm-4">
                                            <strong><i class="far fa-file-alt mr-1"></i> Penghasilan</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet,</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i> No Telpon</strong>
                                            <p class="text-muted">Lorem ipsum dolor </p>
                                            <hr>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.card-body -->
                         </div>

                     <div class="col-sm-12">
                            <br>
                         <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Data Ibu Kandung</h3>
                                    <div class="card-tools">
                                     <button type="button" class="btn btn-primary btn-xs">
                                    <i class="fas fa-save"></i> Save</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <strong><i class="fas fa-book mr-1"></i> NIK Ibu</strong>
                                            <p class="text-muted">
                                            B.S. in Computer
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Nama Ibu</strong>
                                            <p class="text-muted">Malibu, California</p>
                                            <hr>
                                        </div>
                                        <div class="col-sm-4">
                                            <strong><i class="far fa-file-alt mr-1"></i> Pekerjaan</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i> Pendidikan</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet</p>
                                            <hr>
                                        </div>
                                        <div class="col-sm-4">
                                            <strong><i class="far fa-file-alt mr-1"></i> Penghasilan</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet,</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i> No Telpon</strong>
                                            <p class="text-muted">Lorem ipsum dolor </p>
                                            <hr>
                                        </div>

                                        
                                    </div>

                                </div>
                                <!-- /.card-body -->
                           </div>
                        </div>

                     <div class="col-sm-12">
                            <br>
                         <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Sekolah Asal</h3>
                                    <div class="card-tools">
                                     <button type="button" class="btn btn-primary btn-xs">
                                    <i class="fas fa-save"></i> Save</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <strong><i class="fas fa-book mr-1"></i> Tahun Lulus</strong>
                                            <p class="text-muted">
                                            B.S. in Computer
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Nama Sekolah</strong>
                                            <p class="text-muted">Malibu, California</p>
                                            <hr>
                                        </div>
                                        <div class="col-sm-4">
                                            <strong><i class="far fa-file-alt mr-1"></i> Provinsi</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i> Kabupaten</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet</p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i> Kecamatan</strong>
                                            <p class="text-muted">Lorem ipsum dolor sit amet,</p>
                                            <hr>
                                        </div>
                                        <div class="col-sm-4">
                                            <strong><i class="far fa-file-alt mr-1"></i> No Ijazah</strong>
                                            <p class="text-muted">Lorem ipsum dolor </p>
                                            <hr>
                                            <strong><i class="far fa-file-alt mr-1"></i> No SKHUN</strong>
                                            <p class="text-muted">Lorem ipsum dolor </p>
                                            <hr>
                                        </div>

                                        
                                    </div>

                                </div>
                                <!-- /.card-body -->
                           </div>
                        </div>

                     <div class="col-sm-12">
                            <br>
                         <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">File Pendukung</h3>
                                    <div class="card-tools">
                                     <button type="button" class="btn btn-primary btn-xs">
                                    <i class="fas fa-save"></i> Save</button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis File</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                           </div>
                        </div>

                    <div class="col-sm-12">
                        <a href="" class="btn btn-success btn-flat btn-block"><i class="fa fa-check"></i> Apply Pendaftaran</a>
                    </div>


                </div>
              </div>
              <!-- /.card-body -->
      </div>
  </div>
</div>

<?= $this->endSection() ?>