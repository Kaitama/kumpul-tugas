<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>Upload Sukses</title>
</head>
<body>
<?php
include('server/config.php');
$nirm = $_REQUEST['nirm'];
$sesi = $_REQUEST['sesi'];
$sql = "SELECT * FROM file WHERE nirm = '$nirm' AND sesi = '$sesi'";
$hsl = mysqli_query($conn, $sql);
if (mysqli_num_rows($hsl) > 0) {
  $brs = mysqli_fetch_array($hsl);
  $kls  = $brs['kelas'];
  $nama = $brs['nama'];
  $tgl  = $brs['tanggal'];
  $jam  = $brs['jam'];

  // tampilan jika sukses upload tugas
  ?>
  <main role="main" class="container">
  <div class="row">
  <div class="col-sm-12">
  <div class="card mt-4">
  <h5 class="card-header bg-success text-white">Upload Sukses</h5>
  <div class="card-body">
    <h5 class="card-title">Printscreen atau Capture Halaman ini!</h5>
    <p class="card-text text-justify">Terima kasih. <strong>TUGAS<?php echo $sesi; ?></strong> kelas <strong><?php echo $kls; ?></strong> atas nama <strong><?php echo $nama; ?></strong> dengan NIRM <strong><?php echo $nirm; ?></strong>
    berhasil di-upload pada tanggal <?php echo $tgl; ?> pukul <?php echo $jam; ?> WIB. Halaman ini merupakan tanda bukti anda telah
    mengumpulkan tugas.</p>
    <a href="index.php" class="btn btn-primary">Selesai</a>
  </div>
</div>
  </div>
  </div>
  </main>
  <?php
}
?>

<?php //include('contents/content-footer.php'); ?>