<!DOCTYPE HTML>
<html>
	<?php
	// Generate JSON object for data submitting from previous form (cl_expenses)
	$output = array();
	$output['cl_expenses'] = array();

	foreach($_POST as $key => $value) {
		$output['cl_expenses'][$key] = $value;
	}
	$output_json = json_encode($output);

	// Write to file on server (get rid of this!)
	$this_log = $_POST['this_log'];
	$trace_file = fopen($this_log, "a") or die("Unable to open trace file!");
	fwrite($trace_file, $output_json);
	fclose($trace_file);
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


		<title>
			Circles USA CEPT
		</title>
		<style>
			.header {
				overflow: hidden;
			}

			.matchem {
				background: red;
				padding-bottom: 2000px;
				margin-bottom: -2000px;
				float: left;
				width: 100px;
				margin-right: 20px;
			}

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

			.p3 {
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
				font-weight: bold;
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
			/ / border-style: outset;
				border-width: 2px;
				color: rgb(242, 117, 34);
			}

			a.tooltip {
				outline: none;
			}

			a.tooltip strong {
				line-height: 30px;
			}

			a.tooltip:hover {
				text-decoration: none;
			}

			a.tooltip span {
				z-index: 10;
				display: none;
				padding: 14px 20px;
				margin-top: -30px;
				margin-left: 28px;
				width: 400px;
				line-height: 16px;
				text-align: left;
			}

			a.tooltip:hover span {
				display: inline;
				position: absolute;
				color: #111;
				border: 1px solid #DCA;
				background: #fffAF0;
			}

			.callout {
				z-index: 20;
				position: absolute;
				top: 30px;
				border: 0;
				left: -12px;
			}

			/*CSS3 extras*/
			a.tooltip span {
				border-radius: 4px;
				box-shadow: 5px 5px 8px #CCC;
			}
		</style>
		<script type="text/javascript" src="page_js/jquery.min.js"></script>
		<script type="text/javascript" src="page_js/autoNumeric-1.9.41.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
				$('#GrossIncomeAmount').autoNumeric('init');
				$('#NetBusinessAmount').autoNumeric('init');
				$('#ArmedForcesAmount').autoNumeric('init');
				$('#UnEarnedSSIEtc').autoNumeric('init');
				$('#UnEmploymentEtc').autoNumeric('init');
				$('#AlimonyReceived').autoNumeric('init');
				$('#ChildSupportReceived').autoNumeric('init');
				$('#TANFreceived').autoNumeric('init');
				$('#MonthlyGifts').autoNumeric('init');
				$('#InterestDividendsEtc').autoNumeric('init');
				$('#CheckingAccountBal').autoNumeric('init');
				$('#SavingsAccountBal').autoNumeric('init');
				$('#EVvehicle1').autoNumeric('init');
				$('#EVothervehicle').autoNumeric('init');
				$('#EVpersonal').autoNumeric('init');
				$('#EVnonResi').autoNumeric('init');
				$('#EVallCountable').autoNumeric('init');
				$('#TotalMonthlyExpenses').autoNumeric('init');
			});

			window.onload = function() {
				document.getElementById("GrossIncomeAmount").focus();
				document.getElementById("DoneButtonRow").style.display = "none";
			}

			function AddEarnedIncome() {
				var total = 0;
				var coll = document.getElementsByClassName("MonthlyEarned")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("MonthlyEarned");
				//TotalHousing.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalEarned').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AEI = total;
			}

			function AddUnEarned() {
				var total = 0;
				var coll = document.getElementsByClassName("MonthlyUnEarned")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalUnEarned");
				//TotalHousing.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalUnEarned').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AUE = total;
			}

			function AddHouseholdAssets() {
				var total = 0;
				var coll = document.getElementsByClassName("HouseholdAssetAmount")
				for(var i = 0; i < coll.length; i++) {
					var ele = coll[i];
					ele.value = ele.value.replace(',', '');
					total += parseFloat(ele.value) || 0;
				}
				var Display = document.getElementById("TotalHouseholdAssets");
				//TotalHousing.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('TotalHouseholdAssets').value = total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.AUE = total;
			}

			var UpdMonthTotal = setInterval(GetMonthlies, 100);

			function GetMonthlies() {
				var getAEI = new AddEarnedIncome();
				var getAUE = new AddUnEarned();
				var getEXP = document.getElementById("TotalMonthlyExpenses").value;
				var getEXP = parseFloat(getEXP.replace(/,/g, ''));
				var themonthtotal = getAEI.AEI + getAUE.AUE - getEXP;
				var theincometotal = getAEI.AEI + getAUE.AUE;
				//TotalMonthly.innerHTML = monthtotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				document.getElementById('CombineIncome').value = theincometotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.TINC = theincometotal;
				//console.log(getEXP.replace(/,/g,''))
				document.getElementById('NetIncome').value = themonthtotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				this.TEXP = themonthtotal;
			}

		</script>

	</head>

	<body>
		<!-- BEGIN OUTSIDE FORM -->
		<div id="MainDIV" class="centered">
			<form id="cl_income_form" enctype="multipart/form-data" method="POST" action="cl_results.php"
					novalidate="novalidate" style="padding: 10px;" autocomplete="off">
				<!-- START HEADER -->
				<div style="float: left;">
					<img alt="Circles USA" id="cusalogo" src="images/circles-usa-new.png" style="display: inline;"/>
				</div>
				<div style="text-align: center; float: right;">
					<h2 class="h2">Cliff Effect Planning Tool</h2>
				</div>
				<div style="text-align: center; float: left; width: 100%;">
					<p class="p1">
						<br>Circle Leader Monthly Income and Assets
					</p>
					<hr class="org-hr">
				</div>
				<!-- END HEADER -->

				<div id="LeftSideDiv" style="float: left; width: 50%;">

					<div style="float: left; width: 100%;">
						<div id="Div_MonthlyIncome"
							  style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">MONTHLY INCOME</td>
								<tr>
								<tr>
									<td colspan="2" align="center" class="p2">Work - Cash Income</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Gross Income:</td>
									<td bgcolor="orange" width="20%"><input type="text" id="GrossIncomeAmount"
																						 name="GrossIncomeAmount" maxlength="8" size="10"
																						 placeholder="0.00" onkeyup="AddEarnedIncome();"
																						 class="MonthlyEarned"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Net Business:</td>
									<td bgcolor="orange"><input type="text" id="NetBusinessAmount" name="NetBusinessAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddEarnedIncome();" class="MonthlyEarned"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Armed Forces:</td>
									<td bgcolor="orange"><input type="text" id="ArmedForcesAmount" name="ArmedForcesAmount"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddEarnedIncome();" class="MonthlyEarned"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">EARNED INCOME:</td>
									<td style="font-weight:bold;"><input id="TotalEarned" name="TotalEarned" type="text" readonly
																					 maxlength="12" size="6" class="p3"></td>
								</tr>
								<tr>
									<td colspan="2" align="left" class="p2">&nbsp;</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Unearned Income (SSI, SSDI,
										Etc.):
									</td>
									<td bgcolor="orange"><input type="text" id="UnEarnedSSIEtc" name="UnEarnedSSIEtc"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddUnEarned();" class="MonthlyUnEarned"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Unemployment/Disability/Work
										Comp/Etc.:
									</td>
									<td bgcolor="orange"><input type="text" id="UnEmploymentEtc" name="UnEmploymentEtc"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddUnEarned();" class="MonthlyUnEarned"
																		 style="line-height: 28px;"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Alimony/Spousal Support
										received:
									</td>
									<td bgcolor="orange"><input type="text" id="AlimonyReceived" name="AlimonyReceived"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddUnEarned();" class="MonthlyUnEarned"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Child Support received:</td>
									<td bgcolor="orange"><input type="text" id="ChildSupportReceived" name="ChildSupportReceived"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddUnEarned();" class="MonthlyUnEarned"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">TANF received:</td>
									<td bgcolor="orange"><input type="text" id="TANFreceived" name="TANFreceived" maxlength="8"
																		 size="10" placeholder="0.00" onkeyup="AddUnEarned();"
																		 class="MonthlyUnEarned"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Monthly gifts:</td>
									<td bgcolor="orange"><input type="text" id="MonthlyGifts" name="MonthlyGifts" maxlength="8"
																		 size="10" placeholder="0.00" onkeyup="AddUnEarned();"
																		 class="MonthlyUnEarned"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Interest, Dividends, other
										income:
									</td>
									<td bgcolor="orange"><input type="text" id="InterestDividendsEtc" name="InterestDividendsEtc"
																		 maxlength="8" size="10" placeholder="0.00"
																		 onkeyup="AddUnEarned();" class="MonthlyUnEarned"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">UNEARNED INCOME:</td>
									<td style="font-weight:bold;"><input id="TotalUnEarned" name="TotalUnEarned" type="text"
																					 readonly maxlength="12" size="6" class="p3"></td>
								</tr>
								<tr>
									<td colspan="2" align="left" class="p2">&nbsp;</td>
								<tr>
							</table>
						</div>
						<br><br>
					</div><!--HOUSING EXPENSES-->

				</div><!--LEFT SIDE COLUMNS-->
				<div id="RightSideDiv" style="float: left; width: 50%;">

					<div style="float: left; width: 100%;">
						<div id="HousingExpenses" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">MONTHLY EXPENSES</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Housing:</td>
									<td align="right" width="20%" class="button-text"><?php echo $_POST['TotalHousing']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Food:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalFood']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Transportation:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalTransport']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Entertainment:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalEntertain']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Healthcare:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalHealthcare']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Dependent Care/Support:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalDependentExpense']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Personal Care:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalPersonalCare']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Clothing/Shoes:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalClothing']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Pets:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalPets']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Debt:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalDebt']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Household:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalHousehold']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Gifts:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalGifts']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Savings:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalSavings']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Other:</td>
									<td align="right" class="button-text"><?php echo $_POST['TotalOtherExpenses']; ?></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total: $</td>
									<td style="font-weight:bold;"
										 align="right"><?php echo "<input type=\"text\" id=\"TotalMonthlyExpenses\" name=\"TotalMonthlyExpenses\" value=\"" . $_POST['TotalMonthlyExpenses'] . "\" readonly maxlength=\"12\" size=\"10\" tabindex = \"-1\" class=\"p3\" style=\"text-align: right; \">";
										echo "<input type=\"hidden\" id=\"PostMonthlyExpenses\" name=\"PostMonthlyExpenses\" value=\"" . intval(preg_replace('/[^\d.]/', '', $_POST['TotalMonthlyExpenses'])) . "\">"; ?></td>
								</tr>
							</table>
						</div>
						<br><br>
						<div id="div_NetIncome" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="100%">
								<tr>
									<td colspan="2" align="center" class="p2">TOTAL INCOME</td>
								<tr>
								<tr>
									<td align="right" width="20%" class="p2">$ <input id="CombineIncome" name="CombineIncome"
																									  type="text" readonly maxlength="12"
																									  size="10" class="p2"></td>
								</tr>
							</table>
							<table width="100%">
								<tr>
									<td colspan="2" align="center" class="p2">NET MONTHLY INCOME</td>
								<tr>
								<tr>
									<td align="right" width="20%" class="p2">$ <input id="NetIncome" name="NetIncome" type="text"
																									  readonly maxlength="12" size="10"
																									  class="p2"></td>
								</tr>
							</table>
						</div>
					</div><!--EXPENSES-->

				</div><!--RIGHT SIDE COLUMNS-->

				<div id="BottomSideDiv" style="float: left; width: 100%; border: solid 1px blue;">

					<div style="float: left; width: 100%;">
						<div id="HouseholdAssets" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%">
								<tr>
									<td colspan="2" align="center" class="p2">HOUSEHOLD ASSETS</td>
								<tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Checking Account Balance:</td>
									<td width="5%" bgcolor="orange"><input type="text" id="CheckingAccountBal"
																						name="CheckingAccountBal" maxlength="8" size="11"
																						placeholder="0.00" onkeyup="AddHouseholdAssets();"
																						class="HouseholdAssetAmount"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Savings Account Balance:</td>
									<td bgcolor="orange"><input type="text" id="SavingsAccountBal" name="SavingsAccountBal"
																		 maxlength="8" size="11" placeholder="0.00"
																		 onkeyup="AddHouseholdAssets();" class="HouseholdAssetAmount"/>
									</td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">

										<a href="#" class="tooltip">
											<strong>Equity value</strong><img src="images/tiny_question.png"/>
											<span>
        <img class="callout" src="images/callout.gif"/>
        To determine “Equity value” use this formula:<br><br>
