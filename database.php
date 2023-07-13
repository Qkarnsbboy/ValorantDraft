<?php
	//check to see if players need to be added to team
	if( isset($_GET['name']) && $_GET['name']!=''){
		$host = "303.itpwebdev.com";
		$user = "qkarns_db_user";
		$pass = "927927927Qu";
		$db = "qkarns_players_db";

		// Establish MySQL Connection.
		$mysqli = new mysqli($host, $user, $pass, $db);

		// Check for any Connection Errors.
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

		

		//get results for specific player
		$sql = "

		SELECT players.player_id AS ID, players.name AS name, regions.region AS region, teams.team AS team, roles.role AS role, agents.agent AS agent, players.rating AS rating
		FROM players
			LEFT JOIN regions
				ON regions.id = players.region_id
			LEFT JOIN teams
				ON teams.id = players.team_id
			LEFT JOIN roles
				ON roles.id = players.role_id
			LEFT JOIN agents
				ON agents.id = players.agent_id
			WHERE 1=1";

		//get name of player
		$name = "'%" . $_GET['name'] . "%'";

		//add to query
		$sql = $sql . " AND players.name LIKE $name";

		// end the sql command
		$sql = $sql . ";";

		// echo "<hr>$sql</hr>";
		
		$results = $mysqli->query($sql);

		if (!$results) {
			echo $mysqli->error;
			$mysqli->close();
			exit();
		}

		$mysqli->close();
	}
	else {
		$host = "303.itpwebdev.com";
		$user = "qkarns_db_user";
		$pass = "927927927Qu";
		$db = "qkarns_players_db";

		// Establish MySQL Connection.
		$mysqli = new mysqli($host, $user, $pass, $db);

		// Check for any Connection Errors.
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

		//get results for all players
		$sql = "

		SELECT players.player_id AS ID, players.name AS name, regions.region AS region, teams.team AS team, roles.role AS role, agents.agent AS agent, players.rating AS rating
		FROM players
			LEFT JOIN regions
				ON regions.id = players.region_id
			LEFT JOIN teams
				ON teams.id = players.team_id
			LEFT JOIN roles
				ON roles.id = players.role_id
			LEFT JOIN agents
				ON agents.id = players.agent_id;
		";
		
		$results = $mysqli->query($sql);

		if (!$results) {
			echo $mysqli->error;
			$mysqli->close();
			exit();
		}

		$mysqli->close();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Database page for the Valorant Fanstasy Team Website. At the top is the navbar which allows navigation to the main pages. Under that is a header showing a picture of a datbase relation. Next is an add player directing the user to the add form. After that is the search function which allows the user to search by name. Lastly is the database itself equipped with edit and delete buttons.">

	<title>Database</title>
	<link rel="stylesheet" type="text/css" href="shared.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<style>
		#header {
			background-image: url('img/database.jpg');
		}
		#icon-text {
			font-family: "Valorant";
		}

	</style>
</head>
<body>
	<!-- NavBar -->
	<nav class="navbar navbar-expand">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	    	<img src="img/valorantLogo.png" alt="ValLogo" width="50" height="auto">
	    	<span id="icon-text">Valorant Fantasy Team</span>
		</a>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link" href="home.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="draft.php">Draft</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="team.php">Team</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="database.php">Database</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- Header -->
	<div id="header">
		<h1 id="valorant-text">Database</h1>
	</div>

	<!-- Add Player -->
	<div class="container-fluid mx-auto mt-4 text-center">
		<a href="add.php"
		class="btn btn-primary col-2">
			Add Player
		</a>
	</div>
	

	<!-- Search -->
	<div id="search" class="container-fluid col-sm-6 col-md-8 col-lg-6 mt-4">
		<form action="database.php" method="GET">
			<div class="input-group mb-3">
			  <input type="text" class="form-control" placeholder="TenZ" name="name" aria-label="Recipient's username" aria-describedby="button-addon2">
			  <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
			</div>
		</form>
		
	</div>

	<!-- Table -->
	<div id="table" class="container-fluid col-sm-12 col-md-10 col-lg-8 mt-4"> 
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Player</th>
		      <th scope="col">Region</th>
		      <th scope="col">Team</th>
		      <th scope="col">Role</th>
		      <th scope="col">Agent</th>
		      <th scope="col">Rating</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody class="table-group-divider">
		    <?php while ( $row = $results->fetch_assoc() ) : ?>
		    	<tr>
		    		<td>
		    			<?php echo $row['ID'] ?>
		    		</td>
		    		<td>
		    			<?php echo $row['name'] ?>
		    		</td>
		    		<td>
		    			<?php echo $row['region'] ?>
		    		</td>
		    		<td>
		    			<?php echo $row['team'] ?>
		    		</td>
		    		<td>
		    			<?php echo $row['role'] ?>
		    		</td>
		    		<td>
		    			<?php echo $row['agent'] ?>
		    		</td>
		    		<td>
		    			<?php echo $row['rating'] ?>
		    		</td>
		    		<td>
		    			<a href="edit.php?ID=<?php echo $row['ID'];?>"

		    			class="btn btn-warning">
		    				Edit
		    			</a>
		    		</td>
		    		<td>
		    			<a 
		    				href="delete.php?ID=<?php echo $row['ID'];?>"
		    				class="btn btn-danger"
		    				onclick='return confirm("Are you sure you want to delete this player?")'
		    			>
		    				Delete
		    			</a>
		    		</td>
		    	</tr>
		    <?php endwhile; ?>
		  </tbody>
		</table>
	</div>

	<!-- Footer -->
	<div id="footer">
		Quincy Karns &copy; 2023
	</div> <!-- #footer -->
</body>
</html>