<?php
require_once 'conn.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>B1 ENDPOINT</title>
	<style type="text/css">
		.table{
			width: 80%;
			height: 400px;
			overflow: scroll;
		}
		.table table{
			font-size: 11px;
		}
	</style>
</head>
<body>
<form method="post" action="">
	<label for="filter_by">Filter Berdasarkan: </label><br>
	<select name="filter_by" id="filter_by" required="">
		<option value=""></option>
		<option>PRODUK</option>
		<option>BUC</option>
		<option>OWNERSHIP</option>
		<option>PRIME</option>
		<option>SEKTOR</option>
		<option>SEGMENT</option>
		<option>STATUS DOWNGRADE</option>
		<option>FAR</option>
		<option>JAMINAN</option>
	</select><br><br>
	<label for="value_filter">Nilai Filter</label><br>
	<input type="text" name="value_filter" id="value_filter" required=""><br><br>
	<input type="submit" name="submit" id="submit" value="FILTER">
</form><br>

<?php
	if ($_POST['submit']) {
		$FILTER=$_POST['filter_by'];
		$VALUE=$_POST['value_filter'];
		if ($FILTER !='' || $FILTER !=0) {
			if ($VALUE!='' || $VALUE !=0) {
				$query= "SELECT * FROM data1 WHERE $FILTER='$VALUE'";
				$execute=mysqli_query($conn, $query);
				$no=1;
				if (mysqli_num_rows($execute)>0) {
?>
<div class="table">
	<table border="1">
		<tr>
			<th>No</th>
			<th>DATE</th>
			<th>CABANG</th>
			<th>CIF</th>
			<th>NO REK</th>
			<th>NASABAH</th>
			<th>GROUP NASABAH</th>
			<th>CUSTOMER RATING</th>
			<th>PRODUK</th>
			<th>OWNERSHIP</th>
			<th>PRIME</th>
			<th>SEKTOR</th>
			<th>SEGMENT</th>
			<th>BUC</th>
			<th>NIP RM</th>
			<th>NAMA RM</th>
			<th>KOLEKTABILITAS</th>
			<th>RESTRU</th>
			<th>LIMIT</th>
			<th>BADE</th>
			<th>VALUTA</th>
			<th>KURS</th>
			<th>TANGGAL PEMBUKAAN</th>
			<th>TANGGAL JATUH TEMPO</th>
			<th>NILAI RY</th>
			<th>RATE</th>
			<th>WRITE OFF</th>
			<th>STATUS DOWNGRADE</th>
			<th>DAY PART DUE</th>
			<th>FAR</th>
			<th>JAMINAN</th>
		</tr>
<?php
					while ($data=mysqli_fetch_assoc($execute)) { 
?>
		<tr>
			<td><?= $no++;?></td>
			<td><?= $data['DATE'];?></td>
			<td><?= $data['CABANG'];?></td>
			<td><?= $data['CIF'];?></td>
			<td><?= $data['NO_REK']?></td>
			<td><?= $data['NASABAH']?></td>
			<td><?= $data['GROUP_NASABAH']?></td>
			<td><?= $data['CUSTOMER_RATING']?></td>
			<td 
				<?php 
					if($FILTER=='PRODUK'){
						echo "style='background-color: red;'";
					}?>>
				<?= $data['PRODUK']?>
			</td>
			<td 
				<?php 
					if($FILTER=='OWNERSHIP'){
						echo "style='background-color: red;'";
					}?>>
				<?= $data['OWNERSHIP']?>
			</td>
			<td 
				<?php 
					if($FILTER=='PRIME'){
						echo "style='background-color: red;'";
					}?>>
				<?= $data['PRIME']?>
			</td>
			<td 
				<?php 
					if($FILTER=='SEKTOR'){
						echo "style='background-color: red;'";
					}?>>
				<?= $data['SEKTOR']?>		
			</td>
			<td 
				<?php 
					if($FILTER=='SEGMENT'){
						echo "style='background-color: red;'";
					}?>>
				<?= $data['SEGMENT']?>		
			</td>
			<td 
				<?php 
					if($FILTER=='BUC'){
						echo "style='background-color: red;'";
					}?>>
				<?= $data['BUC']?>
			</td>
			<td><?= $data['NIP_RM']?></td>
			<td><?= $data['NAMA_RM']?></td>
			<td><?= $data['KOLEKTABILITAS']?></td>
			<td><?= $data['RESTRU']?></td>
			<td><?= $data['LIMIT']?></td>
			<td><?= $data['BADE']?></td>
			<td><?= $data['VALUE']?></td>
			<td><?= $data['KURS']?></td>
			<td><?= $data['TANGGAL_PEMBUKAAN']?></td>
			<td><?= $data['TANGGAL_JATUH_TEMPO']?></td>
			<td><?= $data['NILAI_RY']?></td>
			<td><?= $data['RATE']?></td>
			<td><?= $data['WRITE OFF']?></td>
			<td
				<?php
					if ($FILTER=='STATUS DOWNGRADE') {
						echo "style='background-color: red;'";
					}
				?>>
				<?= $data['STATUS_DOWNGRADE']?>		
			</td>
			<td><?= $data['DAY_PART_DUE']?></td>
			<td
				<?php
					if ($FILTER=='STATUS DOWNGRADE') {
						echo "style='background-color: red;'";
					}
				?>>
				<?= $data['FAR']?>		
			</td>
			<td
				<?php
					if ($FILTER=='STATUS DOWNGRADE') {
						echo "style='background-color: red;'";
					}
				?>>
				<?= $data['JAMINAN']?>		
			</td>
		</tr>
<?php						
					}
?>
	</table>
</div>



<?php
				}else{
?>
	<center><h2>Data Tidak ditemukan</h2></center>
<?php
				}
			}
		}
	}else{
?>
	<center><h2>Silahkan Pilih Kriteria</h2></center>
<?php
	}
?>
</body>
</html>