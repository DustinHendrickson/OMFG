<?php	
	//Updates the RSS Feed
	function UpdateRSS($showid) {
		
		$sql = mysql_query("SELECT * FROM shows WHERE ID = $showid ORDER BY ID DESC");

		while($row = mysql_fetch_array($sql)) {
			
			$ID= $row["ID"];
			$Name= $row["Name"];
			$Hosts= $row["Hosts"];
			$ShowEmail= $row["ShowEmail"];
			$Description= $row["Description"];
			$OnAirBanner= $row["OnAirBanner"];
			$AirTime= $row["AirTime"];
			$RSS= $row["RSS"];
			$RSSFileName= $row['RSSFileName'];
			$Active= $row["Active"];
			$AltHostDisplay= $row["AltHostDisplay"];
			$UseAltHostDisplay= $row["UseAltHostDisplay"];
			$Explicit = $row['Explicit'];
			
			
			
			if ($Explicit == 1) {$IsExplicit = "Yes"; } else {$IsExplicit = "No";}
			if ($ID == 13) { $WebsiteLink="http://www.tentonhammer.com/podcasts/live"; } else { $WebsiteLink="http://www.omfg.fm"; }
			
			$Description = htmlspecialchars($Description);
			$Name = htmlspecialchars($Name);
			$Hosts = htmlspecialchars($Hosts);
			
			
			if ($UseAltHostDisplay == 1) { $Hosts = $AltHostDisplay; }
		
	//Write our RSS Feed generation
	$output .= "<?xml version='1.0' encoding='UTF-8'?>"."\n";
	$output .= "<rss version='2.0' xmlns:itunes='http://www.itunes.com/dtds/podcast-1.0.dtd'>"."\n";
	$output .= "<channel>"."\n";
 
    $output .= "<title>$Name</title>\n";
    $output .= "<link>$WebsiteLink</link>\n";
    $output .= "<language>en-us</language>\n";
    $output .= "<copyright>2011 Original Media for Gamers</copyright>\n";
    $output .= "<itunes:subtitle>OMFG - Original Media for Gamers</itunes:subtitle>\n";
    $output .= "<itunes:author>$Hosts</itunes:author>\n";
    $output .= "<itunes:summary>$Name</itunes:summary>\n";
    $output .= "<description>$Description</description>\n";
    $output .= "<itunes:owner>\n";
      $output .= "<itunes:name>$Hosts</itunes:name>\n";
      $output .= "<itunes:email>$ShowEmail</itunes:email>\n";
    $output .= "</itunes:owner>\n";
    $output .= "<itunes:image href='http://www.omfg.fm/images/shows/$OnAirBanner'/>\n";
    $output .= "<image>\n";
      $output .= "<link>$WebsiteLink</link>\n";
      $output .= "<url>http://www.omfg.fm/images/shows/$OnAirBanner</url>\n";
      $output .= "<title>$Name</title>\n";
      $output .= "<width>144</width>\n";
      $output .= "<height>150</height>\n";
    $output .= "</image>\n";
    $output .= "<itunes:category text='Games &amp; Hobbies'>\n";
      $output .= "<itunes:category text='Video Games'/>\n";
    $output .= "</itunes:category>\n";
    $output .= "<itunes:category text='Technology'>\n";
      $output .= "<itunes:category text='Podcasting'/>\n";
    $output .= "</itunes:category>\n";
    $output .= "<itunes:explicit>".$IsExplicit."</itunes:explicit>\n";
    
		}
		
		$sql2 = mysql_query("SELECT * FROM archives WHERE ShowID = $showid ORDER BY ID DESC");
		
		if (mysql_num_rows($sql2) > 0) {
			
		while($row = mysql_fetch_array($sql2)) {

			$EpisodeName= $row["Name"];
			$Link= $row["Link"];
			$ShowNotes= $row["ShowNotes"];
			$Tags= $row["Tags"];
			$Date= $row["Date"];
			$Duration= $row["Duration"];
			
			$TS = strtotime("$Date");
			$Date = date("D, d M Y H:i:s O", $TS);
		    $EpisodeName = htmlspecialchars($EpisodeName);
			$ShowNotes = htmlspecialchars($ShowNotes);
			$Tags = htmlspecialchars($Tags);
			$Link = htmlspecialchars($Link);
    
    $output .= "<item>\n";
      $output .= "<title>$Name - $EpisodeName</title>\n";
      $output .= "<itunes:subtitle></itunes:subtitle>\n";
      $output .= "<itunes:summary>$EpisodeName</itunes:summary>\n";
      $output .= "<description>$ShowNotes</description>\n";
      $output .= "<itunes:duration>$Duration</itunes:duration>\n";
      $output .= "<itunes:keywords>$Tags</itunes:keywords>\n";
      $output .= "<itunes:explicit>".$IsExplicit."</itunes:explicit>\n";
      $output .= "<pubDate>$Date</pubDate>\n";
      $output .= "<enclosure type='audio/mpeg' url='$Link' length='1'/>\n";
      $output .= "<link>$Link</link>\n";
      $output .= "<guid>$Link</guid>\n";
    $output .= "</item>\n";
}}

$output .= "</channel>\n";
$output .= "</rss>\n";


$myFile = "rss/".$RSSFileName.".rss";
$fh = fopen($myFile, 'w') or die("can't open file");

fwrite($fh, $output);
fclose($fh);

	
}



