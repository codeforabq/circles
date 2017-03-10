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
		<link rel="stylesheet" type="text/css" href="theme/default/css/default.css" id="theme"/>
		<link rel="stylesheet" type="text/css" href="styles/style.css"/>
		<title>
			CUSA Cliff Effect
		</title>
		<!--temporary style in head for moving inline styles up-->
		<style>
			#header-img {
				float: left;
				display: inline;
				padding-top: 1%;
			}
			.header-text {
				text-align: center;
				float: right;
			}
		</style>
	</head>

	<body>
		<!-- BEGIN OUTSIDE FORM -->
		<div id="MainDIV" class="centered">

			<!-- START HEADER -->
			<div id="header-img">
				<img alt="Circles USA" id="cusalogo" src="images/circles-usa-new.png"/>
			</div>
			<div class="header-text">
				<h2 class="h2">Cliff Effect Planning Tool</h2>
			</div>
			<div style="text-align: center; float: left; width: 100%;">
				<hr class="org-hr">
			</div>
			<!-- END HEADER -->

			<div style="float: left; width: 100%;">
				<span class="h2" style="font-weight: bold; font-size: 22px;">Disclaimer:</span><br><br>

				This software was developed with the sole intent of helping people gain an overview of what might change in
				their expenses when they increase income and begin losing government assistance.<br><br>
				Agreement of use: With any use of this software, or any version thereof, you and any affiliates agree to
				hold harmless Circles USA and is affiliate members, and the developer of this software for any and all
				outcomes as a result of direct or indirect use or misuse of the software. The results of the Cliff Effect
				Planning Tool are estimates based on our best information at the time this tool was developed. All estimates
				should be verified with the appropriate government agencies and through research on the open market for
				alternative services once government assistance is reduced or ended.<br><br>
				If your country, state, county, local or any other law prohibits the agreement of use then your use of any
				part of the software or any version thereof is also prohibited.<br><br>
				By clicking on the link button below you signify that you understand and agree with this disclaimer.<br><br>
			</div>
			<div style="float: left; width=100%; padding-left: 45%;">
				<button type="reset" onclick="location.href='cl_infos.php'"
						  style="border: none; color: white; padding: 7px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 15px; font-weight: bold; background-color: rgb(0, 163, 222); font-family: Helvetica, Arial; background-image: none;">
					I Agree!
				</button>
			</div>


			<!-- ALLWAYS KEEP NEXT DIV AT THE VERY BOTTOM! This makes sure that the blue border stays bigger than the content. -->
			<div style="clear: both;">&nbsp;</div>
		</div>

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
