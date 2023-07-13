<?php
	//get database
	$host = "303.itpwebdev.com";
	$user = "qkarns_db_user";
	$pass = "927927927Qu";
	$db = "qkarns_players_db";

	//establish connection
	$mysqli = new mysqli($host, $user, $pass, $db);

	//check for mysql connection errors
	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	//submit SQL Query for all players
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
	
	";

	//retrieve all players
	$results = $mysqli->query($sql);

	//check for SQL errors
	if ( !$results ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//calc total results
	$total_results = $results->num_rows;
	//results per page
	$results_per_page = 10;
	//last page
	$last_page = ceil($total_results / $results_per_page);

	//get current_page from url
	if(isset($_GET['page']) && trim($_GET['page']) ){
		$current_page = $_GET['page'];
	}
	else {
		$current_page = 1;
	}

	//edge cases
	if( $current_page < 1 || $current_page > $last_page){
		$current_page = 1;
	}

	//start index
	$start_index = ($current_page - 1) * $results_per_page;

	$sql = rtrim($sql, ';');
	$sql = $sql . " LIMIT $start_index, $results_per_page;";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//close MYSQL Connection
	$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Draft page of the Valorant Fantasy Team Website. At the top is a navbar allowing the user to navigate to any page on the website. Under the navbar is a header with a picture of a professional valorant team. Next is an element that allows the user to view the next 10 results from the databse. Lastly there is a table of all the possible players to choose from in the database.">

	<title>Draft</title>
	<link rel="stylesheet" type="text/css" href="shared.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<style>
		#header {
			background-image: url('img/val_esports.png');
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
	          <a class="nav-link" aria-current="page" href="home.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" href="draft.php">Draft</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="team.php">Team</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="database.php">Database</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- Header -->
	<div id="header">
		<h1 id="valorant-text">Draft</h1>
	</div>

	<!-- Pagination -->
	<div class="col-12 container mt-4">
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<li class="page-item <?php if ($current_page <= 1) echo 'disabled';?>">
					<a class="page-link" href="
					<?php 

					$_GET['page'] = 1;

						echo $_SERVER['PHP_SELF'] . '?' .
							http_build_query($_GET);
					?>

					">First</a>
				</li>
				<li class="page-item <?php if ($current_page <= 1) echo 'disabled';?>">
					<a class="page-link" href="
					<?php 

					$_GET['page'] = $current_page - 1;

						echo $_SERVER['PHP_SELF'] . '?' .
							http_build_query($_GET);
					?>

					">Previous</a>
				</li>
				<li class="page-item active">
					<a class="page-link" href="">
						<?php echo $current_page; ?>
					</a>
				</li>
				<li class="page-item <?php if ($current_page >= $last_page) echo 'disabled';?>">
					<a class="page-link" href="
					<?php 

					$_GET['page'] = $current_page +1;

						echo $_SERVER['PHP_SELF'] . '?' .
							http_build_query($_GET);
					?>

					">Next</a>
				</li>
				<li class="page-item <?php if ($current_page >= $last_page) echo 'disabled';?>">
					<a class="page-link" href="
					<?php 

					$_GET['page'] = $last_page;

						echo $_SERVER['PHP_SELF'] . '?' .
							http_build_query($_GET);
					?>
					">Last</a>
				</li>
			</ul>
		</nav>
	</div> <!-- .col -->
	

	<div class="col-12 container mt-4 mx-auto text-center">
			<!-- Showing 1-10 of 100 results(s). -->

		Showing
		<strong><?php echo $start_index+1 ?></strong>
		-
		<strong><?php echo $start_index +  $results->num_rows; ?></strong>
		of
		<?php echo $total_results; ?> result(s).

	</div> <!-- .col -->

	<!-- Table -->
	<div id="table" class="container-fluid col-sm-12 col-md-12 col-lg-10 col-10 mt-4"> 
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
		      <th scope="col">Add</th>
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
		  				<a class="btn btn-success">
		  					Add
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script>
		//create array to store team items
		let listItems = JSON.parse(localStorage.getItem("listItems")) || [];

		//find all the "add item" buttons
		const addToCartButtons = document.querySelectorAll(".btn-success");

		//add click event listerner
		addToCartButtons.forEach((button) => {
			button.addEventListener("click", (event) => {
				//find row that contains the clicked button
				const row = event.target.closest("tr");

				//extract information from row
				const id = row.querySelectorAll("td")[0].textContent;
				const name = row.querySelectorAll("td")[1].textContent;
				const region = row.querySelectorAll("td")[2].textContent;
				const team = row.querySelectorAll("td")[3].textContent;
				const role = row.querySelectorAll("td")[4].textContent;
				const agent = row.querySelectorAll("td")[5].textContent;
				const rating = row.querySelectorAll("td")[6].textContent;

				//create an object representing the item
				const item = {
					id: id,
					name: name,
					region: region,
					team: team,
					role: role,
					agent: agent,
					rating: rating,
				};

				//add item to list array
				listItems.push(item);

				//store the updated list array in localstorage
				localStorage.setItem("listItems", JSON.stringify(listItems));

				//redirect user to team page
				window.location.href = "team.php";
			});
		});
	</script>
</body>
</html>