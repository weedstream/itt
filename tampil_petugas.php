<?php
$antrian = isset($antrianloket->no_antrian_loket) ? $antrianloket->no_antrian_loket : "Belum Ada Antrian";

// Audio file names for each loket number
$audio_files = array(
    "1" => "kasir.wav",
    "2" => "perdata.wav",
    "3" => "inzage.wav",
    "4" => "pidana.wav",
    "5" => "ecourt.wav",
    "6" => "hukum.wav",
    "7" => "informasi.wav",
    "8" => "umum.wav",
);
?>

<audio id="suarabel" data-tesbe="tessss" src="<?php echo base_url('audio/Airport_Bell.mp3'); ?>"></audio>
<audio id="suarabelnomorurut" src="<?php echo base_url('audio/antrian/nomor-urut.wav'); ?>"></audio>
<audio id="diloket" src="<?php echo base_url('audio/antrian/loket.wav'); ?>"></audio>

<?php
// Get the last digit of the antrian number
$last_digit = substr($antrian, -1, 1);

// Get the first digit of the antrian number
$first_digit = substr($antrian, 0, 1);

if ($antrian > 11 && $antrian < 20) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $last_digit . '.wav'); ?>"></audio>
<?php
} else if ($antrian == 20) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $first_digit . '.wav'); ?>"></audio>
<?php
} else if ($antrian > 20 && $antrian < 100) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $first_digit . '.wav'); ?>"></audio>
    <?php
    $a = substr($antrian, -1, 1);
    if ($a == 0) {
    } else {
    ?>
        <audio id="antrian1" src="<?php echo base_url('audio/antrian/' . $a . '.wav'); ?>"></audio>
    <?php
    }
} else if ($antrian > 100 && $antrian < 110) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $last_digit . '.wav'); ?>"></audio>
<?php
} else if ($antrian > 111 && $antrian < 120) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $last_digit . '.wav'); ?>"></audio>
<?php
} else if ($antrian > 119 && $antrian < 210) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $first_digit . '.wav'); ?>"></audio>
    <?php
    $a = substr($antrian, -1, 1);
    if ($a == 0) {
    } else {
    ?>
        <audio id="antrian1" src="<?php echo base_url('audio/antrian/' . $a . '.wav'); ?>"></audio>
    <?php
    }
} else if ($antrian == 210) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $first_digit . '.wav'); ?>"></audio>
<?php
} else if ($antrian == 211) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $first_digit . '.wav'); ?>"></audio>
<?php
} else if ($antrian > 211 && $antrian < 220) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $first_digit . '.wav'); ?>"></audio>
    <audio id="antrian1" src="<?php echo base_url('audio/antrian/' . $last_digit . '.wav'); ?>"></audio>
<?php
} else if ($antrian > 219 && $antrian < 1000) {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $first_digit . '.wav'); ?>"></audio>
    <?php
    $a = substr($antrian, 1, 1);
    $b = substr($antrian, -1, 1);
    echo "<audio id='antrian1' src='" . base_url('audio/antrian/' . $a) . ".wav'></audio>";
    echo "<audio id='antrian2' src='" . base_url('audio/antrian/' . $b) . ".wav'></audio>";
} else {
    ?>
    <audio id="antrian" src="<?php echo base_url('audio/antrian/' . $antrian . '.wav'); ?>"></audio>
<?php
}
?>

<audio id="<?= "loket" . $this->fungsi->user_login()->loket_id ?>" src="<?= base_url('audio/antrian/' . $audio_files[$this->fungsi->user_login()->loket_id]); ?>"></audio>
<!-- Rest of the code remains the same -->


<audio id="<?= "loket" . $this->fungsi->user_login()->loket_id ?>" src="<?= base_url('audio/antrian/' . $this->fungsi->user_login()->loket_id . '.wav'); ?>"></audio>
<audio id="sepuluh" src="<?php echo base_url('audio/antrian/sepuluh.wav'); ?>"></audio>
<audio id="sebelas" src="<?php echo base_url('audio/antrian/sebelas.wav'); ?>"></audio>
<audio id="seratus" src="<?php echo base_url('audio/antrian/seratus.wav'); ?>"></audio>
<audio id="belas" src="<?php echo base_url('audio/antrian/belas.wav'); ?>"></audio>
<audio id="puluh" src="<?php echo base_url('audio/antrian/puluh.wav'); ?>"></audio>
<audio id="ratus" src="<?php echo base_url('audio/antrian/ratus.wav'); ?>"></audio>


