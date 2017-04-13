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

	<head>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>
			/**
			 * @brief Go to the results (cl_results.php) page
			 */
			function GoResults() {
				$f = $('#cl_summary_form');
				$f.submit();
			}
		</script>
	</head>
	<body>
		<h1>Summary</h1>
		<p>Here's all the data you've provided:
		<?php
		function cl_input_print($cl_input) {
			echo "<table>";
			foreach($cl_input as $key => $value) {
				echo "<tr><th>$key</th><td>$value</td></tr>";
			}
			echo "</table>";
		}
		cl_input_print($cl_input);
		?>
		<p><a href="?download=1">Click here to download all the data you've provided for offline use.</a></p>
		<p><a href="javascript:GoResults();">Go to the results page.</a></p>

		<!-- As a hack, print everything from cl_input back out as hidden form entries; this will
		     work w/ cl_results which expects everything to come from HTTP POST -->
		<form id="cl_summary_form" enctype="multipart/form-data" method="POST" action="cl_results.php">
		<?php
			foreach($cl_input as $key => $value) {
				echo "<input type='hidden' id='$key' name='$key' value='$value'>\n";
			}
		?>
		</form>
	</body>
</html>
