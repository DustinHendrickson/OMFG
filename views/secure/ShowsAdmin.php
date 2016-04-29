<?php
if (CheckPagePermissions("mod") == true) {
?>

<script language="javascript"> 
function toggle2(showHideDiv, switchTextDiv) {
	var ele = document.getElementById(showHideDiv);
	var text = document.getElementById(switchTextDiv);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "<img alt='' border='none' src='../images/newsedit.png'>";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "<img alt='' border='none' src='../images/newsedit2.png'>";
	}
}
</script>

<?php
	//Run Add Function
	if ($_GET["action"] == "add") {
		$ShowName = $_POST['ShowName'];
		$Host1 = $_POST['Host1'];
		$Host2 = $_POST['Host2'];
		$Host3 = $_POST['Host3'];
		$Host4 = $_POST['Host4'];
		$Host5 = $_POST['Host5'];
		$Host6 = $_POST['Host6'];
		$AlternateHostDisplayCB = $_POST['AlternateHostDisplayCB'];
		$AlternateHostDisplayTF = $_POST['AlternateHostDisplayTF'];
		$AirTimeDay = $_POST['AirTimeDay'];
		$AirTimeHour = $_POST['AirTimeHour'];
		$AirTimeHour2 = $_POST['AirTimeHour2'];
		$AirTimeHour3 = $_POST['AirTimeHour3'];
		$EndTimeDay = $_POST['EndAirTimeDay'];
		$EndTimeHour = $_POST['EndAirTimeHour'];
		$EndTimeHour2 = $_POST['EndAirTimeHour2'];
		$EndTimeHour3 = $_POST['EndAirTimeHour3'];
		$Description = $_POST['Description'];
		$RSSFeed = $_POST['RSSFeed'];
		$Active = $_POST['Active'];
		$ShowEmail = $_POST['ShowEmail'];
		$HideOnAir = $_POST['HideOnAir'];
		$Explicit = $_POST['Explicit'];
		
		
		$Hosts = $Host1;
		if ($Host2 != "None") {$Hosts = $Hosts . "," . $Host2; }
		if ($Host3 != "None") {$Hosts = $Hosts . "," . $Host3; }
		if ($Host4 != "None") {$Hosts = $Hosts . "," . $Host4; }
		if ($Host5 != "None") {$Hosts = $Hosts . "," . $Host5; }
		if ($Host6 != "None") {$Hosts = $Hosts . "," . $Host6; }
		
		if (!isset($AirTimeHour2)) { $AirTimeHour2 == "00"; }
		
		$AirTime = $AirTimeDay . " " . $AirTimeHour . " " . $AirTimeHour2 . " " . $AirTimeHour3;
		$EndTime = $EndTimeDay . " " . $EndTimeHour . " " . $EndTimeHour2 . " " . $EndTimeHour3;
		
		$DescriptionStr = str_replace("\'","\'",$Description);
		$DescriptionStr2 = str_replace('\"','\"',$DescriptionStr);
	
		AddShow($ShowName, $ShowEmail, $Hosts, $AlternateHostDisplayCB, $AlternateHostDisplayTF, $AirTime, $EndTime, $Description, $RSSFeed, $Active, $HideOnAir, $Explicit);
		
	}
	
	//Run Edit Function
	if ($_GET["action"] == "edit") {
		$ID = $_GET["id"];
		$ShowName = $_POST['ShowName'];
		$Host1 = $_POST['Host1'];
		$Host2 = $_POST['Host2'];
		$Host3 = $_POST['Host3'];
		$Host4 = $_POST['Host4'];
		$Host5 = $_POST['Host5'];
		$Host6 = $_POST['Host6'];
		$AlternateHostDisplayCB = $_POST['AlternateHostDisplayCB'];
		$AlternateHostDisplayTF = $_POST['AlternateHostDisplayTF'];
		$AirTimeDay = $_POST['AirTimeDay'];
		$AirTimeHour = $_POST['AirTimeHour'];
		$AirTimeHour2 = $_POST['AirTimeHour2'];
		$AirTimeHour3 = $_POST['AirTimeHour3'];
		$EndTimeDay = $_POST['EndAirTimeDay'];
		$EndTimeHour = $_POST['EndAirTimeHour'];
		$EndTimeHour2 = $_POST['EndAirTimeHour2'];
		$EndTimeHour3 = $_POST['EndAirTimeHour3'];
		$Description = $_POST['Description'];
		$RSSFeed = $_POST['RSSFeed'];
		$Active = $_POST['Active'];
		$ShowEmail = $_POST['ShowEmail'];
		$HideOnAir = $_POST['HideOnAir'];
		$Explicit = $_POST['Explicit'];
		
		$Hosts = $Host1;
		if ($Host2 != "None") {$Hosts = $Hosts . "," . $Host2; }
		if ($Host3 != "None") {$Hosts = $Hosts . "," . $Host3; }
		if ($Host4 != "None") {$Hosts = $Hosts . "," . $Host4; }
		if ($Host5 != "None") {$Hosts = $Hosts . "," . $Host5; }
		if ($Host6 != "None") {$Hosts = $Hosts . "," . $Host6; }
		
		if (!isset($AirTimeHour2)) { $AirTimeHour2 == "00"; }
		
		$AirTime = $AirTimeDay . " " . $AirTimeHour . " " . $AirTimeHour2 . " " . $AirTimeHour3;
		$EndTime = $EndTimeDay . " " . $EndTimeHour . " " . $EndTimeHour2 . " " . $EndTimeHour3;
		
		$DescriptionStr = str_replace("\'","\'",$Description);
		$DescriptionStr2 = str_replace('\"','\"',$DescriptionStr);
		
		EditShow($ID, $ShowName, $ShowEmail, $Hosts, $AlternateHostDisplayCB, $AlternateHostDisplayTF, $AirTime, $EndTime, $Description, $RSSFeed, $Active, $HideOnAir, $Explicit);
		
	}
	
	//Run Delere Function
	if ($_GET["action"] == "delete") {
		$ID = $_GET["id"];
	
		DeleteShow($ID);
	}
