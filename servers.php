<!DOCTYPE html>
<html>
<head>
<title>Server Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--style sheets-->
  <link rel="stylesheet" href="inc/css/custom.css">
  <link rel="stylesheet" href="inc/css/bootstrap.min.css">

	
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  
  <!-- scripts-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

</head>
<body>
<!-- NavBar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>	
      <a class="navbar-brand" href="index.html">Discore</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
	    <li><a  class="active"  href="servers.php">Servers</a></li>
        <li><a href="https://www.facebook.com/krampuscommunity">Facebook</a></li>
        <li><a href="https://www.twitter.com/krampuscomm">Twitter</a></li>
        <li><a href="https://www.youtube.com/channel/UCn6_OHO2n5gjzJGIobH-XIA">YouTube</a></li>
        <li><a href="https://www.twitch.tv/krampuscommunity">Twitch</a></li>
<!--  	    <li><a href="forums/index.php">Forums</a></li> 
	    <li><a href="bans/">LiteBans</a></li>
		-->
      </ul>

	<!--  	<ul class="nav navbar-nav navbar-right">
      <li><a href="/forums/member.php?action=register"><span class="glyphicon glyphicon-user"></span></a></li>
      <li><a href="/forums/member.php?action=login"><span class="glyphicon glyphicon-log-in"></span></a></li>
    </ul>
-->	
    </div>
  </div>
</nav>

<div class="container-fluid" style="margin-top:50px">

<div class="header text-center">
  <h1>Server Information</h1>
  <p>Here you will find basic Information on the various game servers that we have in development here!</p> 
</div>

