<?php
require_once 'conn.php';
//8 Nilai-Nilai Unik Produk total sum baki debet nya.
	echo "8. Nilai-Nilai Unik Produk beserta total sum baki debet nya.<br><br>";
	$query="SELECT DISTINCT PRODUK FROM data1";
	$execute=mysqli_query($conn, $query);
	$CR=[];
	$total=[];
		if (mysqli_num_rows($execute)>0) {
		    while ($data=mysqli_fetch_assoc($execute)) {
		    	array_push($CR, $data['PRODUK']);   		 	
		    }
		}

		
	for ($i=0; $i<sizeof($CR); $i++) { 
		$value=$CR[$i];
		$query_BADE="SELECT BADE FROM data1 WHERE PRODUK='$value'";
		$execute_BADE=mysqli_query($conn, $query_BADE);
		if (mysqli_num_rows($execute_BADE)>0) {
			$sub_total=mysqli_num_rows($execute_BADE);
			while ($data_BADE=mysqli_fetch_assoc($execute_BADE)) {
				array_push($total, $sub_total*=$data_BADE['BADE'])."<br>";
			}
		}	
	}
	
	for ($i=0; $i < sizeof($CR) ; $i++) {
		$no=$i+1; 
		echo $no.". BUC ".$CR[$i].":<br>";
		echo "&nbsp;&nbsp; TOTAL BALDE= ".number_format($total[$i])."<br><br>";
	}

?>