<?php include 'header.php'; ?>

<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
		  	<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_genius"></i> Data Herbal</h3>
				</div>
			</div>
            
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Data Herbal</header>
                        <div class="panel-body">

                            <form action="herbal_tambah.php" class="form-horizontal " method="get">
                                <div class="col-lg-offset-12 col-lg-10">
                                	<button style="margin-bottom: 20px" type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
                                </div>
                            </form>

                            <form action="herbal.php" method="get">
								<div style="margin-bottom: 20px" class="input-group col-md-5 col-md-offset-7">
									<span class="input-group-addon" id="basic-addon1"><span class="fa fa-search"></span></span>
									<input type="text" class="form-control" placeholder="Cari Tanaman" aria-describedby="basic-addon1" name="cari">
								</div>
							</form>
							
							<?php 
							 include 'koneksi.php';

							 if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
							 }
							?>

                            <table class="table table-bordered table-striped">
                            <tbody>
                              <tr>
                              	 <th> No</th>
                                 <th class="col-lg-2"> Nama Tanaman</th>
								 <th class="col-lg-2"> Nama Latin Tanaman</th>
                                 <th> Kandungan</th>
                                 <th> Manfaat</th>
                                 <th class="col-lg-2"> Aksi</th>
                              </tr>
							  
							  <?php
								$halaman = 5; //batasan halaman
								$page = isset($_GET['halaman']) ? (int)$_GET["halaman"] : 1;
								$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
								$data = mysql_query("select * from herbal_input");
								$total = mysql_num_rows($data);
								$pages = ceil($total/$halaman);
								//$data = mysql_query($query);
									if(isset($_GET['cari'])){
										$cari = $_GET['cari'];
										$data = mysql_query("select * from herbal_input where nama_tanaman like '%".$cari."%'");				
									}else{
										$data = mysql_query("select * from herbal_input LIMIT $mulai, $halaman");		
									}
								$no=$mulai;
								while($row=mysql_fetch_array($data)){
								$no++;
							  ?>
								
                              <tr>
                              	 <td><?php echo $no;?></td>
                                 <td><?php echo $row['nama_tanaman'];?></td>
                                 <td><?php echo $row['nama_latin_tanaman'];?></td>
                                 <td><?php echo $row['kandungan'];?></td>
                                 <td><?php echo $row['manfaat'];?></td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-success" href="herbal_ubah.php?id_tanaman=<?php echo $row['id_tanaman']; ?>" name="ubah"><i class="fa fa-pencil"></i></a>
                                      <a class="btn btn-danger" href="herbal_hapus.php?id_tanaman=<?php echo $row['id_tanaman']; ?>"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
							  <?php
								}
							  ?>
                            </tbody>
                            </table>
                       		<div>
                          		<ul class="pagination">
								  <?php for($i=1; $i<=$pages; $i++){ ?>
								  <li><a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
								  <?php } ?>
	                          	</ul>
                      		</div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
	</section>
	<!--main content end-->