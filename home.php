<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Home page of the Valorant Fantasy Team website. At the top there is a navbar with 4 options: Home, Draft, Team, and Database. Under the navbar there is a header displaying the different valorant agents. Under that is an accordion describing each of the different pages on the website. ">

	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="shared.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<style>
		#header {
			background-image: url('img/valorant_wall.png');
		}
		#about {
			margin: auto 10%;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		#about h2{
			text-align: center;
			font-family: "Valorant";
		}
		#icon-text {
			font-family: "Valorant";
		}
		.navbar {
		  display: flex;
		  justify-content: center;
		}

	</style>

</head>
<body>
	<!-- NavBar -->
	<nav class="navbar navbar-expand justify-content-center">
	  <div class="container-fluid mx-auto">
	    <a class="navbar-brand" href="#">
	    	<img src="img/valorantLogo.png" alt="ValLogo" width="50" height="auto">
	    	<span id="icon-text">Valorant Fantasy Team</span>
		</a>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="#">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="draft.php">Draft</a>
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
		<h1 id="valorant-text">Valorant Fantasy Team</h1>
	</div>

	<!-- About -->
	<div id="about">

		<h2 id="abouttext">About</h2>

		<div class="accordion" id="accordionPanelsStayOpenExample">
		  <div class="accordion-item">
		    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
		      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
		        <code>Draft</code>
		      </button>
		    </h2>
		    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
		      <div class="accordion-body">
		        In order to pick players for your fantasy team you must use the draft page.

		        Players will be displayed from a database showing their name, region, team, role, agent, and rating.

		        By interacting with the <strong>"Add to Team"</strong> button you can add a player to your fantasy team. Feel free to add whoever you want!
		      </div>
		    </div>
		  </div>
		  <div class="accordion-item">
		    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
		      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
		        <code>Team</code>
		      </button>
		    </h2>
		    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
		      <div class="accordion-body">
		        This tab will show your currently selected fantasy team. In order to delete a member of your fantasy team you can press the <strong>Delete </strong> button. The fantasy team displays all the characteristics of your team and displays their stats as well. Make sure to only delete only the last player or it will delete the entire team!
		      </div>
		    </div>
		  </div>
		  <div class="accordion-item">
		    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
		      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
		        <code>Database</code>
		      </button>
		    </h2>
		    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
		      <div class="accordion-body">
		       The database tab allows you to edit the underlying player database. Use the <search>search</strong> function to find the player you want to modify. Then press the <strong>edit</strong> button to modify their info. You can also <strong>delete</strong> a player or <strong>add</strong> a player. Try adding yourself to the database. Then try adding yourself to your own fantasy team!
		      </div>
		    </div>
		  </div>
		</div>
	</div>

	<div id="footer">
		Quincy Karns &copy; 2023
	</div> <!-- #footer -->


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>