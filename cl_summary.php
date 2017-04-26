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
			/**this is a summary table of all values entered thus far
			* with a look-up table to print human-readable key names
			* @todo change the following variables to correct names:
			* "EIupemp" => "NOT SURE WHAT THIS MEANS!",
			* "EIupPart" => "NOT SURE ABOUT THIS EITHER!",
			* "IncomeUp" => "IDK!", **/
			function cl_input_print($cl_input) {
				$human_readable_names = array(
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
					"Butt_Section8" => "Section 8 Help",
					"EIupemp" => "NOT SURE WHAT THIS MEANS!",
					"EIupPart" => "NOT SURE ABOUT THIS EITHER!",
					"IncomeUp" => "IDK!",
					"MortgageRentAmount" => "Mortgage or Rent Payment",
					"InsuranceNotInc" => "Additional Home Insurance Payment",
					"TaxesNotInc" => "Additional Home Tax Payment",
					"GasAmount" => "Gas Bill",
					"ElectricAmount" => "Electricity Bill",
					"WaterAmount" => "Water Bill",
					"SewageAmount" => "Sewage Bill",
					"TrashAmount" => "Trash Pickup Bill",
					"PhoneAmount" => "Phone Bill",
					"InternetAmount" => "Internet Bill",
					"CableAmount" => "Cable Bill",
					"TotalHousing" => "Total Housing Expenses",
					"GroceriesAmount" => "Groceries",
					"SchoolLunchesAmount" => "School Lunches",
					"TotalFood" => "Total Food Expenses",
					"CarPaymentAmount" => "Car Payment",
					"CarInsuranceAmount" => "Car Insurance",
					"GasolineAmount" => "Gasoline",
					"MaintainRepairAmount" => "Vehicle Maintenance and Repairs",
					"BusCabAmount" => "Amount Spent on Bus or Cab Fare",
					"TotalTransport" => "Total Transportation Costs",
					"MovieDateAmount" => "Movie or Date Budget",
					"EntertainOther1Amount" => "Entertainment Budget 1",
					"EntertainOther2Amount" => "Entertainment Budget 2",
					"EntertainOther3Amount" => "Entertainment Budget 3",
					"TotalEntertain" => "Total Entertainment Budget",
					"SchoolLoanAmount" => "Student Loan Payment(s)",
					"CreditCardAmount" => "Credit Card Payment(s)",
					"OtherLoansAmount" => "Other Loan Payments",
					"OtherDebtAmount" => "Other Debt Payments",
					"TotalDebt" => "Total Debt Payments",
					"KitchenAmount" => "Kitchen Needs Budget",
					"BathroomAmount" => "Bathroom Needs Budget",
					"BedroomAmount" => "Bedroom Needs Budget",
					"OtherRoomsAmount" => "Other Rooms Budget",
					"TotalHousehold" => "Total Household Needs Budget",
					"JunkFoodAmount" => "Junk Food Budget",
					"SchoolExpenseAmount" => "School Expenses",
					"OtherTaxesAmount" => "Other Tax Expenses",
					"OtherExpense1Amount" => "Other Expenses 1",
					"OtherExpense2Amount" => "Other Expenses 2",
					"OtherExpense3Amount" => "Other Expenses 3",
					"TotalOtherExpenses" => "Total of Other Expenses",
					"HealthInsuranceAmount" => "Health Insurance",
					"PrescriptionsAmount" => "Prescription Medication Costs",
					"DoctorAmount" => "Doctor Visit Costs",
					"DentistAmount" => "Dentist Visit Costs",
					"HealthOtherAmount" => "Other Healthcare Costs",
					"TotalHealthcare" => "Total Spent on Healthcare",
					"ChildSupportPaidAmount" => "Child Support Paid",
					"SpouseSupportPaidAmount" => "Spousal Support Paid",
					"ChildcareAmount" => "Childcare Cost",
					"SchoolFeesPaidAmount" => "School Fees",
					"ExpenseDisabledAmount" => "Expenses for Disability",
					"MedicalElderlyAmount" => "Medical Expenses for Elderly",
					"OtherDependentAmount" => "Other Dependent Expenses",
					"TotalDependentExpense" => "Total Dependent Expenses",
					"LaundryAmount" => "Laundry Expenses",
					"ToiletriesAmount" => "Toiletries Expenses",
					"HaircutsAmount" => "Haircut Expenses",
					"OtherPersonalAmount" => "Other Personal Expenses",
					"TotalPersonalCare" => "Total Personal Care Expenses",
					"AdultClothesAmount" => "Adult Clothing Budget",
					"ChildClothesAmount" => "Child Clothing Budget",
					"TotalClothing" => "Total Clothing Budget",
					"PetFoodAmount" => "Pet Food Expenses",
					"PetHealthAmount" => "Pet Health Expenses",
					"PetOtherAmount" => "Other Pet Expenses",
					"TotalPets" => "Total Pet Expenses",
					"BdayAnnivAmount" => "Gift Budget",
					"DogmaAmount" => "Religious Donations",
					"FundraisersAmount" => "Fundraiser Donations",
					"TotalGifts" => "Total Gift Expenses",
					"FurnitureAmount" => "Savings Toward Furniture",
					"AppliancesAmount" => "Savings Toward Appliances",
					"TripsAmount" => "Savings Toward Travel",
					"OtherSavingsAmount" => "Other Savings",
					"TotalSavings" => "Total Savings",
					"cl_city" => "City",
					"cl_state" => "State",
					"cl_county" => "County",
					"cl_stateinits" => "State Initials",
					"bedrooms" => "Number of Bedrooms",
					"cl_utilities" => "Utilities",
					"twentyone_or_older_check" => "Are there household members over 21?",
					"cl_adults" => "Number of Adults",
					"twentyone_or_older_PTcheck" => "Do any adults work part time?",
					"twentyone_or_older_FTcheck" => "Do any adults work full time?",
					"cl_adults_PT" => "Number of adults working part time",
					"cl_adults_FT" => "Number of adults working full time",
					"twentyone_or_older_Expcheck" => "Do any of the adults have work expenses?",
					"WorkExpenseAmount" => "Work-related Expenses",
					"thirteen_to_twenty_check" => "Are any household members between 13 and 20 years old?",
					"less_than_thirteen_check" => "Are any household members less than 13 years old?",
					"FTCollegeStudents_check" => "Are any household members full-time college stuents?",
					"cl_family_pregnancy_check" => "Are any household members pregnant?",
					"cl_family_stepparent_check" => "Are any household members step-parents?",
					"cl_family_All_onBenefits_check" => "Are all members of the household  receiving benefits?",
					"cl_family_over60_check" => "Are any household members over 60?",
					"this_log" => "Log File Information"
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
