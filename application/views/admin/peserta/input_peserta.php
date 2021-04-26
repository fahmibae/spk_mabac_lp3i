<?php $this->load->view('admin/layout/header_peserta'); ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Input Peserta</h4>
              </div>
              <div class="card-body">
              <form action="<?= site_url('admin/peserta/tambah'); ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Peserta</label>
                        <input type="text" required oninvalid="this.setCustomValidity('Nama Peserta Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="nama_peserta" id="nama_peserta" class="form-control" placeholder="Nama Peserta">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Usia</label>
                        <input type="text" required oninvalid="this.setCustomValidity('Usia/Umur Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" name="umur" id="umur" placeholder="Usia">
                      </div>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control textarea" name="alamat" id="alamat" rows="5" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" Placeholder="Silahkan Pilih" required oninvalid="this.setCustomValidity('Jenis Kelamin Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                          <option value="">Silahkan pilih</option>
                          <option value="laki-laki">Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="btn btn-success" style="color: #fff;"><span class="fa fa-camera"></span> Upload Foto</label>
                        <input type="file" required oninvalid="this.setCustomValidity('Foto Harus Diisi Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="image" id="image" class="btn btn-success">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Simpan</button><a href="<?= site_url('admin/peserta/index'); ?>"><button type="button" class="btn btn-default btn-round">Kembali</button></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php $this->load->view('admin/layout/footer'); ?>