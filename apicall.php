<?php

$shareName = $_GET['shareName'];
$requesteddate = $_GET['date'] ;
//$shareName = "SBIN";

$request =  'https://www.quandl.com/api/v3/datasets/NSE/'.$shareName.'.json?auth_token=YuPm8GJoxfFEb_aowAze'; 

$response = file_get_contents($request);

$disp_array = array();
$disp_array = json_decode($response,true);

$date = $disp_array ["dataset"]["column_names"][0];

for ($i=0;$i<sizeof($disp_array ["dataset"]["data"]);$i++){
	
	$date = $disp_array ["dataset"]["data"][$i][0];
	if ($requesteddate == $date ){
		echo '<TABLE BORDER="3" CELLPADDING="10" CELLSPACING="10">
           <TD>'.$disp_array ["dataset"]["dataset_code"].'</TD>
           <TD>'.$disp_array ["dataset"]["column_names"][0].'</TD>
           <TD>'.$disp_array ["dataset"]["data"][$i][0].'</TD>
           <TD>'.$disp_array ["dataset"]["data"][$i][5].'</TD>
           </TABLE>';
	}
}




?>