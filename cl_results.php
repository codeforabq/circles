<!DOCTYPE HTML>
<html>
	<?php
	include("config.php");
	require_once('functions.php');
	LogPostValuesToLog($_POST['this_log'], 'cl_income');

	// Everything that was collected in the previous forms
	$cl_input = array();
	foreach($_POST as $key => $value) {
		$cl_input[$key] = $value;
	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			Circles USA CEPT
		</title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
			${demo.css}
		</style>

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
				width: 80%;
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
			/ / display: inline;
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
			/ / font-weight: bold;
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
		</style><!--CUSA STYLE-->
	</head>
	<body>
		<!-- BEGIN CUSA HEAD -->
		<div id="MainDIV" class="centered">
			<!-- START HEADER -->
			<div style="float: left;">
				<img alt="Circles USA" id="cusalogo" src="images/circles-usa-new.png" style="display: inline;"/>
			</div>
			<div style="text-align: center; float: right;">
				<h2 class="h2">Cliff Effect Planning Tool</h2>
			</div>
			<div style="text-align: center; float: left; width: 100%;">
				<p class="p1">
					<br>Circle Leader
					<?php
					if(isset($cl_input['cl_adults'])) {
						$HowManyAdults = $cl_input['cl_adults'];
					} else {
						$HowManyAdults = 0;
					}
					echo $HowManyAdults;
					?>
					Adults with
					<?php
					if(isset($cl_input['cl_thirteen_to_twenty'])) {
						$HowMany13to20s = $cl_input['cl_thirteen_to_twenty'];
					} else {
						$HowMany13to20s = 0;
					}
					if(isset($cl_input['cl_less_than_thirteen'])) {
						$HowManyLessThan13s = $cl_input['cl_less_than_thirteen'];
					} else {
						$HowManyLessThan13s = 0;
					}
					$HowManyChildren = $HowMany13to20s + $HowManyLessThan13s;
					echo $HowManyChildren;
					?>

					Children -

					<?php
					$cl_county = $cl_input["cl_county"];
					$cl_state = $cl_input["cl_state"];
					echo $cl_input["cl_city"] . ", " . $cl_county . ", " . $cl_state;

					$people_count = $HowManyAdults + $HowManyChildren;

					$dbconn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

					if($dbconn->connect_errno > 0) {
						die('Unable to connect to database [' . $db->connect_error . ']');
					}

					$fpig_sql = "SELECT income_guide48 FROM fpig WHERE house_members=\"$people_count\";";
					$fpig_result = $dbconn->query($fpig_sql);
					$fpig_row = $fpig_result->fetch_assoc();
					$fpig100 = $fpig_row["income_guide48"] / 12;
					$fpig200 = ($fpig_row["income_guide48"] * 2) / 12;
					//$dbconn->close();

					$plotpoints = 19;

					$TotalEarnedIncome = str_replace(',', '', $cl_input["TotalEarned"]);
					//echo "<br><br>TOTALEARNEDINCOME == ".$TotalEarnedIncome."<br><br>";
					$TotalUnEarnedIncome = str_replace(',', '', $cl_input["TotalUnEarned"]);
					//echo "TOTALUNEARNEDINCOME == ".$TotalUnEarnedIncome."<br><br>";
					$TotalIncome = $TotalEarnedIncome + $TotalUnEarnedIncome;

					if($people_count > 8) {
						$hud_people_count = 8;
					} else {
						$hud_people_count = $people_count;
					}
					$hudi = "i50_" . $hud_people_count;
					$hud_sql = "SELECT " . $hudi . " FROM nm_hud_income_limits WHERE county_statename=\"" . $cl_county . " County, " . $cl_state . "\";";
					$hud_result = $dbconn->query($hud_sql);
					$hud_row = $hud_result->fetch_assoc();
					$HUD_Income_Limit = $hud_row[$hudi];

					if(isset($cl_input['Bedrooms'])) {
						$cl_Bedrooms = $cl_input['Bedrooms'];
					} else {
						$cl_Bedrooms = 0;
					}
					if($cl_Bedrooms = 0) {
						$HUD_Room_Adjusment = 0.5;
					}
					if($cl_Bedrooms = 1) {
						$HUD_Room_Adjusment = 0.7;
					}
					if($cl_Bedrooms = 2) {
						$HUD_Room_Adjusment = 0.9;
					}
					if($cl_Bedrooms = 3) {
						$HUD_Room_Adjusment = 1.1;
					}
					if($cl_Bedrooms = 4) {
						$HUD_Room_Adjusment = 1.5;
					}
					if($cl_Bedrooms = 5) {
						$HUD_Room_Adjusment = 1.6;
					}

					if(isset($cl_input['AlimonyReceived'])) {
						$MAGI_AlimonyReceived = $cl_input['AlimonyReceived'];
					} else {
						$MAGI_AlimonyReceived = 0;
					}
					if(isset($cl_input['MonthlyGifts'])) {
						$MAGI_MonthlyGifts = $cl_input['MonthlyGifts'];
					} else {
						$MAGI_MonthlyGifts = 0;
					}
					if(isset($cl_input['ArmedForcesAmount'])) {
						$MAGI_ArmedForcesAmount = $cl_input['ArmedForcesAmount'];
					} else {
						$MAGI_ArmedForcesAmount = 0;
					}
					if(isset($cl_input['cl_family_college_students'])) {
						$Student_Count = $cl_input['cl_family_college_students'];
					} else {
						$Student_Count = 0;
					}
					if(isset($cl_input['GasAmount'])) {
						$cl_GasAmount = $cl_input['GasAmount'];
					} else {
						$cl_GasAmount = 0;
					}
					if(isset($cl_input['ElectricAmount'])) {
						$cl_ElectricAmount = $cl_input['ElectricAmount'];
					} else {
						$cl_ElectricAmount = 0;
					}

					require 'col_figurin.php';
					require 'tanf_figurin.php';
					require 'snap_figurin.php';
					require 'ccis_figurin.php';

					?>
				</p>
				<hr class="org-hr">
			</div>
			<!-- END CUSA HEAD -->
			<script src="hi_c_js/highcharts.js"></script>
			<script src="hi_c_js/modules/exporting.js"></script>

			<div>
				<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				<?php
				$fpig2avg = $fpig200 / $plotpoints;
				$current_column = ceil($TotalEarnedIncome / $fpig2avg);
				$current_hourly = ($TotalIncome) / (40 * 4);
				if($current_column > 19) {
					echo "<span style=\"color:red;\" class=\"p2\">A total montly income of $" . number_format($TotalIncome, 2) . " falls outside the data available for <br>subsidy calculations and graphing for a " . $people_count . " person home in " . $cl_input["cl_city"] . ", " . $cl_county . ", " . $cl_state . "!<br><br></span>";
					exit;
				}
				?>
			</div>
			<br>
			<br><br>
			<br><br>
			<br><br>
			<br>
			<div style="float: left; width: 100%;">
				<!--Button Here! This would be to set start point to current hourly wage instead of Zero -->
			</div>
			<br>
			<br>
			<div style="float: left; width: 100%;">
				<table border=1 cellpadding=2 cellspacing=2 width="100%" class="form-els" style="font-size: 14px;">
					<tr>
						<td style="font-weight:bold;">Hourly Wage</td>
						<?php
						$x = 1;
						while($x <= $plotpoints) {
							if($x == 1) {
								if($current_hourly == 0) {
									$current_line = 0;
								}
								$this_hourly = 0;
								${"this_hourly" . $x} = "0.00";
								echo "<td>" . number_format($this_hourly, 2) . "</td>";

								$x++;
							}
							if($current_column == 0) {
								$current_column = 1;
							}
							if($x == $current_column) {

								$current_line = $x - 1;
								//echo "CURRENT_LINE == ".$current_line."<br><br>";
								${"this_hourly" . $x} = $current_hourly;
								//echo "CURRENT_HOURLY == ".$current_hourly."<br><br>";

								echo "<td style=\"background-color:#33cc33; \"><span style=\"color:white;\">" . number_format($current_hourly, 2) . "</span></td>";
								$x++;
							}
							if($x == $plotpoints) {
								${"this_hourly" . $x} = ($fpig200) / (40 * 4);
								echo "<td>" . number_format(${"this_hourly" . $x}, 2) . "</td>";
								$x++;
							} else {
								$this_fpig2 = $fpig2avg * ($current_column - $x);
								$this_hourly = (($TotalEarnedIncome - $this_fpig2) / (40 * 4));
								${"this_hourly" . $x} = $this_hourly;
								echo "<td>" . number_format($this_hourly, 2) . "</td>";
								$x++;
							}
						}
						?>
					</tr>
					<tr>
						<td style="font-weight:bold;">100% FPIG</td>
						<?php
						for($x = 1; $x <= $plotpoints; $x++) {
							echo "<td>" . number_format($fpig100) . "</td>";
						}
						?>
					</tr>
					<tr>
						<td style="font-weight:bold;">200% FPIG</td>
						<?php
						for($x = 1; $x <= $plotpoints; $x++) {
							echo "<td>" . number_format($fpig200) . "</td>";
						}
						?>
					</tr>
					<tr>
						<td style="font-weight:bold;">Monthly Gross Income</td>
						<?php
						$x = 1;
						while($x <= $plotpoints) {
							if($x == 1) {
								$this_monthly = 0;
								${"this_monthly" . $x} = 0;
								echo "<td>" . number_format($this_monthly) . "</td>";
								$x++;
							}
							if($x == $current_column) {
								${"this_monthly" . $x} = $TotalIncome;
								echo "<td style=\"background-color:#33cc33; \"><span style=\"color:white;\">" . number_format($TotalIncome) . "</span></td>";
								$x++;
							}
							if($x == $plotpoints) {
								${"this_monthly" . $x} = $fpig200;
								echo "<td>" . number_format(${"this_monthly" . $x}) . "</td>";
								$x++;
							} else {
								$this_fpig2 = $fpig2avg * ($current_column - $x);
								$this_monthly = $TotalEarnedIncome - $this_fpig2;
								${"this_monthly" . $x} = $this_monthly;
								echo "<td>" . number_format($this_monthly) . "</td>";
								$x++;
							}
						}

						?>
					</tr>
					<tr>
						<td style="font-weight:bold;">Food Stamps</td>
						<?php
						$x = 1;
						while($x <= $plotpoints) {
							$This_TotalIncome = ${"this_monthly" . $x};
							$ThisGrossIncome = $This_TotalIncome + $TotalUnEarnedIncome;

							if($This_TotalIncome < $Gross_Income_Limit_AmountSNAP) {
								$This_SNAP_Gross_Income_Test = "True";
							} else {
								$This_SNAP_Gross_Income_Test = "False";
							}

							$earned_income_disregardSNAP = ${"this_monthly" . $x} * $SNAP_DisregardPercent;


							$SNAPTotal_NonShelterDeductions = $earned_income_disregardSNAP + $SNAP_StandardDeduction + $medical_expense_allowanceSNAP + $SNAP_DependentCareDeduction + $SNAP_ChildSupportPaid;
							$SNAPIncome_AfterNonShelterDeductions = max(0, $This_TotalIncome - $SNAPTotal_NonShelterDeductions);
							$SNAP_50percent_IANSD = $SNAPIncome_AfterNonShelterDeductions * .5;

							//=MAX(0,IF(ElderlyDisableInHouse="y",J154-J155,MIN(J154-J155,VLOOKUP(HouseholdStatusCode,XS_ShelterDedTable,2,TRUE))))
							if($elderly_disabled_home == "Yes") {
								$SNAP_Compare_Shelter_IANSD = $SNAP_Total_UnadjustedShelterCosts - $SNAP_50percent_IANSD;
							} else {
								$SNAP_Compare_Shelter_IANSD = min($SNAP_Total_UnadjustedShelterCosts - $SNAP_50percent_IANSD, $household_status_amount);
							}
							$SNAP_This_ExcessShelter_Deduction = max(0, $SNAP_Compare_Shelter_IANSD);

							//=MAX(0,J149-J156)
							$SNAP_This_NetFood_Assistance_Income = max(0, $SNAPIncome_AfterNonShelterDeductions - $SNAP_This_ExcessShelter_Deduction);

							if($fpig100 > $SNAP_This_NetFood_Assistance_Income) {
								$SNAP_This_NetIncomeLimit_Test = "True";
							} else {
								$SNAP_This_NetIncomeLimit_Test = "False";
							}

							//$SNAP_Max_Monthly_Benefit
							//=MAX(J157*0.3,0)
							$SNAP30_This_NetFoodAssistance = max($SNAP_This_NetFood_Assistance_Income * .3, 0);

							if($SNAP_This_NetFood_Assistance_Income > -1) {
								$SNAP_This_EBT_Lookup_Positive = $SNAP_This_NetFood_Assistance_Income;
							} else {
								$SNAP_This_EBT_Lookup_Positive = 0;
							}


							if(($passSNAP_resource_test == "True" && $SNAP_Net_Income_Test == "True") && ($This_SNAP_Gross_Income_Test == "True" || $elderly_disabled_home == "Yes")) {
								$whichallotment = "ebt_p" . $people_count;
								$ebt_sql = "SELECT $whichallotment FROM ebt_allotment WHERE mni_from>=$SNAP_This_EBT_Lookup_Positive;";
								$ebt_result = $dbconn->query($ebt_sql);
								$ebt_row = $ebt_result->fetch_assoc();
								$This_EBT_Allotment_Amount = $ebt_row[$whichallotment];

								${"this_snap" . $x} = $This_EBT_Allotment_Amount;
								echo "<td>" . number_format($This_EBT_Allotment_Amount);

								//echo "<br>This_TotalIncome == ".$This_TotalIncome."<br><br>";
								//echo "<br>TotalUnEarnedIncome == ".$TotalUnEarnedIncome."<br><br>";
								//echo "<br>ThisGrossIncome == ".$ThisGrossIncome."<br><br>";
								//echo "<br>Gross_Income_Limit_AmountSNAP == ".$Gross_Income_Limit_AmountSNAP."<br><br>";
								//echo "<br>This_SNAP_Gross_Income_Tes t== ".$This_SNAP_Gross_Income_Test."<br><br>";
								//echo "<br>passSNAP_resource_test == ".$passSNAP_resource_test."<br><br>";
								//echo "<br>earned_income_disregardSNAP == ".$earned_income_disregardSNAP."<br><br>";
								//echo "<br>SNAP_StandardDeduction == ".$SNAP_StandardDeduction."<br><br>";
								//echo "<br>medical_expense_allowanceSNAP == ".$medical_expense_allowanceSNAP."<br><br>";
								//echo "<br>SNAP_DependentCareDeduction == ".$SNAP_DependentCareDeduction."<br><br>";
								//echo "<br>SNAP_ChildSupportPaid == ".$SNAP_ChildSupportPaid."<br><br>";
								//echo "<br>SNAPTotal_NonShelterDeductions == ".$SNAPTotal_NonShelterDeductions."<br><br>";
								//echo "<br>SNAPIncome_AfterNonShelterDeductions == ".$SNAPIncome_AfterNonShelterDeductions."<br><br>";
								//echo "<br>SNAPstandard_utility_allowance == ".$SNAPstandard_utility_allowance."<br><br>";
								//echo "<br>SNAP_MonthlyRentMortgage == ".$SNAP_MonthlyRentMortgage."<br><br>";
								//echo "<br>SNAP_InsuranceNotInc == ".$SNAP_InsuranceNotInc."<br><br>";
								//echo "<br>SNAP_TaxesNotInc == ".$SNAP_TaxesNotInc."<br><br>";
								//echo "<br>SNAP_Total_UnadjustedShelterCosts == ".$SNAP_Total_UnadjustedShelterCosts."<br><br>";
								//echo "<br>SNAP_50percent_IANSD == ".$SNAP_50percent_IANSD."<br><br>";
								//echo "<br>SNAP_This_ExcessShelter_Deduction == ".$SNAP_This_ExcessShelter_Deduction."<br><br>";
								//echo "<br>SNAP_This_NetFood_Assistance_Income == ".$SNAP_This_NetFood_Assistance_Income."<br><br>";
								//echo "<br>SNAP_This_NetIncomeLimit_Test == ".$SNAP_This_NetIncomeLimit_Test."<br><br>";
								//echo "<br>SNAP_Max_Monthly_Benefit == ".$SNAP_Max_Monthly_Benefit."<br><br>";
								//echo "<br>SNAP30_This_NetFoodAssistance == ".$SNAP30_This_NetFoodAssistance."<br><br>";
								//echo "<br>SNAP_This_EBT_Lookup_Positive == ".$SNAP_This_EBT_Lookup_Positive."<br><br>";
								//echo $x;
								echo "</td>";
								//echo "<br> == ".."<br><br>";
								$x++;
							} else {
								${"this_snap" . $x} = "0.00";
								echo "<td bgcolor=\"lightgray\">" . number_format('0') . "</td>";
								$x++;
							}
						}

						?>
					</tr>
					<tr>
						<td style="font-weight:bold;">TANF</td>
						<?php
						$x = 1;
						while($x <= $plotpoints) {
							$earned_income_adjustment = ${"this_monthly" . $x} * $income_adjust_eidisregard;
							$earned_income_disregard_amount = max(0, $earned_income_adjustment);

							$this_countable_income = max(0, ${"this_monthly" . $x} - ($first_adult_deduct + $second_adult_deduct + $deduct_childsupport_amount +
									$incomeexpenses_amount + $childcare_max_deduction + $child_support_received1_amount + $child_support_received2_amount +
									$medical_elderly_disabled_amount + $earned_income_disregard_amount));

							if(${"this_monthly" . $x} <= $gross_income_limit_amount) {
								$this_gross_income_test = "TRUE";
							} else {
								$this_gross_income_test = "FALSE";
							}

							if($this_countable_income < $standard_of_need_total) {
								$this_adjustment_test = "TRUE";
							} else {
								$this_adjustment_test = "FALSE";
							}

							if(($this_gross_income_test = "TRUE") && ($child_test == "TRUE") && ($this_adjustment_test = "TRUE") && ($Resource_Test_Passed = "TRUE")) {
								$This_Monthly_Assist_Payment = $Total_MaxMonthly_Benefit - $this_countable_income;
								if($This_Monthly_Assist_Payment >= $States_Minimum_Payment) {
									$This_TANF_Subsidy_Amount = $This_Monthly_Assist_Payment;
								} else {
									$This_TANF_Subsidy_Amount = 0;
								}

								${"this_tanf" . $x} = $This_TANF_Subsidy_Amount;
								if($This_TANF_Subsidy_Amount > 0) {
									echo "<td>" . number_format($This_TANF_Subsidy_Amount) . "</td>";
								} else {
									echo "<td bgcolor=\"lightgray\">" . number_format($This_TANF_Subsidy_Amount) . "</td>";
								}
							} else {
								${"this_tanf" . $x} = 0;
								echo "<td bgcolor=\"lightgray\">0</td>";
							}

							$x++;
						}

						?>
					</tr>
					<tr>
						<td style="font-weight:bold;">Child Care</td>
						<?php
						$x = 1;
						while($x <= $plotpoints) {
							if($HowManyChildren != 0) {
								$CCIS_Income_Counted = ${"this_monthly" . $x};
								$CCIS_CountedIncome_Adjusted = $CCIS_Income_Counted - ($CCIS_Medical_Adjustment_Amount + $CCIS_WorkExpense_Amount + $CCIS_ChildSupport_Amount + $CCIS_StepParent_Adjustment + $CCIS_ChildSupportPaid_Amount + $CCIS_AlimonyPaid_Amount);
								$CCIS_AdjustedIncome_Amount = max(0, $CCIS_CountedIncome_Adjusted);
								$CCIS_AdjustedIncome_Annual = $CCIS_AdjustedIncome_Amount * 12;
								if($CCIS_FPIG150Annual_Amount >= $CCIS_AdjustedIncome_Annual) {
									$CCIS_AnnualIncomeTest = "True";
								} else {
									$CCIS_AnnualIncomeTest = "Fals";
								}
								if(($CCIS_KidsLessThan13_Amount + $CCIS_KiddosUnable_Amount) > .5) {
									$CCIS_ChldAge_Test = "True";
								} else {
									$CCIS_ChldAge_Test = "False";
								}
								$passSNAP_resource_test = $passSNAP_resource_test;

								$whichcopay = "copay_p" . $people_count;
								$whichccis = strtolower($cl_stateinits) . "_ccis_copay";
								//echo "<br><br>ccp_sql = SELECT ".$whichcopay." FROM ".$whichccis." WHERE mni_from>=".$CCIS_AdjustedIncome_Amount."<br><br>";
								$ccp_sql = "SELECT $whichcopay FROM $whichccis WHERE mni_from>=$CCIS_AdjustedIncome_Amount;";
								$ccp_result = $dbconn->query($ccp_sql);
								$ccp_row = $ccp_result->fetch_assoc();
								$CCIS_Child1_ThisCoPay_Amount = $ccp_row[$whichcopay];

								if($CCIS_KidsLessThan13_Amount > 1) {
									$CCIS_ChildMore_ThisCopay_Amount = ($CCIS_KidsLessThan13_Amount - 1) * ($CCIS_Child1_ThisCoPay_Amount / 2);
								} else {
									$CCIS_ChildMore_ThisCopay_Amount = 0;
								}
								$CCIS_TotalMonthlyCopay = $CCIS_Child1_ThisCoPay_Amount + $CCIS_ChildMore_ThisCopay_Amount;
								$CCIS_SubsidyLessCopay = max(($CCIS_MaxSubsidy_Amount - $CCIS_Child1_ThisCoPay_Amount), 0);
							} else {
								$$CCIS_ChldAge_Test = "False";
							}
							//=IF(AND(Z41=TRUE,Z42=TRUE,Z43=TRUE,Z67>0),Z67,0)
							if(($CCIS_AnnualIncomeTest == "True") && ($CCIS_ChldAge_Test == "True") && ($passSNAP_resource_test == "True") && ($CCIS_SubsidyLessCopay > 0))
								//CHANGE ME!!
								//$This_CCIS_NetSubsidy_Amount=1;
							{
								${"this_ccis" . $x} = $CCIS_SubsidyLessCopay;
								echo "<td>" . number_format($CCIS_SubsidyLessCopay);
								//echo "<br>Gross == ".${"this_monthly".$x}."<br>";
								//echo "<br>This_TotalIncome == ".$This_TotalIncome."<br><br>";
								//echo $x;
								echo "</td>";
								//echo "<br> == ".."<br><br>";								$x++;
								$x++;
							} else {
								${"this_ccis" . $x} = "0.00";
								echo "<td bgcolor=\"lightgray\">" . number_format('0') . "</td>";
								$x++;
							}
						}

						?>
					</tr>
					<tr>
						<td style="font-weight:bold;">Medical Assistance</td>
						<?php
						$MAGI_Income_Exclusions = $child_support_received_amount + $CCIS_AlimonyPaid_Amount + $MAGI_AlimonyReceived + $MAGI_MonthlyGifts + $MAGI_ArmedForcesAmount;
						$MAGI_FPIG133 = $fpig100 * 1.33;
						$MAGI_FPIG138 = $fpig100 * 1.38;
						$MAGI_5Exclusion = $MAGI_FPIG138 - $MAGI_FPIG133;

						$x = 1;
						while($x <= $plotpoints) {
							$MAGI_Adjusted_Gross_Income = ${"this_monthly" . $x} - $MAGI_Income_Exclusions;
							if($MAGI_Adjusted_Gross_Income <= $MAGI_FPIG133) {
								$MAGI_Adjusted_Monthly_Income = $MAGI_Adjusted_Gross_Income;
							} else {
								$MAGI_Adjusted_Monthly_Income = $MAGI_Adjusted_Gross_Income - $MAGI_5Exclusion;
							}

							if($MAGI_Adjusted_Monthly_Income <= $MAGI_FPIG133) {
								$MAGI_Eligible = "True";
							} else {
								$MAGI_Eligible = "False";
							}

							//=IF(O19=TRUE,MAX(Obamacare_estimate,Monthly_Cost_of_Living_Medical),0)
							if($MAGI_Eligible == "True") {
								$MAGI_Subsidy_Amount = max($col_Obama, $col_MonthlyMedical);

								${"this_magi" . $x} = $MAGI_Subsidy_Amount;
								echo "<td>" . number_format($MAGI_Subsidy_Amount);
								//echo "<br>THIS_MAGI".$x." == ".${"this_magi".$x};
								//echo "<br>THIS_MONTHLY".$x." == ".${"this_monthly".$x};
								//echo "<br>MAGI_Income_Exclusions ==".$MAGI_Income_Exclusions;
								//echo "<br>MAGI_Adjusted_Gross_Income ==".$MAGI_Adjusted_Gross_Income;
								//echo "<br>MAGI_5Exclusion == ".$MAGI_5Exclusion;
								//echo "<br>MAGI_Adjusted_Monthly_Income == ".$MAGI_Adjusted_Monthly_Income;
								//echo "<br>MAGI_Eligible == ".$MAGI_Eligible;
								echo "</td>";
								$x++;
							} else {
								${"this_magi" . $x} = "0.00";
								echo "<td bgcolor=\"lightgray\">" . number_format('0') . "</td>";
								$x++;
							}
						}

						?>
					</tr>
					<tr>
						<td style="font-weight:bold;">HUD Subsidy Pmt</td>
						<?php
						$HUD_Dependent_Count = $people_count + $Student_Count;

						//THE 480 BELOW IS A STATIC ENTRY . . . NOT A LOOKUP!?
						$HUD_Dependent_Allowance = 480 * $HUD_Dependent_Count;

						if($elderly_disabled_home == "Yes") {
							$HUD_ElderlyDisabled_Allowance = 400;
						} else {
							$HUD_ElderlyDisabled_Allowance = 0;
						}

						$EID_Count = 0;
						if(isset($cl_input['Butt_Section8'])) {
							if($cl_input['Butt_Section8'] == "Yes") {
								$EID_Count++;
							}
						}
						if(isset($cl_input['EIupemp'])) {
							if($cl_input['EIupemp'] == "Yes") {
								$EID_Count++;
							}
						}
						if(isset($cl_input['EIupPart'])) {
							if($cl_input['EIupPart'] == "Yes") {
								$EID_Count++;
							}
						}
						if(isset($cl_input['IncomeUp'])) {
							if($cl_input['IncomeUp'] == "Yes") {
								$EID_Count++;
							}
						}
						if($EID_Count >= 2) {
							$EID_Qualify = "Qualified";
						} else {
							$EID_Qualify = "Not Qualified";
						}

						if($EID_Qualify == "Qualified") {
							//We still have to get the Qualified person's name
							$EID_Qualified_Name = 1;
							//And the qualifying start date
							$EID_Qualified_Date = 1;

							//echo "<br><br><span style=\"color:red; font-weight:bold;\">NOT ENOUGH INFORMATION TO PROCESS THE EID AMOUNT FOR HUD SUBSIDY . . . PLEASE CONTACT THE DEVELOPER</span><br><br>";
							$EID_Amount = 0;
						} else {
							$EID_Amount = 0;
						}

						$x = 1;
						while($x <= $plotpoints) {

							$HUD_Annual_Income = ${"this_monthly" . $x} * 12;
							if($HUD_Income_Limit > $HUD_Annual_Income) {
								$HUD_Income_Test = "True";
							} else {
								$HUD_Income_Test = "False";
							}
							$HUD_NonReimbursed_Medical = $ExpenseDisabledAmount + $medical_elderly_amount;
							$HUD_3Annual_Income = $HUD_Annual_Income * .03;
							if($HUD_NonReimbursed_Medical - $HUD_3Annual_Income > 0) {
								$HUD_Allowable_MedExpense = $HUD_NonReimbursed_Medical - $HUD_3Annual_Income;
							} else {
								$HUD_Allowable_MedExpense = 0;
							}
							$HUD_Childcare_Allowance = $ChildcareAmount * 12;

							$HUD_EID_Allowances = $HUD_Allowable_MedExpense + $HUD_Dependent_Allowance + $HUD_ElderlyDisabled_Allowance + $HUD_Childcare_Allowance + $EID_Amount;

							if($HUD_Annual_Income - $HUD_EID_Allowances < 0) {
								$HUD_Monthly_Adjusted_Income = 0;
							} else {
								$HUD_Monthly_Adjusted_Income = ($HUD_Annual_Income - $HUD_EID_Allowances) / 12;
							}

							$HUD_30Monthly_Adjusted_Income = $HUD_Monthly_Adjusted_Income * .3;
							$HUD_10Monthly_Gross_Income = ${"this_monthly" . $x} * .1;

							if($HUD_30Monthly_Adjusted_Income > $HUD_10Monthly_Gross_Income) {
								$HUD_TenantRent_Amount = $HUD_30Monthly_Adjusted_Income;
							} else {
								$HUD_TenantRent_Amount = $HUD_10Monthly_Gross_Income;
							}

							if($cl_utilities == "sua2") {
								$HUD_Utility_Allowance = ($cl_ElectricAmount + $cl_GasAmount) * $HUD_Room_Adjusment;
								$HUD_AdjustedRent_Amount = $HUD_TenantRent_Amount - $HUD_Utility_Allowance;
								if($HUD_AdjustedRent_Amount < 0) {
									$HUD_Rent_Subsidy = $SNAP_MonthlyRentMortgage;
								} else {
									$HUD_Rent_Subsidy = $SNAP_MonthlyRentMortgage - $HUD_TenantRent_Amount;
								}
							} else {
								$HUD_Rent_Subsidy = $SNAP_MonthlyRentMortgage - $HUD_TenantRent_Amount;
							}

							if(($HUD_Income_Test == "True") && ($HUD_Rent_Subsidy > 0)) {
								${"this_hud" . $x} = $HUD_Rent_Subsidy;
								echo "<td>" . number_format($HUD_Rent_Subsidy);
								//echo "<br>THIS_HUD".$x." == ".${"this_hud".$x};
								echo "</td>";
								$x++;
							} else {
								${"this_hud" . $x} = "0.00";
								echo "<td bgcolor=\"lightgray\">" . number_format('0') . "</td>";
								$x++;
							}
						}

						?>

					</tr>
					<tr>
						<td style="font-weight:bold;">Spending Power</td>
						<?php
						$x = 1;
						while($x <= $plotpoints) {
							$This_SpendingPower = ${"this_monthly" . $x} + ${"this_snap" . $x} + ${"this_tanf" . $x} + ${"this_ccis" . $x} + ${"this_magi" . $x} + ${"this_hud" . $x};
							${"this_spendingpower" . $x} = $This_SpendingPower;
							echo "<td>" . number_format($This_SpendingPower);
							echo "</td>";
							$x++;
						}

						?>
					</tr>
				</table>
				<br>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

			<!-- ALLWAYS KEEP NEXT DIV AT THE VERY BOTTOM! This makes sure that the blue border stays bigger than the content. -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- END MAIN DIV -->
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
<script type="text/javascript">
	$(function() {
		var MonthEXP = <?php Print($cl_input['PostMonthlyExpenses']); ?>;
		var fpig1 = Math.round(<?php Print($fpig100); ?>);
		var fpig2 = Math.round(<?php Print($fpig200); ?>);
		var curr = <?php Print($current_line); ?>;
		var cofl1 = <?php Print($costofliving); ?>;
		var th1 = (<?php Print($this_hourly1); ?>).toFixed(2);
		var th2 = (<?php Print($this_hourly2); ?>).toFixed(2);
		var th3 = (<?php Print($this_hourly3); ?>).toFixed(2);
		var th4 = (<?php Print($this_hourly4); ?>).toFixed(2);
		var th5 = (<?php Print($this_hourly5); ?>).toFixed(2);
		var th6 = (<?php Print($this_hourly6); ?>).toFixed(2);
		var th7 = (<?php Print($this_hourly7); ?>).toFixed(2);
		var th8 = (<?php Print($this_hourly8); ?>).toFixed(2);
		var th9 = (<?php Print($this_hourly9); ?>).toFixed(2);
		var th10 = (<?php Print($this_hourly10); ?>).toFixed(2);
		var th11 = (<?php Print($this_hourly11); ?>).toFixed(2);
		var th12 = (<?php Print($this_hourly12); ?>).toFixed(2);
		var th13 = (<?php Print($this_hourly13); ?>).toFixed(2);
		var th14 = (<?php Print($this_hourly14); ?>).toFixed(2);
		var th15 = (<?php Print($this_hourly15); ?>).toFixed(2);
		var th16 = (<?php Print($this_hourly16); ?>).toFixed(2);
		var th17 = (<?php Print($this_hourly17); ?>).toFixed(2);
		var th18 = (<?php Print($this_hourly18); ?>).toFixed(2);
		var th19 = (<?php Print($this_hourly19); ?>).toFixed(2);
		var tf1 = Math.round(<?php Print($this_tanf1); ?>);
		var tf2 = Math.round(<?php Print($this_tanf2); ?>);
		var tf3 = Math.round(<?php Print($this_tanf3); ?>);
		var tf4 = Math.round(<?php Print($this_tanf4); ?>);
		var tf5 = Math.round(<?php Print($this_tanf5); ?>);
		var tf6 = Math.round(<?php Print($this_tanf6); ?>);
		var tf7 = Math.round(<?php Print($this_tanf7); ?>);
		var tf8 = Math.round(<?php Print($this_tanf8); ?>);
		var tf9 = Math.round(<?php Print($this_tanf9); ?>);
		var tf10 = Math.round(<?php Print($this_tanf10); ?>);
		var tf11 = Math.round(<?php Print($this_tanf11); ?>);
		var tf12 = Math.round(<?php Print($this_tanf12); ?>);
		var tf13 = Math.round(<?php Print($this_tanf13); ?>);
		var tf14 = Math.round(<?php Print($this_tanf14); ?>);
		var tf15 = Math.round(<?php Print($this_tanf15); ?>);
		var tf16 = Math.round(<?php Print($this_tanf16); ?>);
		var tf17 = Math.round(<?php Print($this_tanf17); ?>);
		var tf18 = Math.round(<?php Print($this_tanf18); ?>);
		var tf19 = Math.round(<?php Print($this_tanf19); ?>);
		var ts1 = (<?php Print($this_snap1); ?>);
		var ts2 = (<?php Print($this_snap2); ?>);
		var ts3 = (<?php Print($this_snap3); ?>);
		var ts4 = (<?php Print($this_snap4); ?>);
		var ts5 = (<?php Print($this_snap5); ?>);
		var ts6 = (<?php Print($this_snap6); ?>);
		var ts7 = (<?php Print($this_snap7); ?>);
		var ts8 = (<?php Print($this_snap8); ?>);
		var ts9 = (<?php Print($this_snap9); ?>);
		var ts10 = (<?php Print($this_snap10); ?>);
		var ts11 = (<?php Print($this_snap11); ?>);
		var ts12 = (<?php Print($this_snap12); ?>);
		var ts13 = (<?php Print($this_snap13); ?>);
		var ts14 = (<?php Print($this_snap14); ?>);
		var ts15 = (<?php Print($this_snap15); ?>);
		var ts16 = (<?php Print($this_snap16); ?>);
		var ts17 = (<?php Print($this_snap17); ?>);
		var ts18 = (<?php Print($this_snap18); ?>);
		var ts19 = (<?php Print($this_snap19); ?>);
		var cc1 = Math.round(<?php Print($this_ccis1); ?>);
		var cc2 = Math.round(<?php Print($this_ccis2); ?>);
		var cc3 = Math.round(<?php Print($this_ccis3); ?>);
		var cc4 = Math.round(<?php Print($this_ccis4); ?>);
		var cc5 = Math.round(<?php Print($this_ccis5); ?>);
		var cc6 = Math.round(<?php Print($this_ccis6); ?>);
		var cc7 = Math.round(<?php Print($this_ccis7); ?>);
		var cc8 = Math.round(<?php Print($this_ccis8); ?>);
		var cc9 = Math.round(<?php Print($this_ccis9); ?>);
		var cc10 = Math.round(<?php Print($this_ccis10); ?>);
		var cc11 = Math.round(<?php Print($this_ccis11); ?>);
		var cc12 = Math.round(<?php Print($this_ccis12); ?>);
		var cc13 = Math.round(<?php Print($this_ccis13); ?>);
		var cc14 = Math.round(<?php Print($this_ccis14); ?>);
		var cc15 = Math.round(<?php Print($this_ccis15); ?>);
		var cc16 = Math.round(<?php Print($this_ccis16); ?>);
		var cc17 = Math.round(<?php Print($this_ccis17); ?>);
		var cc18 = Math.round(<?php Print($this_ccis18); ?>);
		var cc19 = Math.round(<?php Print($this_ccis19); ?>);
		var mg1 = Math.round(<?php Print($this_magi1); ?>);
		var mg2 = Math.round(<?php Print($this_magi2); ?>);
		var mg3 = Math.round(<?php Print($this_magi3); ?>);
		var mg4 = Math.round(<?php Print($this_magi4); ?>);
		var mg5 = Math.round(<?php Print($this_magi5); ?>);
		var mg6 = Math.round(<?php Print($this_magi6); ?>);
		var mg7 = Math.round(<?php Print($this_magi7); ?>);
		var mg8 = Math.round(<?php Print($this_magi8); ?>);
		var mg9 = Math.round(<?php Print($this_magi9); ?>);
		var mg10 = Math.round(<?php Print($this_magi10); ?>);
		var mg11 = Math.round(<?php Print($this_magi11); ?>);
		var mg12 = Math.round(<?php Print($this_magi12); ?>);
		var mg13 = Math.round(<?php Print($this_magi13); ?>);
		var mg14 = Math.round(<?php Print($this_magi14); ?>);
		var mg15 = Math.round(<?php Print($this_magi15); ?>);
		var mg16 = Math.round(<?php Print($this_magi16); ?>);
		var mg17 = Math.round(<?php Print($this_magi17); ?>);
		var mg18 = Math.round(<?php Print($this_magi18); ?>);
		var mg19 = Math.round(<?php Print($this_magi19); ?>);
		var hud1 = Math.round(<?php Print($this_hud1); ?>);
		var hud2 = Math.round(<?php Print($this_hud2); ?>);
		var hud3 = Math.round(<?php Print($this_hud3); ?>);
		var hud4 = Math.round(<?php Print($this_hud4); ?>);
		var hud5 = Math.round(<?php Print($this_hud5); ?>);
		var hud6 = Math.round(<?php Print($this_hud6); ?>);
		var hud7 = Math.round(<?php Print($this_hud7); ?>);
		var hud8 = Math.round(<?php Print($this_hud8); ?>);
		var hud9 = Math.round(<?php Print($this_hud9); ?>);
		var hud10 = Math.round(<?php Print($this_hud10); ?>);
		var hud11 = Math.round(<?php Print($this_hud11); ?>);
		var hud12 = Math.round(<?php Print($this_hud12); ?>);
		var hud13 = Math.round(<?php Print($this_hud13); ?>);
		var hud14 = Math.round(<?php Print($this_hud14); ?>);
		var hud15 = Math.round(<?php Print($this_hud15); ?>);
		var hud16 = Math.round(<?php Print($this_hud16); ?>);
		var hud17 = Math.round(<?php Print($this_hud17); ?>);
		var hud18 = Math.round(<?php Print($this_hud18); ?>);
		var hud19 = Math.round(<?php Print($this_hud19); ?>);
		var sp1 = Math.round(<?php Print($this_spendingpower1); ?>);
		var sp2 = Math.round(<?php Print($this_spendingpower2); ?>);
		var sp3 = Math.round(<?php Print($this_spendingpower3); ?>);
		var sp4 = Math.round(<?php Print($this_spendingpower4); ?>);
		var sp5 = Math.round(<?php Print($this_spendingpower5); ?>);
		var sp6 = Math.round(<?php Print($this_spendingpower6); ?>);
		var sp7 = Math.round(<?php Print($this_spendingpower7); ?>);
		var sp8 = Math.round(<?php Print($this_spendingpower8); ?>);
		var sp9 = Math.round(<?php Print($this_spendingpower9); ?>);
		var sp10 = Math.round(<?php Print($this_spendingpower10); ?>);
		var sp11 = Math.round(<?php Print($this_spendingpower11); ?>);
		var sp12 = Math.round(<?php Print($this_spendingpower12); ?>);
		var sp13 = Math.round(<?php Print($this_spendingpower13); ?>);
		var sp14 = Math.round(<?php Print($this_spendingpower14); ?>);
		var sp15 = Math.round(<?php Print($this_spendingpower15); ?>);
		var sp16 = Math.round(<?php Print($this_spendingpower16); ?>);
		var sp17 = Math.round(<?php Print($this_spendingpower17); ?>);
		var sp18 = Math.round(<?php Print($this_spendingpower18); ?>);
		var sp19 = Math.round(<?php Print($this_spendingpower19); ?>);


		$('#container').highcharts({
			title: {
				text: 'CLIFF EFFECT ANALYSIS',
				x: -20 //center
			},
			subtitle: {
				text: '',
				x: -20
			},
			xAxis: {
				title: {
					text: 'HOURLY WAGE (40 HOURS PER WEEK)'
				},
				categories: [th1, th2, th3, th4, th5, th6, th7, th8, th9, th10, th11, th12, th13, th14, th15, th16, th17, th18, th19],

				plotLines: [{
					label: {text: 'Current Hourly'},
					color: 'rgb(51,204,51)',
					value: curr,
					width: 2
				}],

			},
			yAxis: {
				title: {
					text: 'MONTHLY AMOUNT'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}]
			},
			tooltip: {
				valuePrefix: '$'
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0
			},
			series: [{
				name: 'Cost of Living (Poverty)',
				data: [cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1, cofl1],
				color: 'rgb(0, 163, 222)'
			}, {
				name: '100% FPIG',
				data: [fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1, fpig1],
				color: 'rgb(109, 109, 109)'
			}, {
				name: '200% FPIG',
				data: [fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2, fpig2],
				color: '#000'
			}, {
				name: 'Expenses',
				data: [MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP, MonthEXP],
				color: 'rgb(242, 117, 34)'
			}, {
				name: 'Child Care',
				data: [cc1, cc2, cc3, cc4, cc5, cc6, cc7, cc8, cc9, cc10, cc11, cc12, cc13, cc14, cc15, cc16, cc17, cc18, cc19],
				color: 'rgb(223, 0, 227)'
			}, {
				name: 'Food Stamps',
				data: [ts1, ts2, ts3, ts4, ts5, ts6, ts7, ts8, ts9, ts10, ts11, ts12, ts13, ts14, ts15, ts16, ts17, ts18, ts19],
				color: 'rgb(255, 199, 0)'
			}, {
				name: 'HUD Subsidy',
				data: [hud1, hud2, hud3, hud4, hud5, hud6, hud7, hud8, hud9, hud10, hud11, hud12, hud13, hud14, hud15, hud16, hud17, hud18, hud19]
			}, {
				name: 'TANF',
				data: [tf1, tf2, tf3, tf4, tf5, tf6, tf7, tf8, tf9, tf10, tf11, tf12, tf13, tf14, tf15, tf16, tf17, tf18, tf19],
				color: 'rgb(102, 0, 255)'
			}, {
				name: 'Medical',
				data: [mg1, mg2, mg3, mg4, mg5, mg6, mg7, mg8, mg9, mg10, mg11, mg12, mg13, mg14, mg15, mg16, mg17, mg18, mg19],
				color: 'rgb(153, 102, 51)'
			}, {
				name: 'Spending Power',
				data: [sp1, sp2, sp3, sp4, sp5, sp6, sp7, sp8, sp9, sp10, sp11, sp12, sp13, sp14, sp15, sp16, sp17, sp18, sp19],
				lineWidth: 4, color: 'rgb(0, 255, 0)'
			}]
		});
	});
