<?php

function AchievementShow($title,$message) {

	echo "<script type=\"text/javascript\" src=\"javascript/jquery-1.3.2.js\" ></script>";
	echo "<script type=\"text/javascript\" src=\"javascript/jquery.growl.js\"  ></script>";

	echo "<script type=\"text/javascript\">";
	echo "$(document).ready(function() {";
	echo "  $('.noticeTitle').val(title);";
	echo "  $('#updateNoticeMessage').click(function() {";
	echo "    msg = $('.noticeMessage').val();";
	echo "    title = $('.noticeTitle').val();";
	echo "  $.growl(title, msg);";
	echo "  });";

	echo "  $('#cancelF1').click(function() {";
	echo "    clearInterval(f1);";
	echo "  });";

	echo "  $('#cancelF2').click(function() {";
	echo "    clearInterval(f2);";
	echo "  });";

	echo "  $('#cancelF3').click(function() {";
	echo "    clearInterval(f3);";
	echo "  });";

	echo "  $.growl.settings.displayTimeout = 10200;";
	echo "  $.growl.settings.dockCss.width = '300px';";
	echo "  $.growl.settings.dockCss.hright = '75px';";
	echo "  $.growl.settings.defaultImage = '';";
	echo "  $.growl.settings.noticeTemplate = ''";
	echo "  	+ '<div id=\"AchievementWrapper\">'";
	echo "	+ '		<div class=\"AchievementImage floatl\"><img src=\"/images/achievementtrophy.png\"></div>'";
	echo "	+ '		<div class=\"AchievementText floatl\">'";
	echo "	+ '			<div style=\"font-size: 14px; color: Orange; display: inline;\">%title%</div>'";
	echo "	+ '			<br>'";
	echo "	+ '			<div style=\"font-size: 16px; color: White; display: inline;\">%message%</div>'";
	echo "	+ '		</div>'";
	echo "	+ '</div>';";


	echo "  	var msg = '".$message."';";
	echo "  	var title = '".$title."';";
	echo "  	$.growl(title, msg);";
 
	echo "});";
	echo "</script>";

}

?>