<?php
	
	function GetShows($selected=NULL) {
		
		
		$sql = mysql_query("SELECT * FROM shows WHERE Active >= 1");
			
		
		echo "<select name='Show'>";
		
		echo ("<option>Front Page</option>");
		while($row = mysql_fetch_array($sql)) {

			$Name =  $row["Name"];
			$NewsImage =  $row["NewsImage"];
			
			if (isset($selected)) { if ($selected == $Name) { echo "<option selected='true'>$Name</option>"; } else { echo "<option>$Name</option>"; } } else { echo "<option>$Name</option>"; }
			
		}
		
		echo "</select>";		
		
	}
	
	
	    function AddNewsPost($user,$show,$title,$tags,$content) {
		
			$sql2 = mysql_query("SELECT * FROM shows WHERE Name = '".$show."'");

			while($row = mysql_fetch_array($sql2)) {

				$showimage =  $row["NewsImage"];
			}
		
			$date = date('M d, Y h:i A');
			$source = "INSERT INTO omfgnews (NewsTitle, NewsAuthor, NewsDate, NewsShowImage, NewsText, Tags, ShowName) VALUES ('$title', '$user', '$date', '$showimage', '$content', '$tags', '$show')";
			$sql = mysql_query($source) or die(mysql_error());
			$show = str_replace("&", "&amp;", "$show");
			tweet("OMFGFM","0emeffgee","A $show omfgnews post has been added @ http://omfg.fm");
		
		}
	
	
		 function EditNewsPost($id,$title,$tags,$content,$show) {
			 
			 $sql3 = mysql_query("SELECT * FROM shows WHERE Name = '".$show."'");

			while($row = mysql_fetch_array($sql3)) {

				$showimage =  $row["NewsImage"];
			}
			
			$sql = "UPDATE omfgnews SET NewsTitle = '$title', NewsText = '$content', Tags = '$tags', ShowName = '$show', NewsShowImage = '$showimage' WHERE ID = '$id'";
			
			$sql2 = mysql_query($sql) or die(mysql_error());
		
		}
		
		function DeleteNewsPost($id) {
			
			$sql = "DELETE FROM omfgnews WHERE ID = '$id'";

			$sql2 = mysql_query($sql);
		
		}
?>