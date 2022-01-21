<?php 
session_start();
if(! isset($_SESSION['is_login']))
{
  header('location:login.php');
}

  include('library.php');
  $lib = new Library();
  $data_lap = $lib->show();

  if(isset($_GET['hapus']))
  {
      $id = $_GET['hapus'];
      $status_hapus = $lib->delete($id);
      if($status_hapus)
      {
          header('Location: home.php');
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
    <title>Starter Template · Bootstrap</title>

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

  <!-- <div class="starter-template">
    <h1>Selamat Datang <?php echo $_SESSION['nama']; ?></h1>
    <p class="lead">Belajar PHP Sangat Menyenangkan</p>
  </div> -->
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
          <th>Action</th>
      </tr>
      <?php 
          $no = 1;
          // print_r($data_lap);
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
              echo "<td><a class='btn btn-info' href='form_edit.php?id=".$row['id']."'>Proses</a>
              <a class='btn btn-danger' href='home.php?hapus=".$row['id']."'>Hapus</a></td>";
              echo "</tr>";
              $no++;
          }
      ?>
  </table>
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
