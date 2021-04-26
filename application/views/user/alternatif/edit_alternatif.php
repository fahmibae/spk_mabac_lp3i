<?php $this->load->view('user/layout/header_alternatif'); ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Edit Kriteria</h4>
              </div>
              <div class="card-body">
              <form action="<?= site_url('user/alternatif/tambah'); ?>" method="POST" enctype="multipart/form-data">

                 <input type="hidden" name="peserta" id="peserta" class="form-control" value="<?= $view->id_peserta; ?>">
                 <input type="hidden" name="kriteria" id="kriteria" class="form-control" value="<?= $view->id_kriteria; ?>">
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" name="nilai" value="<?= $view->nilai ?>" id="nilai" class="form-control" placeholder="Nilai">
                      </div>
                    </div>
                  </div>

                 
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" onkeyup="view()" name="keterangan" id="keterangan" value="<?= $view->keterangan ?>" class="form-control" placeholder="Keterangan">
                      </div>
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Simpan</button><a href="<?= site_url('user/alternatif/index'); ?>"><button type="button" class="btn btn-default btn-round">Kembali</button></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php $this->load->view('user/layout/footer'); ?>