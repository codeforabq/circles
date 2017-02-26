<?php

// SNAP = Supplemental Nutrition Assistance Program (i.e. food stamps)

//THIS VALUE ISN'T IN ANY TABLE . . . HARDCODED!
$SNAP_Max_Ben_AddCount = 11;
$SNAP_Max_People_Count = 10;

if(isset($_POST['cl_family_over60_check'])) {
	$elderly_disabled_home = $_POST['cl_family_over60_check'];
}

//LOOKUP SNAP INCOME LIMIT PERCENTAGES
$silp_sql = "SELECT gil_typical,gil_elderlydisabled FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$silp_result = $dbconn->query($silp_sql);
while($silp_row = $silp_result->fetch_assoc()) {
	$SNAP_LimitPercent_Standard = (str_replace("%", "", $silp_row['gil_typical'])) * .01;
	$SNAP_LimitPercent_ElderDisabled = $silp_row['gil_elderlydisabled'];
}

//LOOKUP GROSS INCOME ADDITIONAL DOLLAR AMOUNT
$giad_sql = "SELECT each_addtional_member FROM fpig WHERE house_members=$people_count;";
$giad_result = $dbconn->query($giad_sql);
while($giad_row = $giad_result->fetch_assoc()) {
	$Gross_Add_Dollar = ($giad_row['each_addtional_member'] / 12) * $SNAP_LimitPercent_Standard;
}

//CALCULATE GROSS INCOME LIMIT ADDEND1
$gil_addend1 = $Gross_Add_Dollar * ($people_count - $SNAP_Max_People_Count);

//LOOKUP GROSS INCOME FOR MAXIMUM HOUSEHOLD MEMBERS
$gimax_sql = "SELECT income_guide48 FROM fpig WHERE house_members='10';";
$gimax_result = $dbconn->query($gimax_sql);
while($gimax_row = $gimax_result->fetch_assoc()) {
	$Gross_Income_Maximum = $gimax_row['income_guide48'] / 12;
}

//CALCULATE GROSS INCOME COUNTABLE MAXIMUM
if($elderly_disabled_home = "No") {
	$Gross_Income_Countable_Maximum = $Gross_Income_Maximum * $SNAP_LimitPercent_Standard;
} else {
	$Gross_Income_Countable_Maximum = $Gross_Income_Maximum * $SNAP_LimitPercent_ElderDisabled;
}

//CALCULATE GROSS INCOME LIMIT AMOUNT
$Gross_Income_Limit_AmountSNAP = $gil_addend1 + $Gross_Income_Countable_Maximum;

//LOOKUP VEHICLE EQUITY
$ve_sql = "SELECT vehicle_equity,vehicle_resource_exclusion FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$ve_result = $dbconn->query($ve_sql);
while($ve_row = $ve_result->fetch_assoc()) {
	$vehicle_equity_allowed = $ve_row['vehicle_equity'];
	$vehicle_resource_exclusion = $ve_row['vehicle_resource_exclusion'];
}

//LOOKUP RESOURCE LIMITS
$edh_sql = "SELECT resource_limit_elderlydisabled,resource_limit_noelderlydisabled FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$edh_result = $dbconn->query($edh_sql);
while($edh_row = $edh_result->fetch_assoc()) {
	if($elderly_disabled_home == "Yes") {
		$resource_limit_amount = $edh_row['resource_limit_elderlydisabled'];
	} else {
		$resource_limit_amount = $edh_row['resource_limit_noelderlydisabled'];
	}
}

if($vehicle_equity_allowed == "0") {
	$EVvehicle1 = "0";
	$EVothervehicle = "0";
}
$total_value_assets = $checking_account_bal + $savings_account_bal + $EVvehicle1 + $EVothervehicle + $EVpersonal + $EVnonResi + $EVallCountable;
$total_of_vehicles = $EVvehicle1 + $EVothervehicle;
$vehicle_adjustment = $total_of_vehicles - $vehicle_resource_exclusion;
$adjusted_asset_value = $total_value_assets - $vehicle_adjustment;

if($resource_limit_amount > $adjusted_asset_value) {
	$passSNAP_resource_test = "True";
} else {
	$passSNAP_resource_test = "False";
}

if($elderly_disabled_home == "No") {
	$household_elderly_code = 0;
} else {
	$household_elderly_code = 1;
}
//if ($homeless_home=="No"){$homelesscode=0;}else{$homelesscode=2;}
$homelesscode = 0;
if($every_member_benefits == "No") {
	$everymembercode = 0;
} else {
	$everymembercode = 4;
}
$household_status_code = $household_elderly_code + $homelesscode + $everymembercode;

