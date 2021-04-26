<?php $this->load->view('user/layout/header_analisa'); ?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Matrik Awal</h4>
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
                        <th align="center"><?php echo $a->kriteria; ?></th>
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
                <h4 class="card-title"> Normalisasi</h4>
              </div>
              <div class="card-body">
                
                <a href="<?= site_url('user/analisa/proses_normalisasi'); ?>" class="btn btn-primary my-4 ">Normalisasi</a>
                <a href="<?= site_url('user/analisa/delete_normalisasi'); ?>" class="btn btn-danger my-4 ">Bersihkan</a>
                
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
                <h4 class="card-title"> Rangking</h4>
              </div>
              <div class="card-body">
                <a href="<?= site_url('user/analisa/proses_rangking'); ?>" class="btn btn-primary my-4 ">Analisa</a>
                <a href="<?= site_url('user/analisa/delete_analisa'); ?>" class="btn btn-danger my-4 ">Bersihkan</a>

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
                        <?php 
                        $sql = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM normalisasi,kriteria WHERE normalisasi.id_kriteria=kriteria.id_kriteria");
                        foreach ($sql->result() as $a) {
                         ?>
                        <th align="center"><?php echo $a->kriteria; ?></th>
                        <?php } ?>
                        <th align="center">Hasil</th>
                        <th align="center">Status</th>
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
                          $kr2 = $this->db->query("SELECT DISTINCT kriteria.kriteria, analisa.nilai_analisa FROM analisa,kriteria WHERE analisa.id_kriteria=kriteria.id_kriteria AND analisa.id_peserta='$id_peserta'");
                          foreach ($kr2->result() as $a) { ?>
                          <td align="center"><?php echo $a->nilai_analisa; ?></td>
                          <?php } ?>
                          <td align="center"><?php echo $nilai_rangking; ?></td>
                          <?php if($nilai_rangking < 98) {
                          echo"<td align='center' style='color:red;'>Tidak Lulus</td>";
                          }elseif ($nilai_rangking > 98) {
                          echo "<td align='center' style='color:green;'>Lulus</td>";
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


   
<?php $this->load->view('user/layout/footer'); ?>
