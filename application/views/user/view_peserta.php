<?php $this->load->view('user/layout/header_dashboard'); ?>

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Data Peserta</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No.</th>
                      <th>Nama Peserta</th>
                      <th>Usia</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <th>Foto Peserta</th>
                    </thead>
                    <tbody>
                      <?php if(empty($jumlah_peserta)){

                        echo "
                        <td colspan='7' align='center' style='color: green;'><b>Data tidak ditemukan</b></td>";
                      }else{
                        $no=1; foreach($data_peserta->result() as $peserta) {
                     echo
                      "<tr>
                        <td>$no</td>
                        <td>$peserta->nama_peserta</td>
                        <td>$peserta->umur</td>
                        <td>$peserta->alamat</td>
                        <td>$peserta->jenis_kelamin</td>     
                        <center><td><img src='".base_url('assets/img/'.$peserta->image)."' width='100'></td></center>
                      </tr>";
                      $no++; } }?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
          <div class="col-md-12" style="text-align: center;">
            <a href="#" class="btn btn-warning col-md-11" style="text-align: center; border-radius: 10px; font-size: 15px;">Total Record: <?= $jumlah_peserta; ?></a>
          </div>
        </div>
            </div>
          </div>
        </div>
      </div>


<?php $this->load->view('user/layout/footer'); ?>