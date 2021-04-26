<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    SPK Pemilihan pemain basket
  </title>
  <!-- Favicon -->
  <link href="img/basketball.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?= base_url('assets/js/plugins/nucleo/css/nucleo.css'); ?>" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
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
              <center><img src="<?= base_url('assets/img/lp3i.png') ?>" height="100">
              <span><h1 style="color: #fff; font-size: 25px; height: 25px;">SPK Penentuan Kerja Mahasiswa </h1>
              <a style="color: #fff; font-size: 15px;">LP3I CIREBON</a></span>
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
             <center> <h1 class="text-light">Login</h1>
              <p class="text-lead text-light">Silahkan login untuk menggunakan sistem</p></center>
             
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              
              <form action="<?= site_url('login/auth'); ?>" method="post" enctype="multipart/form-data">

                <?php 
                                $gagal = $this->session->flashdata('gagal');

                                if(!empty($gagal))
                                { ?>

                                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>  <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                   
                               

                                <?php }

                                ?>

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                    </div>
                    <input class="form-control" name="email" id="email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for="customCheckLogin">
                    <span class="text-muted">Tampilkan Password</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-1">
      <div class="container">
            <center>
              <a style="color: #fff;">©</a> <a style="color: #fff;"><script>document.write(new Date().getFullYear());</script></a><a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank" style="color: #fff;">LP3I CIREBON</a>
            </center>  
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="<?= base_url('assets/js/plugins/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="<?= base_url('assets/js/argon-dashboard.min.js'); ?>"></script>
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