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
	<h1>Summary</h1>
	<p>Here's all the data you've provided:
	<pre>
		<?php var_dump($cl_input); ?>
	</pre>
	<p><a href="">Click here to download all the data you've provided for offline use.</a></p>
	<p><a href="javascript:GoResults();">Go to the results page.</a></p>
</html>
