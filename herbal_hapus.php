<?php
include 'koneksi.php';
if(isset($_GET['id_tanaman']))
{
	$id_tanaman=$_GET['id_tanaman'];
	$query1=mysql_query("delete from herbal_input where id_tanaman='$id_tanaman'");
		if($query1){
			$msg="Data Berhasil Dihapus";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header('Location:herbal.php');		
		}else{
			$msg2="Gagal Dihapus";
				echo "<script type='text/javascript'>alert('$msg2');</script>";
				header('Location:herbal.php');
			
		}
}
?>