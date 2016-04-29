<?php   
 
 	function GetPageination($default) {
		if (!isset($_GET['page'])) { $page = $default; } else { $page = $_GET['page']; }
		return $page;
	}
 
	
	function PaginationStart($select,$table,$order,$sort,$max,$restrict=NULL,$restricttable=NULL) {
		$page = GetPageination("1");
		
		if (isset($restrict)) { $restrictstring = "WHERE {$restricttable} = {$restrict}"; } else { $restrictstring = ""; }
		
		$limits = ($page - 1) * $max; 
		$sql = mysqli_query($GLOBALS['con'], "SELECT {$select} FROM {$table} {$restrictstring} ORDER by $order $sort LIMIT ".$limits.",$max");

		return $sql;

	}



	function PaginationEnd($table,$max,$restrict=NULL,$restricttable=NULL,$showid=NULL) {
		$page = GetPageination("1");
		
		if (isset($restrict)) { $restrictstring = "WHERE $restricttable = $restrict"; } else { $restrictstring = ""; }
		if (isset($showid)) { $show = "&ID=$showid"; }

		
		$totalres = mysqli_result(mysqli_query($GLOBALS['con'], "SELECT COUNT(ID) AS tot FROM {$table} {$restrictstring}"));
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

function mysqli_result($res,$row=0,$col=0){
	$numrows = mysqli_num_rows($res);
	if ($numrows && $row <= ($numrows-1) && $row >=0){
		mysqli_data_seek($res,$row);
		$resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
		if (isset($resrow[$col])){
			return $resrow[$col];
		}
	}
	return false;
}