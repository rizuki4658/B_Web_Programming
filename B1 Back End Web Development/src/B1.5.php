<?php
require_once 'conn.php';
//5 nasabah dengan bade dan limit terbesar
	echo "5. 5 Nasabah dengan selisih Bade tanggal pertama dan tanggal terakhir beserta jumlah BADE dan LIMIT nya.<br><br>";
	$queryBADE1="SELECT DISTINCT NASABAH, BADE, LIMITAS FROM data1 ORDER BY DATE ASC LIMIT 5 ";
	$queryBADE2="SELECT DISTINCT NASABAH, BADE, LIMITAS FROM data1 ORDER BY DATE DESC LIMIT 5 ";
	$executeBADE1=mysqli_query($conn, $queryBADE1);
	$executeBADE2=mysqli_query($conn, $queryBADE2);
		if (mysqli_num_rows($executeBADE1)>0) {
		    while ($data_1=mysqli_fetch_assoc($executeBADE1)) {
		    	while ($data_2=mysqli_fetch_assoc($executeBADE2)) {
		    		echo $data_2['NASABAH']." :<br>";
		    		echo "&nbsp;&nbsp;SELISIH BADE= ".number_format($data_1['BADE']-$data_2['BADE'])."<br>";
		    		echo "&nbsp;&nbsp;LIMIT= ".number_format($data_1['LIMITAS']+$data_2['LIMITAS'])."<br>";
		    		echo "&nbsp;&nbsp;BADE+LIMIT= ".number_format(($data_1['BADE']+$data_2['BADE'])+($data_1['LIMITAS']+$data_2['LIMITAS']))."<br><br>";
		    	}
		    }
		}

?>