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
                                    <?php $error = session()->getFlashdata('errors');
                                        if (session()->getFlashdata('pesan_edit')) {
                                        echo '<div class="alert alert-success">';
                                        echo session()->getFlashdata('pesan_edit');
                                        echo '</div>';
                                        } 
                                    ?>
                <div class="row">
                 <div class="col-sm-12">
                            <br>
                         <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Pendaftaran</h3>
                                    <div class="card-tools">

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editpendaftaran">
                                    <i class="fas fa-save"></i> </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                  <div class="row">
                                   
                                        <div class="col-sm-3">
                                                <strong><i class="fas fa-book mr-1"></i> NISN</strong>
                                                <p class="text-muted">
                                                <?= $siswa['nisn'] ?>
                                                </p>
                                                <hr>
                                        </div>
                                        <div class="col-sm-3">
                                                <strong><i class="fas fa-book mr-1"></i> No Pendaftaran</strong>
                                                <p class="text-muted">
                                                <?= $siswa['no_pendaftaran'] ?>
                                                </p>
                                                <hr>
                                        </div>
                                        <div class="col-sm-3">
                                                <strong><i class="fas fa-book mr-1"></i> Tanggal Pendaftaran</strong>
                                                <p class="text-muted">
                                                <?= $siswa['tgl_pendaftaran'] ?>
                                                </p>
                                                <hr>
                                        </div>
                                        <div class="col-sm-3">
                                                <strong><i class="fas fa-book mr-1"></i> Jalur Masuk</strong>
                                                <?= ($siswa['jalur_masuk']==null) ? '<p class="text-danger">WAJIB DIISI</p>' : '<p class="text-muted"> '.$siswa['jalur_masuk'].' </p>' ?>
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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                        <div class="text-center">
                                                <?php if ($siswa['foto'] == null) { ?>
                                                    <img class="img-fluid pad" src="<?= base_url('foto/blank.png') ?>" alt="User profile picture" width="150px"> 
                                                <?php }else { ?>
                                                    <img class="img-fluid pad" src="<?= base_url('foto/' . $siswa['foto']) ?>" alt="User profile picture" width="150px">
                                                <?php } ?>
                                            <br>
                                            <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></p>
                                        </div>
                                        <br>
                                    <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#foto">
                                    <i class="fas fa-save"></i> Ganti Foto</button>
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
                                     <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#siswa">
                                    <i class="fas fa-save"></i> </button>
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
                                            <?= ($siswa['nama_lengkap']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['nama_lengkap'].' </p>' ?>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Tempat Lahir</strong>
                                            <?= ($siswa['tempat_lahir']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['tempat_lahir'].' </p>' ?>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> NIK</strong>
                                            <?= ($siswa['nik']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['nik'].' </p>' ?>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Agama</strong>
                                            <?= ($siswa['agama']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['agama'].' </p>' ?>
                                        </div>

                                        <div class="col-sm-4">
                                            <strong><i class="fas fa-book mr-1"></i> Nama Panggilan</strong>
                                            <?= ($siswa['nama_panggilan']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['nama_panggilan'].' </p>' ?>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Tanggal Lahir</strong>
                                            <?= ($siswa['tgl_lahir']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['tgl_lahir'].' </p>' ?>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Jenis Kelamin</strong>
                                            <?php if ($siswa['jk'] == 'P') {
                                                $jk= 'Perempuan';
                                            }elseif ($siswa['jk'] == 'L' ) {
                                                $jk= 'Laki-Laki';
                                            } ?>
                                            <?= ($siswa['jk']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$jk.' </p>' ?>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> No Telpon</strong>
                                            <?= ($siswa['no_telpon']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['no_telpon'].' </p>' ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <strong><i class="fas fa-book mr-1"></i> Tinggi Badan</strong>
                                            <?= ($siswa['tinggi']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['tinggi'].' </p>' ?>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Berat Badan</strong>
                                            <?= ($siswa['berat']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['berat'].' </p>' ?>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Jumlah Saudara</strong>
                                            <?= ($siswa['jml_saudara']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['jml_saudara'].' </p>' ?>
                                            <hr>
                                            <strong><i class="fas fa-book mr-1"></i> Anak Ke</strong>
                                            <?= ($siswa['anak_ke']==null) ? '<p class="text-danger">Kosong</p>' : '<p class="text-muted"> '.$siswa['anak_ke'].' </p>' ?>    
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
                                        <h3 class="card-title">Alamat Lengkap</h3>
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
                                            <div class="col-sm-6">
                                                <strong><i class="fas fa-book mr-1"></i> Provinsi</strong>
                                                <p class="text-muted">
                                                B.S. in Computer
                                                </p>
                                                <strong><i class="far fa-file-alt mr-1"></i> Kabupaten</strong>
                                                <p class="text-muted">Lorem ipsum dolor sit amet</p>
                                            </div>
                                            <div class="col-sm-4">
                                                <strong><i class="far fa-file-alt mr-1"></i> Kecamatan</strong>
                                                <p class="text-muted">Lorem ipsum dolor sit amet,</p>
                                                <strong><i class="far fa-file-alt mr-1"></i> Alamat</strong>
                                                <p class="text-muted">Lorem ipsum dolor sit amet,</p>
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

<!-- modal pendaftaran -->
<div class="modal fade" id="editpendaftaran">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pendaftaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <?php echo form_open('siswa/updatePendaftaran/'. $siswa['id_siswa']) ?>
            <div class="modal-body">
               <div class="form-group">
                    <label>NISN</label>
                    <input type="text" class="form-control" value="<?= $siswa['nisn'] ?>" readonly>
                 </div>
               <div class="form-group">
                    <label>No Pendaftaran</label>
                    <input type="text" class="form-control" value="<?= $siswa['no_pendaftaran'] ?>"readonly>
                 </div>
               <div class="form-group">
                    <label>Tanggal Pendaftaran</label>
                    <input type="text" class="form-control" value="<?= $siswa['tgl_pendaftaran'] ?>"readonly>
                 </div>
               <div class="form-group">
                    <label>Jalur Masuk</label>
                    <select name="id_jalur_masuk" class="form-control" id="">
                        <option value="">--Pilih JalurMasuk</option>
                        <?php foreach ($jalur as $key => $value) { ?>
                            <option value="<?= $value['id_jalur_masuk'] ?>" <?= $siswa['id_jalur_masuk']==$value['id_jalur_masuk'] ? 'selected' : '' ?>>
                            <?= $value['jalur_masuk'] ?>
                        </option>
                        <?php } ?>
                    </select>
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

<!-- modal foto -->
<div class="modal fade" id="foto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Foto (Max Foto 1mb)</h4> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open_multipart('siswa/updateFoto/'. $siswa['id_siswa']) ?>
            <div class="modal-body">
               <div class="form-group">
                    <label>Ganti Foto</label>
                    <input type="file" id="preview_gambar" class="form-control" name="foto" accept="image/*" required>
                 </div>
               <div class="form-group">
                    <label>Preview Foto</label> <br>
                    <?php if ($siswa['foto'] == null) { ?>
                        <img src="<?= base_url('foto/blank.png') ?>" id="gambar_load" width="120px" height="120px">
                    <?php }else { ?>
                        <img src="<?= base_url('foto/' . $siswa['foto']) ?>" id="gambar_load" width="130px" height="130px">
                    <?php } ?>
                    
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

<!-- modal identitas -->
<div class="modal fade" id="siswa">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Identitas Siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <?php echo form_open('siswa/updateIdentitasSiswa/'. $siswa['id_siswa']) ?>
            <div class="modal-body">
                    <div class="row">
                        
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" value="<?= $siswa['nama_lengkap'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" class="form-control" value="<?= $siswa['tempat_lahir'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="text" class="form-control" value="<?= $siswa['nik'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select name="id_agama" class="form-control" id="">
                                                        <option value="">--Pilih Agama--</option>
                                                    <?php foreach ($agama as $key => $value) {?>
                                                        <option value="<?= $value['id_agama'] ?>" <?= $siswa['id_agama'] == $value['id_agama'] ? 'selected' : '' ?> ><?= $value['agama'] ?></option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>    
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Nama Panggilan</label>
                                                <input type="text" class="form-control" value="<?= $siswa['nama_panggilan'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="text" class="form-control" value="<?= $siswa['tgl_lahir'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="jk" class="form-control" id="">
                                                    <option value="L"<?= $siswa['jk'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                                    <option value="P"<?= $siswa['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>No Telpon</label>
                                                <input type="text" class="form-control" value="<?= $siswa['no_telpon'] ?>" required>
                                            </div>
                                        </div>    
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Nama Panggilan</label>
                                                <input type="text" class="form-control" value="<?= $siswa['nama_panggilan'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal lahir</label>
                                                <input type="text" class="form-control" value="<?= $siswa['tgl_lahir'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="text" class="form-control" value="<?= $siswa['nik'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Anak Ke</label>
                                                <input type="text" class="form-control" value="<?= $siswa['anak_ke'] ?>" required>
                                            </div>
                                        </div>    
    
                                   
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
<?= $this->endSection() ?>