?>

	<form name="AddShow" method="post" action="?p=ShowsAdmin&secure=true&action=add">
            Show Name:<br><input name="ShowName" type="text" value=""><br>
            <br />
            Host Selector:<br>
            #1 <select name="Host1"><?php GetShowHosts(); ?></select>
            #2 <select name="Host2"><option selected="true">None</option><?php GetShowHosts(); ?></select>
            #3 <select name="Host3"><option selected="true">None</option><?php GetShowHosts(); ?></select>
            <br />
            #4 <select name="Host4"><option selected="true">None</option><?php GetShowHosts(); ?></select>
            #5 <select name="Host5"><option selected="true">None</option><?php GetShowHosts(); ?></select>
            #6 <select name="Host6"><option selected="true">None</option><?php GetShowHosts(); ?></select>
            <br />
            <br />
            Use alternative display for Hosts?<br /><input type="hidden" name="AlternateHostDisplayCB" value="0" /><input name="AlternateHostDisplayCB" value="1" type="checkbox" /><input name="AlternateHostDisplayTF" type="text" value="">
            <br />
            <br />
            Air Date [ EST ]:<br>
            <select name="AirTimeDay">
            	<option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
            </select>
            <select name="AirTimeHour">
            	<option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
            	<option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
            <input size='3' maxlength="2" name="AirTimeHour2" type="text" value="00">
            <select name="AirTimeHour3">
            	<option>AM</option>
                <option>PM</option>
            </select>
            <br />
            <br>
            Show Length:<br>
                <select name="EndAirTimeDay">
            	<option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
            </select>
            <select name="EndAirTimeHour">
            	<option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
            	<option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
            <input size='3' maxlength="2" name="EndAirTimeHour2" type="text" value="00">
            <select name="EndAirTimeHour3">
            	<option>AM</option>
                <option>PM</option>
            </select><br><br />
            Show Email:<br><input name="ShowEmail" type="text" value=""><br><br />
            Description:<br><textarea maxlength="295" name="Description" width="100%" cols="50" rows="15"></textarea><br><br>
            RSS Feed Name (example: thedonutshop):<br><input name="RSSFeed" type="text" value=""><br><br>
            Active:<br><input type="hidden" name="Active" value="0" /><input name="Active" type="checkbox" value="1" checked="yes"><br><br>
            Hide From Live Showing (Canceled for the week):<br><input type="hidden" name="HideOnAir" value="0" /><input name="HideOnAir" type="checkbox" value="1"><br><br>
            Explicit Content?<br><input type="hidden" name="Explicit" value="0" /><input name="Explicit" type="checkbox" value="1"><br><br>
			<input type="submit" value="Create Show" />

	</form>
    
    <br>
    <hr>
    <br>

