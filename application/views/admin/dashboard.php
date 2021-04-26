<?php $this->load->view('admin/layout/header_dashboard'); ?>

      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-user text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">User</p>
                      <p class="card-title"><?= $jumlah_user ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer "> 
                <hr>
                <div class="stats">
                  <a href="<?= site_url('admin/user/index'); ?>">View User</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-users text-info"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Peserta</p>
                      <p class="card-title"><?= $jumlah_peserta ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href="<?= site_url('admin/peserta/index'); ?>">View peserta</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-trophy text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Peringkat Atas</p>
                      <?php
                        $sql = $this->db->query("SELECT * FROM rangking ORDER BY nilai_rangking DESC LIMIT 1");
                        foreach ($sql->result() as $data){ 
                       ?>
                      <p class="card-title"><?= $data->nama_peserta; ?>
                    <?php } ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href="<?= site_url('admin/analisa/index'); ?>">view peringkat atas</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-list text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Penilaian Kriteria</p>
                      <?php
                        $sql1 = $this->db->query("SELECT * FROM kriteria ORDER BY bobot DESC LIMIT 1");
                        foreach ($sql1->result() as $data1){
                       ?>
                      <p class="card-title"><?= $data1->kriteria ?>
                        <?php } ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href="<?= site_url('admin/kriteria/index'); ?>">View Kriteria</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Selamat Datang!</h5>
                <p class="card-category">Aplikasi SPK Penentuan Kerja Mahasiswa LP3I CIREBON dengan metode (MABAC)</p>
              </div>
              <div class="card-body ">
                <canvas id=chartHours width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php $this->load->view('admin/layout/footer'); ?>