<?php

require_once '/unirestphp/src/Unirest.php';
// Disables SSL cert validation
Unirest\Request::verifyPeer(false);
// Mashape auth
Unirest\Request::setMashapeKey('96HYJG7yd2mshbmgvJoAPQIl23Khp14bMtTjsnNzZlrU0eXyqL');


//$mutualfundName = $_GET['mutualfundName'];
//$requesteddate = $_GET['date'] ;

function latestNav(){
	
	$body = '{"scodes":["120503","119564","119707","119425","119404"]}';	
	$response = Unirest\Request::post("https://mutualfundsnav.p.mashape.com/",
			array(
					"Content-Type" => "application/json",
					"Accept" => "application/json"
			),$body,$username = null, $password = null);
	
	return ($response->raw_body) ;	
}
function searchScript($mutualfundName){
	//$body = '{"search": "SBI Magnum"}';
	$body = '{"search": "'.$mutualfundName.'"}';
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
//print_r (searchScript("Axis Long Term Equity Fund"))."</br>";
//echo "============================";
//print_r (historicalNav())."</br>";
//print_r(searchScript("L&T Gilt Fund Direct Plan"));
//print_r(searchScript("SBI Magnum Gilt Fund - Long Term- Direct Plan - Growth"));
//print_r(searchScript("L&T India Value Fund Direct Plan - Growth"));
//print_r(searchScript("SBI Magnum MidCap Fund - Regular Plan-Growth"));
//print_r(searchScript("SBI Magnum MidCap Fund - DIRECT Plan-Growth"));


   echo '<TABLE BORDER="3" CELLPADDING="10" CELLSPACING="10">
           <TD>'.$disp_array ["120503"]["fund"].'</TD>
           <TD>'.$disp_array ["120503"]["nav"].'</TD>
           <TD>'.$disp_array ["120503"]["category"].'</TD>
           <TD>'.$disp_array ["120503"]["date"].'</TD>
           </TABLE>'; 
  echo '<TABLE BORDER="3" CELLPADDING="10" CELLSPACING="10">
           <TD>'.$disp_array ["119564"]["fund"].'</TD>
           <TD>'.$disp_array ["119564"]["nav"].'</TD>
           <TD>'.$disp_array ["119564"]["category"].'</TD>
           <TD>'.$disp_array ["119564"]["date"].'</TD>
           </TABLE>';
  echo '<TABLE BORDER="3" CELLPADDING="10" CELLSPACING="10">
           <TD>'.$disp_array ["119707"]["fund"].'</TD>
           <TD>'.$disp_array ["119707"]["nav"].'</TD>
           <TD>'.$disp_array ["119707"]["category"].'</TD>
           <TD>'.$disp_array ["119707"]["date"].'</TD>
           </TABLE>';
  echo '<TABLE BORDER="3" CELLPADDING="10" CELLSPACING="10">
           <TD>'.$disp_array ["119425"]["fund"].'</TD>
           <TD>'.$disp_array ["119425"]["nav"].'</TD>
           <TD>'.$disp_array ["119425"]["category"].'</TD>
           <TD>'.$disp_array ["119425"]["date"].'</TD>
           </TABLE>';
  echo '<TABLE BORDER="3" CELLPADDING="10" CELLSPACING="10">
           <TD>'.$disp_array ["119404"]["fund"].'</TD>
           <TD>'.$disp_array ["119404"]["nav"].'</TD>
           <TD>'.$disp_array ["119404"]["category"].'</TD>
           <TD>'.$disp_array ["119404"]["date"].'</TD>
           </TABLE>';

  
?>