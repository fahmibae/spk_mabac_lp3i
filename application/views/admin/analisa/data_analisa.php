<?php $this->load->view('admin/layout/header_analisa'); ?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Matrik Awal (X)</h4>
              </div>
              <div class="card-body">

                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>No.</th>
                      <th>Nama Peserta</th>
                      <?php 
                      $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM alternatif,kriteria WHERE alternatif.id_kriteria=kriteria.id_kriteria");
                        foreach ($kr2->result() as $a) {
                        ?>
                        <th style="text-align:center;"><?php echo $a->kriteria; ?></th>
                        <?php } ?>
                      <th class="text-center"></th></small>
                      
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=1;
                      $sql = $this->db->query("SELECT * FROM peserta ");
                      foreach ($sql->result() as $a) {
                       ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $a->nama_peserta; ?></td>
                          <?php 
                          $id = $a->id_peserta;
                          $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,alternatif.nilai FROM alternatif,kriteria WHERE alternatif.id_kriteria=kriteria.id_kriteria AND alternatif.id_peserta='$id'");
                          foreach ($sql2->result() as $a) {
                           ?>
                          <td align="center"><?php echo $a->nilai; ?></td>
                          <?php } ?>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Normalisasi (N)</h4>
              </div>
              <div class="card-body">
                
                <a href="<?= site_url('admin/analisa/proses_normalisasi'); ?>" class="btn btn-primary my-4 ">Normalisasi</a>
                <a href="<?= site_url('admin/analisa/delete_normalisasi'); ?>" class="btn btn-danger my-4 ">Bersihkan</a>

                 <?php 
                                $gagal = $this->session->flashdata('gagal');

                                if(!empty($gagal))
                                { ?>

                                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>  <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                   
                               

                                <?php }

                                ?>

                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No.</th>
                      <th style="">Nama Peserta</th>
                      <?php 
                      $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM normalisasi,kriteria WHERE normalisasi.id_kriteria=kriteria.id_kriteria");
                      foreach ($kr2->result() as $a) {
                        ?>
                      <th style="text-align:center;"><?php echo $a->kriteria; ?></th>
                      <?php } ?>
                    </thead>
                    <tbody>
                     <?php $no=1;
                     $sql = $this->db->query("SELECT * FROM peserta");
                     foreach ($sql->result() as $a) { ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $a->nama_peserta; ?></td>
                     <?php 
                        $id = $a->id_peserta;
                        $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,normalisasi.normalisasi FROM normalisasi,kriteria WHERE normalisasi.id_kriteria=kriteria.id_kriteria AND normalisasi.id_peserta='$id'");
                        foreach ($sql2->result() as $a) { ?>
                        <td align="center"><?php echo $a->normalisasi; ?></td>
                     <?php } ?>
                      </tr>
                     <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Matriks Bobot Keputusan (V)</h4>
              </div>
              <div class="card-body">
                
                <a href="<?= site_url('admin/analisa/proses_keputusan'); ?>" class="btn btn-primary my-4 ">Keputusan</a>
                <a href="<?= site_url('admin/analisa/delete_keputusan'); ?>" class="btn btn-danger my-4 ">Bersihkan</a>

                 <?php 
                                $gagal = $this->session->flashdata('gagal');

                                if(!empty($gagal))
                                { ?>

                                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>  <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                   
                               

                                <?php }

                                ?>

                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No.</th>
                      <th style="">Nama Peserta</th>
                      <?php 
                      $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM keputusan,kriteria WHERE keputusan.id_kriteria=kriteria.id_kriteria");
                      foreach ($kr2->result() as $a) {
                        ?>
                      <th style="text-align:center;"><?php echo $a->kriteria; ?></th>
                      <?php } ?>
                    </thead>
                    <tbody>
                     <?php $no=1;
                     $sql = $this->db->query("SELECT * FROM peserta");
                     foreach ($sql->result() as $a) { ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $a->nama_peserta; ?></td>
                     <?php 
                        $id = $a->id_peserta;
                        $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,keputusan.bobot_keputusan FROM keputusan,kriteria WHERE keputusan.id_kriteria=kriteria.id_kriteria AND keputusan.id_peserta='$id'");
                        foreach ($sql2->result() as $a) { ?>
                        <td align="center"><?php echo $a->bobot_keputusan; ?></td>
                     <?php } ?>
                      </tr>
                     <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Nilai Matriks Batas (G) </h4>
              </div>
              <div class="card-body">

                <!-- // $peserta = $this->db->query("SELECT DISTINCT keputusan.id_kriteria, keputusan.id_peserta FROM keputusan,kriteria,peserta WHERE kriteria.id_kriteria=keputusan.id_kriteria AND peserta.id_peserta=keputusan.id_peserta");
                // foreach ($peserta->result() as $a1) {
                //           $id_kriteria = $a1->id_kriteria;
                //           $id_peserta = $a1->id_peserta;

                //           $kriteria1  = $this->db->query("SELECT bobot_keputusan FROM keputusan WHERE id_kriteria='$id_kriteria' AND id_peserta='$id_peserta' order by bobot_keputusan ASC LIMIT 0, 1")->row();
                //           echo "<input type='text' value='".$kriteria1->bobot_keputusan."' >";
                //           } -->

              <a href="<?= site_url('admin/analisa/proses_matriks_batas'); ?>" class="btn btn-primary my-4 ">Penilaian Matrik Batas</a>
              <a href="<?= site_url('admin/analisa/delete_matriks_batas'); ?>" class="btn btn-danger my-4 ">Bersihkan</a>

                 <?php 
                                $gagal = $this->session->flashdata('gagal');

                                if(!empty($gagal))
                                { ?>

                                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>  <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                   
                               

                                <?php }

                                ?>

                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <?php 
                      $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM matriks_batas,kriteria WHERE matriks_batas.id_kriteria=kriteria.id_kriteria");
                      foreach ($kr2->result() as $a) {
                        ?>
                      <th style="text-align:center;"><?php echo $a->kriteria; ?></th>
                      <?php } ?>
                    </thead>
                    <tbody>

                      <tr>
                     <?php 
                        $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,matriks_batas.nilai_batas FROM matriks_batas,kriteria WHERE matriks_batas.id_kriteria=kriteria.id_kriteria");
                        foreach ($sql2->result() as $a) { ?>
                        <td align="center"><?php echo $a->nilai_batas; ?></td>
                     <?php } ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Matriks Jarak Alternatif Dari Daerah Perkiraan Perbatasan (Q)</h4>
              </div>
              <div class="card-body">
                
                <a href="<?= site_url('admin/analisa/proses_perkiraan_batas'); ?>" class="btn btn-primary my-4 ">Matriks Jarak Alternatif</a>
                <a href="<?= site_url('admin/analisa/delete_perkiraan_batas'); ?>" class="btn btn-danger my-4 ">Bersihkan</a>

                 <?php 
                                $gagal = $this->session->flashdata('gagal');

                                if(!empty($gagal))
                                { ?>

                                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>  <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                   
                               

                                <?php }

                                ?>

                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No.</th>
                      <th style="">Nama Peserta</th>
                      <?php 
                      $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM perkiraan_perbatasan,kriteria WHERE perkiraan_perbatasan.id_kriteria=kriteria.id_kriteria");
                      foreach ($kr2->result() as $a) {
                        ?>
                      <th align="center"><?php echo $a->kriteria; ?></th>
                      <?php } ?>
                    </thead>
                    <tbody>
                     <?php $no=1;
                     $sql = $this->db->query("SELECT * FROM peserta");
                     foreach ($sql->result() as $a) { ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $a->nama_peserta; ?></td>
                     <?php 
                        $id = $a->id_peserta;
                        $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,perkiraan_perbatasan.nilai_perkiraan FROM perkiraan_perbatasan,kriteria WHERE perkiraan_perbatasan.id_kriteria=kriteria.id_kriteria AND perkiraan_perbatasan.id_peserta='$id'");
                        foreach ($sql2->result() as $a) { ?>
                        <td align="center"><?php echo $a->nilai_perkiraan; ?></td>
                     <?php } ?>
                      </tr>
                     <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Rangking</h4>
              </div>
              <div class="card-body">
                <a href="<?= site_url('admin/analisa/proses_rangking'); ?>" class="btn btn-primary my-4 ">Analisa</a>
                <a href="<?= site_url('admin/analisa/delete_analisa'); ?>" class="btn btn-danger my-4 ">Bersihkan</a>

                 <?php 
                                $gagal = $this->session->flashdata('gagal');

                                if(!empty($gagal))
                                { ?>

                                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>  <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                   
                               

                                <?php }

                                ?>

                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                        <th>No.</th>
                        <th>Nama Peserta</th>
                        <th style="text-align:center;">Hasil</th>
                        <th style="text-align:center;">Status</th>
                    </thead>
                    <tbody>
                     <?php 
                      $no = 1;
                      $kr1 = $this->db->query("SELECT peserta.nama_peserta, peserta.id_peserta, rangking.nilai_rangking FROM peserta,rangking WHERE peserta.id_peserta=rangking.id_peserta order by rangking.nilai_rangking desc");
                      foreach ($kr1->result() as $a) {
                       ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $a->nama_peserta; ?></td>
                          <?php 
                          $id_peserta = $a->id_peserta;
                          $nilai_rangking = $a->nilai_rangking;
                            ?>
                          <td align="center"><?php echo $nilai_rangking; ?></td>
                          <?php if($nilai_rangking < 12) {
                          echo"<td align='center' style='color:red; text-weight:bold;'>Belum Kompeten</td>";
                          }elseif ($nilai_rangking > 12) {
                          echo "<td align='center' style='color:green; text-weight:bold;'>Kompeten</td>";
                          }
                          ?>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>


   
<?php $this->load->view('admin/layout/footer'); ?>
