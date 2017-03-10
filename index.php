<?php
require 'welcome.php';
require_once 'config.php';
require_once 'dump-errors.php';
?>


<?php
if ('Production' != constant('DEPLOY_MODE')) {
	echo '<h3>Site is running in ' . constant('DEPLOY_MODE') . ': all warnings and errors will be displayed!</h3>';
	echo "<pre>";
	require 'dump-errors.php';
	echo "</pre>";
}
?>
