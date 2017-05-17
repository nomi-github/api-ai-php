<?
	require('vendor/autoload.php');
	header('Content-Type: application/json');
	ob_start();
	
	$json = file_get_contents('php://input'); 
	$request = json_decode($json, true);
		
	$action = $request["result"]["action"];
	
	// get parameters from request
	$parameters = $request["result"]["parameters"];
	$datePeriod = $parameters["datePeriod"]
	$date = $parameters["date"]
	$currency = $parameters["currencyType"]
	$bank = $parameters["bank"]

	// prepare parameters
	if (is_null($bank)) {
		$bank = ['1';'2'];
	}
	if (is_null($date)) {
		$date = date("Y/m/d");
	}
	if (!is_null($datePeriod)) {
		$dateFrom = substr($datePeriod, 0, 10);
		$dateTo = substr($datePeriod, 9, 10);
	}
	if (is_null($dateFrom)) {
		$dateFrom = $date;
		$dateTo = $date;
	}
	
	if (is_null($currencyType)) {
		$currencyType = "ALL";
	}
	
	if ($action == 'tdbCurrencyConverter') {
		$output = getResult($bank, $date, $datePeriod, $currencyType);
	}

	ob_end_clean();
	echo json_encode($output);
	
	
	function getResult($bank, $date, $datePeriod, $currencyType) {
		return array(
		"source": "apiai-nomi-test-currency-converter-webhook-sample"
		"speech" => $speech,
		"displayText" => $speech,
		"contextOut" => array()
			);
		
	}
?>
