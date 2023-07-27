<section class="content-header">
    <h1>
        <b>Users</b>
        <span>Pengurus</span>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Users</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
         <div class="box-header">
            <h3 class="box-title">Data User</h3>
            <div class="pull-right">
                <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah
                </a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>Level</th>
                        <!-- <th>Petugas</th> -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($user as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?=$no++?>.</td>
                        <td><?=$data->username?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->address?></td>
                        <td><?=$data->level == 1 ? "Admin" : "Loket"?></td>
                        <!-- <td><?=$data->name_loket?></td> -->
                        <td class="text-center" width="160px">
                        <form action="<?=site_url('user/del')?>" method="post">
                                <a href="<?=site_url('user/edit/' .$data->user_id)?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <input type="hidden" name="user_id" value="<?=$data->user_id?>">
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