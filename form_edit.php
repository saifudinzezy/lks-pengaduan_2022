<?php 
session_start();
if(! isset($_SESSION['is_login']))
{
  header('location:login.php');
}

  include('library.php');
  $lib = new Library();
  if(isset($_GET['id'])){
      $id = $_GET['id']; 
      $data_siswa = $lib->get_by_id($id);
  }
  else
  {
      header('Location: home.php');
  }

  if(isset($_POST['tombol_update'])){
      $id = $_POST['id'];
      $response = $_POST['response'];
      $status_update = $lib->update($id, $response);
      if($status_update)
      {
          header('Location:home.php');
      }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Laporan</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/starter-template.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Pengaduan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Laporan <span class="sr-only">(current)</span></a>
      </li>    
    </ul>
    
    <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-secondary">Logout</a>

  </div>
</nav>

<main role="main" class="container-fluid">
  <div class="card">
      <div class="card-header">
          <h3>Proses Laporan</h3>
      </div>
      <div class="card-body">
      <form method="post" action="">
          <input type="hidden" name="id" value="<?php echo $data_siswa['id']; ?>"/>
          <div class="form-group row">
              <label for="no_aduan" class="col-sm-2 col-form-label">No Aduan</label>
              <div class="col-sm-10">
                <input type="text" disabled name="no_aduan" class="form-control" id="no_aduan" value="<?php echo $data_siswa['no_aduan']; ?>">
              </div>
          </div>
          <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">NIK</label>
              <div class="col-sm-10">
                <input type="text" disabled name="nik" class="form-control" id="nik" value="<?php echo $data_siswa['nik']; ?>">
              </div>
          </div>
          <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $data_siswa['nama']; ?>" disabled name="nama" class="form-control" id="nama">
              </div>
          </div>
          <div class="form-group row">
              <label for="hp" class="col-sm-2 col-form-label">HP</label>
              <div class="col-sm-10">
                <input class="form-control" disabled name="hp" id="hp" value="<?php echo $data_siswa['hp']; ?>">
              </div>
          </div>
          <div class="form-group row">
              <label for="jns_aduan" class="col-sm-2 col-form-label">Jenis Aduan</label>
              <div class="col-sm-10">
                <input class="form-control" disabled name="jns_aduan" id="jns_aduan" value="<?php echo $data_siswa['jns_aduan']; ?>">
              </div>
          </div>
          <div class="form-group row">
              <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input class="form-control" disabled name="alamat" id="alamat" value="<?php echo $data_siswa['alamat']; ?>">
              </div>
          </div>
          <div class="form-group row">
              <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
              <div class="col-sm-10">
                <textarea class="form-control" disabled name="ket" id="ket"><?php echo $data_siswa['ket']; ?></textarea>
              </div>
          </div>
          <div class="form-group row">
              <label for="response" class="col-sm-2 col-form-label">Response</label>
              <div class="col-sm-10">
              <select class="form-control" name="response">
                  <option selected value="DI PROSES">DI PROSES</option>
                  <option value="DI TOLAK">DI TOLAK</option>
                </select>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-sm-10">
               <input type="submit" name="tombol_update" class="btn btn-primary" value="Update">
              </div>
          </div>
      </form>
      </div>
  </div>
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
