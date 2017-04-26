<?php
include("config.php");
// Everything that was collected in the previous forms
$cl_input = array();
foreach($_POST as $key => $value) {
	$cl_input[$key] = $value;
}

$json = json_encode($cl_input);

if($_GET['download'] == 1) {
	header('Content-disposition: attachment; filename=test.json');
	header('Content-type: application/json');
	echo $json;
	exit;
}
?>

<!DOCTYPE HTML>
<html>
	<?php
	if('Production' != constant('DEPLOY_MODE')) {
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
			//this is a summary table of all values entered thus far
			// @todo human-readable key values, utilities SU value look-up (look-up table)
			function cl_input_print($cl_input) {
				$human_readable_names = array(
					"cl_city" => "City",
					"cl_stateinits" => "State",
					"GrossIncomeAmount" => "Gross Income",
					"NetBusinessAmount" => "Net Business Income",
					"ArmedForcesAmount" => "Armed Forces Income",
					"TotalEarned" => "Total Earned Income",
					"UnEarnedSSIEtc" => "Unearned Income (SSI, etc.)",
					"UnEmploymentEtc" => "Unemployment Income",
					"AlimonyReceived" => "Alimony Received",
					"ChildSupportReceived" => "Child Support Received",
					"TANFreceived" => "TANF Received",
					"MonthlyGifts" => "Gifts Received",
					"InterestDividendsEtc" => "Interest Dividend Income",
					"TotalUnEarned" => "Total Unearned Income",
					"TotalMonthlyExpenses" => "Total Monthly Expenses",
					"PostMonthlyExpenses" => "Monthly Expenses",
					"CombineIncome" => "Monthly Combined Income",
					"NetIncome" => "Net Income",
					"CheckingAccountBal" => "Checking Account Balance",
					"SavingsAccountBal" => "Savings Account Balance",
					"EVvehicle1" => "Estimated Value of Primary Vehicle",
					"EVothervehicle" => "Estimated Value of Other Vehicle(s)",
					"EVpersonal" => "Estimated Value of Personal Belongings",
					"EVnonResi" => "Estimated Value of Non-Resident Belongings",
					"EVallCountable" => "Estimated Value of Countable Possessions",
					"TotalHouseholdAssets" => "Total Value of Household Assets",
					"Butt_Section8" => "Section 8 Help"

				);
				echo "<table>";
				foreach($cl_input as $key => $value) {
					echo "<tr><th>$human_readable_names[$key] ($key)</th><td>$value</td></tr>";
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
