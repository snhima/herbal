<?php
if(isset($_GET['ubah'])){
	
	include('koneksi.php');
	
	$id_tanaman 		= $_GET['id_tanaman'];	
	$nama_tanaman 		= $_GET['nama_tanaman'];	
	$nama_latin_tanaman	= $_GET['nama_latin_tanaman'];	
	$kandungan 			= $_GET['kandungan'];	
	$manfaat			= $_GET['manfaat'];
	
	$update = mysql_query("UPDATE herbal_input SET nama_tanaman='$nama_tanaman', nama_latin_tanaman='$nama_latin_tanaman', kandungan='$kandungan', manfaat='$manfaat' WHERE id_tanaman='$id_tanaman'");
	
	if($update){
		header('Location:herbal.php');		
	}else{
		
		echo 'Gagal menambahkan data! ';
		echo '<a href="herbal.php?id='.$id_tanaman.'">Kembali</a>';
		
	}

}else{
	echo '<script>window.history.back()</script>';
}
?>