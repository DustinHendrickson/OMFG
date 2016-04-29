<?php
if (CheckPagePermissions("mod") == true) {
?>
<script language="javascript"> 
function toggle2(showHideDiv, switchTextDiv) {
	var ele = document.getElementById(showHideDiv);
	var text = document.getElementById(switchTextDiv);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "<img alt='Edit News Item' border='none' src='../images/newsedit.png'>";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "<img alt='Toggle Edit View' border='none' src='../images/newsedit2.png'>";
	}
}
</script>
<?php
	if ($_GET["action"] == "add") {
		$Title = $_POST['Title'];
		$Duration = $_POST['Duration'];
		$Show = $_POST['Show'];
		$Tags = $_POST['Tags'];
		$Content = $_POST['Content'];
		$Link = $_POST['Link'];
		
		$ContentStr = str_replace("\'","\'",$Content);
		$ContentStr2 = str_replace('\"','\"',$ContentStr);
	
		AddArchive($Link,$Show,$Title,$Tags,$ContentStr2,$Duration);
		
	}
	
	if ($_GET["action"] == "edit") {
		$Title = $_POST['Title'];
		$Duration = $_POST['Duration'];
		$Show = $_POST['Show'];
		$Tags = $_POST['Tags'];
		$Content = $_POST['Content'];
		$Link = $_POST['Link'];
		$ID = $_GET['id'];
		
		$ContentStr = str_replace("\'","\'",$Content);
		$ContentStr2 = str_replace('\"','\"',$ContentStr);
	
		EditArchive($ID,$Link,$Show,$Title,$Tags,$ContentStr2,$Duration);
		
	}
	
	if ($_GET["action"] == "delete") {
		$ID = $_GET['id'];
		$ShowID = $_GET['showid'];
	
		DeleteArchive($ID,$ShowID);
		
	}
?>

	<form name="AddArchive" method="post" action="?p=ArchiveAdmin&secure=true&action=add">
            Download Link:<br><input name="Link" type="text" value=""><br>
            Archive Name:<br><input name="Title" type="text" value=""><br>
            Archive Duration (Format HH:MM:SS):<br><input name="Duration" type="text" value=""><br>
            Show:<br><?php GetShows(); ?><br>
            Archive Description:<br><textarea name="Content" width="100%" cols="50" rows="15"></textarea><br>
            Tags:<br><input name="Tags" type="text" value=""><br><br>
			<input type="submit" value="Add Archive" />
	</form>
    <br>
    
<?php

	$sql = PaginationStart("*","archives","ID","DESC","20");

		while($row = mysqli_fetch_array($sql)) {

			$ID= $row["ID"];
			$Name=  $row["Name"];
			$Date=  $row["Date"];
			$Link=  $row["Link"];
			$ShowID=  $row["ShowID"];
			$Tags=  $row["Tags"];
			$ShowNotes = $row["ShowNotes"];
			$Duration =$row["Duration"];
			
			$showsql = mysqli_query($GLOBALS['con'], "SELECT * FROM shows WHERE ID = '".$ShowID."'");

			while($row = mysqli_fetch_array($showsql)) {

				$ShowName =  $row["Name"];
			}

?>
<?php echo("<div align='left'><strong>$ShowName</strong> - $Date</div>"); ?>
<div id="headerDiv">
     <div id="titleText"><?php echo("[<font color='#c66504'> $Name </font>]");?></div>
     
     <a class="floatr" href="javascript:var answer = confirm('You sure you want to Delete this?'); if(answer){window.location ='?p=ArchiveAdmin&secure=true&action=delete&id=<?php echo($ID) ?>&showid=<?php echo($ShowID) ?>';}"> <img border='none' alt='Delete Item' src='../images/newsdelete.png'></a>
     
     <a id="<?php echo($ID) ?>h myHeader" href="javascript:toggle2('<?php echo($ID) ?>c myContent','<?php echo($ID) ?>h myHeader');" ><img alt='Edit Item' border='none' src='../images/newsedit.png'></a>
</div>
<div style="clear:both;"></div>
<div id="contentDiv">
     <div id="<?php echo($ID) ?>c myContent" style="display: none;">

	<form name="EditArchive" method="post" action="?p=ArchiveAdmin&secure=true&action=edit&id=<?php echo($ID); ?>">
            Download Link:<br><input name="Link" type="text" value="<?php echo($Link); ?>"><br>
            Archive Name:<br><input name="Title" type="text" value="<?php echo($Name); ?>"><br>
            Archive Duration (Format HH:MM:SS):<br><input name="Duration" type="text" value="<?php echo($Duration); ?>"><br>
            Show:<br><?php GetShows($ShowName); ?><br>
            Archive Description:<br><textarea name="Content" width="100%" cols="50" rows="15"><?php echo($ShowNotes); ?></textarea><br>
            Tags:<br><input name="Tags" type="text" value="<?php echo($Tags); ?>"><br><br>
			<input type="submit" value="Edit Archive" />
	</form>
     
     </div>
</div>
<br />
<div class="clear"></div>
<?php }	echo "<br>";
		echo "<div id='PaginationWrap'>";
		PaginationEnd("archives","20",true);
		echo "</div>";
}
?>
    