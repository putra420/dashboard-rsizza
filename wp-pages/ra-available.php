<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Logo Tittle -->
    <link href="../wp-assets/img/logo.png" type="image/png" rel="icon"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>RS IZZA CIKAMPEK</title>
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <img src="../wp-assets/img/logo.png" alt="" width="50" height="50" />
        <a class="navbar-brand" href="../">RS IZZA Cikampek</a>
      </div>
    </nav>

    <div class="container justify-content-center">
      <div clas="row">
        <div class="col">
          <h2>Room Available</h2>
          <table class="table table-hover">
            <thead class="table-success">
              <tr>
                <td>Kode Kamar</td>
                <td>Nama Kamar</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
              <?php
              include('../wp-includes/koneksi.php');
              $sql = mysqli_query($koneksi,"
                SELECT kamar.status, kamar.kd_kamar, bangsal.nm_bangsal
                FROM kamar 
                INNER JOIN bangsal 
                ON kamar.kd_bangsal=bangsal.kd_bangsal
                  WHERE kamar.status='KOSONG' 
                  AND nm_bangsal 
                  LIKE '%Azalea%'");
                if(mysqli_num_rows($sql) > 0){
                $no = 1;
                while($data = mysqli_fetch_assoc($sql)){
              ?>
              <tr>
                <td><?php echo $data['kd_kamar'];?></td>
                <td><?php echo $data['nm_bangsal'];?></td>
                <td><?php echo $data['status'];?></td>
              </tr>
                <?php $no++; }
                }else{
                echo'
                <tr bgcolor="#dee2e6">
                <td align="center" colspan="3">Data not found.</td>
                </tr>';
                }
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>