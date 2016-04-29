<?php

	//Information Module
	function mod_Info() {
		$title = "communityinfo.png";
		
		echo "<div class='ModuleHeader'><img src='images/headers/$title'></div>";
		echo "<div id='ModuleWrap'>";
		echo "<div style='font-size: 14px; text-align: center;'><strong>Ventrilo</strong></div>";
		echo "<strong>Server:</strong> NY2.LeetVent.com<br>";
		echo "<strong>Port:</strong> 6100<br>";
		echo "<strong>Password:</strong> omfgvent<br><hr>";
		echo "<div style='font-size: 14px; text-align: center;'><strong>IRC</strong></div>";
		echo "<strong>Server:</strong> irc.mmoirc.com<br>";
		echo "<strong>Channel:</strong> #omfg<br><hr>";
		echo"<br><a target='_blank' href='http://www.facebook.com/search/?q=omfg&init=quick#/pages/Original-Media-for-Gamers/243282538303'> <img border='0' src='images/facebook.png'></a>";
		echo "<a target='_blank' href='http://steamcommunity.com/groups/omfgnetwork'><img src='http://cdn.store.steampowered.com/public/images/col_left_logo_steam.jpg'></img></a></div>";
		echo "<div class='ModuleFooter'></div>";
		echo "<br>";
	}
	

	
	//Left Column Sponsors Module
	function mod_Sponsors() {
		$title = "sponsors.png";
		echo "<div align='center'>";
		echo "<div class='ModuleHeader'><img src='images/headers/$title'></div>";
		echo "<div id='ModuleWrap'>";
                echo "</div>";
		echo "<div class='ModuleFooter'></div>";
		echo "</div>";
		echo "<br>";
	}
	
	
	//Friends Module
	function mod_Friends() {
		$title = "Friends";
		echo "<div align='center'>";
		echo "<div class='ModuleHeader'>$title</div>";
		echo "<div id='ModuleWrap'>";
		echo "Friends go here!";
		echo "</div>";
		echo "<div class='ModuleFooter'></div>";
		echo "</div>";
		echo "<br>";
	}
	
	
	//Twitter Module
	function mod_Twitter() {
		$title = "twitter.png";
		
		echo "<div class='ModuleHeader'><img src='images/headers/$title'></div>";
		echo "<div id='ModuleWrap'>";
		savetwit("DustinTheBadass");
		getTweets("108408476", "3");
		echo "<br><a href='http://twitter.com/DustinTheBadass/'><strong>Follow me @DustinTheBadass</strong></a><br>";
		echo "</div>";
		echo "<div class='ModuleFooter'></div>";
		echo "<br>";
	}
	
	
	//On Air Module
	function mod_OnAir() {
		$title = "onair.png";
 		
		$sql = mysqli_query($GLOBALS['con'], "SELECT * FROM shows");
		
			$ActualDay = date('l');
			$ActualMinute = date('i');
			$ActualHour = date('g');
			$ActualMeridian = date('A');
			
		
			$OnAirImage = "OADefault.png";
			$OnAirShow = "Archives are playing.";
			$OnAirEmail = "Server Time: $ActualDay $ActualHour:$ActualMinute EST";

		while($row = mysqli_fetch_array($sql)) {
			
			$Name= $row["Name"];
			$ShowEmail = $row["ShowEmail"];
			$OnAirBanner= $row["OnAirBanner"];
			$AirTime= $row["AirTime"];
			$Active= $row["Active"];
			if (!isset($row["ShowLength"])) { $ShowLength = "undefine"; }
			if (isset($row["ShowLength"])) { $ShowLength= $row["ShowLength"]; }
			$HideOnAir= $row["HideOnAir"];
			$EndAirTime= $row["EndAirTime"];
			
			$ShowLengthArray = explode(" ", $ShowLength);
			$AirTimeArray =  explode(" ", $AirTime);
			$EndTimeArray = explode(" ", $EndAirTime);
			
			$Day = $AirTimeArray[0];
			$Hour = $AirTimeArray[1];
			$Minute = $AirTimeArray[2];
			$Meridian = $AirTimeArray[3];
			
			$EndDay = $EndTimeArray[0];
			$EndHour = $EndTimeArray[1];
			$EndMinute = $EndTimeArray[2];
			$EndMeridian = $EndTimeArray[3];
			
			$ActualDay = date('l');
			$ActualMinute = date('i');
			$ActualHour = date('g');
			$ActualMeridian = date('A');
						
			$ActualTime = strtotime("$ActualDay $ActualHour:$ActualMinute $ActualMeridian");
			$EndTime = strtotime("$EndDay $EndHour:$EndMinute $EndMeridian");
			$Time = strtotime("$Day $Hour:$Minute $Meridian");
			
			if ($Day != $EndDay) {
				$EndDay = strtotime ("next $EndDay $EndHour:$EndMinute $EndMeridian");	
			}
		
		if ($Active == 1 && $HideOnAir == 0) {
			if ($ActualTime >= $Time && $ActualTime <= $EndTime) {
				$OnAirImage = "$OnAirBanner";
				$OnAirShow = "$Name";
				$OnAirEmail = "$ShowEmail";
		}
		}
		
		}
		echo "<div class='OnAirHeader'><img src='/images/headers/$title'></div>";
		echo "<div id='OnAirWrap'>";
		echo "<img src='/images/shows/$OnAirImage'><br>";
		echo "<strong>$OnAirShow</strong><br>";
		echo "$OnAirEmail<br>";
		echo "<a href='http://screlay-dtc0l-3.shoutcast.com:8024/listen.pls' id='playbutton'><img alt='Listen in!' border='0' src='/images/WebPlayerButton.png'>  </a>";
		echo "<a target='_blank' href='/stream/stream.php'><img border='0'  src='/images/MediaPlayerButton.png'>  </a>";
		echo "<a target='_blank' href='?p=SC2'><img border='0'  src='/images/VideoPlayerButton.png'>  </a>";
		echo "</div>";
		echo "<div class='OnAirFooter'></div>";
	}
	
	//Recent Shows Module
	function mod_RecentShows() {
		$title = "recentarchives.png";
	
		echo "<div class='ModuleHeader'><img src='images/headers/$title'></div>";
		echo "<div id='ModuleWrap'>";
		$sql = mysqli_query($GLOBALS['con'], "SELECT * FROM archives ORDER BY ID DESC LIMIT 5");

		while($row = mysqli_fetch_array($sql)) {

			$Name= $row["Name"];
			$Link= $row["Link"];
			$Date= $row["Date"];
			$ShowID= $row["ShowID"];
			
			$sql2 = mysqli_query($GLOBALS['con'], "SELECT * FROM shows WHERE ID = $ShowID");

			while($row = mysqli_fetch_array($sql2)) { $Show = $row["Name"]; }
		
		echo "<strong><a href='?p=Shows&ID=$ShowID'>$Show</strong></a><br>";
		echo "$Name<br>";
		echo "<div class='recentdate'>$Date</div>";
		echo "<a href='$Link'>Listen</a><br>";
		echo "<hr>";
		}
		
		echo "</div>";
		echo "<div class='ModuleFooter'></div>";
		echo "<br>";
	}



	//News Module
	function mod_News() {
		$title = "home.png";
		
		
		$sql = PaginationStart("*","omfgnews","ID","DESC","4");

		while($row = mysqli_fetch_array($sql)) {

				$Title =  $row["NewsTitle"];
				$Author =  $row["NewsAuthor"];
				$Text =  $row["NewsText"];
				$Date =  $row["NewsDate"];
				$Image =  $row["NewsShowImage"];
				$Tags = $row["Tags"];
		
				echo "<div id='CenterNewsWrap'>";
				echo "<div class='CenterTitle'>$Title</div>";
				echo "<div class='CenterAuthorDate'>Posted by $Author on $Date</div>";
				echo "<div class='CenterShowImage'><img src='images/shows/$Image'></div>";
				echo "<div class='CenterBody'>$Text</div>";
				echo "<div class='Tags'>'$Tags'</div>";
				echo "</div>";
				echo "<br>";
				echo "<br>";
				
				
		}
		echo "<div id='PaginationWrap'>";
		PaginationEnd("omfgnews","4");
		echo "</div>";
		echo "<br>";
	}
        	 

?>