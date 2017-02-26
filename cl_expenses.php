<!DOCTYPE HTML>
<html>
	<?php
	$rundate = date("Y-m-d") . "-" . date("h-i-sa");
	//echo "<br><br>Now Is . . . ".$rundate."<br><br>";
	$whoisdis = $_SERVER['REMOTE_USER'];
	//echo "<br><br>Dis Is . . . ".$whoisdis."<br><br>";
	$this_log = "./logs/" . $whoisdis . "_" . $rundate . ".txt";
	$trace_file = fopen($this_log, "w") or die("Unable to open trace file!");
	$whichreferer = "START-cl_infos\n";
	fwrite($trace_file, $whichreferer);
	foreach($_POST as $key => $value) {
		fwrite($trace_file, $key . "-" . $value . "\n");
	}
	fwrite($trace_file, "ESTODO-cl-infos\n");
	fclose($trace_file);
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<script src="field-kit.js"></script>
		<title>
			Circles USA CEPT
		</title>
		<style>
			.nextbutton {
				background-color: #069B54; /* GREEN */
				border: none;
				color: white;
				padding: 5px 5px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 10px;
				margin: 4px 2px;
				cursor: pointer;
			}

			.donebutton {
				background-color: #EF5F0A; /* ORANGE */
				border: none;
				color: white;
				padding: 5px 5px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 10px;
				margin: 4px 2px;
				cursor: pointer;
			}

			.anotherbutton {
				background-color: #008FD9; /* BLUE */
				border: none;
				color: white;
				padding: 5px 5px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 10px;
				margin: 4px 2px;
				cursor: pointer;
			}

			.centered {
				margin: auto;
				width: 60%;
				border: 6px ridge rgb(0, 159, 222);
				color: rgb(0, 0, 0);
				padding: 10px;
				box-shadow: 5px 5px 5px #cccccc;
				border-radius: 8px;
				position: relative;
			}

			.h2 {
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
				font-weight: bold;
				color: rgb(0, 163, 222);
			}

			.h3 {
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
			/ / font-weight: bold;
				color: black;
			}

			.p1 {
				display: inline;
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
				font-weight: bold;
				color: rgb(0, 163, 222);
				font-size: 18px;
			}

			.p2 {
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
				font-weight: bold;
				color: rgb(0, 163, 222);
				font-size: 16px;
			}

			.form-els {
				display: inline;
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
				font-weight: bold;
			}

			.button-text {
			/ / display: inline;
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
				font-size: 14px;
			/ / font-weight: bold;
			}

			.org-hr {
				width: 100%;
				border-style: outset;
				border-width: 3px;
				color: rgb(242, 117, 34);
			}
		</style>
		<script type="text/javascript" src="page_js/jquery.min.js"></script>
		<script type="text/javascript" src="page_js/autoNumeric-1.9.41.js"></script>
		<title>VincCo autoNumeric</title>
		<script type="text/javascript">
			jQuery(function($) {
				$('#MortgageRentAmount').autoNumeric('init');
				$('#InsuranceNotInc').autoNumeric('init');
				$('#TaxesNotInc').autoNumeric('init');
				$('#GasAmount').autoNumeric('init');
				$('#ElectricAmount').autoNumeric('init');
				$('#WaterAmount').autoNumeric('init');
				$('#SewageAmount').autoNumeric('init');
				$('#TrashAmount').autoNumeric('init');
				$('#PhoneAmount').autoNumeric('init');
				$('#InternetAmount').autoNumeric('init');
				$('#CableAmount').autoNumeric('init');
				$('#GroceriesAmount').autoNumeric('init');
				$('#SchoolLunchesAmount').autoNumeric('init');
				$('#EatingOutAmount').autoNumeric('init');
				$('#CarPaymentAmount').autoNumeric('init');
				$('#CarInsuranceAmount').autoNumeric('init');
				$('#GasolineAmount').autoNumeric('init');
				$('#MaintainRepairAmount').autoNumeric('init');
				$('#BusCabAmount').autoNumeric('init');
				$('#MovieDateAmount').autoNumeric('init');
				$('#EntertainOther1Amount').autoNumeric('init');
				$('#EntertainOther2Amount').autoNumeric('init');
				$('#EntertainOther3Amount').autoNumeric('init');
				$('#SchoolLoanAmount').autoNumeric('init');
				$('#CreditCardAmount').autoNumeric('init');
				$('#OtherLoansAmount').autoNumeric('init');
				$('#OtherDebtAmount').autoNumeric('init');
				$('#KitchenAmount').autoNumeric('init');
				$('#BedroomAmount').autoNumeric('init');
				$('#BathroomAmount').autoNumeric('init');
				$('#OtherRoomsAmount').autoNumeric('init');
				$('#JunkFoodAmount').autoNumeric('init');
				$('#SchoolExpenseAmount').autoNumeric('init');
				$('#OtherTaxesAmount').autoNumeric('init');
				$('#OtherExpense1Amount').autoNumeric('init');
				$('#OtherExpense2Amount').autoNumeric('init');
				$('#OtherExpense3Amount').autoNumeric('init');
				$('#HealthInsuranceAmount').autoNumeric('init');
				$('#PrescriptionsAmount').autoNumeric('init');
				$('#DoctorAmount').autoNumeric('init');
				$('#DentistAmount').autoNumeric('init');
				$('#HealthOtherAmount').autoNumeric('init');
				$('#ChildSupportPaidAmount').autoNumeric('init');
				$('#SpouseSupportPaidAmount').autoNumeric('init');
				$('#ChildcareAmount').autoNumeric('init');
				$('#SchoolFeesPaidAmount').autoNumeric('init');
				$('#ExpenseDisabledAmount').autoNumeric('init');
				$('#MedicalElderlyAmount').autoNumeric('init');
				$('#OtherDependentAmount').autoNumeric('init');
				$('#LaundryAmount').autoNumeric('init');
				$('#HaircutsAmount').autoNumeric('init');
				$('#ToiletriesAmount').autoNumeric('init');
				$('#OtherPersonalAmount').autoNumeric('init');
				$('#AdultClothesAmount').autoNumeric('init');
				$('#ChildClothesAmount').autoNumeric('init');
				$('#PetFoodAmount').autoNumeric('init');
				$('#PetHealthAmount').autoNumeric('init');
				$('#PetOtherAmount').autoNumeric('init');
				$('#BdayAnnivAmount').autoNumeric('init');
				$('#DogmaAmount').autoNumeric('init');
				$('#FundraisersAmount').autoNumeric('init');
				$('#FurnitureAmount').autoNumeric('init');
				$('#AppliancesAmount').autoNumeric('init');
				$('#TripsAmount').autoNumeric('init');
				$('#OtherSavingsAmount').autoNumeric('init');
			});

			window.onload = function() {
				document.getElementById("MortgageRentAmount").focus();

				document.getElementById("FoodExpenses").style.display = "none";
				document.getElementById("TransportExpenses").style.display = "none";
				document.getElementById("EntertainExpenses").style.display = "none";
				document.getElementById("DebtExpenses").style.display = "none";
				document.getElementById("HouseholdExpenses").style.display = "none";
				document.getElementById("OtherExpenses").style.display = "none";
				document.getElementById("HealthcareExpenses").style.display = "none";
				document.getElementById("DependentCareExpenses").style.display = "none";
				document.getElementById("PersonalCareExpenses").style.display = "none";
				document.getElementById("ClothingExpenses").style.display = "none";
				document.getElementById("PetCareExpenses").style.display = "none";
				document.getElementById("GiftExpenses").style.display = "none";
				document.getElementById("SaveLargeItemExpenses").style.display = "none";
				ThatsAllExpenses
				document.getElementById("ThatsAllExpenses").style.display = "none";
			}

			function ShowEmToMe() {
				document.getElementById("FoodExpenses").style.display = "block";
				document.getElementById("TransportExpenses").style.display = "block";
				document.getElementById("EntertainExpenses").style.display = "block";
				document.getElementById("DebtExpenses").style.display = "block";
				document.getElementById("HouseholdExpenses").style.display = "block";
				document.getElementById("OtherExpenses").style.display = "block";
				document.getElementById("HealthcareExpenses").style.display = "block";
				document.getElementById("DependentCareExpenses").style.display = "block";
				document.getElementById("PersonalCareExpenses").style.display = "block";
				document.getElementById("ClothingExpenses").style.display = "block";
				document.getElementById("PetCareExpenses").style.display = "block";
				document.getElementById("GiftExpenses").style.display = "block";
				document.getElementById("SaveLargeItemExpenses").style.display = "block";
				document.getElementById("ThatsAllExpenses").style.display = "block";
			}

			function ShowFoodExpenses() {
				document.getElementById("FoodExpenses").style.display = "block";
				document.getElementById("nextHousing").style.display = "none";
				document.getElementById("GroceriesAmount").focus();
			}

			function ShowTransportExpenses() {
				document.getElementById("TransportExpenses").style.display = "block";
				document.getElementById("nextFood").style.display = "none";
				document.getElementById("CarPaymentAmount").focus();
			}

			function ShowEntertainExpenses() {
				document.getElementById("EntertainExpenses").style.display = "block";
				document.getElementById("nextTransport").style.display = "none";
				document.getElementById("MovieDateAmount").focus();
			}

			function ShowDebtExpenses() {
				document.getElementById("DebtExpenses").style.display = "block";
				document.getElementById("nextEntertain").style.display = "none";
				document.getElementById("SchoolLoanAmount").focus();
			}

			function ShowHouseholdExpenses() {
				document.getElementById("HouseholdExpenses").style.display = "block";
				document.getElementById("nextDebt").style.display = "none";
				document.getElementById("KitchenAmount").focus();
			}

			function ShowOtherExpenses() {
				document.getElementById("OtherExpenses").style.display = "block";
				document.getElementById("nextHousehold").style.display = "none";
				document.getElementById("JunkFoodAmount").focus();
			}

			function ShowHealthcareExpenses() {
				document.getElementById("HealthcareExpenses").style.display = "block";
				document.getElementById("nextOther").style.display = "none";
				document.getElementById("HealthInsuranceAmount").focus();
			}

			function ShowDependentCareExpenses() {
				document.getElementById("DependentCareExpenses").style.display = "block";
				document.getElementById("nextHealthcare").style.display = "none";
				document.getElementById("ChildSupportPaidAmount").focus();
			}

			function ShowPersonalCareExpenses() {
				document.getElementById("PersonalCareExpenses").style.display = "block";
				document.getElementById("nextDependentCare").style.display = "none";
				document.getElementById("LaundryAmount").focus();
			}

			function ShowClothingExpenses() {
				document.getElementById("ClothingExpenses").style.display = "block";
				document.getElementById("nextPersonalCare").style.display = "none";
				document.getElementById("AdultClothesAmount").focus();
			}

			function ShowPetCareExpenses() {
				document.getElementById("PetCareExpenses").style.display = "block";
				document.getElementById("nextClothing").style.display = "none";
				document.getElementById("PetFoodAmount").focus();
			}

			function ShowGiftExpenses() {
				document.getElementById("GiftExpenses").style.display = "block";
				document.getElementById("nextPetCare").style.display = "none";
				document.getElementById("BdayAnnivAmount").focus();
			}

			function ShowSavingLarge() {
				document.getElementById("SaveLargeItemExpenses").style.display = "block";
				document.getElementById("nextGifts").style.display = "none";
				document.getElementById("FurnitureAmount").focus();
			}

			function ShowThatsAll() {
				document.getElementById("ThatsAllExpenses").style.display = "block";
				document.getElementById("nextDone").style.display = "none";
			}

			function AddHousing() {
				var total = 0;
				var coll = document.getElementsByClassName("HousingExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalHousing");
				//TotalHousing.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalHousing').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AH = total;
			}

			function AddFood() {
				var total = 0;
				var coll = document.getElementsByClassName("FoodExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalFood");
				//TotalFood.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalFood').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AF = total;
			}

			function AddTransport() {
				var total = 0;
				var coll = document.getElementsByClassName("TransportExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalTransport");
				//TotalTransport.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalTransport').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AT = total;
			}

			function AddEntertain() {
				var total = 0;
				var coll = document.getElementsByClassName("EntertainExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalEntertain");
				//TotalEntertain.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalEntertain').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AE = total;
			}

			function AddDebt() {
				var total = 0;
				var coll = document.getElementsByClassName("DebtExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalDebt");
				//TotalDebt.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalDebt').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AD = total;
			}


			function AddHousehold() {
				var total = 0;
				var coll = document.getElementsByClassName("HouseholdExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalHousehold");
//    TotalHousehold.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalHousehold').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AHH = total;
			}

			function AddOtherExpenses() {
				var total = 0;
				var coll = document.getElementsByClassName("OtherExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalOtherExpenses");
//   TotalOtherExpenses.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalOtherExpenses').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AOE = total;
			}

			function AddHealthcare() {
				var total = 0;
				var coll = document.getElementsByClassName("HealthcareExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalHealthcare");
//   TotalHealthcare.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalHealthcare').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AHC = total;
			}

			function AddDependentSupport() {
				var total = 0;
				var coll = document.getElementsByClassName("DependentExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalDependentExpense");
//   TotalDependentExpense.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalDependentExpense').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.ADS = total;
			}

			function AddPersonalCare() {
				var total = 0;
				var coll = document.getElementsByClassName("PersonalCareExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalPersonalCare");
//   TotalPersonalCare.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalPersonalCare').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.APC = total;
			}

			function AddClothing() {
				var total = 0;
				var coll = document.getElementsByClassName("ClothingExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalClothing");
//   TotalClothing.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalClothing').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.ACL = total;
			}

			function AddPets() {
				var total = 0;
				var coll = document.getElementsByClassName("PetExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalPets");
//   TotalPets.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalPets').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.APET = total;
			}

			function AddGifts() {
				var total = 0;
				var coll = document.getElementsByClassName("GiftExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalGifts");
//   TotalGifts.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalGifts').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AGIFT = total;
			}

			function AddSavings() {
				var total = 0;
				var coll = document.getElementsByClassName("SavingsExpenses")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalSavings");
//   TotalSavings.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalSavings').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.ASAV = total;
			}

			var UpdMonthTotal = setInterval(GetMonthlyTotal, 100);

			function GetMonthlyTotal() {
				var getAH = new AddHousing();
				var getAF = new AddFood();
				var getAT = new AddTransport();
				var getAE = new AddEntertain();
				var getAD = new AddDebt();
				var getAHH = new AddHousehold();
				var getAOE = new AddOtherExpenses();
				var getAHC = new AddHealthcare();
				var getADS = new AddDependentSupport();
				var getAPC = new AddPersonalCare();
				var getACL = new AddClothing();
				var getAPET = new AddPets();
				var getAGIFT = new AddGifts();
				var getASAV = new AddSavings();
				var monthtotal = getAH.AH + getAF.AF + getAT.AT + getAE.AE + getAD.AD + getAHH.AHH + getAOE.AOE + getAHC.AHC + getADS.ADS + getAPC.APC + getACL.ACL + getAPET.APET + getAGIFT.AGIFT + getASAV.ASAV;
				//TotalMonthly.innerHTML = monthtotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalMonthly').value = monthtotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
			}
		</script>

	</head>

	<body>
		<!-- BEGIN OUTSIDE FORM -->
		<div id="MainDIV" class="centered">
			<form id="cl_infos_form" enctype="multipart/form-data" method="POST" action="cl_income.php"
					novalidate="novalidate" style="padding: 10px;" autocomplete="off">
				<?php
				if(isset($cl_state)) {
					echo "<input type=\"hidden\" name=\"cl_state\" value=\"" . $cl_state . "\">";
				}
				if(isset($cl_county)) {
					echo "<input type=\"hidden\" name=\"cl_county\" value=\"" . $cl_county . "\">";
				}
				if(isset($cl_city)) {
					echo "<input type=\"hidden\" name=\"cl_city\" value=\"" . $cl_city . "\">";
				}
				?>

				<!-- START HEADER -->
				<div style="float: left;">
					<img alt="Circles USA" id="cusalogo" src="images/circles-usa-new.png" style="display: inline;"/>
				</div>
				<div style="text-align: center; float: right;">
					<h2 class="h2">Cliff Effect Planning Tool</h2>
				</div>
				<div style="text-align: center; float: left; width: 100%;">
					<p class="p1">
						<br>Circle Leader Monthly Expenses
					</p>
					<hr class="org-hr">
				</div>
				<!-- END HEADER -->

				<div id="LeftSideDiv" style="float: left; width: 50%;">
					<div style="float: left; width: 100%;">
						<div id="HousingExpenses" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">HOUSING</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Mortgage/Rent:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="MortgageRentAmount"
																						 name="MortgageRentAmount" maxlength="12" size="10"
																						 placeholder="0.00" onkeyup="AddHousing();"
																						 class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Insurance not in
										Mortgage/Rent:
									</td>
									<td bgcolor="orange"><input type="text" id="InsuranceNotInc" name="InsuranceNotInc"
																		 maxlength="12" size="10" placeholder="0.00"
																		 onkeyup="AddHousing();" class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Taxes not in Mortgage/Rent:
									</td>
									<td bgcolor="orange"><input type="text" id="TaxesNotInc" name="TaxesNotInc" maxlength="12"
																		 size="10" placeholder="0.00" onkeyup="AddHousing();"
																		 class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Gas:</td>
									<td bgcolor="orange"><input type="text" id="GasAmount" name="GasAmount" maxlength="12"
																		 size="10" placeholder="0.00" onkeyup="AddHousing();"
																		 class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Electric:</td>
									<td bgcolor="orange"><input type="text" id="ElectricAmount" name="ElectricAmount"
																		 maxlength="12" size="10" placeholder="0.00"
																		 onkeyup="AddHousing();" class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Water:</td>
									<td bgcolor="orange"><input type="text" id="WaterAmount" name="WaterAmount" maxlength="12"
																		 size="10" placeholder="0.00" onkeyup="AddHousing();"
																		 class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Sewage:</td>
									<td bgcolor="orange"><input type="text" id="SewageAmount" name="SewageAmount" maxlength="12"
																		 size="10" placeholder="0.00" onkeyup="AddHousing();"
																		 class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Trash:</td>
									<td bgcolor="orange"><input type="text" id="TrashAmount" name="TrashAmount" maxlength="12"
																		 size="10" placeholder="0.00" onkeyup="AddHousing();"
																		 class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Phone:</td>
									<td bgcolor="orange"><input type="text" id="PhoneAmount" name="PhoneAmount" maxlength="12"
																		 size="10" placeholder="0.00" onkeyup="AddHousing();"
																		 class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Internet:</td>
									<td bgcolor="orange"><input type="text" id="InternetAmount" name="InternetAmount"
																		 maxlength="12" size="10" placeholder="0.00"
																		 onkeyup="AddHousing();" class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Cable:</td>
									<td bgcolor="orange"><input type="text" id="CableAmount" name="CableAmount" maxlength="12"
																		 size="10" placeholder="0.00" onkeyup="AddHousing();"
																		 class="HousingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalHousing"
																												name="TotalHousing" type="text"
																												readonly maxlength="12" size="10">
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextHousing" type="button" class="nextbutton" onclick="ShowFoodExpenses();">
											Next
										</button>
									</td>
								<tr>
							</table>
						</div>
						<br><br>
					</div><!--HOUSING-->

					<div style="float: left; width: 100%;">
						<div id="FoodExpenses" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;"
							  onfocus="">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">FOOD</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Groceries:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="GroceriesAmount"
																						 name="GroceriesAmount" maxlength="12" size="10"
																						 placeholder="0.00" onkeyup="AddFood();"
																						 class="FoodExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">School Lunches:</td>
									<td bgcolor="orange"><input type="text" id="SchoolLunchesAmount" name="SchoolLunchesAmount"
																		 maxlength="12" size="10" placeholder="0.00" onkeyup="AddFood();"
																		 class="FoodExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Eating Out:</td>
									<td bgcolor="orange"><input type="text" id="EatingOutAmount" maxlength="12" size="10"
																		 placeholder="0.00" onkeyup="AddFood();" class="FoodExpenses"/>
									</td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalFood" name="TotalFood"
																												type="text" readonly maxlength="12"
																												size="10"></td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextFood" type="button" class="nextbutton" onclick="ShowTransportExpenses();">
											Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--FOOD-->

					<div style="float: left; width: 100%;">
						<div id="TransportExpenses"
							  style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">TRANSPORTATION</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Car Payment:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="CarPaymentAmount"
																						 name="CarPaymentAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddTransport();"
																						 class="TransportExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Insurance:</td>
									<td bgcolor="orange"><input type="text" id="CarInsuranceAmount" name="CarInsuranceAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddTransport();" class="TransportExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Gas for Vehicle:</td>
									<td bgcolor="orange"><input type="text" id="GasolineAmount" name="GasolineAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddTransport();" class="TransportExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Maintenance/Repairs:</td>
									<td bgcolor="orange"><input type="text" id="MaintainRepairAmount" name="MaintainRepairAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddTransport();" class="TransportExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Bus/Cab/Other:</td>
									<td bgcolor="orange"><input type="text" id="BusCabAmount" name="BusCabAmount" maxlength="8"
																		 size="10" placeholder="0.00" onkeyup="AddTransport();"
																		 class="TransportExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalTransport"
																												name="TotalTransport" type="text"
																												readonly maxlength="12" size="10">
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextTransport" type="button" class="nextbutton"
												  onclick="ShowEntertainExpenses();">Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--TRANSPORTATION-->

					<div style="float: left; width: 100%;">
						<div id="EntertainExpenses"
							  style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">ENTERTAINMENT</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Movie or Date Night:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="MovieDateAmount"
																						 name="MovieDateAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddEntertain();"
																						 class="EntertainExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="EntertainOther1Amount"
																		 name="EntertainOther1Amount" maxlength="8" size="10"
																		 placeholder="0.00" onkeyup="AddEntertain();"
																		 class="EntertainExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="EntertainOther2Amount"
																		 name="EntertainOther2Amount" maxlength="8" size="10"
																		 placeholder="0.00" onkeyup="AddEntertain();"
																		 class="EntertainExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="EntertainOther3Amount"
																		 name="EntertainOther3Amount" maxlength="8" size="10"
																		 placeholder="0.00" onkeyup="AddEntertain();"
																		 class="EntertainExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalEntertain"
																												name="TotalEntertain" type="text"
																												readonly maxlength="12" size="10">
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextEntertain" type="button" class="nextbutton" onclick="ShowDebtExpenses();">
											Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--ENTERTAINMENT-->

					<div style="float: left; width: 100%;">
						<div id="DebtExpenses" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">DEBT</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">School Loans:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="SchoolLoanAmount"
																						 name="SchoolLoanAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddDebt();"
																						 class="DebtExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Credit Cards:</td>
									<td bgcolor="orange"><input type="text" id="CreditCardAmount" name="CreditCardAmount"
																		 maxlength="8" size="10" placeholder="0.00" onkeyup="AddDebt();"
																		 class="DebtExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other Loans:</td>
									<td bgcolor="orange"><input type="text" id="OtherLoansAmount" name="OtherLoansAmount"
																		 maxlength="8" size="10" placeholder="0.00" onkeyup="AddDebt();"
																		 class="DebtExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other Debt:</td>
									<td bgcolor="orange"><input type="text" id="OtherDebtAmount" name="OtherDebtAmount"
																		 maxlength="8" size="10" placeholder="0.00" onkeyup="AddDebt();"
																		 class="DebtExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class=" button-text"><input id="TotalDebt" name="TotalDebt"
																												 type="text" readonly maxlength="12"
																												 size="10"></td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextDebt" type="button" class="nextbutton" onclick="ShowHouseholdExpenses();">
											Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--DEBT-->

					<div style="float: left; width: 100%;">
						<div id="HouseholdExpenses"
							  style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">HOUSEHOLD</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Kitchen Items:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="KitchenAmount" name="KitchenAmount"
																						 maxlength="8" size="10" placeholder="0.00"
																						 onkeyup="AddHousehold();" class="HouseholdExpenses"/>
									</td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Bathroom Items:</td>
									<td bgcolor="orange"><input type="text" id="BathroomAmount" name="BathroomAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddHousehold();" class="HouseholdExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Bedrooms:</td>
									<td bgcolor="orange"><input type="text" id="BedroomAmount" name="BedroomAmount" maxlength="8"
																		 size="10" placeholder="0.00" onkeyup="AddHousehold();"
																		 class="HouseholdExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other Rooms:</td>
									<td bgcolor="orange"><input type="text" id="OtherRoomsAmount" name="OtherRoomsAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddHousehold();" class="HouseholdExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalHousehold"
																												name="TotalHousehold" type="text"
																												readonly maxlength="12" size="10">
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextHousehold" type="button" class="nextbutton"
												  onclick="ShowOtherExpenses();">Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--HOUSEHOLD-->

					<div style="float: left; width: 100%;">
						<div id="OtherExpenses" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">OTHER EXPENSES</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Junk food on the run:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="JunkFoodAmount" name="JunkFoodAmount"
																						 maxlength="8" size="10" placeholder="0.00"
																						 onkeyup="AddOtherExpenses();" class="OtherExpenses"/>
									</td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">School Expense (Books,
										Tuition, Etc.):
									</td>
									<td bgcolor="orange"><input type="text" id="SchoolExpenseAmount" name="SchoolExpenseAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddOtherExpenses();" class="OtherExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other Taxes/Fees:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="OtherTaxesAmount"
																						 name="OtherTaxesAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddOtherExpenses();"
																						 class="OtherExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="OtherExpense1Amount" name="OtherExpense1Amount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddOtherExpenses();" class="OtherExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="OtherExpense2Amount" name="OtherExpense2Amount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddOtherExpenses();" class="OtherExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="OtherExpense3Amount" name="OtherExpense3Amount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddOtherExpenses();" class="OtherExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalOtherExpenses"
																												name="TotalOtherExpenses"
																												type="text" readonly maxlength="12"
																												size="10"></td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextOther" type="button" class="nextbutton"
												  onclick="ShowHealthcareExpenses();">Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--OTHER EXPENSES-->

				</div><!--END LEFT SIDE COLUMNS-->

				<div id="RightSideDiv" style="float: left; width: 50%;">
					<div style="float: left; width: 100%;">
						<div id="HealthcareExpenses"
							  style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">HEALTHCARE</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Insurance:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="HealthInsuranceAmount"
																						 name="HealthInsuranceAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddHealthcare();"
																						 class="HealthcareExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Prescriptions:</td>
									<td bgcolor="orange"><input type="text" id="PrescriptionsAmount" name="PrescriptionsAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddHealthcare();" class="HealthcareExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Doctor:</td>
									<td bgcolor="orange"><input type="text" id="DoctorAmount" name="DoctorAmount" maxlength="8"
																		 size="10" placeholder="0.00" onkeyup="AddHealthcare();"
																		 class="HealthcareExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Dentist:</td>
									<td bgcolor="orange"><input type="text" id="DentistAmount" name="DentistAmount" maxlength="8"
																		 size="10" placeholder="0.00" onkeyup="AddHealthcare();"
																		 class="HealthcareExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="HealthOtherAmount" name="HealthOtherAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddHealthcare();" class="HealthcareExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalHealthcare"
																												name="TotalHealthcare" type="text"
																												readonly maxlength="12" size="10">
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextHealthcare" type="button" class="nextbutton"
												  onclick="ShowDependentCareExpenses();">Next
										</button>
									</td>
								<tr>
							</table>
						</div>
						<br><br>
					</div><!--HEALTHCARE-->

					<div style="float: left; width: 100%;">
						<div id="DependentCareExpenses"
							  style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">DEPENDENT CARE/SUPPORT</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Child Support you pay:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="ChildSupportPaidAmount"
																						 name="ChildSupportPaidAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddDependentSupport();"
																						 class="DependentExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Alimony/Spousal Support you
										pay:
									</td>
									<td bgcolor="orange"><input type="text" id="SpouseSupportPaidAmount"
																		 name="SpouseSupportPaidAmount" maxlength="8" size="10"
																		 placeholder="0.00" onkeyup="AddDependentSupport();"
																		 class="DependentExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Child/Day care (Fees per
										month):
									</td>
									<td bgcolor="orange"><input type="text" id="ChildcareAmount" name="ChildcareAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddDependentSupport();" class="DependentExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">School Fees you pay:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="SchoolFeesPaidAmount"
																						 name="SchoolFeesPaidAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddDependentSupport();"
																						 class="DependentExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Expense for disabled to
										work:
									</td>
									<td bgcolor="orange"><input type="text" id="ExpenseDisabledAmount"
																		 name="ExpenseDisabledAmount" maxlength="8" size="10"
																		 placeholder="0.00" onkeyup="AddDependentSupport();"
																		 class="DependentExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Medical for
										Elderly/Disabled:
									</td>
									<td bgcolor="orange"><input type="text" id="MedicalElderlyAmount" name="MedicalElderlyAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddDependentSupport();" class="DependentExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="OtherDependentAmount" name="OtherDependentAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddDependentSupport();" class="DependentExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalDependentExpense"
																												name="TotalDependentExpense"
																												type="text" readonly maxlength="12"
																												size="10"></td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextDependentCare" type="button" class="nextbutton"
												  onclick="ShowPersonalCareExpenses();">Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--DEPENDANTCARE-->

					<div style="float: left; width: 100%;">
						<div id="PersonalCareExpenses"
							  style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">PERSONAL CARE EXPENSES</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Laundry:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="LaundryAmount" name="LaundryAmount"
																						 maxlength="8" size="10" placeholder="0.00"
																						 onkeyup="AddPersonalCare();"
																						 class="PersonalCareExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Toiletries:</td>
									<td bgcolor="orange"><input type="text" id="ToiletriesAmount" name="ToiletriesAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddPersonalCare();" class="PersonalCareExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Haircuts:</td>
									<td bgcolor="orange"><input type="text" id="HaircutsAmount" name="HaircutsAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddPersonalCare();" class="PersonalCareExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="OtherPersonalAmount" name="OtherPersonalAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddPersonalCare();" class="PersonalCareExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalPersonalCare"
																												name="TotalPersonalCare" type="text"
																												readonly maxlength="12" size="10">
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextPersonalCare" type="button" class="nextbutton"
												  onclick="ShowClothingExpenses();">Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--PERSONALCARE-->

					<div style="float: left; width: 100%;">
						<div id="ClothingExpenses"
							  style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">CLOTHING/SHOES</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Adults:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="AdultClothesAmount"
																						 name="AdultClothesAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddClothing();"
																						 class="ClothingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Children:</td>
									<td bgcolor="orange"><input type="text" id="ChildClothesAmount" name="ChildClothesAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddClothing();" class="ClothingExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalClothing"
																												name="TotalClothing" type="text"
																												readonly maxlength="12" size="10">
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextClothing" type="button" class="nextbutton"
												  onclick="ShowPetCareExpenses();">Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--CLOTHING-->

					<div style="float: left; width: 100%;">
						<div id="PetCareExpenses" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">PETS</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Food:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="PetFoodAmount" name="PetFoodAmount"
																						 maxlength="8" size="10" placeholder="0.00"
																						 onkeyup="AddPets();" class="PetExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Health/Shots:</td>
									<td bgcolor="orange"><input type="text" id="PetHealthAmount" name="PetHealthAmount"
																		 maxlength="8" size="10" placeholder="0.00" onkeyup="AddPets();"
																		 class="PetExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other Pet Stuff:</td>
									<td bgcolor="orange"><input type="text" id="PetOtherAmount" name="PetOtherAmount"
																		 maxlength="8" size="10" placeholder="0.00" onkeyup="AddPets();"
																		 class="PetExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalPets" name="TotalPets"
																												type="text" readonly maxlength="12"
																												size="10"></td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextPetCare" type="button" class="nextbutton" onclick="ShowGiftExpenses();">
											Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--PETS-->

					<div style="float: left; width: 100%;">
						<div id="GiftExpenses" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">GIFTS</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Birthday/Anniversary:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="BdayAnnivAmount"
																						 name="BdayAnnivAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddGifts();"
																						 class="GiftExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Religious/Faith
										Organization:
									</td>
									<td bgcolor="orange"><input type="text" id="DogmaAmount" name="DogmaAmount" maxlength="8"
																		 size="10" placeholder="0.00" onkeyup="AddGifts();"
																		 class="GiftExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Fundraisers:</td>
									<td bgcolor="orange"><input type="text" id="FundraisersAmount" name="FundraisersAmount"
																		 maxlength="8" size="10" placeholder="0.00" onkeyup="AddGifts();"
																		 class="GiftExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalGifts" name="TotalGifts"
																												type="text" readonly maxlength="12"
																												size="10"></td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextGifts" type="button" class="nextbutton" onclick="ShowSavingLarge();">
											Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--GIFTS-->

					<div style="float: left; width: 100%;">
						<div id="SaveLargeItemExpenses"
							  style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">SAVINGS FOR LARGE ITEMS</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Furniture:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="FurnitureAmount"
																						 name="FurnitureAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddSavings();"
																						 class="SavingsExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Appliances:</td>
									<td bgcolor="orange"><input type="text" id="AppliancesAmount" name="AppliancesAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddSavings();" class="SavingsExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Trips/Vacation:</td>
									<td bgcolor="orange"><input type="text" id="TripsAmount" name="TripsAmount" maxlength="8"
																		 size="10" placeholder="0.00" onkeyup="AddSavings();"
																		 class="SavingsExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td bgcolor="orange"><input type="text" id="OtherSavingsAmount" name="OtherSavingsAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddSavings();" class="SavingsExpenses"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total $</td>
									<td style="font-weight:bold;" class="button-text"><input id="TotalSavings"
																												name="TotalSavings" type="text"
																												readonly maxlength="12" size="10">
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<button id="nextDone" type="button" class="nextbutton" onclick="ShowThatsAll();">Next
										</button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--SAVINGSLARGEITEMS-->

					<div style="float: left; width: 100%;">
						<div id="ThatsAllExpenses" style="float: left; width: 100%;">
							<?php
							foreach($_POST as $key => $value) {
								echo "<input type=\"hidden\" name=\"" . $key . "\" value=\"" . $value . "\">";
							}
							echo "<input type=\"hidden\" name=\"this_log\" value=\"" . $this_log . "\">";
							?>
							<table width="90%">
								<tr>
									<td align="center"><img src="images/clearpixel.png" height="150"></td>
								<tr>
								<tr>
									<td align="center">
										<button type="submit" class="donebutton" onclick="">Continue to Income entry --></button>
									</td>
								<tr>
							</table>
						</div>
					</div><!--THATSALLEXPENSES move to Income-->
				</div><!--END RIGHT SIDE COLUMNS-->


				<!-- ALLWAYS KEEP NEXT DIV AT THE VERY BOTTOM! This makes sure that the blue border stays bigger than the content. -->
				<div style="clear: both;">&nbsp;</div>

				<div id="TotalMonthlyExpenses"
					  style="width: 100%; border: 0px solid; border-color: #008FD9; position: relative; top: 50%; ">
					<table width="100%" border="0">
						<tr>
							<td class="button-text" align="right" style="font-weight:bold" width="90%">Total Monthly Expense
								$
							</td>
							<td style="font-weight:bold;" class="button-text" align="right" width="10%"><input
									id="TotalMonthly" name="TotalMonthlyExpenses" type="text" readonly></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
		<!-- END OUTSIDE FORM -->
		<br>
		<div align="center">
			<table align="center" border="0" style="font-size: 11px;">
				<tr>
					<td colspan="3"><p align="center"><img alt="Copyleft Yo!" height="10" width="10"
																		src="images/Copyleft.png"/> 2017 CirclesUSA.org</p></td>
				</tr>
				<tr>
					<td valign="middle" align="center">Powered with&nbsp;<img src="images/heart.png" height="10" width="10"
																								 alt="Love is all that matters">
						&nbsp;by VinceCo<br><br></td>
				</tr>
				<tr>
					<td colspan="3" align="center">
						<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
							<img alt="Creative Commons License" style="border-width:0"
								  src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png"/>
						</a>
						<br/>This work is licensed under a
						<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons
							Attribution-NonCommercial-ShareAlike 4.0 International License
						</a>.<br><br>
						HighCharts graphing is licensed separately from this work and is solely for use by Circles USA within
						the scope of this work.<br>
						Please contact HighCharts directly at <a href="http://www.highcharts.com/contact-email">http://www.highcharts.com/contact-email</a>
						to obtain your own license.<br><br>
					</td>
				</tr>
			</table>
		</div>
		<br><br>


	</body>
</html>