<section class="content-header">
    <h1><?= ucfirst($this->fungsi->user_login()->name) ?>
        <small>Layar Petugas Loket</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('tampil/index') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Layar Petugas Loket</li>
    </ol>
</section>


<section class="content">
    <!-- START ALERTS AND CALLOUTS -->
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div>
                        <h3 class="box-title"> <i class="fa fa-users"></i> Antrian Pelayanan</h3>

                        <div class="pull-right">
                            <a href="" class="btn btn-primary btn-flat" onclick="startAutoRefresh();">
                                <i class="fa fa-refresh"></i> Refresh
                            </a>

                            <script>
                                function startAutoRefresh() {
                                    setInterval(function() {
                                        location.reload();
                                    }, 5000); // Refresh setiap 5 detik (5000 milidetik)
                                }
                            </script>

                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box box-solid" style="background: whitesmoke;">
                        <div class="box-body">
                            <Center>
                                <b>
                                    <p style="font-size: 22pt;">Nomer Antrian</p>
                                    <hr>
                                    <p style="font-size: 70pt;"><?= isset($antrian) ? $antrian : "Silahkan Refresh" ?></p>
                                </b>
                                <hr>
                                <p class="" style="font-size: 10;">Status : <?= isset($antrianloket->status) ? $antrianloket->status : "-" ?></p>
                            </Center>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="box box-success">
                        <div class="box-body">
                            <div class="row d-grid gap-2 d-md-block mx-auto">
                                <div class="col-md-3">
                                    <center>

                                        <button class="btn btn-warning btn-block btn-panggil" data-loket="<?= $this->fungsi->user_login()->loket_id ?>" data-antrian="<?= isset($antrian) ? $antrian : null ?>" data-action="<?= site_url('tampil/updateStatus') ?>"><i class="fa fa-phone"></i>&nbsp; Panggil</button>

                                    </center>
                                </div>
                                <div class="col-md-3">
                                    <center>
                                        <button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#modal-info"><i class="fa fa-check"></i>&nbsp; Selesai</button>
                                    </center>
                                </div>
                                <div class="col-md-3">
                                    <center>
                                        <a href="<?= isset($antrianloket->no_antrian_loket) ? site_url('tampil/getNext') . '/' . $antrianloket->no_antrian_loket : 'javascript:void(0)' ?>">
                                            <button class="btn btn-success btn-block"><i class="fa fa-mail-forward"></i>&nbsp; Selanjutnya</button>
                                        </a>
                                    </center>
                                </div>
                                <div class="col-md-3">
                                    <center>
                                        <button class="btn btn-danger btn-block" type="button" data-toggle="modal" data-target="#modal-batal"><i class="fa fa-remove "></i>&nbsp; Batal</button>

                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div>
                        <h3 class="box-title">Pelayanan <?= ucfirst($this->fungsi->user_login()->name) ?> hari ini</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover" id="table2">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nomer Antrian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($antrianlo as $key => $data) { ?>
                                <tr>
                                    <td style="width:5%;"><?= $no++ ?>.</td>
                                    <td><b><?= $data->no_antrian_loket ?> </b> </td>
                                    <td><?= $data->status ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>


                </div>
                <div class="box box-solid" style="background: whitesmoke;">
                    <div class="box-body">

                        Total Pelayanan Saat ini : <b>1</b>

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- END ALERTS AND CALLOUTS -->

    <!-- modal -->
    <div class="modal modal-default fade" id="modal-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Alert</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah pelayanan sudah selesai&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= site_url('tampil/sudah') . '/' . $antrianloket->id_antrian_loket . '/' . $antrianloket->no_antrian_loket ?>">
                        <button type="button" class="btn btn-success">
                            Selesai
                        </button>
                    </a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal modal-default fade" id="modal-batal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Alert</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah pelayanan ini dibatalkan ?&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= site_url('tampil/batal') . '/' . $antrianloket->id_antrian_loket . '/' . $antrianloket->no_antrian_loket ?>">
                        <button type="button" class="btn btn-success">
                            Selesai
                        </button>
                    </a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</section>
