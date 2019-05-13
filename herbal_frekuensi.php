
<?php 
	session_start();
	include 'header.php';
?>
<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
		  	<div class="row">
				<div class="col-lg-12">
				</div>
			</div>
            
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Hasil Stemming</header>
                        <div class="panel-body">
						
							<?php 
								include 'koneksi.php';
								if(isset($_SESSION['id_tanaman'])){
									$id_get = $_SESSION['id_tanaman'];
							?>

                            <table class="table table-bordered table-striped">
                            <tbody>
                              <tr>
								 <th col-lg-2> Kata</th>
								 <th col-lg-2> Frekuensi</th>
                              </tr>
                            
							  <?php
								$halaman = 20; //batasan halaman
								$page = isset($_GET['halaman']) ? (int)$_GET["halaman"] : 1;
								$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
								$data = mysql_query("select kata_dasar, jumlah_kata from herbal_proses where id_tanaman='$id_get'");
								$total = mysql_num_rows($data);
								$pages = ceil($total/$halaman);
								$data2 = mysql_query("select kata_dasar, jumlah_kata from herbal_proses where id_tanaman='$id_get' LIMIT $mulai, $halaman");		
									
								$no=$mulai;
								while($row=mysql_fetch_array($data2)){
								$no++;
							  ?>
							  
							  <tr>
                                 <td><?php echo $row['kata_dasar'];?></td>
                                 <td><?php echo $row['jumlah_kata'];?></td>
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
								<?php }} ?>
	                          	</ul>
                      		</div>
							<div class="col-lg-offset-2 col-lg-10">
                                <a href="herbal.php" class="btn btn-primary">Kembali</a>
                            </div>
						
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
	</section>
	<!--main content end-->