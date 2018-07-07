<?php 
	function refNumGen(){

		$refNum = '';

		$source = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'];
		for($i = 0; $i < 16; i++){
			$index = rand(0, 15) //Generate random number

			$refNum = $refNum . $source[$index]; //Append random character
		}

		$today = getdate(); //seconds since Unix Epoch

		return $refNum . ' - ' . $today[0];
	}

	var_export(refNumGen());
?>