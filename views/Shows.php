<script language="javascript"> 
function toggle3(showHideDiv, switchTextDiv) {
	var ele = document.getElementById(showHideDiv);
	var text = document.getElementById(switchTextDiv);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "<img alt='' border='none' src='../images/archiveview.png'>";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "<img alt='' border='none' src='../images/archiveviewup.png'>";
	}
}
</script>
<?php

	$ShowID =  substr($_GET['ID'], 0,4);
	
	if (!(int)$ShowID) { unset($ShowID); }
	
	//Check to see if a certain Show ID is provided.
	if (isset($ShowID)) {
		$sql = mysql_query("SELECT * FROM shows WHERE ID = ".$ShowID."");
	} else {
		$sql = PaginationStart("*","shows","ID","ASC","7");
	}
	
		while($row = mysql_fetch_array($sql)) {
			
			$ID= $row["ID"];
			$Name= $row["Name"];
			$Hosts= $row["Hosts"];
			$ShowEmail= $row["ShowEmail"];
			$Description= $row["Description"];
			$OnAirBanner= $row["OnAirBanner"];
			$AirTime= $row["AirTime"];
			$RSS= $row["RSS"];
			$Active= $row["Active"];
			$AltHostDisplay= $row["AltHostDisplay"];
			$UseAltHostDisplay= $row["UseAltHostDisplay"];
			$iTunes = $row["iTunesLink"];
		
		if ($Active == 1) {
			if ($UseAltHostDisplay == 1) { $Hosts = $AltHostDisplay; }
			
			echo"<br>";
			echo"<div id='ShowWrap'>";
			echo"<div class='ShowLeft floatl'><img src='images/shows/".$OnAirBanner."'></div>";
			echo"<div class='ShowRight floatl'>";
			echo("<div style='font-size: 14px; color: #c66504;'><strong> $Name </strong></div>");
			echo"<br>";
			echo("Hosted by $Hosts");
			echo"<br>";
			echo("<strong>$ShowEmail</strong>");
			echo"<br><br>";
			echo("$Description");
			echo"</div>";
			echo"<div class='ShowLinks'>";
			echo"<div class='ShowLink floatl'><a target='_blank' href='$RSS'>RSS</a></div>";
			echo"<div class='ShowLink floatl'>";
			if ($ShowID == 13 || $ID == 13) { echo"<a href='http://www.tentonhammer.com/podcasts/live'>Episode Downloads</a></div>"; }
			else { echo"<a href='?p=Shows&ID=$ID'>Episode Downloads</a></div>"; }
			echo"<div class='ShowLink floatl'><a target='_blank' href='$iTunes'>Subscribe via iTunes</a></div>";
			echo"<div class='ShowLink floatr'>Airs on $AirTime ".date('T')."</div>";
			echo"</div>";
			echo"</div>";
			echo"<div class='clear'></div>";
		}
		}
		if (!isset($ShowID)) {
		echo "<br>";
		echo "<div id='PaginationWrap'>";
		PaginationEnd("shows","7",false);
		echo "</div>";
		}
?>
<?php
	
	if (isset($ShowID)) {
	$sql = PaginationStart("*","archives","ID","DESC","10",$ShowID,"ShowID");

		while($row = mysql_fetch_array($sql)) {

			$ID= $row["ID"];
			$Name=  $row["Name"];
			$Link=  $row["Link"];
			$ShowID=  $row["ShowID"];
			$ShowNotes=  $row["ShowNotes"];
			$Tags = $row["Tags"];
			$Date = $row["Date"];
			$Duration = $row["Duration"];
?>
		
		<div id="headerDiv">
     	<div id="titleText"><?php echo("<a href='".$Link."'> $Name </a>")?></div>
     
     	<a id="<?php echo($ID); ?>h myHeader" href="javascript:toggle3('<?php echo($ID) ?>c myContent','<?php echo($ID); ?>h myHeader');" ><img alt='Toggle Archive View' border='none' src='../images/archiveview.png'></a>
		</div>
		<div style="clear:both;"></div>
		<div id="contentDiv">
     	<div align="left" id="<?php echo($ID); ?>c myContent" style="display: none;">
        <strong>Upload Date</strong>: <?php echo($Date); ?><br /><br />
        <strong>Description</strong>: <?php echo($ShowNotes); ?><br /><br />
        <strong>Episode Length</strong>: <?php echo($Duration); ?><br /><br />
        <div align="center"><?php echo("<div class='Tags'>'".$Tags."'</div>"); ?></div>
		</div>
		</div>
		<div class="clear"></div>
        
<?php }	echo "<br>";
		echo "<div id='PaginationWrap'>";
		PaginationEnd("archives","10",false,$ShowID,"ShowID",$ShowID);
		echo "</div>";
}
?>

<script language="javascript"> 
function toggle2(showHideDiv, switchTextDiv) {
	var ele = document.getElementById(showHideDiv);
	var text = document.getElementById(switchTextDiv);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "<img alt='Toggle Archive View' border='none' src='../images/newsedit.png'>";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "<img alt='Toggle Archive View' border='none' src='../images/newsedit2.png'>";
	}
}
</script>