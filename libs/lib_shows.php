<?php	//Function to populate Drop Down boxes for Host Selection
		function GetShowHosts($selected=NULL) {
			$sql = mysqli_query($GLOBALS['con'], "SELECT * FROM smf_members WHERE ID_GROUP = '1' or ID_GROUP = '6' OR ID_GROUP = '7'");

			while($row = mysqli_fetch_array($sql)) {
				$Name =  $row["memberName"];
				
				if (isset($selected)) { if ($selected == $Name) { echo "<option selected='true'>$Name</option>"; } else { echo "<option>$Name</option>"; } } else { echo "<option>$Name</option>"; }
			}
		}
	
		// Function to add a show to the DB
	    function AddShow($ShowName, $ShowEmail, $Hosts, $AlternativeHostDisplayCB, $AlternativeHostDisplayTF, $AirTime, $EndTime, $Description, $RSSFeed, $Active, $HideOnAir, $Explicit) {
				
			$source = "INSERT INTO shows (Name, ShowEmail, Hosts, UseAltHostDisplay, AltHostDisplay, AirTime, EndAirTime, Description, RSSFileName, RSS, Active, HideOnAir, Explicit) VALUES ('$ShowName', '$ShowEmail', '$Hosts', '$AlternativeHostDisplayCB', '$AlternativeHostDisplayTF', '$AirTime', '$EndTime', '$Description', '$RSSFeed', 'rss/".$RSSFeed.".rss', '$Active', '$HideOnAir', '$Explicit')";
			
			$addsql = mysqli_query($GLOBALS['con'], $source) or die(mysqli_error());
			$ID = mysql_insert_id();
			UpdateRSS($ID);
		
		}
	
	
		 function EditShow($ID, $ShowName, $ShowEmail, $Hosts, $AlternativeHostDisplayCB, $AlternativeHostDisplayTF, $AirTime, $EndTime, $Description, $RSSFeed, $Active, $HideOnAir, $Explicit) {
			
			$source = "UPDATE shows SET Name = '$ShowName', ShowEmail = '$ShowEmail', Hosts = '$Hosts', UseAltHostDisplay = '$AlternativeHostDisplayCB', AltHostDisplay = '$AlternativeHostDisplayTF', AirTime = '$AirTime', EndAirTime = '$EndTime', Description = '$Description', RSS = '$RSSFeed', Active = '$Active', HideOnAir = '$HideOnAir', Explicit = '$Explicit' WHERE ID = '$ID'";
			
			$editsql = mysqli_query($GLOBALS['con'], $source) or die(mysqli_error());
			UpdateRSS($ID);
		
		}
		
		function DeleteShow($ID) {
			
			$source = "DELETE FROM shows WHERE ID = '$ID'";

			$sql = mysqli_query($GLOBALS['con'], $source);
		
		}
?>