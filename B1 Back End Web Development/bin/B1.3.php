<?php
require_once 'conn.php';
//Nilai sum BADE pada latest date
	echo "3. Nilai total (sum) BADE pada latest date.<br><br>";
	$queryBADE="SELECT * FROM data1 WHERE YEAR(DATE)=2018 LIMIT 1";
	$executeBADE=mysqli_query($conn, $queryBADE);
		$total=0;
		if (mysqli_num_rows($executeBADE)>0) {
		    while ($dataBADE=mysqli_fetch_assoc($executeBADE)) {
		    	echo "Jumlah Bade= ";
		    	echo number_format($dataBADE['BADE'])."<br>";
		    	
		    }
		}

?>