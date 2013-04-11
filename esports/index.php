<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OMFG.E | The E-Sports Portal of OMFG.FM</title>
<link href="/esports/css/main-test.css" rel="stylesheet" type="text/css">
</head>

<?php
$p = $_GET["p"];

if (!isset($p)) { $p = "news"; }
?>

<body>

	<div id="headerArea">
    
    	<div id="titleBar">
    		<div class="centeredElement">
	        	<h1 id="title" class="seoImg">OMFG&middot;E</h1>
				<!--
	            <p id="userBox">
	            	<span id="avatar" class="avatar_tidecaller seoImg">rqw</span>
	            	<span id="welcome">Welcome back Tidecaller</span>
	                <a id="userMessages" class="newNotification" href="#showMessages">14 new messages</a>
	                <a id="userInvites" class="newNotification" href="#showInvites">2 event invitations</a>
	            </p>  /#userBox
				-->
            </div> <!-- /.centeredElement -->
        </div> <!-- /#titleBar -->
        
        <div id="linkBar">
        	<div class="centeredElement">
	        	<h2 id="esports">The E-Sports Portal of OMFG.FM</h2>
	            <ul id="omfgLinks">
	            	<li class="omfgLink">
	                	<a href="http://www.omfg.fm">OMFG.FM</a>
	                </li> <!-- /.omfgLink -->
	                <li class="omfgLink">
	                	<a href="http://www.omfg.fm/esports">OMFG.E</a>
	                </li> <!-- /.omfgLink -->
	                <li class="omfgLink">
	                	<a href="http://www.omfg.fm">Facebook</a>
	                </li> <!-- /.omfgLink -->
	                <li class="omfgLink">
	                	<a href="http://www.omfg.fm">Twitter</a>
	                </li> <!-- /.omfgLink -->
	            </ul> <!-- /omfgLinks -->
            </div> <!-- /.centeredElement -->
        </div> <!-- /#linkBar -->
        
    </div> <!-- /#headerArea -->
    
    <div id="wrapper">
    
    	
  <div id="mainContent_bottom" class="centeredElement"> 
    <div id="mainContent_top"></div>
    <div id="mainContent_middle"> 
      <div id="primaryContent" class="twoWide col"> 
        <div id="newsArea"> 
          <ul id="newsReel">
            <li id="sc2_tourney" class="newsItem"> 
              <div class="newsItemText"> 
                <h3>Watch our LIVE commentary matches!</h3>
                <p> Every friday night, only on eSports LIVE! <span class="newsCTA">Full 
                  Story</span> </p>
              </div>
              <!-- /.newsItemText -->
              <a class="newsItemLink" href="?p=video"></a> 
              <!-- /.newsItemLink -->
            </li>
            <!-- /#sc2_tourney /.newsItem -->
          </ul>
          <!-- /newsReel -->
        </div>
        <!-- /#newsArea -->
        <div id="articleIntro"> 
          <h2>Headlines</h2>
          <ul id="articleFilter">
            <li class="articleType firstType"> All Games </li>
            <!-- /.articleType -->
            <li class="articleType"> SC2 </li>
          </ul>
          <!-- /#articleFilter -->
        </div>
        <!-- /#articleIntro -->
        <?php
       			if (file_exists("views/".$p.".php")) {
					include("views/".$p.".php"); 
				} else {
    				echo "Page not Found.";
				}
		?>
      </div>
      <!-- /#primaryContent -->
      <div id="secondaryContent" class="oneWide col"> 
        <div id="eventArea"> 
          <h3 class="sidebarHeader">Upcoming Events</h3>
          <ul id="events" class="sidebarList">
            <li class="sidebarListItem"> <span class="itemName">None</span> <span class="itemDetail">No 
              Date</span> </li>
            <!-- /.sidebarListItem -->
          </ul>
          <!-- /#events -->
        </div>
        <!-- /#eventArea -->
        <div id="leaderboardArea"> 
          <h3 class="sidebarHeader">Leaderboards</h3>
          <h4>Starcraft 2</h4>
          <ul id="starcraftLeaderboard" class="sidebarList">
            <li class="sidebarListItem"> <span class="itemName">None</span> <span class="itemDetail">0 
              wins</span> </li>
            <!-- /sidebarListItem -->
          </ul>
          <!-- /#starcraftLeaderboard -->
          <h4>Team Fortress 2</h4>
          <ul id="teamFortress2Leaderboard" class="sidebarList">
            <li class="sidebarListItem"> <span class="itemName">None</span> <span class="itemDetail">0 
              pts</span> </li>
          </ul>
        </div>
        <!-- /#leaderboardArea -->
        <div id="sponsorArea"> 
          <h3 class="sidebarHeader">Sponsors</h3>
          <ul id="sponsorList" class="sidebarList">
            <h4 class="sponsorName"><a href='http://www.theredtheory.com/'>The 
              Red Theory</a></h4>
            <li id="redtheory"><span class="sponsorIcon seoImg"></span></li>
            <br>
            <!-- <p class="sponsorDetails"> Platinum Sponsor </p> -->
          </ul>
          <!-- /#sponsorList -->
        </div>
        <!-- /#sponsorArea -->
      </div>
      <!-- /#secondaryContent -->
      <div class="clearfix"></div>
    </div>
    <!-- /#mainContent_middle -->
  </div>
  <!-- /#mainContent_bottom -->
    
    </div> <!-- /#wrapper -->
	
    <br>
	<br>
	
    <div id="footerArea">
    	<div id="footerLinkBar">
    		<div class="centeredElement">
    		
    			<h4 id="esportsFooter">OMFG&middot;E &mdash; The E-Sports Portal of OMFG.FM</h4>
    			
    			<ul id="omfgFooterLinks">
    				<li class="omfgLink">
	                	<a href="http://www.omfg.fm">OMFG.FM</a>
	                </li> <!-- /.omfgLink -->
	                <li class="omfgLink">
	                	<a href="http://www.omfg.fm/esports">OMFG.E</a>
	                </li> <!-- /.omfgLink -->
	                <li class="omfgLink">
	                	<a href="http://www.omfg.fm">Facebook</a>
	                </li> <!-- /.omfgLink -->
	                <li class="omfgLink">
	                	<a href="http://www.omfg.fm">Twitter</a>
	                </li> <!-- /.omfgLink -->
    			</ul> <!-- /#omfgFooterLinks -->
    		</div> <!-- /.centeredElement -->
    	</div> <!-- /#footerLinkBar -->
    </div> <!-- /#footerArea -->
</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="/esports/scripts/esports_core.js"></script>
<script type="text/javascript" src="/esports/scripts/esports_home.js"></script>

</html>