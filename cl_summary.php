	<?php
	include("config.php");
	// Everything that was collected in the previous forms
	$cl_input = array();
	foreach($_POST as $key => $value) {
		$cl_input[$key] = $value;
	}

	$json = json_encode($cl_input);

	if($_GET['download'] == 1) {
		header( 'Content-disposition: attachment; filename=test.json' );
		header( 'Content-type: application/json' );
		echo $json;
		exit;
	}
	?>

	<!DOCTYPE HTML>
	<html>
	<?php
	if ('Production' != constant('DEPLOY_MODE')) {
		echo '<h3>Site is running in ' . constant('DEPLOY_MODE') . ': all warnings and errors will be displayed!</h3>';
		echo "<pre>";
		require 'dump-errors.php';
		echo "</pre>";
	}

	require_once('functions.php');
	LogPostValuesToLog($_POST['this_log'], 'cl_income');

	?>
	<h1>Summary</h1>
	<p>Here's all the data you've provided:
	<pre>
		<?php echo $json; ?>
	</pre>
	<p><a href="?download=1">Click here to download all the data you've provided for offline use.</a></p>
	<p><a href="javascript:GoResults();">Go to the results page.</a></p>
</html>