</script>
<?php
//echo "<table border=\"1\">
//<tr><td>KEY</td><td>VALUE</td></tr>";
//$h=0;
//$i=0;
//foreach ($_POST as $key => $value) {
//if ($value!="")
//{
//echo "<tr>";
//echo "<td>";
//echo $key;
//echo "</td>";
//echo "<td>";
//echo $value;
//echo "</td>";
//echo "</tr>";
//$h++;
//}
//$i++;
//}
//echo "<tr><td>Total InFields: </td><td>$h</td></tr>";
//echo "<tr><td>Total Fields: </td><td>$i</td></tr></table>";
?>

<?php
//PLACEHOLDER FOR FIGURIN' PARTS . . .

//Cost of Living
//SELECT == type_name, adults.working.children
//FROM == expense_allowances
//WHERE == county_name=cl_county AND city_name=cl_city AND adults.working.children == a.$a.w.$w.c.$c == adults.number of adults.working.number working.children.number of children
//echo "<br>Cost of Living == ".$costofliving."<br>";
//echo "<br><br>";
//echo "SELECT type_name, ".$awc." FROM expense_allowances WHERE county_name=\"".$county."\" AND state_name=\"".$state."\";";
echo "<br><br>";
//echo "In a home with ".$adults." adults where ".$working." are working and have ".$children." children.<br><br>";
//echo "<table border=\"1\">";
//echo "<tr><td colspan=2>SNAP/TANF calculations</td></tr>";
//echo "<tr><td>Gross Income Limit Amount:</td><td>".number_format($gross_income_limit_amount)."</td></tr>";
//echo "<tr><td>Vehicle Equity Allowance:</td><td>".number_format($vehicle_equity_allowed)."</td></tr>";
//echo "<tr><td>Total Value of Assets:</td><td>".number_format($total_value_assets)."</td></tr>";
//echo "<tr><td>Adjusted Value of Assets:</td><td>".number_format($adjusted_asset_value)."</td></tr>";
//echo "<tr><td>Resource Limit Amount:</td><td>".number_format($resource_limit_amount)."</td></tr>";
//echo "<tr><td>First Adult Deduction:</td><td>".number_format($first_adult_deduct)."</td></tr>";
//echo "<tr><td>Second Adult Deduction:</td><td>".number_format($second_adult_deduct)."</td></tr>";
//echo "<tr><td>Adults with Parttime Work:</td><td>".number_format($cl_adults_PT)."</td></tr>";
//echo "<tr><td>Adults with Fulltime Work:</td><td>".number_format($cl_adults_FT)."</td></tr>";
//echo "<tr><td>Childcare Paid:</td><td>".number_format($ChildcareAmount)."</td></tr>";
//echo "<tr><td>Adults Fulltime Work Childcare Under 2 Deduct Amount:</td><td>".number_format($deductFT_childcareunder2_amount)."</td></tr>";
//echo "<tr><td>Adults Fulltime Work Childcare 2 and Over Deduct Amount:</td><td>".number_format($deductFT_childcareover2_amount)."</td></tr>";
//echo "<tr><td>Children 2 and Over:</td><td>".number_format($children_over2)."</td></tr>";
//echo "<tr><td>Children Under 2:</td><td>".number_format($children_under2)."</td></tr>";
//echo "<tr><td>Childcare Fulltime Deduction:</td><td>".number_format($childcare_FTmax_deduction)."</td></tr>";
//if (isset($deductPT_childcareunder2_amount)){echo "<tr><td>Adults Parttime Work Childcare Under 2 Deduct Amount:</td><td>".number_format($deductPT_childcareunder2_amount)."</td></tr>";}
//if (isset($deductPT_childcareover2_amount)){echo "<tr><td>Adults Parttime Work Childcare 2 and Over Deduct Amount:</td><td>".number_format($deductPT_childcareover2_amount)."</td></tr>";}
//echo "<tr><td>Childcare Parttime Deduction:</td><td>".number_format($childcare_PTmax_deduction)."</td></tr>";
//echo "<tr><td>Total Income:</td><td>".number_format($TotalIncome)."</td></tr>";
//echo "<tr><td>Maximum Childcare Deduction:</td><td>".number_format($childcare_max_deduction)."</td></tr>";
//echo "<tr><td>Earned Income Disregard:</td><td>".number_format($earned_income_disregard_amount)."</td></tr>";
//echo "<tr><td>Sum Income Deductions:</td><td>".number_format($sumIncomeDeductions)."</td></tr>";
//echo "<tr><td>Countable Income:</td><td>".number_format($CountableIncome)."</td></tr>";
//echo "<tr><td>Number of Household Members:</td><td>".number_format($people_count)."</td></tr>";
//echo "<tr><td>Additional Family Amount:</td><td>".number_format($additional_family_amount)."</td></tr>";
//echo "<tr><td>Gross Income Limit Amount:</td><td>".number_format($gross_income_limit_amount)."</td></tr>";
//echo "</table>";

