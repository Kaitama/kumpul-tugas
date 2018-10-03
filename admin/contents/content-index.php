<?php
include('../server/config.php');
$qkls   = "SELECT * FROM folder";
$hkls   = mysqli_query($conn, $qkls);
if (mysqli_num_rows($hkls) > 0) {
    $bkls   = mysqli_fetch_array($hkls);
    $kls    = $bkls['kelasf'];
    $ses    = $bkls['sesif'];
}
$kls    = explode(",", $kls);
$jkls   = count($kls);
?>
<div class="row mt-4 mb-4">
<?php
for($j=1; $j<=$ses; $j++){
    ?>
    <div class="col-sm-12 mt-4">
    <h4 class="text-info"><i class="material-icons align-bottom">drag_indicator</i> <span class="align-middle">Data Tugas <?php echo $j; ?></span></h4>
    <hr class="bg-warning">
    </div>
    <?php
    for($i=0; $i<$jkls; $i++){
        $x = 0;
        $qdata  = "SELECT * FROM file WHERE kelas = '$kls[$i]' AND sesi = '$j'";
        $hdata  = mysqli_query($conn, $qdata);
        if(mysqli_num_rows($hdata) > 0){
            while($ttl = mysqli_fetch_array($hdata)){
                $x = $x + 1;
            }
        }

        ?>
        <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
        <div class="card border-info">
        <h5 class="card-header bg-info text-white"><?php echo $kls[$i]; ?></h5>
        <div class="card-body">
        <h1 class="card-title display-1 text-center text-info"><?php echo $x; ?></h1>
        <p class="card-text text-center text-secondary"><i>Mahasiswa telah mengumpulkan tugas.</i></p>
        </div>
        </div>
        </div>
        <?php
    }
}
?>
</div>