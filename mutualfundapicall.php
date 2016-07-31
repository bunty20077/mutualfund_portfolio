<?php

require_once '/unirestphp/src/Unirest.php';
// Disables SSL cert validation
Unirest\Request::verifyPeer(false);
// Mashape auth
Unirest\Request::setMashapeKey('96HYJG7yd2mshbmgvJoAPQIl23Khp14bMtTjsnNzZlrU0eXyqL');

function latestNav(){
	
	$body = '{"scodes":["120503"]}';	
	$response = Unirest\Request::post("https://mutualfundsnav.p.mashape.com/",
			array(
					"Content-Type" => "application/json",
					"Accept" => "application/json"
			),$body,$username = null, $password = null);
	
	return ($response->raw_body) ;	
}
function searchScript(){
	$body = '{"search": "SBI Magnum"}';
	$response = Unirest\Request::post("https://mutualfundsnav.p.mashape.com/",
			array(
					"Content-Type" => "application/json",
					"Accept" => "application/json"
			),$body,$username = null, $password = null);

	return ($response->raw_body) ;

}

function historicalNav(){
	$body = '{
  "scode": "100520",
  "date": "30/06/2015"
}';
	$response = Unirest\Request::post("https://mutualfundsnav.p.mashape.com/historical",
			array(
					"Content-Type" => "application/json",
					"Accept" => "application/json"
			),$body,$username = null, $password = null);

	return ($response->raw_body) ;

}
$disp_array = array();
$disp_array = json_decode(latestNav(),true);
//print_r(latestNav());
//print_r($disp_array);
//print_r (searchScript())."</br>";
//echo "============================";
//print_r (historicalNav())."</br>";


  echo '<TABLE BORDER="3" CELLPADDING="10" CELLSPACING="10">
           <TD>'.$disp_array ["120503"]["fund"].'</TD>
           <TD>'.$disp_array ["120503"]["nav"].'</TD>
           <TD>'.$disp_array ["120503"]["category"].'</TD>
           <TD>'.$disp_array ["120503"]["date"].'</TD>
           </TABLE>';  

  
?>