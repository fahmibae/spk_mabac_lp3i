<?php $this->load->view('admin/layout/header_kriteria'); ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Input Kriteria</h4>
              </div>
              <div class="card-body">
              <form action="<?= site_url('admin/kriteria/tambah'); ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kriteria</label>
                        <input type="text" required oninvalid="this.setCustomValidity('Kriteria Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="kriteria" id="kriteria" class="form-control" placeholder="Kriteria">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Bobot</label>
                        <input type="text" required oninvalid="this.setCustomValidity('Nilai Bobot Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" name="bobot" id="bobot" placeholder="Bobot">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" required oninvalid="this.setCustomValidity('Tipe Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" name="tipe" id="tipe" placeholder="Tipe">
                      </div>
                    </div>
                  </div>

  
      
                  <hr>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Simpan</button><a href="<?= site_url('admin/kriteria/index'); ?>"><button type="button" class="btn btn-default btn-round">Kembali</button></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php $this->load->view('admin/layout/footer'); ?>