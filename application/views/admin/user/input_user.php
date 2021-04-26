<?php $this->load->view('admin/layout/header_user'); ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Input Peserta</h4>
              </div>
              <div class="card-body">
              <form action="<?= site_url('admin/user/tambah'); ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" required oninvalid="this.setCustomValidity('Nama Peserta Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="nama_user" id="nama_user" class="form-control" placeholder="Nama">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" required oninvalid="this.setCustomValidity('Email Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" name="email" id="email" placeholder="Email">
                      </div>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" required oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" name="password" id="password" placeholder="Password">
                      </div>
                    </div>
                  </div>

                  <input type="hidden" required oninvalid="this.setCustomValidity('Level Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" value="user" name="level" id="level" placeholder="Level">
                     
                  <div class="checkbox">
                <label>
                  <input name="tampil" style="border-color: #fff;" align="right" class="tampil" id="tampil" type="checkbox" value="Tampilkan"><b> Tampilkan</b>
                </label>
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
                      <button type="submit" class="btn btn-primary btn-round">Simpan</button><a href="<?= site_url('admin/user/index'); ?>"><button type="button" class="btn btn-default btn-round">Kembali</button></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php $this->load->view('admin/layout/footer'); ?>

<script>
            $(document).ready(function(){
                $('.tampil').click(function(){
                    if($(this).is(':checked'))
                    {
                        $('#password').attr('type','text');
                    }
                    else
                    {
                        $('#password').attr('type','password');
                    }
                });
            });
</script>