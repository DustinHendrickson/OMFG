<?php
set_include_path("/home/omfgfm/public_html/");
global $forumhack; $boardurl; $secure;
//Forum View Hack
date_default_timezone_set('America/New_York');

if (isset($_GET["secure"])) { $secure = $_GET["secure"]; }

//===================

//include($forumhack."/forums/smfAPI.php");			//API for SMF Forums
include("libs/lib_login.php");			//Custom Login Librarys
include("libs/lib_navigation.php");		//Custom Nav Librarys
include("libs/lib_news.php");			//Custom News Librarys
include("libs/lib_shows.php");			//Custom Shows Librarys
include("libs/lib_archives.php");		//Custom Archive Librarys
include("libs/lib_pagination.php");		//Custom Pagination Librarys
include("libs/lib_achievement.php");		//Custom Achievement Librarys
include("libs/lib_twitter.php");			//Custom Twitter Librarys
include("modules/modules.php");			//Custom Site Modules
$p = SetPage("Home");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link href="/twitter/twitter-rss.css" rel="stylesheet" type="text/css">

<title>OMFG - Original Media For Gamers</title>
</head>

<body>
<div align="center">
<div id="MainWrap">
	
    <div id="HeaderWrap">
   	  <div class="Logo floatl"><img src="/images/logo.png" /></div>
      <div class="Bannerad floatl">
      <!-- Top Banner -->

      <script type="text/javascript">
	  google_ad_client = "pub-9234953000892587";
      /* 728x90, created 1/25/10 */
	  google_ad_slot = "2368324735";
	  google_ad_width = 728;
	  google_ad_height = 90;

	 </script>
	 <script type="text/javascript"
	 src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	 </script>

      </div>
   	</div>
    
    <div class="clear"></div>
    
	<div id="NavigationWrap">
		<?php Navigation($p) ?>
	</div>
    <br />
    
	<div id="FlashWrap">
        <img src="/images/FlashTopperBG.png" alt=""/><br>
    	<div class="FlashLeft">
    		<?php mod_OnAir(); ?>
    	</div>
        
        
        
        <div id="FlashRight">
        It seem's you don't have a Flash player, click <a href="http://www.macromedia.com/go/getflashplayer">HERE</a> to download one and see this content.
        </div>
        <!-- javascript to setup show image rotator -->
		<script type="text/javascript" src="http://dustinhendrickson.com/flash/swfobject.js"></script>
		<script type="text/javascript">
		var ShowRotator = new SWFObject("http://dustinhendrickson.com/flash/imagerotator.swf","rotator","720","250","7");
		ShowRotator.addParam("allowfullscreen","false");
		ShowRotator.addVariable("shownavigation","false");
		ShowRotator.addVariable("linkfromdisplay","true");
		ShowRotator.addVariable("showicons","false");
		ShowRotator.addVariable("linktarget","_self");
		ShowRotator.addVariable("file","http://dustinhendrickson.com/flash/playlist.php");
		ShowRotator.addVariable("transition","blocks");
		ShowRotator.addVariable("width","720");
		ShowRotator.addVariable("height","250");
		ShowRotator.write("FlashRight");
		</script>
       <br><img src="/images/FlashFooterBG.png" alt=""/>
    </div>