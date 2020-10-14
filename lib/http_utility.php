<?php

	/*
	@ redirect URL
	@ exit process after redirection
	@ no value has returned
	*/	
	function redirect($strURL)
	{
		header("Location: ".$strURL);
		exit();
    }
	
	/*
	@ http post
	@ post back feature
	@ return respone body, in text/string format
	*/	
	
	
function doHTTPPost($objData) {
    //print_r($objData);
        
    $objCURL = curl_init();
    

    if (isset($objData['AUTH_BASIC'])) {        
        curl_setopt($objCURL, CURLAUTH_BASIC);
        curl_setopt($objCURL, CURLOPT_USERPWD, $objData['AUTH_BASIC']);
    }

    curl_setopt($objCURL, CURLOPT_URL, $objData['URL']);
    curl_setopt($objCURL, CURLOPT_POST, 1);
    curl_setopt($objCURL, CURLOPT_POSTFIELDS, $objData['POST_DATA']);
    curl_setopt($objCURL, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($objCURL, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($objCURL, CURLOPT_SSL_VERIFYHOST, 0);

    // Timeouts
    curl_setopt($objCURL, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($objCURL, CURLOPT_TIMEOUT, 60);

    if (isset($objData['HEADER_DATA'])) {        
        curl_setopt($objCURL, CURLOPT_HTTPHEADER, $objData['HEADER_DATA']);
    }
    if (isset($objData['PATH_TO_COOKIE'])) {
        curl_setopt($objCURL, CURLOPT_COOKIEJAR, $objData['PATH_TO_COOKIE']);
    }
    if (isset($objData['PATH_TO_COOKIE'])) {
        curl_setopt($objCURL, CURLOPT_COOKIEFILE, $objData['PATH_TO_COOKIE']);
    }
    if (isset($objData['FOLLOW_LOCATION'])) {
        curl_setopt($objCURL, CURLOPT_FOLLOWLOCATION, $objData['FOLLOW_LOCATION']);
    }
    if (isset($objData['USER_AGENT'])) {
        curl_setopt($objCURL, CURLOPT_USERAGENT, $objData['USER_AGENT']);
    }

    $strResult = curl_exec($objCURL);    

    curl_close($objCURL);
    
    return $strResult;
}

function DoHTTPGet($strURL) {
		
		$ch 			= curl_init();
		curl_setopt($ch, CURLOPT_URL,$strURL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$objReturn		= curl_exec($ch);
		$data2			= curl_getinfo($ch);
		
		curl_close($ch); 
		
        return $objReturn;
	}
?>
