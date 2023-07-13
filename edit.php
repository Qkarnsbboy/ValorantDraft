<?php
	if ( !isset( $_GET['ID'] ) || trim( $_GET['ID'] ) == '' ) {
		// Track ID is missing.
		echo "Invalid URL";
		exit();
	}

	$host = "303.itpwebdev.com";
	$user = "qkarns_db_user";
	$pass = "927927927Qu";
	$db = "qkarns_players_db";

	// Establish MySQL Connection.
	$mysqli = new mysqli($host, $user, $pass, $db);
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');

	//region:
	$sql_regions = "SELECT * FROM regions;";
	$results_regions = $mysqli->query($sql_regions);
	if ( $results_regions == false ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//teams:
	$sql_teams = "SELECT * FROM teams;";
	$results_teams = $mysqli->query($sql_teams);
	if ( $results_teams == false ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//roles:
	$sql_roles = "SELECT * FROM roles;";
	$results_roles = $mysqli->query($sql_roles);
	if ( $results_roles == false ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//agents
	$sql_agents = "SELECT * FROM agents;";
	$results_agents = $mysqli->query($sql_agents);
	if ( $results_agents == false ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	//player information
	$player_id = $_GET['ID'];

	$sql = "SELECT *
				FROM players
				WHERE players.player_id = $player_id;
		    ";

    $results = $mysqli->query($sql);
    if (!$results) {
    	echo $mysqli->error;
    	$mysqli->close();
    	exit();
    }

    $row_player = $results->fetch_assoc();

    // Close DB Connection
    $mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Edit form for the website. Allows the user to edit an existing player from pre-determined options. Every input must be filled.">

	<title>Edit</title>

	<link rel="stylesheet" type="text/css" href="shared.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


	<style>
		#header {
			background-image: url('img/editpic.jpg');
		}
		#icon-text {
			font-family: "Valorant";
		}
		#container {
			margin-top: 20px;
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
	          <a class="nav-link" aria-current="page" href="database.php">Database</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- Header -->
	<div id="header">
		<h1 id="valorant-text">Edit</h1>
	</div>

	<div id="container" class="container">

		<form action="edit_confirmation.php" method="POST">

			<input type="hidden" name="ID" value="<?php echo $row_player['player_id']; ?>">

			<!-- Name -->
			<div class="form-group row">
				<label for="name-id" class="col-sm-3 col-form-label text-sm-right">
					Player Name: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="name-id" name="name" value="<?php echo $row_player['name']; ?>">
				</div>
			</div> <!-- .form-group -->

			<!-- Region -->
			<div class="form-group row">
				<label for="region-id" class="col-sm-3 col-form-label text-sm-right">
					Region: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<select name="region_id" id="region-id" class="form-control">
						<option value="" selected disabled>-- Select One --</option>

						<?php while( $row = $results_regions->fetch_assoc() ): ?>

							<?php if ( $row['id'] == $row_player['region_id'] ) : ?>

								<option value="<?php echo $row['id']; ?>" selected>
									<?php echo $row['region']; ?>
								</option>

							<?php else: ?>

								<option value="<?php echo $row['id']; ?>">
									<?php echo $row['region']; ?>
								</option>

							<?php endif; ?>

						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<!-- Team -->
			<div class="form-group row">
				<label for="team-id" class="col-sm-3 col-form-label text-sm-right">
					Team: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<select name="team_id" id="team-id" class="form-control">
						<option value="" selected disabled>-- Select One --</option>

						<?php while( $row = $results_teams->fetch_assoc() ): ?>

							<?php if ( $row['id'] == $row_player['team_id'] ) : ?>

								<option value="<?php echo $row['id']; ?>" selected>
									<?php echo $row['team']; ?>
								</option>

							<?php else: ?>

								<option value="<?php echo $row['id']; ?>">
									<?php echo $row['team']; ?>
								</option>

							<?php endif; ?>

						<?php endwhile; ?>
					</select>
				</div>
			</div> <!-- .form-group -->

			<!-- Role -->
			<div class="form-group row">
				<label for="role-id" class="col-sm-3 col-form-label text-sm-right">
					Role: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<select name="role_id" id="role-id" class="form-control">
						<option value="" selected disabled>-- Select One --</option>

						<?php while( $row = $results_roles->fetch_assoc() ): ?>

							<?php if ( $row['id'] == $row_player['role_id'] ) : ?>

								<option value="<?php echo $row['id']; ?>" selected>
									<?php echo $row['role']; ?>
								</option>

							<?php else: ?>

								<option value="<?php echo $row['id']; ?>">
									<?php echo $row['role']; ?>
								</option>

							<?php endif; ?>

						<?php endwhile; ?>
					</select>
				</div>
			</div> <!-- .form-group -->

			<!-- Agent -->
			<div class="form-group row">
				<label for="agent-id" class="col-sm-3 col-form-label text-sm-right">
					Agent: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<select name="agent_id" id="agent-id" class="form-control">
						<option value="" selected disabled>-- Select One --</option>

						<?php while( $row = $results_agents->fetch_assoc() ): ?>

							<?php if ( $row['id'] == $row_player['agent_id'] ) : ?>

								<option value="<?php echo $row['id']; ?>" selected>
									<?php echo $row['agent']; ?>
								</option>

							<?php else: ?>

								<option value="<?php echo $row['id']; ?>">
									<?php echo $row['agent']; ?>
								</option>

							<?php endif; ?>

						<?php endwhile; ?>
					</select>
				</div>
			</div> <!-- .form-group -->

			<!-- Rating -->

			<div class="form-group row">
				<label for="rating" class="col-sm-3 col-form-label text-sm-right">
					Rating: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<input type="number" step="1" min="0" name="rating" id="rating-id" class="form-control" value="<?php echo $row_player['rating']; ?>">
				</div>
			</div> <!-- .form-group -->


			<div class="form-group row">
				<div class="ml-auto col-sm-9">
					<span class="text-danger font-italic">* Required</span>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div> <!-- .form-group -->
		</form>
	</div> <!-- .container -->




	<!-- Footer -->
	<div id="footer">
		Quincy Karns &copy; 2023
	</div> <!-- #footer -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>