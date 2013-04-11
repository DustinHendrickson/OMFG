<?php

        function Make_Safe($string) {

            $Safe = mysql_real_escape_string($string);

            return $Safe;
        }

        function Get_View() {

            if(isset($_GET['p'])){
                $view = Make_Safe($_GET['p']);
            } else {
                $view = "Home";
            }

            return $view;
        }

        function Display_View($view) {

            if(file_exists("views/$view.php")) {
                include("views/$view.php");
            } else {
                include("views/404.php");
            }
        }



	function Navigation($page) {

		$p = $page;
		
		$sql = mysql_query("SELECT * FROM navigation ORDER BY ID ASC");
		
		while($row = mysql_fetch_array($sql)) {

			$Link =  $row["NavigationLink"];
			$Name =  $row["NavigationName"];
			
			$Leftimage = "<img src='/images/navleft.png'>";
			$Rightimage = "<img src='/images/navright.png'>";
			
			if ($p == $Name) {
				$class = "NavOpen";
				echo "<div style='margin-left: 5px;' class='floatl'>$Leftimage</div><div class='$class floatl'><a class='".$class."L' href='$Link'><img border='0' src='/images/headers/".$Name.".png'></a></div><div style='margin-right: 5px;' class='floatl'>$Rightimage</div>";
			} else {
				$class = "NavClosed";
				echo "<div class='$class floatl'><a class='$class' href='$Link'><img border='0' src='/images/headers/".$Name.".png'></a></div>";
			}				
				
		}
		
	}




?>