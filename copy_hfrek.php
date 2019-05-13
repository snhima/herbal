<?php 
	include 'header.php'; 
	//include 'herbal_tambah_proses.php'; 
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

							 if(isset($_GET['simpan'])){
								$id_tanaman = $_GET['id_tanaman'];
								$manfaat 	= $_GET['manfaat'];
							
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
								$data = mysql_query("select * from herbal_proses where id_tanaman='$id_tanaman'");
								$total = mysql_num_rows($data);
								$pages = ceil($total/$halaman);
								//$data = mysql_query($query);
								$data2 = mysql_query("select * from herbal_proses where id_tanaman='$id_tanaman' LIMIT '$mulai', '$halaman'");		
									
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
						
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
	</section>
	<!--main content end-->