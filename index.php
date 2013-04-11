<?php
//=====Includes for everything.
include("libs/lib_login.php");			//Custom Login Librarys
include("libs/lib_navigation.php");		//Custom Nav Librarys
include("libs/lib_news.php");			//Custom News Librarys
include("libs/lib_shows.php");			//Custom Shows Librarys
include("libs/lib_archives.php");		//Custom Archive Librarys
include("libs/lib_pagination.php");		//Custom Pagination Librarys
include("libs/lib_achievement.php");		//Custom Achievement Librarys
include("libs/lib_twitter.php");		//Custom Twitter Librarys
include("modules/modules.php");			//Custom Site Modules
include("connection/settings.php");		//DB Settings
?>

<script language="javascript">
    function ToggleInventory(showHideDiv, switchTextDiv) {
            var ele = document.getElementById(showHideDiv);
            var text = document.getElementById(switchTextDiv);
            if(ele.style.display == "block") {
                    ele.style.display = "none";
                    text.innerHTML = "Open Inventory";
            }
            else {
                    ele.style.display = "block";
                    text.innerHTML = "Close Inventory";
            }
    }
</script>

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

            </div>
    </div>

    <div class="clear"></div>

	<div id="NavigationWrap">
		<?php Navigation(Get_View()) ?>
	</div>
    <br />
    

    <!-- Body Contents -->
    <div id="ContentWrap">
    
    	<!-- Left Column -->
   	  <div class="LeftContent floatl">
            
            <?php //mod_RecentShows(); ?>
            
            <?php //mod_Sponsors(); ?>
            
            <?php //mod_Twitter(); ?>
            
            <?php mod_Info(); ?>
            
        </div>
        
        <!-- Center Column -->
   	  <div class="CenterContent floatl">
            <div class='CenterHeader'><?php echo("<img src='images/headers/".Get_View().".png'>"); ?></div>
                <div id='CenterPageWrap'>
                    <?php Display_View(Get_View()); ?>
                </div>
            <div class='CenterFooter'></div>
          </div>
        
        <!-- Right Column -->
   	  <div class="RightContent floatl">

          </div>

    <!-- Footer Area -->
          <div class="clear"></div>
          </div>
        <div class="Footer">Copyright &copy; 2011 Dustin Hendrickson </div>
    </div>
    </div>

    <div id="InventoryDisplay" style='display: block;'>
        <?php include("player/webplayer.php"); ?>
    </div>

    <div id="AchievementDisplay"><img alt="" src="/images/controller.png"/>0 AP</div>

    <div id="CommunityFooter">
        <a id="ToggleInventoryButton" href="javascript:ToggleInventory('InventoryDisplay','ToggleInventoryButton');" >Open Inventory</a>
        <?php
        ShowLoginForm();
        ?>
    </div>

    </body>
</html>


    <!-- SHOW ACHIEVEMENTS -->
    <?php
        AchievementShow("[ Sneak Peak ]","Achievements coming soon!   5AP");
    ?>