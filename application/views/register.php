<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    SPK Pemilihan pemain basket
  </title>
  <!-- Favicon -->
  <link href="img/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?= base_url('assets/js/plugins/nucleo/css/nucleo.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?= base_url('assets/css/argon-dashboard.css'); ?>" rel="stylesheet" />
</head>

<body class="bg-gradient-danger">
  <div class="main-content">
    <!-- Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-danger py-6 py-lg-7">
      <div class="container">
        <div class="header-body text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <center><i class="fa fa-basketball-ball" style="color: #fff; font-size: 60px;"></i>
              <span><h4 style="color: #fff; font-size: 25px; height: 25px;">SPK Pemilihan Pemain Basket</h4>
              <a style="color: #fff; font-size: 15px;">Liberty Basketball Club</a></span>
              </center>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header">
              <center> <h1 class="text-light">Registrasi</h1>
              <p class="text-lead text-light">Silahkan Registrasi Akun Anda</p></center>
            
            <?php 
            if($this->session->flashdata('tambah')): ?>
            <?php
            if ($this->session->flashdata('tambah') == TRUE): ?>

              <div class="alert alert-success">Berhasil Tersimpan</div>

            <?php elseif ($this->session->flashdata('tambah') == FALSE): ?> 
              <div class="alert alert-danger">Gagal Tersimpan</div>

            <?php endif; ?>
            

               <?php endif; ?>


            </div>
            <div class="card-body px-lg-5 py-lg-5">
              
              <form action="<?= site_url('register/tambah'); ?>" method="POST" enctype="multipart/form-data">
               

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" name="nama_user" id="nama_user" placeholder="Nama Pengguna" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" name="email" id="email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                 <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-user-circle-"></i></span>
                    </div>
                    <input class="form-control" id="image" name="image" placeholder="Image" type="file">
                  </div>
                </div>

                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for="customCheckLogin">
                    <span class="text-muted">Tampilkan Password</span>
                  </label>
                </div>
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Buat Akun</button>
                </div>
              </form>
            </div>
          </div>
          <br/>
          
          <center><small><span class="fa fa-arrow-left text-light"></span> <a href="<?= site_url('login/index'); ?>" class="text-light">back to login</a></small></center>
         
        </div>
      </div>
    </div>
  </div>
     <footer class="py-1">
      <div class="container">
            <center>
              <a style="color: #fff;">©</a> <a style="color: #fff;"><script>document.write(new Date().getFullYear());</script></a><a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank" style="color: #fff;">Liberty Basketball Club</a>
            </center> 
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="<?= site_url('assets/js/plugins/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?= site_url('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="<?= site_url('assets/js/argon-dashboard.min.js'); ?>"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
            $(document).ready(function(){
                $('.custom-control-input').click(function(){
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
</body>

</html>