<?php
require_once 'conn.php';
//5 nasabah dengan bade dan limit terbesar
	echo "4. 5 Nasabah dengan Bade terbesar beserta jumlah BADE dan LIMIT nya.<br><br>";
	$queryBADE="SELECT DISTINCT NASABAH, BADE, LIMITAS FROM data1 ORDER BY BADE DESC LIMIT 5 ";
	$executeBADE=mysqli_query($conn, $queryBADE);
		$total=0;
		if (mysqli_num_rows($executeBADE)>0) {
		    while ($dataBADE=mysqli_fetch_assoc($executeBADE)) {
		    	echo $dataBADE['NASABAH']." :<br>";
		    	echo "&nbsp;&nbsp;BADE= ".number_format($dataBADE['BADE'])."<br>";
		    	echo "&nbsp;&nbsp;LIMIT= ".number_format($dataBADE['LIMITAS'])."<br>";
		    	echo "&nbsp;&nbsp;BADE+LIMIT= ".number_format($dataBADE['BADE']+$dataBADE['LIMITAS'])."<br><br>";
		    }
		}

?>