<?php session_start(); ?>
<script language="javascript"> 
function ToggleWebPlayer(showHideDiv, switchTextDiv) {
	var ele = document.getElementById(showHideDiv);
	var text = document.getElementById(switchTextDiv);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "<img alt='' border='none' src='../images/newsedit.png'>";
		<?php unset($_SESSION["WebPlayer"]); ?>
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "<img alt='' border='none' src='../images/newsedit2.png'>";
		<?php $_SESSION["WebPlayer"] = "Up"; ?>
	}
}
</script>
    <div class="clear"></div>
    </div>
<div class="Footer">Copyright &copy; 2011 Dustin Hendrickson </div>
</div>
</div>

<div id="WebPlayerDisplay" style='display: none;'>
<?php include("player/webplayer.php"); ?>
</div>
<div id="AchievementDisplay"><img src="/images/controller.png">0 AP</div>
<div id="CommunityFooter">
<!--<a id="WebPlayerToggleButton floatl" href="javascript:ToggleWebPlayer('WebPlayerDisplay','WebPlayerToggleButton');" ><img border='none' src='../images/newsedit.png'></a> -->
<?php
ShowLoginForm();
?>
</div>

</body>
</html>


<!-- SHOW ACHIEVEMENTS -->
<?php
//AchievementShow("[ Sneak Peak ]","Achievements coming soon!   5AP");
?>