<?php

	$sql = PaginationStart("*","shows","ID","DESC","20");
	//$sql = mysqli_query($GLOBALS['con'], "SELECT * FROM News ORDER BY NewsDate DESC");
		$Days = array(0 => "Monday", 1 => "Tuesday", 2 => "Wednesday", 3 => "Thursday", 4 => "Friday", 5 => "Saturday", 6 => "Sunday" );
		$Hours = array(0 => "AM", 1 => "PM");

		while($row = mysqli_fetch_array($sql)) {

			$ID= $row["ID"];
			$Name=  $row["Name"];
			$Hosts=  $row["Hosts"];
			$Description=  $row["Description"];
			$AirTime=  $row["AirTime"];
			$EndTime = $row["EndAirTime"];
			$RSS = $row["RSS"];
			$Active =$row["Active"];
			$AltHostDisplay =$row["AltHostDisplay"];
			$UseAltHostDisplay =$row["UseAltHostDisplay"];
			$NewsImage = $row["NewsImage"];
			$ShowEmail = $row["ShowEmail"];
			$ShowLength = $row["ShowLength"];
			$HideOnAir = $row["HideOnAir"];
			
			$EndAirTimeArray = explode(" ", $EndTime);
			$HostsArray = explode(",", $Hosts);
			$AirTimeArray =  explode(" ", $AirTime);
			
			if ($UseAltHostDisplay == 1) { $Hosts = $AltHostDisplay; }
?>
<div id="headerDiv">
     <div id="titleText"><?php echo("[<font color='#c66504'> $Name </font>] With $Hosts");?></div>
     
     <a class="floatr" href="javascript:var answer = confirm('You sure you want to Delete this?'); if(answer){window.location ='?p=ShowsAdmin&secure=true&action=delete&id=<?php echo($ID) ?>';}"> <img border='none' alt='Delete Item' src='../images/newsdelete.png'></a>
     
     <a id="<?php echo($ID) ?>h myHeader" href="javascript:toggle2('<?php echo($ID) ?>c myContent','<?php echo($ID) ?>h myHeader');" ><img alt='Edit Item' border='none' src='../images/newsedit.png'></a>
</div>
<div style="clear:both;"></div>
<div id="contentDiv">
     <div id="<?php echo($ID) ?>c myContent" style="display: none;">


     
	<form name="EditShow<?php echo($ID) ?>" method="post" action="?p=ShowsAdmin&secure=true&action=edit&id=<?php echo($ID) ?>">
            Show Name:<br><input name="ShowName" type="text" value="<?php echo($Name) ?>"><br>
            <br />
            Host Selector:<br>
            #1 <select name="Host1"><?php GetShowHosts($HostsArray['0']); ?></select>
            #2 <select name="Host2"><option>None</option><?php GetShowHosts($HostsArray['1']); ?></select>
            #3 <select name="Host3"><option>None</option><?php GetShowHosts($HostsArray['2']); ?></select>
            <br />
            #4 <select name="Host4"><option>None</option><?php GetShowHosts($HostsArray['3']); ?></select>
            #5 <select name="Host5"><option>None</option><?php GetShowHosts($HostsArray['4']); ?></select>
            #6 <select name="Host6"><option>None</option><?php GetShowHosts($HostsArray['5']); ?></select>
            <br />
            <br />
            Use alternative display for Hosts?<br /><input type="hidden" name="AlternateHostDisplayCB" value="0" /><input name="AlternateHostDisplayCB" value="1" type="checkbox" <?php if($UseAltHostDisplay == 1) { echo"checked='yes'"; } ?> /><input name="AlternateHostDisplayTF" type="text" value="<?php echo($AltHostDisplay); ?>">
            <br />
            <br />
            Air Date [ EST ]:<br>
            <select name="AirTimeDay" title="<?php echo($AirTimeArray[0]); ?>">
            	<?php foreach ($Days as &$day) { if ($AirTimeArray['0'] == $day) { echo "<option selected='true'>$day</option>"; } else { echo"<option>$day</option>"; }}?>
            </select>
            <select name="AirTimeHour" value="">
				<?php $i=1; while ($i <= 12) { if ($AirTimeArray['1'] == $i) { echo "<option selected='true'>$i</option>"; } else { echo"<option>$i</option>"; } $i=$i+1;}?>
            </select>
			<input size='3' name="AirTimeHour2" maxlength="2" type="text" value="<?php echo($AirTimeArray[2]); ?>">
            <select name="AirTimeHour3" value="<?php echo($AirTimeArray[3]); ?>">
				<?php foreach ($Hours as &$hour) { if ($AirTimeArray['3'] == $hour) { echo "<option selected='true'>$hour</option>"; } else { echo"<option>$hour</option>"; }}?>
            </select>
            <br />
            <br>
            Show Length:<br>
            <select name="EndAirTimeDay" title="<?php echo($EndAirTimeArray[0]); ?>">
            	<?php foreach ($Days as &$day) { if ($EndAirTimeArray['0'] == $day) { echo "<option selected='true'>$day</option>"; } else { echo"<option>$day</option>"; }}?>
            </select>
            <select name="EndAirTimeHour" value="">
				<?php $i=1; while ($i <= 12) { if ($EndAirTimeArray['1'] == $i) { echo "<option selected='true'>$i</option>"; } else { echo"<option>$i</option>"; } $i=$i+1;}?>
            </select>
			<input size='3' name="EndAirTimeHour2" maxlength="2" type="text" value="<?php echo($EndAirTimeArray[2]); ?>">
            <select name="EndAirTimeHour3" value="<?php echo($EndAirTimeArray[3]); ?>">
				<?php foreach ($Hours as &$hour) { if ($EndAirTimeArray['3'] == $hour) { echo "<option selected='true'>$hour</option>"; } else { echo"<option>$hour</option>"; }}?>
            </select><br><br />
            Show Email:<br><input name="ShowEmail" type="text" value="<?php echo($ShowEmail); ?>"><br><br>
            Description:<br><textarea maxlength="295" name="Description" width="100%" cols="50" rows="15"><?php echo($Description); ?></textarea><br><br>
            RSS Feed:<br><input readonly="true" name="RSSFeed" type="text" value="<?php echo($RSS); ?>"><br><br>
            Active:<br><input type="hidden" name="Active" value="0" /><input name="Active" type="checkbox" <?php if($Active == 1) { echo"checked='yes'"; } ?> value="1"><br><br>
            Hide From Live Showing (Canceled for the week):<br><input type="hidden" name="HideOnAir" value="0" /><input name="HideOnAir" type="checkbox" <?php if($HideOnAir == 1) { echo"checked='yes'"; } ?> value="1"><br><br>
            Explicit Content?<br><input type="hidden" name="Explicit" value="0" /><input name="Explicit" type="checkbox" <?php if($Explicit == 1) { echo"checked='yes'"; } ?> value="1"><br><br>
			<input type="submit" value="Edit Show" />

	</form>
    
     
     </div>
</div>
<div class="clear"></div>
<?php }	echo "<br>";
		echo "<div id='PaginationWrap'>";
		PaginationEnd("shows","20",true);
		echo "</div>";
}
?>