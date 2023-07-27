<section class="content-header">
    <h1>
        <b>Users</b>
        <span>Pengurus</span>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah User</h3>
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
                            <label>Name *</label>
                            <input type="hidden" name="user_id" value="<?= $row->user_id ?>.">
                            <input type="text" name="fullname" value="<?= $this->input->post('fullname') ?? $row->name ?>" class="form-control">
                            <span class="help-block"><?= form_error('fullname') ?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control">
                            <span class="help-block"><?= form_error('username') ?></span>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label>Password *</label><small> Biarkan Kosong jika tidak diganti </small>
                            <input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control">
                            <span class="help-block"><?= form_error('password') ?></span>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label>Password Konfirmasi *</label>
                            <input type="password" name="passconf" value="<?= $this->input->post('passconf') ?>" class="form-control">
                            <span class="help-block"><?= form_error('passconf') ?></span>
                        </div>
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea type="text" name="address" class="form-control"><?= $this->input->post('address') ?? $row->address ?></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Level *</label>
                            <select type="password" name="level" value="" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1">Admin</option>
                                <option value="2" <?= $level == 2 ? 'selected' : null ?>>User</option>
                                <option value="2" <?= $level == 2 ? 'selected' : null ?>>Loket</option>
                            </select>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label>Petugas Loket *</label>
                            <select type="password" name="loket_id" value="" class="form-control">
                                <!-- <?php $loket_id = $this->input->post('loket_id') ? $this->input->post('loket_id') : $row->loket_id ?> -->
                                <option value="<?= $row->loket_id ?>" <?= $row->loket_id ? 'selected' : NULL ?>><?= $row->loket_id ?></option>
                            </select>
                            <span class="help-block"></span>
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