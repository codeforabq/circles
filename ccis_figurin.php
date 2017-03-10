<?php

// CCIS = Child Care Information Services

//$passSNAP_resource_test == Spreadsheet CCIS_B19
//$ThisGrossIncome == Spreadsheet CCIS_B29
//$people_count == CCIS_21
//$TotalEarnedIncome == CCIS_22
//$TotalUnEarnedIncome == CCS_23-28

// $CCIS_Medical_Adjustment_Amount
// $CCIS_F30
// $deduct_spousesupport_amount line 106
// $CCIS_AlimonyPaid_Allowed line 108
// $CCIS_AlimonyPaid_Allowed line 110
// $people_count line 135
// $CCIS_EligibPercent1 line 144
// lines 193-196 most are undefined

//LOOKUP MONTHLY MAXIMUM MEDICAL DEDUCTION FOR STATE
$maxmed_sql = "SELECT income_adjust_childmedicalmax FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$maxmed_result = $dbconn->query($maxmed_sql);
while($maxmed_row = $maxmed_result->fetch_assoc()) {
	$CCIS_IncomeAdjust_Medical = $maxmed_row['income_adjust_childmedicalmax'];
}

//CALCULATE F30 from CCIS worksheet
$ExpenseDisabledAmount = $cl_input['ExpenseDisabledAmount'];
$MedicalElderlyAmount = $cl_input['MedicalElderlyAmount'];
$CCIS_F30 = $ExpenseDisabledAmount + $MedicalElderlyAmount;

//CALCULATE MEDICAL ADJUSTMENT
$CCIS_Medical_Adjustment_Amount = min($CCIS_F30, $CCIS_IncomeAdjust_Medical);

//LOOKUP WORK RELATED EXPENSES ADJUSTMENT FOR STATE
$workadj_sql = "SELECT income_adjust_work_related_expenses FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$workadj_result = $dbconn->query($workadj_sql);
while($workadj_row = $workadj_result->fetch_assoc()) {
	$CCIS_IncomeAdjust_WorkExpense = $workadj_row['income_adjust_work_related_expenses'];
}

//CALCULATE THE NUMBER OF FULL AND PARTTIME WORKERS
if(isset($cl_input['cl_adults_FT'])) {
	$Fulltime_Workers = $cl_input['cl_adults_FT'];
} else {
	$Fulltime_Workers = 0;
}
if(isset($cl_input['cl_adults_PT'])) {
	$Parttime_Workers = $cl_input['cl_adults_PT'];
} else {
	$Parttime_Workers = 0;
}
$CCIS_TotalWorking = $Fulltime_Workers + $Parttime_Workers;

//CALCULATE WORKEXPENSE AMOUNT BASED ON ADJUSTMENT AND NUMBER OF WORKERS
$CCIS_WorkExpense_Amount = $CCIS_IncomeAdjust_WorkExpense * $CCIS_TotalWorking;

//REFERENCE CHILDSUPPORT RECEIVED FROM TANF_FIGURIN
$child_support_received_amount = $child_support_received_amount;

//LOOKUP CHILDSUPPORT MAXIMUM DEDUCTION FOR STATE
$maxcsadj_sql = "SELECT income_adjust_childsupporin FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$maxcsadj_result = $dbconn->query($maxcsadj_sql);
while($maxcsadj_row = $maxcsadj_result->fetch_assoc()) {
	$CCIS_ChildSupportReceived_Allowed = $maxcsadj_row['income_adjust_childsupporin'];
}

//CALCULATE CHILDSUPPORT PAID AMOUNT
//=IF(monthly_child_support>=VLOOKUP(State_Abrv,Table8,50),VLOOKUP(State_Abrv,Table8,50),monthly_child_support)
if($child_support_received_amount >= $CCIS_ChildSupportReceived_Allowed) {
	$CCIS_ChildSupport_Amount = $CCIS_ChildSupportReceived_Allowed;
} else {
	$CCIS_ChildSupport_Amount = $child_support_received_amount;
}


//CALCULATE STEP PARENT ADJUSTMENT from CCIS worksheet B33
//=IF(VLOOKUP(State_Abrv,Table8,47)=FALSE,0,
//IF(Step_Parent="y",
//IF(HouseHoldSize<=6,VLOOKUP(CCIS_County_State,#REF!,HouseHoldSize),
//(VLOOKUP(CCIS_County_State,#REF!,6)+(VLOOKUP(CCIS_County_State,#REF!,7)*(HouseHoldSize-6)))),0))
$StepParentSatus = $cl_input['cl_family_stepparent_check'];

$CCIS_StepParent_Adjustment = 0;

//LOOKUP INCOME ADJUSMENT ALLOWED FOR CHILDSUPPORT PAID
$childsuppadj_sql = "SELECT income_adjust_childsupportpaid FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$childsuppadj_result = $dbconn->query($childsuppadj_sql);
while($childsuppadj_row = $childsuppadj_result->fetch_assoc()) {
	$CCIS_ChildSupportPaid_Allowed = $childsuppadj_row['income_adjust_childsupportpaid'];
}

//REFERENCE CHILDSUPPORT PAID FROM SNAP_FIGURIN
$ChildSupportPaidAmount = $ChildSupportPaidAmount;

//CALCULATE CHILDSUPPORT PAID ADJUSMENT
if($CCIS_ChildSupportPaid_Allowed == "True") {
	$CCIS_ChildSupportPaid_Amount = $ChildSupportPaidAmount;
} else {
	$CCIS_ChildSupportPaid_Amount = 0;
}

