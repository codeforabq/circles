<!DOCTYPE HTML>
<html>
	<?php
	include("config.php");
	if ('Production' != constant('DEPLOY_MODE')) {
		echo '<h3>Site is running in ' . constant('DEPLOY_MODE') . ': all warnings and errors will be displayed!</h3>';
		echo "<pre>";
		require 'dump-errors.php';
		echo "</pre>";
	}

	require_once('functions.php');
	LogPostValuesToLog($_POST['this_log'], 'cl_income');

	// Everything that was collected in the previous forms
	$cl_input = array();
	foreach($_POST as $key => $value) {
		$cl_input[$key] = $value;
	}

	?>
	<pre>
	<?php var_dump($cl_input); ?>

</html>
