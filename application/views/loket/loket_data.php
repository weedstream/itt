<section class="content-header">
    <h1>
        <b>Loket</b>
        <span>Pengadilan Negeri Purbalingga</span>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-desktop"></i> Loket</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
         <div class="box-header">
            <!-- <h3 class="box-title">Data Loket</h3> -->
            <div class="pull-right">
                <a href="<?=site_url('loket/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah
                </a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kode Loket</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?=$no++?>.</td>
                        <td><?=$data->name_loket?></td>
                        <td><?=$data->kode_loket?></td>
                        <td><?=$data->keterangan?></td>
                        <td class="text-center" width="160px">
                        <form action="<?=site_url('loket/del')?>" method="post">
                                <a href="<?=site_url('loket/edit/' .$data->loket_id)?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <input type="hidden" name="loket_id" value="<?=$data->loket_id?>">
                                <button onclick="return confirm('Apakah Anda Yakin ?')"class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>