//LOOKUP INCOME ADJUSMENT ALLOWED FOR ALIMONY PAID
$aladj_sql = "SELECT income_adjust_alimonypaid FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$aladj_result = $dbconn->query($aladj_sql);
while($aladj_row = $aladj_result->fetch_assoc()) {
	$CCIS_AlimonyPaid_Allowed = $aladj_row['income_adjust_alimonypaid'];
}

//REFERENCE SPOUSESUPPORT aka alimony PAID FROM TANF_FIGURIN
$AlimonyPaidAmount = $deduct_spousesupport_amount;

//CALCULATE ALIMONY PAID ADJUSMENT
if($CCIS_AlimonyPaid_Allowed == "True") {
	$CCIS_AlimonyPaid_Amount = $AlimonyPaidAmount;
} else {
	$CCIS_AlimonyPaid_Amount = 0;
}

//=(((VLOOKUP(HouseHoldSize,FPIG_Net_Inc_Limit_Table,2)))+(IF(HouseHoldSize>10,FPIG!$E$22*(HouseHoldSize-10),0)))*VLOOKUP(State_Abrv,Table8,52)

//REFERENCE GROSS INCOME MAXIMUM FROM SNAP_FIGURIN
$Gross_Income_Maximum = $Gross_Income_Maximum;

//LOOKUP CCIS ELIGIBILITY PERCENTAGE FOR TEST 1
$elip_sql = "SELECT ccis_eligible_test1,ccis_eligible_test2 FROM state_data WHERE state_init=\"" . $cl_stateinits . "\";";
$elip_result = $dbconn->query($elip_sql);
while($elip_row = $elip_result->fetch_assoc()) {
	$CCIS_EligibPercent1 = (str_replace("%", "", $elip_row['ccis_eligible_test1'])) * .01;
	$CCIS_EligibPercent2 = (str_replace("%", "", $elip_row['ccis_eligible_test2'])) * .01;
}

//REFERENCE MOOLA FOR PEOPLE COUNT OVER 10 FROM SNAP_FIGURIN
$Gross_Add_Dollar = $Gross_Add_Dollar;

//CALCULATE ADDITIONAL AMOUNT TO ADD TO NET INCOME LIMIT aka Gross_Add_Dollar
if($people_count > 10) {
	$CCIS_AdditionalNet_Amount = $Gross_Add_Dollar * ($people_count - 10);
} else {
	$CCIS_AdditionalNet_Amount = 0;
}

//CALCULATE TOTAL ADDITIONAL NET INCOME AMOUNT
$CCIS_TotalNetIncome_Amount = $fpig100 + $CCIS_AdditionalNet_Amount;

$CCIS_FPIG150Monthly_Amount = $CCIS_TotalNetIncome_Amount * $CCIS_EligibPercent1;
$CCIS_FPIG150Annual_Amount = $CCIS_FPIG150Monthly_Amount * 12;

//CALCULATE THE KIDDOS LESS THAN 13 YEARS OLD AND THEIR AGES
$CCIS_KidsLessThan13_Check = $cl_input['less_than_thirteen_check'];
if($CCIS_KidsLessThan13_Check == "Yes") {
	$CCIS_TotalAgesLessThan13 = 0;
	$CCIS_KidsLessThan13_Amount = $cl_input['cl_less_than_thirteen'];
	$i = 1;
	while($i <= $CCIS_KidsLessThan13_Amount) {
		$which_childyears_post = "cl_child" . $i . "_years";
		$which_childmonths_post = "cl_child" . $i . "_months";
		$this_child_age = $cl_input[$which_childyears_post] + $cl_input[$which_childmonths_post];
		$CCIS_TotalAgesLessThan13 = $CCIS_TotalAgesLessThan13 + $this_child_age;
		$i++;
	}
} else {
	$CCIS_KidsLessThan13_Amount = 0;
}

//CALCULATE THE KIDDOS FROM 13 TO 18 YEARS OLD THAT ARE DISABLED
if(isset($cl_input['cl_unable'])) {
	$CCIS_KiddosUnable_Amount = $cl_input['cl_unable'];
} else {
	$CCIS_KiddosUnable_Amount = 0;
}

//AFTER HOUR WEEKEND HOUR PERCENTAGES FOR NM
if(strtolower($cl_stateinits) == "nm") {
	if(isset($CCIS_MoreHours)) {
		if(($CCIS_MoreHours <= 10) && ($CCIS_MoreHours > 0)) {
			$CCIS_AfterHours = "5%";
		}
		if(($CCIS_MoreHours >= 11) && ($CCIS_MoreHours <= 20)) {
			$CCIS_AfterHours = "10%";
		}
		if($CCIS_MoreHours >= 20) {
			$CCIS_AfterHours = "15%";
		}
	}
}

//REFERENCE TO CCIS WORKSHEET FOR MAX SUBSIDY PAYMENT FOR 3 KIDS IN TEST
$CCIS_MaxSubsidy_Amount = 1463.05;


//CALCULATE TOTAL VALUE OF ASSETS
if($vehicle_equity_allowed == 1) {
	$CCIS_total_value_assets = $checking_account_bal + $savings_account_bal + $EVvehicle1 + $EVothervehicle + $EVpersonal + $EVnonResi + $EVallCountable;
} else {
	$CCIS_total_value_assets = $checking_account_bal + $EVothervehicle + $EVpersonal + $EVnonResi + $EVallCountable;
}

//


?>
