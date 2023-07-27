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
            <h3 class="box-title">Edit loket</h3>
            <div class="pull-right">
                <a href="<?=site_url('loket')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group <?=form_error('name_loket') ? 'has-error' : null?>">
                            <label>Nama *</label>
                            <input type="hidden" name="loket_id" value="<?=$row->loket_id?>.">
                            <input type="text" name="name_loket" value="<?=$this->input->post('name_loket') ?? $row->name_loket?>" class="form-control">
                            <span class="help-block"><?=form_error('name_loket')?></span>
                        </div>
                        <div class="form-group <?=form_error('kode_loket') ? 'has-error' : null?>">
                            <label>Kode_loket *</label>
                            <input type="hidden" name="loket_id" value="<?=$row->loket_id?>.">
                            <input type="text" name="kode_loket" value="<?=$this->input->post('kode_loket') ?? $row->kode_loket?>" class="form-control">
                            <span class="help-block"><?=form_error('name')?></span>
                        </div>
                        <div class="form-group <?=form_error('keterangan') ? 'has-error' : null?>">
                            <label>Keterangan *</label>
                            <input type="text" name="keterangan" value="<?=$this->input->post('keterangan')?>" class="form-control">
                            <span class="help-block"><?=form_error('keterangan')?></span>
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