Take the <i>Fair Market Value</i> of the item (how much can it be sold for), <strong><i>subtract</strong></i> how much you still <strong><i>owe on it</strong></i>
												(if any)
and the result is the <strong><i>Equity Value</strong></i> of the item.<br><br><strong><i>Note: </strong></i> Use online resources to determine the Fair Market Value
such as Kelly Blue Book for vehicles, Craig’s List or eBay for other items.</span></a>

										of vehicle #1 (Use fair market value if there is no loan):
									</td>
									<td bgcolor="orange"><input type="text" id="EVvehicle1" name="EVvehicle1" maxlength="8"
																		 size="11" value="0.00" onkeyup="AddHouseholdAssets();"
																		 class="HouseholdAssetAmount" style="line-height: 22px;"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Equity value of all other
										vehicles (Use fair market value if there are no loans):
									</td>
									<td bgcolor="orange"><input type="text" id="EVothervehicle" name="EVothervehicle"
																		 maxlength="8" size="11" placeholder="0.00"
																		 onkeyup="AddHouseholdAssets();" class="HouseholdAssetAmount"/>
									</td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Equity value of personal
										property (Use fair market value if there are no loans):
									</td>
									<td bgcolor="orange"><input type="text" id="EVpersonal" name="EVpersonal" maxlength="8"
																		 size="11" placeholder="0.00" onkeyup="AddHouseholdAssets();"
																		 class="HouseholdAssetAmount"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Equity value of Non-Resident
										property (Use fair market value if there are no loans):
									</td>
									<td bgcolor="orange"><input type="text" id="EVnonResi" name="EVnonResi" maxlength="8"
																		 size="11" placeholder="0.00" onkeyup="AddHouseholdAssets();"
																		 class="HouseholdAssetAmount"/></td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Equity of all countable assets
										(Use fair market value if there are no loans):
									</td>
									<td bgcolor="orange"><input type="text" id="EVallCountable" name="EVallCountable"
																		 maxlength="8" size="11" placeholder="0.00"
																		 onkeyup="AddHouseholdAssets();" class="HouseholdAssetAmount"/>
									</td>
								</tr>
								<tr>
									<td class="button-text" align="right" style="font-weight:bold">Total Household Assets:</td>
									<td style="font-weight:bold;"><input id="TotalHouseholdAssets" name="TotalHouseholdAssets"
																					 type="text" readonly maxlength="12" size="7" class="p3"
																					 placeholder="0.00"></td>
								</tr>
								<tr>
									<td colspan="2" align="left" class="p2">&nbsp;</td>
								<tr>
							</table>
						</div>
						<br><br>
						<script>
							function CheckButtons() {
								var x1 = document.getElementById("Butt_Section8a").checked;
								var x2 = document.getElementById("Butt_Section8b").checked;
								var x3 = document.getElementById("EIupemp1").checked;
								var x4 = document.getElementById("EIupemp2").checked;
								var x5 = document.getElementById("EIupPart1").checked;
								var x6 = document.getElementById("EIupPart2").checked;
								var x7 = document.getElementById("IncomeUp1").checked;
								var x8 = document.getElementById("IncomeUp2").checked;
								if(x1 == true || x2 == true) {
									if(x3 == true || x4 == true) {
										if(x5 == true || x6 == true) {
											if(x7 == true || x8 == true) {
												document.getElementById("DoneButtonRow").style.display = "block";
											}
										}
									}
								}
							}
						</script>
					</div><!--INCOME-->

					<div style="float: left; width: 100%;">
						<div id="HUDEID" style="float: left; border: 1px solid; border-color: #008FD9; width: 100%;">
							<table width="90%" align="center">
								<tr>
									<td colspan="2" align="center" class="p2">HUD EARNED INCOME DISREGARD (EID)</td>
								<tr>
								<tr>
									<td class="button-text" align="left" style="font-weight:bold;">A disabled family receiving
										HOPWA, SUHP, HOME, Housing Choice Voucher (Section 8)
									</td>
									<td width="20%">
										<fieldset id="Butt_Section8set" style="border:0;"><input type="radio" id="Butt_Section8a"
																													name="Butt_Section8" value="Yes"
																													onchange="CheckButtons();"/><span
												class="p3">Yes</span>
											<input type="radio" id="Butt_Section8b" name="Butt_Section8" value="No"
													 onchange="CheckButtons()" ;/><span class="p3">No</span></fieldset>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center" class="p2">
										<hr class="org-hr">
									</td>
								<tr>
								<tr>
									<td class="button-text" align="left" style="font-weight:bold">A disabled family member's
										earned income increases as a result of employment,
										after a period of unemployment of one or more years prior to employment.
									</td>
									<td width="20%">
										<fieldset id="Butt_EIupemp" style="border:0;"><input type="radio" id="EIupemp1"
																											  name="EIupemp" value="Yes"
																											  onchange="CheckButtons();"/><span
												class="p3">Yes</span>
											<input type="radio" id="EIupemp2" name="EIupemp" value="No"
													 onchange="CheckButtons();"/><span class="p3">No</span></fieldset>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center" class="p2">
										<hr class="org-hr">
									</td>
								<tr>
								<tr>
									<td class="button-text" align="left" style="font-weight:bold">A disabled family member's
										earned income increases as a result of participation in an
										economic self-sufficiency program or other job-training program
									</td>
									<td width="20%">
										<fieldset id="Butt_EIupPart" style="border:0;"><input type="radio" id="EIupPart1"
																												name="EIupPart" value="Yes"
																												onchange="CheckButtons();"/><span
												class="p3">Yes</span>
											<input type="radio" id="EIupPart2" name="EIupPart" value="No"
													 onchange="CheckButtons();"/><span class="p3">No</span></fieldset>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center" class="p2">
										<hr class="org-hr">
									</td>
								<tr>
								<tr>
									<td class="button-text" align="left" style="font-weight:bold">A disabled family member's
										income increases as a result of employment during or
										within six (6) months after receiving assistance, benefits, or services under TANF or a
										Welfare-to-Work program (including one time only cash assistance of at least $500.
									</td>
									<td width="20%">
										<fieldset id="IncomeUp" style="border:0;"><input type="radio" id="IncomeUp1"
																										 name="IncomeUp" value="Yes"
																										 onchange="CheckButtons();"/><span
												class="p3">Yes</span>
											<input type="radio" id="IncomeUp2" name="IncomeUp" value="No"
													 onchange="CheckButtons();"/><span class="p3">No</span>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center" class="p2">
										<hr class="org-hr">
									</td>
								<tr>
								<tr id="DoneButtonRow">
									<td colspan="2" align="center">
										<button type="submit" class="donebutton" onclick="">Continue to Results --></button>
									</td>
								<tr>
							</table>
						</div>
						<br><br>
					</div><!--HUDEID-->
				</div>

				<!-- ALLWAYS KEEP NEXT DIV AT THE VERY BOTTOM! This makes sure that the blue border stays bigger than the content. -->
				<div style="clear: both;">&nbsp;</div>

				<?php
				foreach($_POST as $key => $value) {
					if($value != "") {
						echo "<input type=\"hidden\" name=\"" . $key . "\" value=\"" . $value . "\">";
					}
				}
				echo "<input type=\"hidden\" name=\"this_log\" value=\"" . $this_log . "\">";
				?>

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
