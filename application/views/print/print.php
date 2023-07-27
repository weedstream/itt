<script type="text/javascript">
    window.onload = function() {
        window.print();
        window.location.href = "http://localhost/antrian-main/";
    }
</script>

<link href="<?php echo base_url('assets/user') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

<!-- Theme CSS -->
<link href="<?php echo base_url('assets/user') ?>/css/freelancer.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/user') ?>/lib/noty.css" rel="stylesheet">
<link href="<?php echo base_url('assets/user') ?>/lib/themes/metroui.css" rel="stylesheet">

<style>
    .bold-text {
        font-weight: 600;
        font-family: 'Montserrat', sans-serif;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 28rem; overflow: hidden;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">
                        <br>
                        <h3>SELAMAT DATANG</h3>
                        <h5>Di Pengadilan Negeri Purbalingga</h5><br>
                        <h8>Jl. Ahmadi No.80, Bancar, Kec. Purbalingga, Kabupaten Purbalingga</h8>
                        <br>
                        <br>
                    </li>
                    <li class="list-group-item text-center">
                        <?php foreach ($antrianloket as $a => $data) { ?>
                            <div class="row card-link" style="margin-left: 176px;"><?= $data->tgl_antrian_loket; date("h:i:sa"); ?></div>
                            <br>
                            <h2>ANTRIAN </h2>
                            <h1 style="font-size: 200px;"><?php echo $data->no_antrian_loket ?></h1>
                            <h4 style="font-size: 30px;"><?= $data->name_loket ?></h4>
                        <?php } ?>
                    </li>
                    <li class="list-group-item text-center">
                        <p>Silahkan Menunggu Antrian Anda Dipanggil</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