if($TotalIncome < $Gross_Income_Limit_AmountSNAP) {
	$gross_income_testSNAP = "TRUE";
} else {
	$gross_income_testSNAP = "FALSE";
}

if($household_status_code > 3) {
	$shall_we_proceed = "Yes";
	if($TotalIncome > $Gross_Income_Limit_AmountSNAP) {
		$shall_we_proceed = "No";
	} else {
		$shall_we_proceed = "Yes";
	}
}

//DETERMINE NET INCOME ELIGIBILITY
if(isset($_POST['UnEmploymentEtc'])) {
	$unearned_income_received = $_POST['UnEmploymentEtc'];
} else {
	$unearned_income_received = 0;
}
if(isset($_POST['MedicalElderlyAmount'])) {
	$MedicalElderlyAmount = $_POST['MedicalElderlyAmount'];
} else {
	$MedicalElderlyAmount = 0;
}

//LOOKUP SNAP MONTHLY MEDICAL ALLOWANCE
$medallow_sql = "SELECT excessMeddeduct FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$medallow_result = $dbconn->query($medallow_sql);
while($medallow_row = $medallow_result->fetch_assoc()) {
	$Medical_AllowanceSNAP = $medallow_row['excessMeddeduct'];
}

//LOOKUP SNAP DISREGARD PERCENTAGE
$sdp_sql = "SELECT disregardEID FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$sdp_result = $dbconn->query($sdp_sql);
while($sdp_row = $sdp_result->fetch_assoc()) {
	$SNAP_DisregardPercent = $sdp_row['disregardEID'] * .01;
}

$whichdeduct = "std_deduct_h" . $people_count;
$stddeduct_sql = "SELECT $whichdeduct FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$stddeduct_result = $dbconn->query($stddeduct_sql);
while($stddeduct_row = $stddeduct_result->fetch_assoc()) {
	$SNAP_StandardDeduction = $stddeduct_row[$whichdeduct];
}

$earned_income_disregardSNAP = $TotalEarnedIncome * $SNAP_DisregardPercent;

if($elderly_disabled_home == "Yes") {
	$medical_expense_allowanceSNAP = max(($MedicalElderlyAmount - $medical_expense_allowanceSNAP), 0);
} else {
	$medical_expense_allowanceSNAP = 0;
}

//LOOKUP DEPENDANT CARE DEDUCTION AND CHILD SUPPORT PAID DEDUCTION
$ChildSupportPaidAmount = $_POST['ChildSupportPaidAmount'];
$dcdeduct_sql = "SELECT depend_allow,child_supp_paid_deduct FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$dcdeduct_result = $dbconn->query($dcdeduct_sql);
while($dcdeduct_row = $dcdeduct_result->fetch_assoc()) {
	$SNAP_DependentAllowance = $dcdeduct_row['depend_allow'];
	$SNAP_ChildSupportPaidDeduction = $dcdeduct_row['child_supp_paid_deduct'];
	if($SNAP_DependentAllowance == -1) {
		$SNAP_DependentCareDeduction = $ChildcareAmount;
	} else {
		$SNAP_DependentCareDeduction = min($ChildcareAmount, $SNAP_ChildSupportPaidDeduction);
	}
}

//CALCULATE CHILD SUPPORT PAID DEDUCTION
if($SNAP_ChildSupportPaidDeduction = -1) {
	$SNAP_ChildSupportPaid = $ChildSupportPaidAmount;
} else {
	$SNAP_ChildSupportPaid = min($ChildSupportPaidAmount, $SNAP_ChildSupportPaidDeduction);
}

//CALCULATE THE TOTAL NON-SHELTER DEDUCTIONS
$SNAPTotal_NonShelterDeductions = $earned_income_disregardSNAP + $SNAP_StandardDeduction + $medical_expense_allowanceSNAP + $SNAP_DependentCareDeduction + $SNAP_ChildSupportPaid;
$SNAPIncome_AfterNonShelterDeductions = max(0, ($TotalIncome - $SNAPTotal_NonShelterDeductions));

//CALCULATE UNADJUSTED SHELTER COSTS
$cl_utilities = $_POST['cl_utilities'];