//echo "<br><br>";

//echo "<table border=\"1\">";
//echo "<tr><td colspan=2>TANF RESULTS</td></tr>";
//echo "<tr><td>Gross Income:</td><td>".number_format($TotalIncome)."</td></tr>";
//echo "<tr><td>First Adult Deductions:</td><td>".number_format($first_adult_deduct)."</td></tr>";
//echo "<tr><td>Second Adult Deductions:</td><td>".number_format($second_adult_deduct)."</td></tr>";
//echo "<tr><td>Child Support Paid:</td><td>".number_format($deduct_childsupport_amount)."</td></tr>";
//echo "<tr><td>Income Expenses Paid:</td><td>".number_format($deduct_incomeexpenses_amount)."</td></tr>";
//echo "<tr><td>Dependent Care Cost:</td><td>".number_format($childcare_max_deduction)."</td></tr>";
//echo "<tr><td>Child Support Received for 1 Child:</td><td>".number_format($child_support_received1_amount)."</td></tr>";
//echo "<tr><td>Child Support Received for 2 or more Children:</td><td>".number_format($child_support_received2_amount)."</td></tr>";
//echo "<tr><td>Medical Expenses for Elderly/Disabled:</td><td>".number_format($medical_elderly_disabled_amount)."</td></tr>";
//echo "<tr><td>Earned Income Disregard:</td><td>".number_format($earned_income_disregard_amount)."</td></tr>";
//echo "<tr><td>Countable Income:</td><td>".number_format($CountableIncome)."</td></tr>";
//echo "<tr><td>Family Size Lookup:</td><td>".$fpig85familysize."</td></tr>";
//echo "<tr><td>Additional Family Amount:</td><td>".number_format($additional_family_amount)."</td></tr>";
//echo "<tr><td>Gross Income Limit Amount:</td><td>".number_format($gross_income_limit_amount)."</td></tr>";
//echo "<tr><td>Gross Income Test:</td><td>".$gross_income_test."</td></tr>";
//echo "<tr><td>Child Test:</td><td>".$child_test."</td></tr>";
//echo "<tr><td>Family Size 8 or less:</td><td>".$family_size_lookup."</td></tr>";
//echo "<tr><td>Additional Family Size >8:</td><td>".$add_family_lookup."</td></tr>";
//echo "<tr><td>Standard of Need up to 8 Total:</td><td>".number_format($fpig100)."</td></tr>";
//echo "<tr><td>Standard of Need >8 Total:</td><td>".number_format($additional_family_amount)."</td></tr>";
//echo "<tr><td>Standard of Need Total:</td><td>".number_format($standard_of_need_total)."</td></tr>";
//echo "<tr><td>Countable Income:</td><td>".number_format($CountableIncome)."</td></tr>";
//echo "<tr><td>Standard of Need Test:</td><td>".$standard_of_need_test."</td></tr>";
//echo "<tr><td>Eligibility Based on Resources:</td><td>EXCLUDED</td></tr>";
//echo "<tr><td>Eligibity Test:</td><td>".$Resource_Test_Passed."</td></tr>";
//echo "<tr><td>Monthly Benefit up to 8:</td><td>".number_format($Monthly_Benefit_Amount)."</td></tr>";
//echo "<tr><td>Monthly Benefit >8:</td><td>".number_format($Monthly_Benefit_AddFam)."</td></tr>";
//echo "<tr><td>Total Monthly Benefit:</td><td>".number_format($Total_MaxMonthly_Benefit)."</td></tr>";
//echo "</table>";

//echo "<br><br>";

//echo "Childcare Amount = ".$ChildcareAmount."<br>";
//echo "Total Income =".$TotalIncome."<br>first_adult_deduct = ".$first_adult_deduct."<br>second_adult_deduct = ".$second_adult_deduct."<br>deduct_childsupport_amount = ".$deduct_childsupport_amount."<br>deduct_incomeexpenses_amount = ".$deduct_incomeexpenses_amount."<br>childcare_max_deduction = ".$childcare_max_deduction."<br>child_support_received_amount = ".$child_support_received_amount."<br>child_support_deduct_amount = ".$child_support_deduct_amount."<br>medical_elderly_disabled_amount = ".$medical_elderly_disabled_amount."<br>earned_income_disregard_amount = ".$earned_income_disregard_amount."<br>";
?>

<?php

$dbconn->close();

?>
