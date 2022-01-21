<?php 
  include('library.php');
  $lib = new Library();

  if(isset($_GET['no_aduan'])){
    $no_aduan = $_GET['no_aduan'];    
    $data_lap = $lib->get_by_no($no_aduan);
  }else{
    $data_lap = $lib->show();
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
      <li class="nav-item">
        <a class="nav-link" href="index.php">Lapor Aduan</a>
      </li>    
      <li class="nav-item active">
        <a class="nav-link" href="laporan.php">Lihat Aduan <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container-fluid">
  <form action="" method="get">
    <div class="form-group row">        
        <label for="no_aduan" class="col-sm-1 col-form-label">Cari Aduan</label>
        <div class="col-sm-4">
          <input type="text" name="no_aduan" class="form-control" id="no_aduan" placeholder="Masukan No Aduan">
        </div>
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary" value="Cari">Cari</button>
        </div>
    </div>    
  </form>
  <table class="table table-bordered" width="60%">
      <tr>
          <th>No</th>
          <th>No Aduan</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>HP</th>
          <th>Jns Aduan</th>
          <th>Alamat</th>
          <th>Keterangan</th>
          <th>Response</th>
      </tr>
      <?php 
          $no = 1;
          foreach($data_lap as $row)
          {
              echo "<tr>";
              echo "<td>".$no."</td>";
              echo "<td>".$row['no_aduan']."</td>";
              echo "<td>".$row['nik']."</td>";
              echo "<td>".$row['nama']."</td>";
              echo "<td>".$row['hp']."</td>";
              echo "<td>".$row['jns_aduan']."</td>";
              echo "<td>".$row['alamat']."</td>";
              echo "<td>".$row['ket']."</td>";
              echo "<td>".$row['response']."</td>";            
              $no++;
          }
      ?>
  </table>
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