if($homelesscode > 0) {
	$SNAPstandard_utility_allowance = 0;
} else {
	$sua_sql = "SELECT $cl_utilities FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
	$sua_result = $dbconn->query($sua_sql);
	while($sua_row = $sua_result->fetch_assoc()) {
		$SNAPstandard_utility_allowance = $sua_row[$cl_utilities];
	}
}

$SNAP_MonthlyRentMortgage = $_POST['MortgageRentAmount'];
$SNAP_InsuranceNotInc = $_POST['InsuranceNotInc'];
$SNAP_TaxesNotInc = $_POST['TaxesNotInc'];

$SNAP_Total_UnadjustedShelterCosts = $SNAPstandard_utility_allowance + $SNAP_MonthlyRentMortgage + $SNAP_InsuranceNotInc + $SNAP_TaxesNotInc;

//IANSD = Income After Non-Shelter Deductions
$SNAP_50percent_IANSD = $SNAPIncome_AfterNonShelterDeductions * .5;

//CALCULATE EXCESS SHELTER DEDUCTION
if($elderly_disabled_home == "Yes") {
	$calc_Excess_Shelter_Deduct = $SNAP_Total_UnadjustedShelterCosts - $SNAP_50percent_IANSD;
} else {
	$esmax_sql = "SELECT excess_shelter_max,excess_shelter_homeless FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
	$esmax_result = $dbconn->query($esmax_sql);
	while($esmax_row = $esmax_result->fetch_assoc()) {
		$SNAP_Excess_Shelter = $esmax_row['excess_shelter_max'];
		$SNAP_Excess_Homeless = $esmax_row['excess_shelter_homeless'];
	}

	if(($household_status_code == "0") || ($household_status_code == "4")) {
		$household_status_amount = $SNAP_Excess_Shelter;
	}
	if(($household_status_code == "1") || ($household_status_code == "5")) {
		$household_status_amount = $SNAP_Total_UnadjustedShelterCosts;
	}
	if(($household_status_code == "2") || ($household_status_code == "3") || ($household_status_code == "6") || ($household_status_code == "7")) {
		$household_status_amount = $SNAP_Excess_Homeless;
	}

	$calc_Excess_Shelter_Deduct = min($SNAP_Total_UnadjustedShelterCosts - $SNAP_50percent_IANSD, $household_status_amount);
}

$SNAP_Excess_Shelter_Deduct = max(0, $calc_Excess_Shelter_Deduct);

$SNAP_Net_Food_Assistance_Income = $SNAPIncome_AfterNonShelterDeductions - $SNAP_Excess_Shelter_Deduct;

if($household_status_code > $SNAP_Net_Food_Assistance_Income) {
	$SNAP_Net_Income_Test = "True";
} else {
	$SNAP_Net_Income_Test = "False";
}

//BENEFIT CALCULATION
//=IF(HouseHoldSize<MaxBen_AddCount,VLOOKUP(HouseHoldSize,Max_Benefit_Table,2,1)
if($people_count < $SNAP_Max_Ben_AddCount) {
	$whichmaxbeni = "maxbeni_h" . $people_count;
	$maxbeni_sql = "SELECT $whichmaxbeni FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
	$maxbeni_result = $dbconn->query($maxbeni_sql);
	while($maxbeni_row = $maxbeni_result->fetch_assoc()) {
		$SNAP_Max_Monthly_Benefit = $maxbeni_row[$whichmaxbeni];
	}
} //,((MaxBen_AddCountDollar*(HouseHoldSize-MaxBen_MaxCount))+MaxBen_MaxCountDollar))
else {
	$whatmaxbeni = "maxbeni_h" . $SNAP_Max_People_Count;
	$maxbendollar_sql = "SELECT $whatmaxbeni,maxbeni_add FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
	$maxbendollar_result = $dbconn->query($maxbendollar_sql);
	while($maxbendollar_row = $maxbendollar_result->fetch_assoc()) {
		$SNAP_Max_AddCount_Amount = $maxbendollar_row['maxbeni_add'];
		$SNAP_Max_Count_Amount = $maxbendollar_row[$whatmaxbeni];
	}
	$SNAP_Max_Monthly_Benefit = ($SNAP_Max_AddCount_Amount($people_count - $SNAP_Max_People_Count)) + $SNAP_Max_Count_Amount;
}

//=MAX(E157*0.3,0)
$SNAP30_Net_Food_Assistance_Income = max($SNAP_Net_Food_Assistance_Income * .3, 0);

