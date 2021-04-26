<?php $this->load->view('admin/layout/header_peserta'); ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Edit Peserta</h4>
              </div>
              <div class="card-body">
              <form action="<?= site_url('admin/peserta/edit/'.$view->id_peserta); ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Peserta</label>
                        <input type="text" name="nama_peserta" id="nama_peserta" class="form-control" required oninvalid="this.setCustomValidity('Nama Peserta Tidak Boleh Kosong')" oninput="setCustomValidity('')" placeholder="Nama Peserta" value="<?= $view->nama_peserta; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Usia</label>
                        <input type="text" required oninvalid="this.setCustomValidity('Umur/Usia Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" name="umur" id="umur" placeholder="Usia" value="<?= $view->umur; ?>">
                      </div>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control textarea" name="alamat" id="alamat" rows="5" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?= $view->alamat ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" required oninvalid="this.setCustomValidity('Jenis Kelamin Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="jenis_kelamin" id="jenis_kelamin" Placeholder="Silahkan Pilih">
                          <?php
                          if($view->jenis_kelamin == "laki-laki")
                            echo "<option value='laki-laki' selected>laki-laki</option>";
                          else echo "<option value='Laki-laki'>Laki-laki</option>";

                          if($view->jenis_kelamin == "perempuan")
                            echo "<option value='perempuan' selected>Perempuan</option>";
                          else echo "<option value='perempuan'>Perempuan</option>";

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <?php if($view->image > 0){
                  echo "<div class='row'>
                    <div class='col-md-12'>
                      <div class='form-group'>
                        <img src='".base_url('assets/img/'.$view->image)."' width='100'>
                      </div>
                    </div>
                  </div>";
                  echo "<div class='row'>
                    <div class='col-md-12'>
                      <div class='form-group'>
                      <label>URL</label>
                        <input class='form-control' readonly value='assets/img/$view->image' id='foto' name='foto'>
                      </div>
                    </div>
                  </div>";
                  } ?>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="btn btn-success" style="color: #fff;"><span class="fa fa-camera"></span> Upload Foto</label>
                        <input type="file" required oninvalid="this.setCustomValidity('Foto Harus Diisi Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="image" id="image">
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