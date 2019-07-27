<?php
require_once 'conn.php';

//Sum Bade dan Limit pada Tanggal unik
	echo "2. Total (sum) BADE dan LIMIT pada tanggal unik yang terdapat pada data.<br><br>";
	$queryBADE="SELECT SUM(IF(YEAR(DATE)=2018, BADE, 0)) AS BADE FROM data1";
	$executeBADE=mysqli_query($conn, $queryBADE);
		$total=0;
		if (mysqli_num_rows($executeBADE)>0) {
		    while ($dataBADE=mysqli_fetch_assoc($executeBADE)) {
		    	echo "Jumlah Bade= ";
		    	echo number_format($dataBADE['BADE'])."<br>";
		    	$total += $dataBADE['BADE'];
		    }
		}
		$queryLIMIT="SELECT SUM(IF(YEAR(DATE)=2018, LIMITAS, 0)) AS LIMITAS FROM data1";
		$executeLIMIT=mysqli_query($conn, $queryLIMIT);
		if (mysqli_num_rows($executeLIMIT)>0) {
		    while ($dataLIMIT=mysqli_fetch_assoc($executeLIMIT)) {
		    	echo "Jumlah Limit= ";
		    	echo number_format($dataLIMIT['LIMITAS'])."<br>";
		    	$total += $dataLIMIT['LIMITAS'];
		    }
		}
		echo "BADE + LIMIT = ". $total."<br><br>";
?>