//=IF(AND(SNAP_Resource_Test=TRUE,SNAP_Net_Income_Test=TRUE,OR(SNAP_Gross_Income_Test=TRUE,ElderlyDisableInHouse="y")), IF(HouseholdStatusCode<3, IF(BenefitCalc_Initial<SNAP_Minimum_Benefit,SNAP_Minimum_Benefit, (E161 - E162)),MAX(0,(E161 - E162))),"")
//if (($passSNAP_resource_test=="True"&&$SNAP_Net_Income_Test=="True")||($gross_income_testSNAP=="True"&&$elderly_disabled_home=="Yes"))
//{

//}
$SNAP_Estimated_Monthly_Benefit = 771;

//=IF(AND(SNAP_Resource_Test=TRUE,SNAP_Net_Income_Test=TRUE,OR(SNAP_Gross_Income_Test=TRUE,ElderlyDisableInHouse="y")),VLOOKUP(E164,EBT_Allotments_Table,HouseHoldSize+3),0)
if(($passSNAP_resource_test == "True" && $SNAP_Net_Income_Test == "True") || ($gross_income_testSNAP == "True" && $elderly_disabled_home == "Yes")) {
	$whichallotment = "ebt_p" . $people_count;
	$ebt_sql = "SELECT $whichallotment FROM ebt_allotment WHERE mni_from>=$SNAP30_Net_Food_Assistance_Income AND mni_to<=$SNAP30_Net_Food_Assistance_Income;";
	$ebt_result = $dbconn->query($ebt_sql);
	while($ebt_row = $ebt_result->fetch_assoc()) {
		$SNAP_EBT_Allotment = $ebt_row[$whichallotment];
	}
} else {
	$SNAP_EBT_Allotment = 0;
}


//echo "<br><br>DOLLASNAP_LimitPercent_Standard==".$SNAP_LimitPercent_Standard."<br><br>";
//echo "<br><br>DOLLAGross_Add_Dollar==".$Gross_Add_Dollar."<br><br>";
//echo "<br><br>DOLLAgil_addend1==".$gil_addend1."<br><br>";
//echo "<br><br>DOLLAGross_Income_Maximum==".$Gross_Income_Maximum."<br><br>";
//echo "<br><br>DOLLAGross_Income_Countable_Maximum==".$Gross_Income_Countable_Maximum."<br><br>";
//echo "<br><br>DOLLAGross_Income_Limit_AmountSNAP==".$Gross_Income_Limit_AmountSNAP."<br><br>";
//echo "<br><br>DOLLAearned_income_disregardSNAP==".$earned_income_disregardSNAP."<br><br>";
//echo "<br><br>DOLLASNAP_StandardDeduction==".$SNAP_StandardDeduction."<br><br>";
//echo "<br><br>DOLLAMedical_AllowanceSNAP==".$Medical_AllowanceSNAP."<br><br>";
//echo "<br><br>DOLLASNAP_DependentCareDeduction==".$SNAP_DependentCareDeduction."<br><br>";
//echo "<br><br>DOLLASNAP_ChildSupportPaid==".$SNAP_ChildSupportPaid."<br><br>";
//echo "<br><br>DOLLASNAPTotal_NonShelterDeductions==".$SNAPTotal_NonShelterDeductions."<br><br>";
//echo "<br><br>DOLLASNAPSNAPIncome_AfterNonShelterDeductions==".$SNAPIncome_AfterNonShelterDeductions."<br><br>";
//echo "<br><br>DOLLASNAPstandard_utility_allowance==".$SNAPstandard_utility_allowance."<br><br>";
//echo "<br><br>DOLLASNAP_Total_UnadjustedShelterCosts==".$SNAP_Total_UnadjustedShelterCosts."<br><br>";
//echo "<br><br>DOLLAhousehold_status_code==".$household_status_code."<br><br>";
//echo "<br><br>DOLLASNAP_Excess_Shelter_Deduct==".$SNAP_Excess_Shelter_Deduct."<br><br>";
//echo "<br><br>DOLLASNAP_Net_Income_Test==".$SNAP_Net_Income_Test."<br><br>";
//echo "<br><br>DOLLASNAP_Max_Monthly_Benefit==".$SNAP_Max_Monthly_Benefit."<br><br>";
//echo "<br><br>DOLLASNAP30_Net_Food_Assistance_Income==".$SNAP30_Net_Food_Assistance_Income."<br><br>";
//echo "<br><br>DOLLASNAP_EBT_Allotment==".$SNAP_EBT_Allotment."<br><br>";


?>
