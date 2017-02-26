<!DOCTYPE HTML>
<html>
	<?php
	$whoisdis = $_SERVER['REMOTE_USER'];
	//echo "<br><br>Dis Is . . . ".$whoisdis."<br><br>";
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"
		/>
		<script type="text/javascript" src="common/js/form_init.js" data-name=""
				  id="form_init_script">
		</script>
		<link rel="stylesheet" type="text/css" href="theme/default/css/default.css"
				id="theme"/>
		<title>
			CUSA Cliff Effect
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
	</head>

	<body>
		<!-- BEGIN OUTSIDE FORM -->
		<div id="MainDIV" class="centered">

			<!-- START HEADER -->
			<div style="float: left;">
				<img alt="Circles USA" id="cusalogo" src="images/circles-usa-new.png" style="display: inline;"/>
			</div>
			<div style="text-align: center; float: right;">
				<h2 class="h2">Cliff Effect Planning Tool</h2>
			</div>
			<div style="text-align: center; float: left; width: 100%;">

				<hr class="org-hr">
			</div>
			<!-- END HEADER -->
			<div style="float: left; width: 100%">
				<br>
				<span class="h2" style="font-weight: bold; font-size: 22px;">Welcome!</span>
				<br><br>We at Circles USA think having information is in everyone’s best interest. The better the tools we
				have, the better we can solve problems. So wouldn’t better tools to understand the cliff effect that can
				occur when people move off assistance programs be good? Wouldn’t we be better able to plan for the
				future?<br><br>

				<span class="h2" style="font-weight: bold; font-size: 16px;">Planning Tools while we wait for the fix in benefits. . .</span><br><br>

				Assistance programs use complex formulas, making it virtually impossible for a family with low income, or a community volunteer, or even most human service staff, to determine in advance how much assistance people will have once they earn more income. This is a problem because as people earn more income, they disproportionately lose work supports like childcare assistance, health insurance, etc., which undermines progress out of poverty. The result dismantles the survival budget while people are trying to move closer to their stability budget.
				<br><br>
				We need to take the mystery out of the equation so that people can adequately plan for losses in subsidies
				as they generate more earned income. (Just as important, of course, the cliff effect must be removed and
				replaced with prorated schedules that provide smooth exit ramps off work-support assistance programs.
				Circles works on this front, too.)<br><br>
				A Circles USA volunteer Advisor from Connellsville, PA, David Priemer, has built a prototype-planning tool
				calibrated for all counties in 10 states that will predict losses in each of the 5 major programs for 18
				different levels of income. Circles Leaders and volunteers can fill out asset, demographic info and where
				they live and the calculator instantly lets them know how they rate on each of 7 tests for the 5 different
				benefits. The calculator examines subsidies as Leaders move between their current income and expected
				income, up to 200% of the federal poverty level.<br><br>
				Our new web based version of this tool makes it possible to run the analysis from anywhere with internet
				access.<br><br>
			</div>

			<div style="float: left; width=100%; padding-left: 44%;">
				<button type="reset" onclick="location.href='disclaimer.php'" style="border: none; color: white; padding: 7px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 15px; font-weight: bold; background-color: rgb(0, 163, 222); font-family: Helvetica, Arial; background-image: none;">
					Continue ->
				</button>
			</div>
			<!-- ALWAYS KEEP NEXT DIV AT THE VERY BOTTOM! This makes sure that the blue border stays bigger than the content. -->
			<div style="clear: both;">&nbsp;</div>
		</div>

		<br>
		<div align="center">
			<table align="center" border="0" style="font-size: 11px;">
				<tr>
					<td colspan="3">
						<p align="center"><img alt="Copyleft Yo!" height="10" width="10" src="images/Copyleft.png"/>
							2017 CirclesUSA.org
						</p>
					</td>
				</tr>
				<tr>
					<td valign="middle" align="center">Powered with&nbsp;<img src="images/heart.png" height="10" width="10" alt="Love is all that matters"> &nbsp;by VinceCo<br><br></td>
				</tr>
				<tr>
					<td colspan="3" align="center">
						<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
							<img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png"/>
						</a>
						<br/>This work is licensed under a
						<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons
							Attribution-NonCommercial-ShareAlike 4.0 International License
						</a>.
						<br><br>
						HighCharts graphing is licensed separately from this work and is solely for use by Circles USA within the scope of this work.<br>
						Please contact HighCharts directly at
						<a href="http://www.highcharts.com/contact-email">http://www.highcharts.com/contact-email</a>
						to obtain your own license.<br><br>
					</td>
				</tr>
			</table>
		</div>
		<br><br>

	</body>
</html>
