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
		require_once("forums/SSI.php");
		global $context;
		$User = $context['user']['name'];
		$Title = $_POST['Title'];
		$Show = $_POST['Show'];
		$Tags = $_POST['Tags'];
		$Content = $_POST['Content'];
		
		$ContentStr = str_replace("\'","\'",$Content);
		$ContentStr2 = str_replace('\"','\"',$ContentStr);
	
		AddNewsPost($User,$Show,$Title,$Tags,$ContentStr2);
		
	}
	
	if ($_GET["action"] == "edit") {
		$Title = $_POST['Title'];
		$Tags = $_POST['Tags'];
		$Content = $_POST['Content'];
		$ID = $_GET["id"];
		$Show = $_POST['Show'];
		
		$ContentStr = str_replace("\'","\'",$Content);
		$ContentStr2 = str_replace('\"','\"',$ContentStr);
		
		EditNewsPost($ID,$Title,$Tags,$ContentStr2,$Show);
		
	}
	
		if ($_GET["action"] == "delete") {
			$ID = $_GET["id"];
	
		DeleteNewsPost($ID);
		
	}
?>
	<script type="text/javascript" src="../javascript/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
		theme : "advanced",
		mode : "textareas",
		height: "300",
		width : "600"

	});
	</script>

	<form name="AddNews" method="post" action="?p=NewsAdmin&secure=true&action=add">
			<?php
            require_once("forums/SSI.php");
			global $context; 
			?>
            Author:<br><input readonly="readonly" name="User" type="text" value="<?php echo($context['user']['name']); ?>"><br>
            Title:<br><input name="Title" type="text" value=""><br>
            Show:<br><?php GetShows(); ?><br>
            Content:<br><textarea name="Content" width="100%" cols="50" rows="15"></textarea><br>
            Tags:<br><input name="Tags" type="text" value=""><br><br>
			<input type="submit" value="Add News" />

	</form>
    
    <br>
    <hr>
    <br>
    <script type="text/javascript" src="../javascript/tiny_mce/tiny_mce.js"></script>
<?php

	$sql = PaginationStart("*","omfgnews","ID","DESC","10");
	//$sql = mysql_query("SELECT * FROM News ORDER BY NewsDate DESC");

		while($row = mysql_fetch_array($sql)) {

			$ID= $row["ID"];
			$Title=  $row["NewsTitle"];
			$User=  $row["NewsAuthor"];
			$Date=  $row["NewsDate"];
			$Content=  $row["NewsText"];
			$Tags = $row["Tags"];
			$ShowName = $row["ShowName"];
?>
<div id="headerDiv">
     <div id="titleText"><?php echo($Title)?> - <?php echo($User)?></div>
     
     <a class="floatr" href="javascript:var answer = confirm('You sure you want to Delete this?'); if(answer){window.location ='?p=NewsAdmin&secure=true&action=delete&id=<?php echo($ID) ?>';}" > <img border='none' alt='Delete Item' src='../images/newsdelete.png'></a>
     
     <a id="<?php echo($ID) ?>h myHeader" href="javascript:toggle2('<?php echo($ID) ?>c myContent','<?php echo($ID) ?>h myHeader');" ><img alt='Edit News Item' border='none' src='../images/newsedit.png'></a>
</div>
<div style="clear:both;"></div>
<div id="contentDiv">
     <div id="<?php echo($ID) ?>c myContent" style="display: none;">
     
     


	<form method="post" action="?p=NewsAdmin&secure=true&action=edit&id=<?php echo($ID) ?>">
			
            Author:<br><input readonly="readonly" name="User" type="text" value="<?php echo($User) ?>"><br>
            Title:<br><input name="Title" type="text" value="<?php echo($Title) ?>"><br>
            Show:<br><?php GetShows($ShowName); ?><br>
            Content:<br><div id="EdContent<?php echo($ID) ?>"><textarea name="Content" width="100%" cols="50" rows="15"><?php echo($Content) ?></textarea></div><br>
            Tags:<br><input name="Tags" type="text" value="<?php echo($Tags) ?>"><br><br>
			<input type="submit" value="Save" />

	</form>
    
    <script type="text/javascript">
	tinyMCE.init({
		theme : "advanced",
		mode : "textareas",
		height: "300",
		width : "490"
	textarea = getElementById('EdContent<?php echo($ID) ?>');
	textarea.value = <?php echo($Content); ?>;
	});

	</script>
     
     </div>
</div>
<div class="clear"></div>
<?php }	echo "<br>";
		echo "<div id='PaginationWrap'>";
		PaginationEnd("omfgnews","10",true);
		echo "</div>";
}
?>