<script>
function openServer(evt, serverName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(serverName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<script>
function secondsToString(seconds) {
        var numyears = Math.floor(seconds / 31536000);
        var numdays = Math.floor((seconds % 31536000) / 86400);
        var numhours = Math.floor(((seconds % 31536000) % 86400) / 3600);
        var numminutes = Math.floor((((seconds % 31536000) % 86400) % 3600) / 60);
        var numseconds = Math.round((((seconds % 31536000) % 86400) % 3600) % 60);
        var str = "";
        if (numyears > 0) {
            str += numyears + " year" + (numyears == 1 ? "" : "s") + " ";
        }
        if (numdays > 0) {
            str += numdays + " day" + (numdays == 1 ? "" : "s") + " ";
        }
        if (numhours > 0) {
            str += numhours + " hour" + (numhours == 1 ? "" : "s") + " ";
        }
        if (numminutes > 0) {
            str += numminutes + " minute" + (numminutes == 1 ? "" : "s") + " ";
        }
        if (numseconds > 0) {
            str += numseconds + " second" + (numseconds == 1 ? "" : "s") + " ";
        }
        return str; 
}
    var lastrestart;
		function updateSideBar() {
		jQuery.ajax({
	        url: "http://discore.me/API/ServersData.php",
	    	//force to handle it as text
	    	dataType: "text",
	    	async: true,
	    	success: function(data) {
	    	var json = jQuery.parseJSON(data);
		jQuery('#bungeeOnline').text(json.Servers.Minecraft.Bungee.Online);
          	jQuery('#bungeePlayers').text(json.Servers.Minecraft.Bungee.onlineCount);
          	jQuery('#rustOnline').text(json.Servers.Rust.Online);
          	jQuery('#rustPlayers').text(json.Servers.Rust.onlineCount);
		jQuery('#arkOnline').text(json.Servers.ARK.Online);
          	jQuery('#arkPlayers').text(json.Servers.ARK.onlineCount);
		jQuery('#terrariaOnline').text(json.Servers.Terraria.Online);
          	jQuery('#terrariaPlayers').text(json.Servers.Terraria.onlineCount);
		//jQuery('#hcSkyblockOnline').text(json.Servers.Minecraft.HardcoreSkyblock.Online);
          	//jQuery('#hcSkyblockPlayers').text(json.Servers.Minecraft.HardcoreSkyblock.onlineCount);
		//jQuery('#prisonOnline').text(json.Servers.Minecraft.Prison.Online);
          	//jQuery('#prisonPlayers').text(json.Servers.Minecraft.Prison.onlineCount);

		//Version/Maps
		jQuery('#terrariaMap').text(json.Servers.Terraria.Map);
          	jQuery('#terrariaVersion').text(json.Servers.Terraria.Version);
		jQuery('#arkMap').text(json.Servers.ARK.Map);
          	jQuery('#arkVersion').text(json.Servers.ARK.Version);
          	//lastrestart = json.lastrestart;
	        //jQuery('#lastrestart').text(new Date(json.lastrestart * 1000));
	       }
	     });
	   }
	   jQuery(document).ready(function(){
	        setTimeout(function(){updateSideBar();}, 100);
	        // we're going to update our html elements / player every 15 seconds
	        setInterval(function(){updateSideBar();}, 15000); 
          setInterval(function(){
            jQuery('#uptime').text(secondsToString (Math.floor(new Date() / 1000) - lastrestart));
          }, 1000)
		});
</script>

<div class="container">
  <div class="row">
  <!--Left Col-->
    <div class="col-sm-3">
		<div class="status">
			<h3>Server Status</h3>
			<table style="width:100%">
			<tr>
				<td><h4>Server</h4></td><td><h4>Status</h4></td><td><h4>Players</h4></td>
			</tr>
			<tr>
				<td><p>Minecraft Server</p></td><td><p id="bungeeOnline"></p></td><td><p align="center" id="bungeePlayers"></p></td>
			</tr>
			<tr>
				<td><p>ARK Server</p></td><td><p id="arkOnline"></p></td><td><p align="center" id="arkPlayers"></p></td>
			</tr>			
			<tr>
				<td><p>Terraria Server</p></td><td><p id="terrariaOnline"></p></td><td><p align="center" id="terrariaPlayers"></p></td>
			</tr>
			<tr>
				<td><p>Rust Server</p></td><td><p id="rustOnline"></p></td><td><p align="center" id="rustPlayers"></p></td>
			</tr>
			

			</table>
		</div>

	    <div class="tab">
		<h3>Our Game Servers</h3>
          <button class="tablinks" onclick="openServer(event, 'Minecraft')">Minecraft</button>
          <button class="tablinks" onclick="openServer(event, 'ARK')">ARK</button>
		  <button class="tablinks" onclick="openServer(event, 'Terraria')">Terraria</button>
          <button class="tablinks" onclick="openServer(event, 'Rust')">Rust</button>
          <button class="tablinks" onclick="openServer(event, '7 Days to Die')">7 Days to Die</button>
        </div>
		
    </div>
	<!--Center Col-->
    <div class="col-sm-6">
        <div id="Minecraft" class="tabcontent">
		  <h3>Minecraft Information</h3>
			<h5>Basic Info</h5>
			<p>At this time, all of our servers are running Spigot Version 1.11.2. However, you may connect using any version of Minecraft from 1.8.x to 1.12.2 as we have both ViaVersion and ViaBackwards enabled on our servers for ease of use.</p>
            <h5>Gamemodes</h4>
	          <ul style="list-style-type:none">
			  	<li>HC Skyblock</li>
					<ul style="list-style-type:none">
						<li>No Keep Inventory</li>
						<li>Daily Kits</li>
						<li>Mob Griefing</li>
					</ul>
	            <li>OP Prison</li>
	            <li>Survival</li>
	            <li>Factions</li>
	            <li>More Coming Soon!</li>
	          </ul>
        </div>
		<div id="ARK" class="tabcontent">
		<h3>ARK Information</h3>
			<h5>Server Version</h5>
			  <ul style="list-style-type:none">
				<li id="arkVersion"></li>
			  </ul>				
			<h5>Maps</h5>
			  <ul style="list-style-type:none">
				<li id="arkMap"></li>
			  </ul>			
		</div>
		<div id="Terraria" class="tabcontent">
		<h3>Terraria Information</h3>
			<h5>Server Version</h5>
			  <ul style="list-style-type:none">
				<li id="terrariaVersion"></li>
			  </ul>				
			<h5>Maps</h5>
			  <ul style="list-style-type:none">
				<li id="terrariaMap"></li>
			  </ul>
		</div>
		<div id="Rust" class="tabcontent">
		<h3>Rust Information</h3>
			<h5>Info Here</h5>
		</div>
		<div id="7 Days to Die" class="tabcontent">
		<h3>7 Days to Die Information</h3>
			<h5>Info Here</h5>
		</div>
    </div>
	<!--Right Col-->
    <div class="col-sm-3">
	  <iframe src="https://discordapp.com/widget?id=415505236598325248&theme=dark" width="300" height="450" allowtransparency="true" frameborder="0"></iframe>
    </div>
  </div>
</div>
</div>
<div class="container-fluid">
	<div class="footer text-center">
	<hr>
	<p>All Rights Reserved Discore.me &copy 2018</p> 
</div>
</div>

</body>
</html>
