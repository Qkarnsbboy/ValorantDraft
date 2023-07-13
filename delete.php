<?php
	//Check to make sure ID is provided
	if ( !isset($_GET['ID']) || trim($_GET['ID']) == '' ) {
		// Missing track_id;
		$error = "Invalid URL.";
	}
	else {
		//valid ID
		$host = "303.itpwebdev.com";
		$user = "qkarns_db_user";
		$pass = "927927927Qu";
		$db = "qkarns_players_db";

		$mysqli = new mysqli($host, $user, $pass, $db);
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

		//DELETE SQL
		$sql = "DELETE FROM players
					WHERE player_id = " . $_GET['ID'] . ";";

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
	<meta name="description" content="Delete confirmation for the Valorant Fantasy Team Website. Executes the delete onto the database using SQL and PHP. Either confirms or denies the delete while printing the error.">

	<title>Delete</title>

	<link rel="stylesheet" type="text/css" href="shared.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<style>
		#header {
			background-image: url('img/delete.jpg');
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
	          <a class="nav-link" aria-current="page" href="database.php">Database</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	  <!-- Header -->
	  <div id="header">
	  	<h1 id="valorant-text">Delete</h1>
	  </div>

	  <div class="container">
	  	<div class="row mt-4">
	  		<div class="col-12 text-center">

	  			<?php if ( isset($error) && trim($error) != '' ) : ?>

	  				<div class="text-danger">
	  					<?php echo $error; ?>
	  				</div>

	  			<?php else: ?>

	  				<div class="text-success text-center">
	  					<span class="font-italic"><?php echo $_GET['ID']; ?></span> was successfully edited.
	  				</div>

	  			<?php endif; ?>

	  		</div> <!-- .col -->
	  	</div> <!-- .row -->
	  </div>


	  <!-- Footer -->
	  <div id="footer">
	  	Quincy Karns &copy; 2023
	  </div> <!-- #footer -->

	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>