<section class="content-header">
    <h1>
        <b>Users</b>
        <span>Pengurus</span>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Kasir</h3>
            <div class="pull-right">
                <a href="<?= site_url('user') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form action="" method="post">
                        <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                            <label>Nama *</label>
                            <input type="text" name="fullname" value="<?= set_value('fullname') ?>" class="form-control">
                            <span class="help-block"><?= form_error('fullname') ?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
                            <span class="help-block"><?= form_error('username') ?></span>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label>Password *</label>
                            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control">
                            <span class="help-block"><?= form_error('password') ?></span>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label>Password Konfirmasi *</label>
                            <input type="password" name="passconf" class="form-control">
                            <span class="help-block"><?= form_error('passconf') ?></span>
                        </div>
                        <div class="form-group <?= form_error('address') ? 'has-error' : null ?>">
                            <label>Alamat *</label>
                            <textarea type="text" name="address" class="form-control"><?= set_value('address') ?></textarea>
                            <span class="help-block"><?= form_error('address') ?></span>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                            <label>Level *</label>
                            <select type="password" name="level" value="<?= set_value('level') ?>" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Loket</option>
                            </select>
                            <span class="help-block"><?= form_error('level') ?></span>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                            <label>Level *</label>
                            <select name="loket_id" class="form-control">
                                <option value="">-- Pilih loket --</option>
                                <?php foreach ($loket as $l => $data) { ?>
                                    <option value="<?= $data->loket_id ?>"><?= $data->name_loket ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?= form_error('loket_id') ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                            <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>