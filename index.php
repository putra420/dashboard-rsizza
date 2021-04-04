<?php
include('wp-includes/koneksi.php');
include('wp-includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Logo Tittle -->
    <link href="wp-assets/img/logo.png" type="image/png" rel="icon"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Chart.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <title>RS IZZA CIKAMPEK</title>
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <img src="wp-assets/img/logo.png" alt="" width="50" height="50" />
        <a class="navbar-brand" href="">RS IZZA Cikampek</a>
      </div>
    </nav>
    <div class="container-fluid justify-content-center">
      <!-- Chart JS Covid 19 -->
      <div class="row">
        <h1 class="text-center">System Informasi Covid 19</h1>
        <canvas id="covid19"></canvas>
      </div>

      <!-- Information Gender Covid 19 -->
      <center>
      <div class="row m-4">
        <div class="col">
          <a href="wp-pages/co-male.php" style="text-decoration: none; color: green;">
            <div class="card shadow">
              <h1 class="mt-5">
              <?php 
                $jumlah_avb = mysqli_query($koneksi,"
                SELECT pasien.no_rkm_medis,pasien.nm_pasien,pasien.jk,kamar_inap.kd_kamar,kamar_inap.tgl_masuk,kamar_inap.tgl_keluar,bangsal.nm_bangsal 
                FROM pasien 
                INNER JOIN reg_periksa 
                  ON pasien.no_rkm_medis = reg_periksa.no_rkm_medis 
                  INNER JOIN kamar_inap 
                  ON reg_periksa.no_rawat = kamar_inap.no_rawat 
                    INNER JOIN kamar 
                    ON kamar_inap.kd_kamar = kamar.kd_kamar 
                      INNER JOIN bangsal 
                      ON bangsal.kd_bangsal = kamar.kd_bangsal 
                WHERE kamar_inap.stts_pulang = '-' 
                  AND pasien.jk = 'L' 
                  AND bangsal.nm_bangsal LIKE '%Azalea%'");
              echo mysqli_num_rows($jumlah_avb);
              ?>
              </h1>
              <div class="card-body">
                <hr>
                <p class="card-text">Male</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="wp-pages/co-female.php" style="text-decoration: none; color: green;">
            <div class="card shadow">
              <h1 class="mt-5">
              <?php 
                $jumlah_avb = mysqli_query($koneksi,"
                SELECT pasien.no_rkm_medis,pasien.nm_pasien,pasien.jk,kamar_inap.kd_kamar,kamar_inap.tgl_masuk,kamar_inap.tgl_keluar,bangsal.nm_bangsal 
                FROM pasien 
                INNER JOIN reg_periksa 
                  ON pasien.no_rkm_medis = reg_periksa.no_rkm_medis 
                  INNER JOIN kamar_inap 
                  ON reg_periksa.no_rawat = kamar_inap.no_rawat 
                    INNER JOIN kamar 
                    ON kamar_inap.kd_kamar = kamar.kd_kamar 
                      INNER JOIN bangsal 
                      ON bangsal.kd_bangsal = kamar.kd_bangsal 
                WHERE kamar_inap.stts_pulang = '-' 
                  AND pasien.jk = 'P' 
                  AND bangsal.nm_bangsal LIKE '%Azalea%'");
              echo mysqli_num_rows($jumlah_avb);
              ?>
              </h1>
              <div class="card-body">
                <hr>
                <p class="card-text">Female</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="wp-pages/co-children.php" style="text-decoration: none; color: green;">
            <div class="card shadow">
              <h1 class="mt-5">89</h1>
              <div class="card-body">
                <hr>
                <p class="card-text">Children</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      </center>

      <!-- Informasi Rencana Pulang -->
      <div class="row m-4">
        <h1 class="text-center">Rencana Pasien Pulang</h1>
        <hr>
      </div>
      <center>
      <div class="row m-4">
        <div class="col">
          <a href="wp-pages/bpjs-claimed.php" style="text-decoration: none; color: green;">
            <div class="card shadow">
              <h1 class="mt-5">1465</h1>
              <div class="card-body">
                <hr>
                <p class="card-text">Laki - Laki</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="wp-pages/bpjs-unclaimed.php" style="text-decoration: none; color: green;">
            <div class="card shadow">
              <h1 class="mt-5">127</h1>
              <div class="card-body">
                <hr>
                <p class="card-text">Perempuan</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      </center>

      <!-- Information Room Available -->
      <div class="row m-4">
        <h1 class="text-center">Room Available</h1>
        <hr>
        <!-- Doughtnut Room Available -->
        <canvas id="roomAvailabel"></canvas>
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="wp-pages/ra-used.php" type="button" class="btn btn-warning">Occupied</a>
          <a href="wp-pages/ra-available.php" type="button" class="btn btn-primary">Available</a>
        </div>
      </div>

      <!-- Information Klaim -->
      <div class="row m-4">
        <h1 class="text-center">Klaim BPJS</h1>
        <hr>
      </div>
      <center>
      <div class="row m-4">
        <div class="col">
          <a href="wp-pages/bpjs-claimed.php" style="text-decoration: none; color: green;">
            <div class="card shadow">
              <h1 class="mt-5">1465</h1>
              <div class="card-body">
                <hr>
                <p class="card-text">Claimed</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="wp-pages/bpjs-unclaimed.php" style="text-decoration: none; color: green;">
            <div class="card shadow">
              <h1 class="mt-5">127</h1>
              <div class="card-body">
                <hr>
                <p class="card-text">Not Claimed</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      </center>

    </div><!-- container-fluid justify-content-center -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Start Chat Working Progress -->
    <script>
      var ctx = document.getElementById("covid19").getContext('2d');
      var covid19 = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Negatif", "Positif", "Rawat", "Meninggal"],
          datasets: [{
            label: '',
            data: [
            <?php 
            $neg_month = date('m');
            $negatif = mysqli_query($koneksi,"
              SELECT pasien.no_rkm_medis,pasien.nm_pasien,pasien.jk,kamar_inap.kd_kamar,kamar_inap.tgl_masuk,kamar_inap.tgl_keluar,bangsal.nm_bangsal
              FROM pasien 
              INNER JOIN reg_periksa 
              ON pasien.no_rkm_medis = reg_periksa.no_rkm_medis 
                INNER JOIN kamar_inap 
                ON reg_periksa.no_rawat = kamar_inap.no_rawat 
                  INNER JOIN kamar 
                  ON kamar_inap.kd_kamar = kamar.kd_kamar 
                    INNER JOIN bangsal 
                    ON bangsal.kd_bangsal = kamar.kd_bangsal 
              WHERE kamar_inap.stts_pulang = 'Atas Persetujuan Dokter' 
                AND bangsal.nm_bangsal LIKE '%Azalea%'
                AND kamar_inap.tgl_keluar = $neg_month; 
              ");
            echo mysqli_num_rows($negatif);
            ?>,
            <?php 
            $pos_month = date('m');
            $positif = mysqli_query($koneksi,"
              SELECT pasien.no_rkm_medis,pasien.nm_pasien,pasien.jk,kamar_inap.kd_kamar,kamar_inap.tgl_masuk,kamar_inap.tgl_keluar,bangsal.nm_bangsal
              FROM pasien 
              INNER JOIN reg_periksa 
              ON pasien.no_rkm_medis = reg_periksa.no_rkm_medis 
                INNER JOIN kamar_inap 
                ON reg_periksa.no_rawat = kamar_inap.no_rawat 
                  INNER JOIN kamar 
                  ON kamar_inap.kd_kamar = kamar.kd_kamar 
                    INNER JOIN bangsal 
                    ON bangsal.kd_bangsal = kamar.kd_bangsal 
              WHERE kamar_inap.stts_pulang = '-' 
                AND bangsal.nm_bangsal LIKE '%Azalea%'
                AND kamar_inap.tgl_keluar = $pos_month;
              ");
            echo mysqli_num_rows($positif);
            ?>, 
            <?php 
            $rwt_month = date('m');
            $rawat = mysqli_query($koneksi,"
              SELECT pasien.no_rkm_medis,pasien.nm_pasien,pasien.jk,kamar_inap.kd_kamar,kamar_inap.tgl_masuk,kamar_inap.tgl_keluar,bangsal.nm_bangsal
              FROM pasien 
              INNER JOIN reg_periksa 
              ON pasien.no_rkm_medis = reg_periksa.no_rkm_medis 
                INNER JOIN kamar_inap 
                ON reg_periksa.no_rawat = kamar_inap.no_rawat 
                  INNER JOIN kamar 
                  ON kamar_inap.kd_kamar = kamar.kd_kamar 
                    INNER JOIN bangsal 
                    ON bangsal.kd_bangsal = kamar.kd_bangsal 
              WHERE kamar_inap.stts_pulang = '-'  
                AND bangsal.nm_bangsal LIKE '%Azalea%'
                AND kamar_inap.tgl_keluar = $rwt_month;
              ");
            echo mysqli_num_rows($rawat);
            ?>, 
            <?php 
            $men_month = date('m');
            $meninggal = mysqli_query($koneksi,"
              SELECT pasien.no_rkm_medis,pasien.nm_pasien,pasien.jk,kamar_inap.kd_kamar,kamar_inap.tgl_masuk,kamar_inap.tgl_keluar,bangsal.nm_bangsal
              FROM pasien 
              INNER JOIN reg_periksa 
              ON pasien.no_rkm_medis = reg_periksa.no_rkm_medis 
                INNER JOIN kamar_inap 
                ON reg_periksa.no_rawat = kamar_inap.no_rawat 
                  INNER JOIN kamar 
                  ON kamar_inap.kd_kamar = kamar.kd_kamar 
                    INNER JOIN bangsal 
                    ON bangsal.kd_bangsal = kamar.kd_bangsal 
              WHERE kamar_inap.stts_pulang = 'Meninggal'  
                AND bangsal.nm_bangsal LIKE '%Azalea%'
                AND kamar_inap.tgl_keluar = $men_month;
                ");
            echo mysqli_num_rows($meninggal);
            ?>
            ],
            backgroundColor: [
            'rgba(54, 162, 235, 0.2)', //Negatif
            'rgba(255, 206, 86, 0.2)', //Positif
            'rgba(75, 192, 192, 0.2)', //Rawat
            'rgba(255, 99, 132, 0.2)' //Meninggal
            ],
            borderColor: [
            'rgba(54, 162, 235, 1)', //Negatif
            'rgba(255, 206, 86, 1)', //Positif
            'rgba(75, 192, 192, 1)', //Rawat
            'rgba(255,99,132,1)' //Meninggal
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        }
      });
    </script>
    <!-- Finish Chat Working Progress -->
    
      <!-- Start Chat roomAvailabel -->
      <script>
        var cty = document.getElementById("roomAvailabel").getContext('2d');
        var myChart = new Chart(cty, {
          type: 'doughnut',
          data: {
            labels: ["Available", "Occupied"],
            datasets: [{
              label: 'Room Available',
              data: [
              <?php 
              $jumlah_avb = mysqli_query($koneksi,"
                SELECT kamar.status, bangsal.nm_bangsal 
                FROM kamar 
                INNER JOIN bangsal 
                ON kamar.kd_bangsal=bangsal.kd_bangsal 
                  WHERE kamar.status='KOSONG' 
                  AND bangsal.nm_bangsal 
                  LIKE '%Azalea%'");
              echo mysqli_num_rows($jumlah_avb);
              ?>, 
              <?php 
              $jumlah_occ = mysqli_query($koneksi,"
                SELECT kamar.status, bangsal.nm_bangsal 
                FROM kamar 
                INNER JOIN bangsal 
                ON kamar.kd_bangsal=bangsal.kd_bangsal 
                  WHERE kamar.status='ISI' 
                  AND bangsal.nm_bangsal 
                  LIKE '%Azalea%'");
              echo mysqli_num_rows($jumlah_occ);
              ?>
              ],
              backgroundColor: [
              'rgba(54, 162, 235, 0.2)', //Available
              'rgba(255, 206, 86, 0.2)' //Occupied
              ],
              borderColor: [
              'rgba(54, 162, 235, 1)', //Available
              'rgba(255, 206, 86, 1)' //Occupied
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        });
      </script>
      <!-- Finish Chat roomAvailabel -->

  </body>
</html>
