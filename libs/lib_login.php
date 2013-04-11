<?php
	
	//Checks for user permision based on input
	function CheckPagePermissions() {
		require_once("forums/SSI.php");
		global  $context;
		
		$source = "SELECT * FROM smf_members WHERE memberName = '" . $context['user']['name'] ."'";

		$sql = mysql_query($source);
		while($row = mysql_fetch_array($sql)) {

			$ID_GROUP= $row["ID_GROUP"];
			if ($ID_GROUP == 1 || $ID_GROUP == 6 || $ID_GROUP == 7 ) { $boolean = "true"; }
			
		}
		
		if ($boolean == "true") { return true; } else { return false; }
	}

	//Login Form Display
	function ShowLoginForm() {
		require_once("forums/SSI.php");
		global  $context;
		
		$a = explode("/", $_SERVER['REQUEST_URI']);
		$b = count($a);
		$uri = $a[$b-2];
		if ($uri == "forums") { $forumhack = "../";  } else { $forumhack = ""; }
		
		//Show links for NO USER
		if ( $context['user']['is_logged'] ) {
      		echo("Welcome [ " . $context['user']['name'] . " ]  ");
 		} else {
			echo"<a href='http://omfg.fm/forums/?action=login'> Login</a> || <a href='http://omfg.fm/forums/?action=register'> Register";
 		}
		
		//Show links for Staff
		if ( CheckPagePermissions() == true  ) {
			echo(" [ <a href='".$forumhack."?p=NewsAdmin&secure=true'>News Admin</a> ]  ");
			echo(" [ <a href='".$forumhack."?p=ShowsAdmin&secure=true'>Shows Admin</a> ]  ");
			echo(" [ <a href='".$forumhack."?p=ArchiveAdmin&secure=true'>Upload Archive</a> ]  ");
			echo(" [ <a target='_blank' href='".$forumhack."webticket/'>Submit a Web Support Ticket</a> ]  ");
		}

 	}


?>