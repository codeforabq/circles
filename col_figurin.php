<?php

// COL = Cost of Living

//LOOKUP COST OF LIVING AMOUNTS BASED ON FAMILY COMPOSITION
if(isset($HowManyAdults)) {
	$adults = $HowManyAdults;
} else {
	$adults = "0";
}
if(isset($HowManyChildren)) {
	$children = $HowManyChildren;
	if($children > 3) {
		$children = "3";
	}
} else {
	$children = "0";
}
if(isset($cl_input['cl_adults_FT'])) {
	$working = "1";
} else {
	$working = "0";
}
$county = $cl_input['cl_county'];
$state = $cl_input['cl_state'];

if($adults = 1) {
	$working = 0;
}

$awc = "a" . $adults . "w" . $working . "c" . $children;

$costofliving = 0;

$ea_sql = "SELECT type_name, " . $awc . " FROM expense_allowances WHERE county_name=\"" . $county . "\" AND state_name=\"" . $state . "\";";
$ea_result = $dbconn->query($ea_sql);
while($ea_row = $ea_result->fetch_assoc()) {
	$monthly_allow = $ea_row[$awc];
	$costofliving = $monthly_allow + $costofliving;
}
$costofliving = ceil($costofliving / 12);

//echo "<br>COST OF LIVING == ".$costofliving."<br>";

$col_RequiredAnnual = $costofliving * 12;
$col_AnnualTaxes = $col_RequiredAnnual * .18;
$col_RequiredGrossAnnual = $col_RequiredAnnual + $col_AnnualTaxes;

//=(I16*9.5%)/12
$col_Obama = ($col_RequiredGrossAnnual * .095) / 12;

$medcol_sql = "SELECT " . $awc . " FROM expense_allowances WHERE county_name=\"" . $county . "\" AND state_name=\"" . $state . "\" AND type_name=\"Medical\";";
//echo "<br><br>MEDCOL_SQL == ".$medcol_sql."<br>";
$medcol_result = $dbconn->query($medcol_sql);
$medcol_row = $medcol_result->fetch_assoc();
$col_MonthlyMedical = $medcol_row[$awc] / 12;

//echo "<br>COST OF LIVING MONTHLY MEDICAL == ".number_format($col_MonthlyMedical)."<br>";


?>
