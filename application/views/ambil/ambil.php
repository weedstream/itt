<section class="content-header">
    <h1>
        <b>Ambil Antrian</b>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Ambil Antrian</a></li>
    </ol>
</section>


<section class="content">
<div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body">
                    <div class="agenda">
                        <center><h1>NOMER ANTRIAN ANDA</h1></center>
                        <HR></HR>
                        <!-- <center><h1><span id="nomer" style="font-size:100pt">10</span></h1></center> -->
                        <h1 id="nomer"><?php echo $antrian->row('nomer'); 
					        if($antrian->row('nomer') < 1){
						        $antri=0;
					        }
					        else{
						        $antri=$antrian->row('nomer');
					        }
					    ?>
					    </h1>
                    </div>
                
                   <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="date">Nama</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="Pengunjung" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Keperluan</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="member" class="form-control">
                                        <option value="">-- Silahakan pilih --</option>
                                        <?php foreach($loket as $l => $data){ ?>
                                            <input type="text" name="no_antrian" value="<?php echo $no_antrian ?>">
                                            <option value="<?=$data->loket_id?>" <?=$data->loket_id ? 'selected' : NULL?>><?= $data->keterangan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                   </table>
                   <!-- <button type="submit" name="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-print"></i>&nbsp;   PRINT</button> -->
                        <center>
							<a href="<?php echo site_url('ambil/prosses/'.$antri); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> &nbsp;Dapatkan Nomer Antrian</a>
						</center> 
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
	function nomer(){
		var antri = parseInt(document.getElementById('nomer').innerHTML)+1;
		document.getElementById("nomer").innerHTML=antri;
	}
</script>