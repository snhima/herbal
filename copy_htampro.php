<!DOCTYPE html>
<html lang="en">
  <body>
  <form action= "herbal_frekuensi.php" class="form-horizontal " method="get">
	<div class="form-group">
		<div class="col-sm-6">
			<input type="hidden" class="form-control" name="id_tanaman">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Manfaat</label>
		<div class="col-sm-6">
			<textarea class="form-control ckeditor" name="manfaat" rows="6"></textarea>
		</div>
	</div>
	<div class="col-lg-offset-2 col-lg-10">
		<a href="herbal.php" class="btn btn-primary">Kembali</a>
		<input type="submit" class="btn btn-danger" name="simpan" value="Simpan">
	</div>
  </form>
  </body>
</html>
  
<?php
if(isset($_GET['simpan'])){
	
	include('koneksi.php');
	include('stemming.php');
	$jmlh = 0; $arr_kata=0;
	$id_tanaman 		= $_GET['id_tanaman'];	
	$nama_tanaman 		= $_GET['nama_tanaman'];	
	$nama_latin_tanaman	= $_GET['nama_latin_tanaman'];	
	$kandungan 			= $_GET['kandungan'];	
	$manfaat			= $_GET['manfaat'];
	
	$input = mysql_query("INSERT INTO herbal_input VALUES(NULL, '$nama_tanaman', '$nama_latin_tanaman', '$kandungan', '$manfaat')");
	$id_get = mysql_fetch_array(mysql_query("SELECT LAST_INSERT_ID()"))[0];
	
	$row=mysql_query("select * from herbal_input where id_tanaman='$id_get'");
	if($data=mysql_fetch_array($row)){
		$res = array('manfaat'=>$data['manfaat']);
	}	
	if($data['manfaat']){
		$kalimat_kecil = strtolower($data['manfaat']);
		$arr = explode(" ", $kalimat_kecil);
		$arr_kata = preg_replace('/[^A-Za-z0-9\ ]/', '', $arr);
	}
	$no=0; 
	$stemming[]=0;
	foreach($arr_kata as $i){
		$stopword=mysql_query("SELECT * from stoplist WHERE kata='".$i."'");
		if (mysql_num_rows($stopword)==0){
			$stemming[$no]=stemming($i);
		}
		$no+=1;
	}
	echo '<pre>'; print_r($stemming);
	
	$hasil=array_count_values($stemming); // penting
	arsort($hasil);
	foreach($hasil as $kata_dasar => $jumlah_kata){
		$masuk=mysql_query("INSERT INTO herbal_proses VALUES (NULL, '$id_get', '$jumlah_kata', '$kata_dasar')");
	}
	header('Location:herbal_frekuensi.php');
	
		//TF
		
		/*if(isset($hasil[""])){
			$batas=ceil(((count($hasil) - 1) / 100) * $jmlh);
		} else {
			$batas=ceil((count($hasil) / 100) * $jmlh);
		}
		$items=array();
		$items["rows"]=array();
		$masuk=($jmlh != 0 && $input) ? "INSERT INTO herbal_proses VALUES (NULL, '$id_get', '$)";
		
		
		
		//dimunculkan ke herbal_frekuensi.php
		
		//header('Location:herbal_frekuensi.php');
		
		//IDF // ini ditaruh sini atau herbal_frekuensi(?)
		/*if($jmlh != 0 && $input) {
			$q=mysql_query("SELECT DISTINCT id_tanaman FROM herbal_proses WHERE id_tanaman<=30");
			$n=mysql_num_rows($q);
			//$p[0] = $n[1] / $n[0];
			//$p[1] = ($n[0] - $n[1]) / $n[0];
			$q = mysql_query("SELECT DISTINCT kata_dasar FROM herbal_proses WHERE id_tanaman<=30");
			$t = mysql_num_rows($q);
			$q = mysql_query("SELECT SUM(jumlah_kata) FROM herbal_proses WHERE id_tanaman<=30");
			$text = intval(mysql_fetch_array($q));
			foreach($hasil as $a => $b) {
				if($a != "") {
					$q = mysql_query("SELECT SUM(jumlah_kata) FROM herbal_proses WHERE kata_dasar='" . mysql_real_escape_string($a) . "' AND id_tanaman<=30");
					$pc[$a] = (intval(mysql_fetch_array($q))+1)/($text+$t);
				}
			}
			$hasilC = log10($n);
			foreach($expl as $a => $b) {
				if($b != "") {
					if(isset($pc[$b])) {
						$hasilC += log10($pc[$b]);
					} else {
						$hasilC += log10(1/($text+$t));
					}
				}
			}
		} */
		//akhir IDF
		
		//header('Location:herbal_frekuensi.php');
		
/*	if($input){
		$data=mysql_query("select manfaat from herbal_input where id_tanaman='$id_tanaman'");
		while($row=mysql_fetch_array($data)){
			$kalimat_kecil = strtolower($row['manfaat'].'<br/>');
			$arr = explode(" ", $kalimat_kecil);
			$arr_kata = preg_replace('/[^A-Za-z0-9\-]/', '', $arr);
		}
		for($i=0; $i<count($arr_kata); $i++){
			$stopword=mysql_query("SELECT * from stoplist WHERE kata='".$arr_kata[$i]."'");
			if (mysql_num_rows($stopword)==0){
				$teksAsli[$i] = $arr_kata[$i];
				$stemming[$i] = stemming($teksAsli[$i]);
				//error
				$datab = $stemming[$i];
				$stopword2=mysql_query("insert into herbal_proses values('null','null','null','$datab')");
			}else{
				echo 'Gagal menambahkan data! ';
				echo '<a href="herbal.php">Kembali</a>';
			}
		//if($stemming[$i] != null) {
			$stopword3=mysql_query("select kata_dasar from herbal_proses where id_tanaman='$id_tanaman'");
			while($row2=mysql_fetch_array($stopword3)){
				echo $row2['kata_dasar'].'<br/>';
			}
	//	}		
		//header('Location:herbal_frekuensi.php');		
	}
}*/
	/*if($input){
		header('Location:herbal.php');		
	}else{
		echo 'Gagal menambahkan data! ';
		echo '<a href="herbal.php?id='.$id_tanaman.'">Kembali</a>';
	}*/
}
//}
//else{echo '<script>window.history.back()</script>';}
?>
  
