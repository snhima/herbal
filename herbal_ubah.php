<?php include 'header.php'; ?>

<!--main content start-->
	<section id="main-content">
    	<section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_genius"></i> Ubah Data Herbal</h3>
				</div>
			</div>
			
			<!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Ubah Data Herbal</header>
                        <div class="panel-body">
						
                            <form action= "herbal_ubah_proses.php" class="form-horizontal " method="get">         
								 <?php 
								 include "koneksi.php";
								 
						$id_tanaman = $_GET['id_tanaman'];
						
						$query = "select * from herbal_input where id_tanaman='$id_tanaman'";
						$data = mysql_query($query);
						while ($hasil = mysql_fetch_array($data)){
						
						?>
								 <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="hidden" class="form-control" name="id_tanaman" value="<?php echo $hasil['id_tanaman'];?>">
                                    </div>
                                </div><div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Tanaman</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nama_tanaman" value="<?php echo $hasil['nama_tanaman'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Latin Tanaman</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nama_latin_tanaman" value="<?php echo $hasil['nama_latin_tanaman'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                  	<label class="control-label col-sm-2">Kandungan</label>
                                  	<div class="col-sm-6">
                                      	<textarea class="form-control ckeditor" name="kandungan" rows="6"><?php echo $hasil['kandungan'];?></textarea>
                                  	</div>
                              	</div>
                              	<div class="form-group">
                                  	<label class="control-label col-sm-2">Manfaat</label>
                                  	<div class="col-sm-6">
                                      	<textarea class="form-control ckeditor" name="manfaat" rows="6"><?php echo $hasil['manfaat'];?></textarea>
                                  	</div>
                              	</div>
                                <div class="col-lg-offset-2 col-lg-10">
                                	<a href="herbal.php" class="btn btn-primary">Kembali</a>
                                	<input type="submit" class="btn btn-danger" name="ubah" value="Ubah">
                                </div>
								 <?php  }?>
                            </form>
							
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->

          </section>
      </section>
      <!--main content end-->