//Updates the RSS Feed
	function UpdateShowsRSS() {
		
		
	//Write our RSS Feed generation
	$output .= "<?xml version='1.0' encoding='UTF-8'?>"."\n";
	$output .= "<rss version='2.0' xmlns:itunes='http://www.itunes.com/dtds/podcast-1.0.dtd'>"."\n";
	$output .= "<channel>"."\n";
 
    $output .= "<title>Original Media For Gamers Network</title>\n";
    $output .= "<link>http://www.omfg.fm</link>\n";
    $output .= "<language>en-us</language>\n";
    $output .= "<copyright>2011 Original Media for Gamers</copyright>\n";
    $output .= "<itunes:subtitle>Original Media For Gamers Network</itunes:subtitle>\n";
    $output .= "<itunes:author>OMFG.fm Hosts</itunes:author>\n";
    $output .= "<itunes:summary>Description</itunes:summary>\n";
    $output .= "<description>Description</description>\n";
    $output .= "<itunes:owner>\n";
      $output .= "<itunes:name>OMFG.fm Hosts</itunes:name>\n";
      $output .= "<itunes:email>omfg@omfg.fm</itunes:email>\n";
    $output .= "</itunes:owner>\n";
    $output .= "<itunes:image href='http://www.omfg.fm/images/logo.png'/>\n";
    $output .= "<image>\n";
      $output .= "<link>http://www.omfg.fm</link>\n";
      $output .= "<url>http://www.omfg.fm/images/logo.png</url>\n";
      $output .= "<title>Original Media For Gamers Network</title>\n";
      $output .= "<width>144</width>\n";
      $output .= "<height>150</height>\n";
    $output .= "</image>\n";
    $output .= "<itunes:category text='Games &amp; Hobbies'>\n";
      $output .= "<itunes:category text='Video Games'/>\n";
    $output .= "</itunes:category>\n";
    $output .= "<itunes:category text='Technology'>\n";
      $output .= "<itunes:category text='Podcasting'/>\n";
    $output .= "</itunes:category>\n";
    $output .= "<itunes:explicit>Yes</itunes:explicit>\n";
    
		
		$sql2 = mysql_query("SELECT * FROM archives ORDER BY ID DESC LIMIT 0, 100");
		
		if (mysql_num_rows($sql2) > 0) {
			
		while($row = mysql_fetch_array($sql2)) {
			
		$sql3 = mysql_query("SELECT * FROM shows WHERE ID = ".$row['ShowID']);			
		while($row2 = mysql_fetch_array($sql3)) { $Name = $row2['Name']; }
			
			$EpisodeName= $row["Name"];
			$Link= $row["Link"];
			$ShowNotes= $row["ShowNotes"];
			$Tags= $row["Tags"];
			$Date= $row["Date"];
			$Duration= $row["Duration"];
			
			$TS = strtotime("$Date");
			$Date = date("D, d M Y H:i:s O", $TS);
			$EpisodeName = htmlspecialchars($EpisodeName);
			$ShowNotes = htmlspecialchars($ShowNotes);
			$Tags = htmlspecialchars($Tags);
    
    $output .= "<item>\n";
      $output .= "<title>$Name - $EpisodeName</title>\n";
      $output .= "<itunes:subtitle></itunes:subtitle>\n";
      $output .= "<itunes:summary>$ShowNotes</itunes:summary>\n";
      $output .= "<description>$ShowNotes</description>\n";
      $output .= "<itunes:duration>$Duration</itunes:duration>\n";
      $output .= "<itunes:keywords>$Tags</itunes:keywords>\n";
      $output .= "<itunes:explicit>No</itunes:explicit>\n";
      $output .= "<pubDate>$Date</pubDate>\n";
      $output .= "<enclosure type='audio/mpeg' url='$Link' length='1'/>\n";
      $output .= "<link>$Link</link>\n";
      $output .= "<guid>$Link</guid>\n";
    $output .= "</item>\n";
}}

$output .= "</channel>\n";
$output .= "</rss>\n";


$myFile = "rss/shows.rss";
$fh = fopen($myFile, 'w') or die("can't open file");

fwrite($fh, $output);
fclose($fh);

	
}


	function AddArchive($Link,$Show,$Title,$Tags,$Content,$Duration) {
		
			$sql = mysql_query("SELECT * FROM shows WHERE Name = '".$Show."'");

			while($row = mysql_fetch_array($sql)) {
				$ShowID =  $row["ID"];
				$RSSFileName = $row['RSSFileName'];
			}
		
			$Date = date('M d, Y h:i A');
			$source = "INSERT INTO archives (Link, Name, ShowID, Tags, ShowNotes, Date, Duration) VALUES ('$Link', '$Title', '$ShowID', '$Tags', '$Content', '$Date', '$Duration')";
			$sql = mysql_query($source) or die(mysql_error());
			if ($RSSFileName != "none") {
				UpdateRSS($ShowID);
				UpdateShowsRSS();
			}
			tweet("OMFGFM","0emeffgee","$Show uploaded an archive @ http://omfg.fm ");
		
		}
		
	function EditArchive($ID,$Link,$Show,$Title,$Tags,$Content,$Duration) {
		
			$sql = mysql_query("SELECT * FROM shows WHERE Name = '".$Show."' LIMIT 0, 100");

			while($row = mysql_fetch_array($sql)) {
				$ShowID =  $row["ID"];
				$RSSFileName = $row['RSSFileName'];
			}
		
			$source = "UPDATE archives SET Link = '$Link', Name = '$Title', ShowID = '$ShowID', Tags = '$Tags', ShowNotes = '$Content', Duration = '$Duration' WHERE ID = '$ID'";
			
			$sql2 = mysql_query($source) or die(mysql_error());
			if ($RSSFileName != "none") {
				UpdateRSS($ShowID);
				UpdateShowsRSS();
			}
		
		}
		
		function DeleteArchive($id,$showid) {
			
			$sql = "DELETE FROM archives WHERE ID = '$id'";

			$sql2 = mysql_query($sql);
			UpdateRSS($showid);
			UpdateShowsRSS();
		
		}

?>