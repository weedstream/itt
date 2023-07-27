<section class="content-header">
    <!-- <h1>Loket 1
        <small>Layar Petugas Loket</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('tampil/index') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Layar Petugas Loket</li>
    </ol> -->
</section>

<section class="content">
    <!-- START ALERTS AND CALLOUTS -->
    <div class="row">
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div>
                        <h3 class="box-title"> Antrian Pelayanan</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box box-solid">
                        <div class="box-body">
                            <table class="table table-bordered text-center">
                                <THead class="bg-green" style="font-size: 12pt;">
                                    <tr>
                                        <th>Tempat</th>
                                        <th>Nomer Antrian</th>
                                    </tr>
                                </THead>
                                <TBody class="bg-green" style="font-size: 16pt;">

                                    <?php foreach ($loket as $key => $l) { ?>
                                        <tr>
                                            <td><b><?= $l->name_loket ?></b></td>
                                            <td id="antrian<?= $l->loket_id; ?>"><b></b></td>

                                            <script type="text/javascript">
                                                setInterval(function() {
                                                    var lok = <?php echo $l->loket_id; ?>;
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "<?php echo site_url('tampil/get_antri/'); ?>",
                                                        data: "loket_id=" + lok,
                                                        success: function(data) {
                                                            let antrian = JSON.parse(data);
                                                            document.getElementById("antrian<?php echo $l->loket_id ?>").innerHTML = antrian.antri.no_antrian_loket;
                                                        }
                                                    })
                                                }, 1000);
                                            </script>

                                        </tr>
                                    <?php } ?>

                                </TBody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-7">
            <div class="box box-warning text-center">
                <div class="card">
                    <!-- header time -->
                    <div class="card-header" style="font-size: 12pt;">
                        Layanan Terpadu
                    </div>
                    <!-- header /.time -->
                    <!-- body video -->
                    <div class="card-body">
                        <div class="ratio ratio-16x9">
                            <video autoplay loop muted>
                                <!-- change video -->
                              <source src="<?= base_url() ?>assets/dist/video/videopn.mp4" type=" video/mp4">
                            </video>
                        </div>
                    </div>
                    <!-- body /.video -->
                    <!-- footer -->
                    <div class="card-footer text-muted" style="font-size: 8pt;" id="time">
                        <!-- <p id="time"></p> -->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                        <script type="text/javascript">
                            var timestamp = '<?= time(); ?>';

                            function updateTime() {
                                $('#time').html(Date(timestamp));
                                timestamp++;
                            }
                            $(function() {
                                setInterval(updateTime, 1000);
                            });
                        </script>
                    </div>
                    <!-- footer -->
                </div>
            </div>
            <!-- /.col content video -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- END ALERTS AND CALLOUTS -->
</section>


</html>