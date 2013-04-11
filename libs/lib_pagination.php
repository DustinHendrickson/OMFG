<?php   
 
 	function GetPageination($default) {
		$page = $_GET['page'];
		if (!isset($page)) { $page = $default; }
		return $page;
	}
 
	
	function PaginationStart($select,$table,$order,$sort,$max,$restrict=NULL,$restricttable=NULL) {
		$page = GetPageination("1");
		
		if (isset($restrict)) { $restrictstring = "WHERE $restricttable = $restrict"; }
		
		$limits = ($page - 1) * $max; 
		$sql = mysql_query("SELECT $select FROM $table $restrictstring ORDER by $order $sort LIMIT ".$limits.",$max") or die(mysql_error());

		return $sql;

	}



	function PaginationEnd($table,$max,$restrict=NULL,$restricttable=NULL,$showid=NULL) {
		$page = GetPageination("1");
		
		if (isset($restrict)) { $restrictstring = "WHERE $restricttable = $restrict"; }
		if (isset($showid)) { $show = "&ID=$showid"; }

		
		$totalres = mysql_result(mysql_query("SELECT COUNT(ID) AS tot FROM $table $restrictstring"),0);	
		$totalpages = ceil($totalres / $max);
		
		
		for($i = 1; $i <= $totalpages; $i++){ 

		$back = $page-1;
		$front = $page+1;
		
		echo("<div align='center'>");
		if ($i == 1) { if ($page >= 2) { echo"<div class='Pagination floatl'><a href='index.php?p=".Get_View(). $show . "&page=1'> < </a></div> "; } }
		if ($i == 1) { if ($page >= 2) { echo"<div class='Pagination floatl'><a href='index.php?p=".Get_View(). $show . "&page=$back'> << </a></div>"; } }
		if ($i >= $page - 5 && $i <= $page + 5) { if ($i != $page) {  echo "<div class='Pagination floatl'><a href='index.php?p=".Get_View(). $show ."&page=$i'>$i</a></div>"; } else { echo"<div class='PaginationActive floatl'> $i 		</div>";} }
		if ($i == $totalpages) { if ($page <= ($totalpages-1)) { echo"<div class='Pagination floatl'><a href='index.php?p=".Get_View(). $show . "&page=$front'> >> </a></div>"; } }
		if ($i == $totalpages) { if ($page <= ($totalpages-1)) { echo"<div class='Pagination floatl'><a href='index.php?p=".Get_View(). $show . "&page=$totalpages'> > </a></div>"; } }
		echo("</div>");
		}
		echo("<br>");
	}
?>