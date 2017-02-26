<!DOCTYPE HTML>
<html>
	<?php
	include("config.php");

	require_once('functions.php');
	$whoisdis = $_SERVER['REMOTE_USER'];

	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

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
				display: inline;
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
				font-weight: bold;
				color: rgb(0, 163, 222);
				font-size: 18px;
			}

			.form-els {
				display: inline;
				font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
				font-weight: bold;
			}

			.button-text {
				display: inline;
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

		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

		<script type="text/javascript">

			function ShowAll() {
				document.getElementById("cl_counties").style.display = "block";
				document.getElementById("cl_cities").style.display = "block";
				document.getElementById("AboutHomeHR").style.display = "block";
				document.getElementById("AboutHome").style.display = "block";
				document.getElementById("cl_beds").style.display = "block";
				document.getElementById("cl_utilsmortrent").style.display = "block";
				document.getElementById("AboutFamilyLabel").style.display = "block";
				document.getElementById("ArePeople21").style.display = "block";
				document.getElementById("HowMany21s").style.display = "block";
				document.getElementById("DoAnyPT").style.display = "block";
				document.getElementById("HowManyPT").style.display = "block";
				document.getElementById("DoAnyFT").style.display = "block";
				document.getElementById("HowManyFT").style.display = "block";
				document.getElementById("WorkExpensesReimbursed").style.display = "block";
				document.getElementById("HowMuchWorkExpense").style.display = "block";
				document.getElementById("ArePeople13to20").style.display = "block";
				document.getElementById("HowMany13to20").style.display = "block";
				document.getElementById("AreAny19to20").style.display = "block";
				document.getElementById("HowMany19to20").style.display = "block";
				document.getElementById("AreAny13to18").style.display = "block";
				document.getElementById("HowMany13to18").style.display = "block";
				document.getElementById("AreAnyUnable").style.display = "block";
				document.getElementById("HowManyUnable").style.display = "block";
				document.getElementById("ArePeopleLessThan13").style.display = "block";
				document.getElementById("HowManyLessThan13").style.display = "block";
				document.getElementById("GetChild1").style.display = "block";
				document.getElementById("GetChild2").style.display = "block";
				document.getElementById("GetChild3").style.display = "block";
				document.getElementById("GetChild4").style.display = "block";
				document.getElementById("GetChild5").style.display = "block";
				document.getElementById("GetChild6").style.display = "block";
				document.getElementById("GetChild7").style.display = "block";
				document.getElementById("GetChild8").style.display = "block";
				document.getElementById("GetChild9").style.display = "block";
				document.getElementById("GetChild10").style.display = "block";
				document.getElementById("GetChild11").style.display = "block";
				document.getElementById("GetChild12").style.display = "block";
				document.getElementById("LastChild").style.display = "block";
				document.getElementById("DayCareInfos").style.display = "block";
				document.getElementById("DayCareDays").style.display = "block";
				document.getElementById("DayCareHours").style.display = "block";
				document.getElementById("DayCarePlace").style.display = "block";
				document.getElementById("DayCareFaith").style.display = "block";
				document.getElementById("AddFamilyLabel").style.display = "block";
				document.getElementById("FTCollegeStudents").style.display = "block";
				document.getElementById("HowManyFTCollegeStudents").style.display = "block";
				document.getElementById("CurrentPreg").style.display = "block";
				document.getElementById("StepParent").style.display = "block";
				document.getElementById("AllReceiving").style.display = "block";
				document.getElementById("Adults60PlusYN").style.display = "block";
				document.getElementById("HowMany60Plus").style.display = "block";
				document.getElementById("ThatsAllFolks").style.display = "block";
			}

			window.onload = function() {
				document.getElementById("cl_utilsmortrent").style.display = "none";
				document.getElementById("AboutFamilyLabel").style.display = "none";
				document.getElementById("ArePeople21").style.display = "none";
				document.getElementById("HowMany21s").style.display = "none";
				document.getElementById("DoAnyPT").style.display = "none";
				document.getElementById("HowManyPT").style.display = "none";
				document.getElementById("DoAnyFT").style.display = "none";
				document.getElementById("HowManyFT").style.display = "none";
				document.getElementById("WorkExpensesReimbursed").style.display = "none";
				document.getElementById("HowMuchWorkExpense").style.display = "none";
				document.getElementById("ArePeople13to20").style.display = "none";
				document.getElementById("HowMany13to20").style.display = "none";
				document.getElementById("AreAny19to20").style.display = "none";
				document.getElementById("HowMany19to20").style.display = "none";
				document.getElementById("AreAny13to18").style.display = "none";
				document.getElementById("HowMany13to18").style.display = "none";
				document.getElementById("AreAnyUnable").style.display = "none";
				document.getElementById("HowManyUnable").style.display = "none";
				document.getElementById("ArePeopleLessThan13").style.display = "none";
				document.getElementById("HowManyLessThan13").style.display = "none";
				document.getElementById("GetChild1").style.display = "none";
				document.getElementById("GetChild2").style.display = "none";
				document.getElementById("GetChild3").style.display = "none";
				document.getElementById("GetChild4").style.display = "none";
				document.getElementById("GetChild5").style.display = "none";
				document.getElementById("GetChild6").style.display = "none";
				document.getElementById("GetChild7").style.display = "none";
				document.getElementById("GetChild8").style.display = "none";
				document.getElementById("GetChild9").style.display = "none";
				document.getElementById("GetChild10").style.display = "none";
				document.getElementById("GetChild11").style.display = "none";
				document.getElementById("GetChild12").style.display = "none";
				document.getElementById("LastChild").style.display = "none";
				document.getElementById("DayCareInfos").style.display = "none";
				document.getElementById("DayCareDays").style.display = "none";
				document.getElementById("DayCareHours").style.display = "none";
				document.getElementById("DayCarePlace").style.display = "none";
				document.getElementById("DayCareFaith").style.display = "none";
				document.getElementById("AddFamilyLabel").style.display = "none";
				document.getElementById("FTCollegeStudents").style.display = "none";
				document.getElementById("HowManyFTCollegeStudents").style.display = "none";
				document.getElementById("CurrentPreg").style.display = "none";
				document.getElementById("StepParent").style.display = "none";
				document.getElementById("AllReceiving").style.display = "none";
				document.getElementById("Adults60PlusYN").style.display = "none";
				document.getElementById("HowMany60Plus").style.display = "none";
				document.getElementById("ThatsAllFolks").style.display = "none";
			}

			function ShowUtilRentMort() {
				document.getElementById("cl_utilsmortrent").style.display = "block";
			}

			function ShowAboutFamily() {
				document.getElementById("AboutFamilyHR").style.display = "block";
				document.getElementById("AboutFamilyLabel").style.display = "block";
				document.getElementById("ArePeople21").style.display = "block";
			}

			function ShowYes21() {
				document.getElementById("HowMany21s").style.display = "block";
				document.getElementById("cl_adults").focus();
			}

			function ShowNo21() {
				document.getElementById("cl_adults").value = "";
				document.getElementById("cl_adults_FT").value = "";
				document.getElementById("HowMany21s").style.display = "none";
				document.getElementById("DoAnyPT").style.display = "none";
				document.getElementById("HowManyPT").style.display = "none";
				document.getElementById("DoAnyFT").style.display = "none";
				document.getElementById("HowManyFT").style.display = "none";
				document.getElementById("cl_adults_PT").value = "";
				document.getElementById("cl_adults_PT").focus();
				document.getElementById("21orOlderPTYes").checked = false;
				document.getElementById("21orOlderPTNo").checked = false;
				document.getElementById("21orOlderFTYes").checked = false;
				document.getElementById("21orOlderFTNo").checked = false;
				document.getElementById("ArePeople13to20").style.display = "block";
				document.getElementById("WorkExpensesYes").checked = false;
				document.getElementById("WorkExpensesNo").checked = false;
				document.getElementById("HowMuchWorkExpense").style.display = "none";
				document.getElementById("WorkExpenseAmount").value = "";
				document.getElementById("WorkExpensesReimbursed").style.display = "none";
			}

			function ShowDoAnyPT() {
				document.getElementById("DoAnyPT").style.display = "block";
			}

			function ShowDoAnyPTNo() {
				document.getElementById("cl_adults_PT").value = "";
				document.getElementById("HowManyPT").style.display = "none";
				document.getElementById("DoAnyFT").style.display = "block";
			}

			function ShowHowManyPT() {
				document.getElementById("HowManyPT").style.display = "block";
				document.getElementById("cl_adults_PT").focus();
			}

			function ShowDoAnyFT() {
				document.getElementById("DoAnyFT").style.display = "block";
			}

			function ShowDoAnyFTNo() {
				document.getElementById("cl_adults_FT").value = "";
				document.getElementById("HowManyFT").style.display = "none";
				document.getElementById("WorkExpensesReimbursed").style.display = "block";
			}

			function ShowHowManyFT() {
				document.getElementById("HowManyFT").style.display = "block";
				document.getElementById("cl_adults_FT").focus();
			}

			function ShowMonthlyWorkExpenses() {
				document.getElementById("WorkExpensesReimbursed").style.display = "block";
			}

			function ShowMonthlyWorkExpensesYes() {
				document.getElementById("HowMuchWorkExpense").style.display = "block";
				document.getElementById("WorkExpenseAmount").focus();
			}

			function ShowMonthlyWorkExpensesNo() {
				document.getElementById("HowMuchWorkExpense").style.display = "none";
				document.getElementById("WorkExpenseAmount").value = "";
				document.getElementById("ArePeople13to20").style.display = "block";
			}

			function ShowGetPeople13to20() {
				document.getElementById("ArePeople13to20").style.display = "block";
			}

			function ShowHowMany13to20() {
				document.getElementById("HowMany13to20").style.display = "block";
				document.getElementById("13to20Count").focus();
			}

			function ShowHowMany13to20No() {
				document.getElementById("13to20Count").value = "";
				document.getElementById("HowMany13to20").style.display = "none";
				document.getElementById("19to20Count").value = "";
				document.getElementById("19to20Yes").checked = false;
				document.getElementById("19to20No").checked = false;
				document.getElementById("HowMany19to20").style.display = "none";
				document.getElementById("AreAny19to20").style.display = "none";
				document.getElementById("13to18Count").value = "";
				document.getElementById("13to18Yes").checked = false;
				document.getElementById("13to18No").checked = false;
				document.getElementById("HowMany13to18").style.display = "none";
				document.getElementById("AreAny13to18").style.display = "none";
				document.getElementById("AnyUnableCount").value = "";
				document.getElementById("AnyUnableYes").checked = false;
				document.getElementById("AnyUnableNo").checked = false;
				document.getElementById("AreAnyUnable").style.display = "none";
				document.getElementById("ArePeopleLessThan13").style.display = "block";
			}

			function ShowAreAny19to20() {
				document.getElementById("AreAny19to20").style.display = "block";
			}

			function ShowHowMany19to20() {
				document.getElementById("HowMany19to20").style.display = "block";
				document.getElementById("19to20Count").focus();
			}

			function ShowHowMany19to20No() {
				document.getElementById("19to20Count").value = "";
				document.getElementById("HowMany19to20").style.display = "none";
				document.getElementById("AreAny13to18").style.display = "block";
			}

			function ShowAreAny13to18() {
				document.getElementById("AreAny13to18").style.display = "block";
			}

			function ShowHowMany13to18() {
				document.getElementById("HowMany13to18").style.display = "block";
				document.getElementById("13to18Count").focus();
			}

			function ShowHowMany13to18No() {
				document.getElementById("13to18Count").value = "";
				document.getElementById("HowMany13to18").style.display = "none";
				document.getElementById("AreAnyUnable").style.display = "block";
			}

			function ShowAreAnyUnable() {
				document.getElementById("AreAnyUnable").style.display = "block";
			}

			function ShowHowManyUnable() {
				document.getElementById("HowManyUnable").style.display = "block";
				document.getElementById("AnyUnableCount").focus();
			}

			function ShowHowManyUnableNo() {
				document.getElementById("AnyUnableCount").value = "";
				document.getElementById("HowManyUnable").style.display = "none";
				document.getElementById("ArePeopleLessThan13").style.display = "block";
			}

			function ShowAreAnyLessThan13() {
				document.getElementById("ArePeopleLessThan13").style.display = "block";
			}

			function ShowAreAnyLessThan13No() {
				document.getElementById("LessThan13Count").value = "";
				document.getElementById("HowManyLessThan13").style.display = "none";
				document.getElementById("GetChild1").style.display = "none";
				document.getElementById("GetChild2").style.display = "none";
				document.getElementById("GetChild3").style.display = "none";
				document.getElementById("GetChild4").style.display = "none";
				document.getElementById("GetChild5").style.display = "none";
				document.getElementById("GetChild6").style.display = "none";
				document.getElementById("GetChild7").style.display = "none";
				document.getElementById("GetChild8").style.display = "none";
				document.getElementById("GetChild9").style.display = "none";
				document.getElementById("GetChild10").style.display = "none";
				document.getElementById("GetChild11").style.display = "none";
				document.getElementById("GetChild12").style.display = "none";
				document.getElementById("LastChild").style.display = "none";
				document.getElementById("AddFamilyLabel").style.display = "block";
				document.getElementById("FTCollegeStudents").style.display = "block";
			}

			function ShowHowManyLessThan13() {
				document.getElementById("HowManyLessThan13").style.display = "block";
				document.getElementById("LessThan13Count").focus();
			}

			function ShowAddFamily() {
				document.getElementById("AddFamilyLabel").style.display = "block";
				document.getElementById("FTCollegeStudents").style.display = "block";
			}

			function ShowChildInfos() {
				document.getElementById("GetChild1").style.display = "none";
				document.getElementById("GetChild2").style.display = "none";
				document.getElementById("GetChild3").style.display = "none";
				document.getElementById("GetChild4").style.display = "none";
				document.getElementById("GetChild5").style.display = "none";
				document.getElementById("GetChild6").style.display = "none";
				document.getElementById("GetChild7").style.display = "none";
				document.getElementById("GetChild8").style.display = "none";
				document.getElementById("GetChild9").style.display = "none";
				document.getElementById("GetChild10").style.display = "none";
				document.getElementById("GetChild11").style.display = "none";
				document.getElementById("GetChild12").style.display = "none";

				var kiddocount = document.getElementById("LessThan13Count").value;
				if(kiddocount < 13) {
					for(var i = 1; i <= kiddocount; i++) {
						if(i <= kiddocount) {
							document.getElementById("GetChild" + i).style.display = "block";
						}
					}
				}
				document.getElementById("LastChild").style.display = "block";
			}

			function ShowLastChild() {
				document.getElementById("LastChild").style.display = "block";
			}

			function ShowDayCareInfos() {
				document.getElementById("DayCareInfos").style.display = "block";
				document.getElementById("DayCareDays").style.display = "block";
				document.getElementById("DayCareDaysIn").focus();
			}

			function ShowDayCareHours() {
				document.getElementById("DayCareHours").style.display = "block";
				document.getElementById("DayCareHoursIn").focus();
			}

			function ShowDayCarePlace() {
				document.getElementById("DayCarePlace").style.display = "block";
			}

			function ShowDayCareFaith() {
				document.getElementById("DayCareFaith").style.display = "block";
			}

			function ShowHowManyFTCollege() {
				document.getElementById("HowManyFTCollegeStudents").style.display = "block";
				document.getElementById("FTCollegeCount").focus();
			}

			function ShowCurrentPreg() {
				document.getElementById("CurrentPreg").style.display = "block";
			}

			function ShowStepParent() {
				document.getElementById("StepParent").style.display = "block";
			}


			function ShowAllReceiving() {
				document.getElementById("AllReceiving").style.display = "block";
			}

			function ShowAdults60Plus() {
				document.getElementById("Adults60PlusYN").style.display = "block";
			}

			function ShowHowMany60PlusYes() {
				document.getElementById("HowMany60Plus").style.display = "block";
				document.getElementById("60PlusCount").focus();
			}

			function ShowThatsAllFolks() {
				document.getElementById("ThatsAllFolks").style.display = "block";
			}

			// After the user selects a state
			function StateSelectionSubmission() {
				let cl_state = $('select#cl_state').val();
				sessionStorage.setItem('cl_state', cl_state);
				console.log(cl_state);
			}

		</script>

	</head>

	<body>
		<!-- BEGIN OUTSIDE FORM -->
		<div id="MainDIV" class="centered">
			<form id="cl_infos_form" enctype="multipart/form-data" method="POST" action="cl_infos.php"
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
						<br>Circle Leader Information
					</p>
					<hr class="org-hr">
				</div>
				<!-- END HEADER -->

				<div id="AboutArea" style="opacity: 1; float:left; width: 100%;">
					<div id="AboutAreaLabel">
						<h2 class="h2" style="font-weight: normal; font-size: 20px;">
							About your area . . .
						</h2>
					</div>
				</div>

				<div name="State" style="opacity: 1; float:left; width: 33%;">
					<label class="form-els">State</label><br>
					<select id="cl_state" name="cl_state" onchange='StateSelectionSubmission(); this.form.submit()'>
						<?php
						if(isset($_POST['cl_stateinits'])) {
							$cl_stateinits = $_POST['cl_stateinits'];
						}
						if(isset($_POST['cl_state'])) {
							// Second page someone sees
							$cl_state = $_POST['cl_state'];


							$dbconn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
							if(mysqli_connect_errno()) {
								echo "Failed to connect to database: " . mysqli_connect_error();
							}
							$sinit_sql = "SELECT state_inits FROM state_county_city WHERE state_name=\"" . $cl_state . "\";";
							$sinit_result = $dbconn->query($sinit_sql);
							$scc_row = $sinit_result->fetch_assoc();
							$cl_stateinits = $scc_row["state_inits"];

							$dbconn->close();

							echo "<option value=\"" . $cl_state . "\">" . $cl_state . "</option><option value=\"\"></option>";
						} else {
							// First time someone sees this page, the state is being selected
							echo "<option value=\"\">Choose one</option><option value=\"\"></option>";
						}


						$dbconn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
						//$dbconn = new mysqli('localhost', 'root', 'Sunshine99', 'cusacept');

						if(mysqli_connect_errno()) {
							echo "Failed to connect to database: " . mysqli_connect_error();
						}
						$scc_sql = "SELECT DISTINCT state_name FROM state_county_city";
						$scc_result = $dbconn->query($scc_sql);
						while($scc_row = $scc_result->fetch_assoc()) {
							echo "<option value=\"" . $scc_row["state_name"] . "\">" . $scc_row["state_name"] . "</option>";
						}
						$dbconn->close();

						?>
					</select><br><br>
					<?php if(isset($cl_stateinits)) {
						echo "<input type=\"hidden\" name=\"cl_stateinits\" value=\"" . $cl_stateinits . "\">";
					} ?>
				</div><!-- END STATES -->
				<?php
				if(isset($cl_state)) {
					echo "<div id=\"cl_counties\" name=\"County\" style=\"opacity: 1; float:left; width: 33%;\"><label class=\"form-els\">County</label><br>
                  <select id=\"cl_county\" name=\"cl_county\"  onchange='this.form.submit()'\">";
					if(isset($_POST['cl_county'])) {
						$cl_county = $_POST['cl_county'];
						echo "<option value=\"" . $cl_county . "\">" . $cl_county . "</option>";
					} else {
						echo "<option value=\"\">Choose one</option>";
					}


					$dbconn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

					if(mysqli_connect_errno()) {
						echo "Failed to connect to database: " . mysqli_connect_error();
					}

					$scc_sql = "SELECT DISTINCT county_name FROM state_county_city WHERE state_name='" . $cl_state . "'";
					$scc_result = $dbconn->query($scc_sql);

					// example IF
					//if ($scc_result->num_rows > 0) {

					// output data of each row
					while($scc_row = $scc_result->fetch_assoc()) {
						echo "<option value=\"" . $scc_row["county_name"] . "\">" . $scc_row["county_name"] . "</option>";
					}

					// end example IF
					//}

					$dbconn->close();

					echo "</select>
              </div><!-- END COUNTIES -->";
				}

				if(isset($cl_county)) {
					echo "<div id=\"cl_cities\" name=\"City\" style=\"opacity: 1; float:left; width: 33%;\">
              <label class=\"form-els\">City</label><br>
              <select id=\"cl_city\" name=\"cl_city\" onchange='this.form.submit()'>";
					if(isset($_POST['cl_city'])) {
						$cl_city = $_POST['cl_city'];
						echo "<option value=\"" . $cl_city . "\">" . $cl_city . "</option>";
					} else {
						echo "<option value=\"\">Choose one</option>";
					}

					$dbconn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					//$dbconn = new mysqli('localhost', 'root', 'Sunshine99', 'cusacept');

					if(mysqli_connect_errno()) {
						echo "Failed to connect to database: " . mysqli_connect_error();
					}

					$scc_sql = "SELECT DISTINCT city_name FROM state_county_city WHERE county_name='" . $cl_county . "'";
					$scc_result = $dbconn->query($scc_sql);

					// example IF
					//if ($scc_result->num_rows > 0) {

					// output data of each row
					while($scc_row = $scc_result->fetch_assoc()) {
						echo "<option value=\"" . $scc_row["city_name"] . "\">" . $scc_row["city_name"] . "</option>";
					}

					// end example IF
					//}

					$dbconn->close();

					echo "</select>
           </div><!-- END CITIES -->";
				}
				?>
			</form>

			<?php
			echo "<form id=\"cl_infos_form\" enctype=\"multipart/form-data\" method=\"POST\" action=\"cl_expenses.php\" novalidate=\"novalidate\" style=\"padding: 10px;\" autocomplete=\"off\">";

			if(isset($cl_state)) {
				echo "<input type=\"hidden\" name=\"cl_state\" value=\"" . $cl_state . "\">";
			}
			if(isset($cl_county)) {
				echo "<input type=\"hidden\" name=\"cl_county\" value=\"" . $cl_county . "\">";
			}
			if(isset($cl_city)) {
				echo "<input type=\"hidden\" name=\"cl_city\" value=\"" . $cl_city . "\">";
				if(isset($cl_stateinits)) {
					echo "<input type=\"hidden\" name=\"cl_stateinits\" value=\"" . $cl_stateinits . "\">";
				}

				echo "<div id=\"AboutHomeHR\" style=\"float: left; width: 100%\">
               <hr class=\"org-hr\">
             </div><!-- ABOUT HOME HR --><div id=\"AboutHome\" style=\"opacity: 1; float:left; width: 100%;\">
        <div id=\"AboutHomeLabel\">";
				if($ishomeless == "No") {
					echo "
          <h2 class=\"h2\" style=\"font-weight: normal; font-size: 20px;\">
            About your home . . .
          </h2>
        </div>
      </div>

    <div id=\"cl_beds\" name=\"Beds\" style=\"opacity: 1; float:left; width: 100%;\">
          <label class=\"form-els\">Bedrooms</label><br>
          <select id=\"bedrooms\" name=\"bedrooms\" onchange=\"ShowUtilRentMort()\">
            <option selected id=\"item9_0_option\" value=\"\">
              Choose one
            </option>
            <option id=\"item9_1_option\" value=\"Efficiency/Studio\">
              Efficiency/Studio
            </option>
            <option id=\"item9_2_option\" value=\"1\">
              1
            </option>
            <option id=\"item9_3_option\" value=\"2\">
              2
            </option>
            <option id=\"item9_4_option\" value=\"3\">
              3
            </option>
            <option id=\"item9_5_option\" value=\"4\">
              4
            </option>
          </select><br><br>
        </div>";
				}
			}
			?>
			<div id="cl_utilsmortrent" name="Utilities+Rent/Mort" style="opacity: 1; float:left; width: 100%;">
				<label class="form-els">Utilities not included in Mortgage/Rent</label><br>
				<input type="radio" id="cl_utilbutt1" name="cl_utilities" value="sua2" onchange="ShowAboutFamily();"/><span
					class="button-text">Heating/Cooling expenses</span><br>
				<input type="radio" id="cl_utilbutt2" name="cl_utilities" value="sua3" onchange="ShowAboutFamily();"/><span
					class="button-text">Only (2) utilities (Not Heating/Cooling)</span><br>
				<input type="radio" id="cl_utilbutt3" name="cl_utilities" value="sua4" onchange="ShowAboutFamily();"/><span
					class="button-text">Only (1) utility (not Phone, Heating/Cooling)</span><br>
				<input type="radio" id="cl_utilbutt4" name="cl_utilities" value="sua5" onchange="ShowAboutFamily();"/><span
					class="button-text">Only phone bill (some states allow mobile/cell phones)</span><br>
				<input type="radio" id="cl_utilbutt5" name="cl_utilities" value="sua6" onchange="ShowAboutFamily();"/><span
					class="button-text">No utilities paid</span><br><br>
			</div>

			<div id="AboutFamilyHR" style="float: left; width: 100%;">
				<hr class="org-hr">
			</div><!-- ABOUT FAMILY HR -->

			<div id="AboutFamilyLabel" style="opacity: 1; float:left; width: 100%;">
				<h2 class="h2" style="font-weight: normal; font-size: 20px;">
					About your family . . .
				</h2>
			</div>

			<div id="ArePeople21" class="h2" style="opacity: 1; float:left; width:100%;">
				<p style="font-weight: bold; color: rgb(242, 117, 34);">
					Are there people 21 years or older (Adults) in the home?
					<label id="item58_0_label"><input type="radio" id="item58_0_radio" data-hint=""
																 name="twentyone_or_older_check" value="Yes"
																 onchange="ShowYes21();"/><span style="font-size: 12px; color: black;">Yes</span></label>
					<label id="item58_1_label"><input type="radio" id="item58_1_radio" name="twentyone_or_older_check"
																 value="No" onchange="ShowNo21();"/><span
							style="font-size: 12px; color: black;">No</span></label>
				</p>
			</div>

			<div id="HowMany21s" style="opacity: 1; float:left; width:100%;">
				<label style="display: inline; font-weight: bold;" class="button-text">How many?</label>
				<input type="text" id="cl_adults" name="cl_adults" placeholder="Type number here"
						 onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" class="nextbutton" onclick="ShowDoAnyPT();">Next</button>
				<br><br>
			</div>

			<div id="DoAnyPT" class="h3" style="opacity: 1; float:right; width:90%; font-size=14;">
				<p>
					Do any of them work Part-Time?
					<input type="radio" id="21orOlderPTYes" name="twentyone_or_older_PTcheck" value="Yes"
							 onchange="ShowHowManyPT();"/><span style="font-size: 12px; color: black;">Yes</span>
					<input type="radio" id="21orOlderPTNo" name="twentyone_or_older_PTcheck" value="No"
							 onchange="ShowDoAnyPTNo();"/><span style="font-size: 12px; color: black;">No</span>
				</p>
			</div>

			<div id="HowManyPT" style="opacity: 1; float:right; width:90%;">
				<label style="display: inline; font-size: 13px;" class="button-text">How many?</label>
				<input type="text" id="cl_adults_PT" maxlength="25" placeholder="Type number here" name="cl_adults_PT"
						 onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" class="nextbutton" onclick="ShowDoAnyFT();">Next</button>
				<br><br>
			</div>

			<div id="DoAnyFT" class="h3" style="opacity: 1; float:right; width:90%; font-size=14;">
				<p>
					Do any of them work Full-Time?
					<label id="item58_0_label"><input type="radio" id="21orOlderFTYes" name="twentyone_or_older_FTcheck"
																 value="Yes" onchange="ShowHowManyFT();"/><span
							style="font-size: 12px; color: black;">Yes</span></label>
					<label id="item58_1_label"><input type="radio" id="21orOlderFTNo" name="twentyone_or_older_FTcheck"
																 value="No" onchange="ShowDoAnyFTNo();"/><span
							style="font-size: 12px; color: black;">No</span></label>
				</p>
			</div>

			<div id="HowManyFT" style="opacity: 1; float:right; width:90%;">
				<label id="item99_label_0" style="display: inline; font-size: 13px;" class="button-text">How many?</label>
				<input type="text" id="cl_adults_FT" maxlength="25" placeholder="Type number here"
						 onkeyup="this.value=this.value.replace(/[^\d]/,'')" name="cl_adults_FT"/>
				<button type="button" class="nextbutton" onclick="ShowMonthlyWorkExpenses();">Next</button>
				<br><br>
			</div>

			<div id="WorkExpensesReimbursed" class="h3" style="opacity: 1; float:right; width:90%;">
				<p>
					Are there monthly expenses to work (not reimbursed)?
					<input type="radio" id="WorkExpensesYes" name="twentyone_or_older_Expcheck" value="Yes"
							 onclick="ShowMonthlyWorkExpensesYes();"/><span style="font-size: 12px; color: black;">Yes</span>
					<input type="radio" id="WorkExpensesNo" name="twentyone_or_older_Expcheck" value="No"
							 onclick="ShowMonthlyWorkExpensesNo();"/><span style="font-size: 12px; color: black;">No</span>
				</p>
			</div>

			<div id="HowMuchWorkExpense" style="opacity: 1; float:right; width:90%;">
				<label id="item99_label_0" style="display: inline; font-size: 13px;" " class="button-text">How much?</label>
				&nbsp;&nbsp;&nbsp;$&nbsp;<input type="text" id="WorkExpenseAmount" name="WorkExpenseAmount" maxlength="25"
														  placeholder="Type amount here" name="cl_adults_workexpense"
														  onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" class="nextbutton" onclick="ShowGetPeople13to20();">Next</button>
				<br><br>
			</div>

			<div id="ArePeople13to20" class="h2" style="opacity: 1; float: left; width: 100%">
				<p style="font-weight: bold; color: rgb(242, 117, 34);">
					Are there people 13 to 20 years old in the home?
					<input type="radio" id="item59_0_radio" name="thirteen_to_twenty_check" value="Yes"
							 onchange="ShowHowMany13to20();"/><span style="font-size: 12px; color: black;">Yes</span></label>
					<label id="item59_1_label"><input type="radio" id="item59_1_radio" name="thirteen_to_twenty_check"
																 value="No" onchange="ShowHowMany13to20No();"/><span
							style="font-size: 12px; color: black;">No</span></label>
				</p>
			</div>

			<div id="HowMany13to20" style="opacity: 1; float:left; width:100%;">
				<label id="item102_label_0" style="display: inline; font-weight: bold;" class="button-text">How
					many?</label>
				<input type="text" id="13to20Count" maxlength="25" placeholder="Type number here"
						 name="cl_thirteen_to_twenty" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" class="nextbutton" onclick="ShowAreAny19to20();">Next</button>
				<br><br>
			</div>

			<div id="AreAny19to20" class="h3" style="opacity: 1; float:right; width:90%;">
				<p>
					Are any of them 19 to 20 years old?
					<label id="item58_0_label"><input type="radio" id="19to20Yes" name="19to20_check" value="Yes"
																 onchange="ShowHowMany19to20();"/><span
							style="font-size: 12px; color: black;">Yes</span></label>
					<label id="item58_1_label"><input type="radio" id="19to20No" name="19to20_check" value="No"
																 onchange="ShowHowMany19to20No();"/><span
							style="font-size: 12px; color: black;">No</span></label>
				</p>
			</div>

			<div id="HowMany19to20" style="opacity: 1; float:right; width:90%;">
				<label id="item99_label_0" style="display: inline; font-size: 13px;" " class="button-text">How many?</label>
				<input type="text" id="19to20Count" maxlength="25" placeholder="Type number here" name="cl_19to20"
						 onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" class="nextbutton" onclick="ShowAreAny13to18();">Next</button>
				<br><br>
			</div>

			<div id="AreAny13to18" class="h3" style="opacity: 1; float:right; width:90%;">
				<p>
					Are any of them 13 to 18 years old?
					<input type="radio" id="13to18Yes" name="13to18_check" value="Yes" onchange="ShowHowMany13to18();"/><span
						style="font-size: 12px; color: black;">Yes</span>
					<input type="radio" id="13to18No" name="13to18_check" value="No" onchange="ShowHowMany13to18No();"/><span
						style="font-size: 12px; color: black;">No</span>
				</p>
			</div>

			<div id="HowMany13to18" style="opacity: 1; float:right; width:90%;">
				<label style="display: inline; font-size: 13px;" " class="button-text">How many?</label>
				<input id="13to18Count" type="text" maxlength="25" placeholder="Type number here" name="cl_13to18"
						 onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" class="nextbutton" onclick="ShowAreAnyUnable();">Next</button>
				<br><br>
			</div>

			<div id="AreAnyUnable" class="h3" style="opacity: 1; float:right; width:90%;">
				<p>
					Are any of them UNABLE to care for themselves?
					<input type="radio" id="AnyUnableYes" name="unable_check" value="Yes"
							 onchange="ShowHowManyUnable();"/><span style="font-size: 12px; color: black;">Yes</span>
					<input type="radio" id="AnyUnableNo" name="unable_check" value="No"
							 onchange="ShowHowManyUnableNo();"/><span style="font-size: 12px; color: black;">No</span>
				</p>
			</div>

			<div id="HowManyUnable" style="opacity: 1; float:right; width:90%;">
				<label style="display: inline; font-size: 13px;" " class="button-text">How many?</label>
				<input id="AnyUnableCount" type="text" maxlength="25" placeholder="Type number here" name="cl_unable"
						 onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" class="nextbutton" onclick="ShowAreAnyLessThan13();">Next</button>
				<br><br>
			</div>

			<div id="ArePeopleLessThan13" class="h2" style="opacity: 1; float: left; width: 100%">
				<p style="font-weight: bold; color: rgb(242, 117, 34);">
					Are there people less than 13 years old in the home?
					<input type="radio" id="PeopleLessThan13Yes" name="less_than_thirteen_check" value="Yes"
							 onchange="ShowHowManyLessThan13();"/><span style="font-size: 12px; color: black;">Yes</span>
					<input type="radio" id="PeopleLessThan13No" name="less_than_thirteen_check" value="No"
							 onchange="ShowAreAnyLessThan13No();"/><span style="font-size: 12px; color: black;">No</span>
				</p>
			</div>

			<div id="HowManyLessThan13" style="opacity: 1; float:left; width:100%;">
				<label id="item102_label_0" style="display: inline; font-weight: bold;" class="button-text">How
					many?</label>
				<input type="text" id="LessThan13Count" maxlength="25" placeholder="Type number here"
						 name="cl_less_than_thirteen" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" onclick="ShowChildInfos();" class="nextbutton">Next</button>
			</div>

			<div id="GetChild1"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 1:&nbsp;&nbsp;</label>

				<div id="Child1Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child1Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child1_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child1Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child1_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child1Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child1_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child1DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="child1DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="child1DCNeedsv2" name="child1DCNeedsv2">
							<option value="">
								Choose one
							</option>
							<option value="Full Time, 30 or more">
								Full Time, 30 or more
							</option>
							<option value="Part time 1, 8-29 hours">
								Part time 1, 8-29 hours
							</option>
							<option value="Part time 2, split coustody or two providers">
								Part time 2, split coustody or two providers
							</option>
							<option value="Part time 3, 1-7 hours">
								Part time 3, 1-7 hours
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD1 INFOS -->

			<div id="GetChild2"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 2:&nbsp;&nbsp;</label>

				<div id="Child2Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child2Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child2_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child2Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child2_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child2Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child2_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child1DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="child1DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="child1DCNeedsv2" name="child1DCNeedsv2">
							<option value="">
								Choose one
							</option>
							<option value="Full Time, 30 or more">
								Full Time, 30 or more
							</option>
							<option value="Part time 1, 8-29 hours">
								Part time 1, 8-29 hours
							</option>
							<option value="Part time 2, split coustody or two providers">
								Part time 2, split coustody or two providers
							</option>
							<option value="Part time 3, 1-7 hours">
								Part time 3, 1-7 hours
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD2 INFOS -->

			<div id="GetChild3"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 3:&nbsp;&nbsp;</label>

				<div id="Child3Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child3Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child3_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child3Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child3_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child3Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child3_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child3DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="child3DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="child3DCNeedsv2" name="child3DCNeedsv2">
							<option value="">
								Choose one
							</option>
							<option value="Full Time, 30 or more">
								Full Time, 30 or more
							</option>
							<option value="Part time 1, 8-29 hours">
								Part time 1, 8-29 hours
							</option>
							<option value="Part time 2, split coustody or two providers">
								Part time 2, split coustody or two providers
							</option>
							<option value="Part time 3, 1-7 hours">
								Part time 3, 1-7 hours
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD3 INFOS -->

			<div id="GetChild4"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 4:&nbsp;&nbsp;</label>

				<div id="Child4Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child4Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child4_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child4Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child4_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child4Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child4_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child4DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="Child4DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="Child4DCNeeds" name="cl_child4DC">
							<option value="">
								Choose one
							</option>
							<option value="Full Time - No School">
								Full Time - No School
							</option>
							<option value="Part Time - No School">
								Part Time - No School
							</option>
							<option value="Before School">
								Before School
							</option>
							<option value="After School">
								After School
							</option>
							<option value="Before/After School">
								Before/After School
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD4 INFOS -->

			<div id="GetChild5"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 5:&nbsp;&nbsp;</label>

				<div id="Child5Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child5Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child5_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child5Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child5_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child5Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child5_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child5DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="Child5DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="Child5DCNeeds" name="cl_child5DC">
							<option value="">
								Choose one
							</option>
							<option value="Full Time - No School">
								Full Time - No School
							</option>
							<option value="Part Time - No School">
								Part Time - No School
							</option>
							<option value="Before School">
								Before School
							</option>
							<option value="After School">
								After School
							</option>
							<option value="Before/After School">
								Before/After School
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD5 INFOS -->

			<div id="GetChild6"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 6:&nbsp;&nbsp;</label>

				<div id="Child6Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child6Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child6_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child6Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child6_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child6Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child6_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child6DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="Child6DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="Child6DCNeeds" name="cl_child6DC">
							<option value="">
								Choose one
							</option>
							<option value="Full Time - No School">
								Full Time - No School
							</option>
							<option value="Part Time - No School">
								Part Time - No School
							</option>
							<option value="Before School">
								Before School
							</option>
							<option value="After School">
								After School
							</option>
							<option value="Before/After School">
								Before/After School
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD6 INFOS -->

			<div id="GetChild7"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 7:&nbsp;&nbsp;</label>

				<div id="Child7Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child7Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child7_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child7Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child7_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child7Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child7_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child7DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="Child7DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="Child7DCNeeds" name="cl_child7DC">
							<option value="">
								Choose one
							</option>
							<option value="Full Time - No School">
								Full Time - No School
							</option>
							<option value="Part Time - No School">
								Part Time - No School
							</option>
							<option value="Before School">
								Before School
							</option>
							<option value="After School">
								After School
							</option>
							<option value="Before/After School">
								Before/After School
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD7 INFOS -->

			<div id="GetChild8"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 8:&nbsp;&nbsp;</label>

				<div id="Child8Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child8Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child8_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child8Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child8_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child8Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child8_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child8DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="Child8DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="Child8DCNeeds" name="cl_child8DC">
							<option value="">
								Choose one
							</option>
							<option value="Full Time - No School">
								Full Time - No School
							</option>
							<option value="Part Time - No School">
								Part Time - No School
							</option>
							<option value="Before School">
								Before School
							</option>
							<option value="After School">
								After School
							</option>
							<option value="Before/After School">
								Before/After School
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD8 INFOS -->

			<div id="GetChild9"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 9:&nbsp;&nbsp;</label>

				<div id="Child9Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child9Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child9_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child9Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child9_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child9Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child9_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child9DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="Child9DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="Child9DCNeeds" name="cl_child9DC">
							<option value="">
								Choose one
							</option>
							<option value="Full Time - No School">
								Full Time - No School
							</option>
							<option value="Part Time - No School">
								Part Time - No School
							</option>
							<option value="Before School">
								Before School
							</option>
							<option value="After School">
								After School
							</option>
							<option value="Before/After School">
								Before/After School
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD9 INFOS -->

			<div id="GetChild10"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 10:&nbsp;&nbsp;</label>

				<div id="Child10Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child10Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child10_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child10Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child10_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child10Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child10_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child10DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="Child10DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="Child10DCNeeds" name="cl_child10DC">
							<option value="">
								Choose one
							</option>
							<option value="Full Time - No School">
								Full Time - No School
							</option>
							<option value="Part Time - No School">
								Part Time - No School
							</option>
							<option value="Before School">
								Before School
							</option>
							<option value="After School">
								After School
							</option>
							<option value="Before/After School">
								Before/After School
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD10 INFOS -->

			<div id="GetChild11"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 11:&nbsp;&nbsp;</label>

				<div id="Child11Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child11Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child11_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child11Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child11_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child11Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child11_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child11DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="Child11DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="Child11DCNeeds" name="cl_child11DC">
							<option value="">
								Choose one
							</option>
							<option value="Full Time - No School">
								Full Time - No School
							</option>
							<option value="Part Time - No School">
								Part Time - No School
							</option>
							<option value="Before School">
								Before School
							</option>
							<option value="After School">
								After School
							</option>
							<option value="Before/After School">
								Before/After School
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD11 INFOS -->

			<div id="GetChild12"
				  style="opacity: 1; float:left; width: 100%; text-align: right; padding-bottom: 10px; padding-top: 20px;">
				<label class="h2">Child 12:&nbsp;&nbsp;</label>

				<div id="Child12Infos"
					  style="opacity: 1; float:right; width:85%; border: 1px solid; padding-left: 10px; padding-bottom: 10px; text-align: left;">
					<div id="Child12Years" style="float: left; width:10%;">
						<label id="item107_label_0" style="display: inline;" class="button-text">Years</label><br>
						<input type="text" id="item107_text_1" maxlength="5" size="5" placeholder="0" name="cl_child12_years"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child12Months" style="float: left; width:15%;">
						<label id="item108_label_0" style="display: inline;" class="button-text">Months</label><br>
						<input type="text" id="item108_text_1" maxlength="5" size="5" placeholder="0" name="cl_child12_months"
								 class="button-text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
					</div>
					<div id="Child12Grade" style="float: left; width:20%;">
						<label id="item56_label_0" style="display: inline;" class="button-text">Grade Level</label><br>
						<select id="item56_select_1" name="cl_child12_grade">
							<option selected id="item56_0_option" value="">
								Choose one
							</option>
							<option id="item56_1_option" value="N/A">
								N/A
							</option>
							<option id="item56_2_option" value="Kindergarten">
								Kindergarten
							</option>
							<option id="item56_3_option" value="1">
								1
							</option>
							<option id="item56_4_option" value="2">
								2
							</option>
							<option id="item56_5_option" value="3">
								3
							</option>
							<option id="item56_6_option" value="4">
								4
							</option>
							<option id="item56_7_option" value="5">
								5
							</option>
							<option id="item56_8_option" value="6">
								6
							</option>
							<option id="item56_9_option" value="7">
								7
							</option>
							<option id="item56_10_option" value="8">
								8
							</option>
							<option id="item56_11_option" value="9">
								9
							</option>
							<option id="item56_12_option" value="10">
								10
							</option>
							<option id="item56_13_option" value="11">
								11
							</option>
							<option id="item56_14_option" value="12">
								12
							</option>
						</select>
					</div>
					<div id="Child12DayCare" style="opacity: 1; float:left; width: 20%;">
						<label id="Child12DC_label" style="display: inline;" class="button-text">Day Care Need</label><br>
						<select id="Child12DCNeeds" name="cl_child12DC">
							<option value="">
								Choose one
							</option>
							<option value="Full Time - No School">
								Full Time - No School
							</option>
							<option value="Part Time - No School">
								Part Time - No School
							</option>
							<option value="Before School">
								Before School
							</option>
							<option value="After School">
								After School
							</option>
							<option value="Before/After School">
								Before/After School
							</option>
						</select>
					</div>
				</div>
			</div><!-- END CHILD12 INFOS -->

			<div id="LastChild" style="float: right; width:85%;">
				<button type="button" onclick="ShowDayCareInfos();" class="nextbutton">Next
			</div>
			<br><br>

			<div id="DayCareInfos"
				  style="opacity: 1; padding-bottom: 0px; padding-top: 14px; float: left; width: 100%; color: black;">
				<p class="form-els">
					Day Care Information:
				</p>
			</div>

			<div id="DayCareDays" style="opacity: 1; float: right; width: 85%;">
				<label id="item68_label_0" style="display: inline; font-weight: normal;" class="button-text">How many days
					of the week is child care needed?</label>
				<input id="DayCareDaysIn" type="text" maxlength="25" placeholder="Type number here"
						 name="cl_child_care_days" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" onclick="ShowDayCareHours();" class="nextbutton">Next</button>
				<br><br>
			</div><!-- END OF DAY CARE DAYS -->

			<div id="DayCareHours" style="opacity: 1; float: right; width: 85%;">
				<label id="item69_label_0" style="display: inline; font-weight: normal;" class="button-text">How many hours
					per day is child care needed?</label>
				<input id="DayCareHoursIn" type="text" maxlength="25" placeholder="Type number here"
						 name="cl_child_care_hours" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" onclick="ShowDayCarePlace();" class="nextbutton">Next</button>
				<br><br>
			</div><!-- END OF DAY CARE HOURS -->

			<div id="DayCarePlace" style="opacity: 1; float: right; width: 85%">
				<label id="item76_label_0" style="display: inline;" class="button-text">Where is child care
					provided?</label><br>
				<input type="radio" id="item76_0_radio" data-hint="" name="cl_child_care_location"
						 value="In unlicensed home" onchange="ShowDayCareFaith();"/><span class="button-text">In unlicensed home</span><br>
				<input type="radio" id="item76_1_radio" name="cl_child_care_location" value="In licensed home/group home"
						 onchange="ShowDayCareFaith();"/><span class="button-text">In licensed home/group home</span><br>
				<input type="radio" id="item76_2_radio" name="cl_child_care_location" value="By licensed center"
						 onchange="ShowDayCareFaith();"/><span class="button-text">By licensed center</span><br>
				<input type="radio" id="item76_3_radio" name="cl_child_care_location"
						 value="In unlicensed exempt center/program" onchange="ShowDayCareFaith();"/><span
					class="button-text">In unlicensed exempt center/program</span><br>
				<input type="radio" id="item76_4_radio" name="cl_child_care_location" value="In child&rsquo;s own home"
						 onchange="ShowDayCareFaith();"/><span class="button-text">In child&rsquo;s own home</span><br><br>
			</div>

			<div id="DayCareFaith" style="opacity: 1; float: right; width: 85%">
				<label id="item78_label_0" style="display: inline;" class="button-text">Is child care provider Faith
					Based?</label>
				<input type="radio" id="item78_0_radio" data-hint="" name="cl_child_care_faithbased" value="Yes"
						 onchange="ShowAddFamily();"/><span class="button-text"
																		style="font-size: 12px; color: black;">Yes</span>
				<input type="radio" id="item78_1_radio" name="cl_child_care_faithbased" value="No"
						 onchange="ShowAddFamily();"/><span class="button-text"
																		style="font-size: 12px; color: black;">No</span>
				<br><br></div>

			<div id="AddFamilyLabel" style="opacity: 1; float:left; width: 100%;">
				<h2 class="h2" style="font-weight: normal; font-size: 20px;">
					About additional family members . . .
				</h2>
			</div>

			<div id="FTCollegeStudents" class="h2" style="opacity: 1; float: left; width: 100%">
				<p style="font-weight: bold; color: rgb(242, 117, 34);">
					Are there any full time college students (18 to 25 years old) living in the home?
					<input type="radio" id="item59_0_radio" name="FTCollegeStudents_check" value="Yes"
							 onchange="ShowHowManyFTCollege();"/><span style="font-size: 12px; color: black;">Yes</span>
					<input type="radio" id="item59_1_radio" name="FTCollegeStudents_check" value="No"
							 onchange="ShowCurrentPreg();"/><span style="font-size: 12px; color: black;">No</span>
				</p>
			</div>

			<div id="HowManyFTCollegeStudents" style="opacity: 1; float:left; width:100%;">
				<label id="item102_label_0" style="display: inline; font-weight: bold;" class="button-text">How
					many?</label>
				<input type="text" id="FTCollegeCount" maxlength="25" placeholder="Type number here"
						 name="cl_family_college_students" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" class="nextbutton" onclick="ShowCurrentPreg();">Next</button>
			</div>

			<div id="CurrentPreg" class="h2" style="opacity: 1; float: left; width: 100%">
				<p style="font-weight: bold; color: rgb(242, 117, 34);">
					Is there a current pregnancy?
					<input type="radio" id="item59_0_radio" name="cl_family_pregnancy_check" value="Yes"
							 onchange="ShowStepParent();"/><span style="font-size: 12px; color: black;">Yes</span>
					<input type="radio" id="item59_1_radio" name="cl_family_pregnancy_check" value="No"
							 onchange="ShowStepParent();"/><span style="font-size: 12px; color: black;">No</span>
				</p>
			</div>

			<div id="StepParent" class="h2" style="opacity: 1; float: left; width: 100%">
				<p style="font-weight: bold; color: rgb(242, 117, 34);">Is there a step parent living in the home?
					<label id="item59_0_label"><input type="radio" id="item59_0_radio" name="cl_family_stepparent_check"
																 value="Yes" onchange="ShowAllReceiving();"/><span
							style="font-size: 12px; color: black;">Yes</span></label>
					<label id="item59_1_label"><input type="radio" id="item59_1_radio" name="cl_family_stepparent_check"
																 value="No" onchange="ShowAllReceiving();"/><span
							style="font-size: 12px; color: black;">No</span></label>
				</p>
			</div>

			<div id="AllReceiving" class="h2" style="opacity: 1; float: left; width: 100%">
				<p style="font-weight: bold; color: rgb(242, 117, 34);">Are ALL members in this home receiving TANF, GA or
					SSI?
					<label id="item59_0_label"><input type="radio" id="item59_0_radio" name="cl_family_All_onBenefits_check"
																 value="Yes" onchange="ShowAdults60Plus();"/><span
							style="font-size: 12px; color: black;">Yes</span></label>
					<label id="item59_1_label"><input type="radio" id="item59_1_radio" name="cl_family_All_onBenefits_check"
																 value="No" onchange="ShowAdults60Plus();"/><span
							style="font-size: 12px; color: black;">No</span></label>
				</p>
			</div>

			<div id="Adults60PlusYN" class="h2" style="opacity: 1; float: left; width: 100%">
				<p style="font-weight: bold; color: rgb(242, 117, 34);">
					Any adults 60+ years and/or people with Disabilities living in the home?
					<label id="item59_0_label"><input type="radio" id="item59_0_radio" name="cl_family_over60_check"
																 value="Yes" onchange="ShowHowMany60PlusYes();"/><span
							style="font-size: 12px; color: black;">Yes</span></label>
					<label id="item59_1_label"><input type="radio" id="item59_1_radio" name="cl_family_over60_check"
																 value="No" onchange="ShowThatsAllFolks();"/><span
							style="font-size: 12px; color: black;">No</span></label>
				</p>
			</div>

			<div id="HowMany60Plus" style="opacity: 1; float:left; width:100%;">
				<label id="item102_label_0" style="display: inline; font-weight: bold;" class="button-text">How
					many?</label>
				<input type="text" id="60PlusCount" maxlength="25" placeholder="Type number here"
						 name="cl_family_over60_count" onkeyup="this.value=this.value.replace(/[^\d]/,'')"/>
				<button type="button" class="nextbutton" onclick="ShowThatsAllFolks();">Next</button>
				<br><br>
			</div>
			<div id="ThatsAllFolks" style="opacity: 1; float:left; width:100%; text-align: center;">
				<button type="submit" class="nextbutton" onclick="">Next (Monthly Expenses) --></button>
				<br><br>
			</div>

			<!-- ALLWAYS KEEP NEXT DIV AT THE VERY BOTTOM! This makes sure that the blue border stays bigger than the content. -->
			<div style="clear: both;">&nbsp;</div>
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

		<div id="ShowEverything" style="opacity: 1; float:left; width:100%; text-align: center;">
			<button type="button" onclick="ShowAll()">Show All (DEV104)</button>
			<br><br>
		</div>

	</body>
</html>
