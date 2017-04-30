<?php

// previous_form is the name of the from which this data came
function LogPostValuesToLog($filename, $previous_form) {
	$output = array();
	$output[$previous_form] = array();

	foreach($_POST as $key => $value) {
		$output[$previous_form][$key] = $value;
	}
	$output_json = json_encode($output);

	// Write to file on server (get rid of this!)
//	$trace_file = fopen($filename, "a") or die("Unable to open trace file at $filename!");
//	fwrite($trace_file, $output_json);
//	fclose($trace_file);
}
?>
