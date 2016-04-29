<?php
include("../connection/settings.php");
// next, query for a list of titles, files and links.
$query = "SELECT * FROM showbanners";
$result = mysqli_query($GLOBALS['con'], $query) or die('Error: '.mysqli_error());

// third, build the playlist
header("content-type:text/xml;charset=utf-8");
echo "<playlist version='1' xmlns='http://xspf.org/ns/0/'>\n";
echo "<trackList>\n";
while($row = @mysqli_fetch_array($result)) {
  echo "\t<track>\n";
  echo "\t\t<title>".$row['Name']."</title>\n";
  echo "\t\t<location>../images/shows/".$row['Image']."</location>\n";
  echo "\t\t<info>".$row['Link']."</info>\n";
  echo "\t</track>\n";
}
echo "</trackList>\n";
echo "</playlist>\n";
?>