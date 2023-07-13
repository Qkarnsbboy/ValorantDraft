<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Team page of the Valorant Fantasy Team Website. At the top is the navbar allowing users to go to any of the main pages on the website. Under that is a header of a profesisonal Valorant team. Under the header is a dynamically updated list of the current fantasy team of the user. The list allows for addition from the draft page and deletion of the last player drafted to the team.">

	<title>Team</title>
	<link rel="stylesheet" type="text/css" href="shared.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<style>
		#header {
			background-image: url('img/val_team.jpg');
		}
		#icon-text {
			font-family: "Valorant";
		}
		#warning {
			text-align: center;
			color: red;
			font-size: 1em;
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
	          <a class="nav-link active" aria-current="page" href="team.php">Team</a>
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
		<h1 id="valorant-text">Team</h1>
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
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody id="team-list" class="table-group-divider">
		  	<!-- list here -->




		  </tbody>
		</table>
	</div>

	<!-- <div class="container-fluid d-flex col-10 mt-4 mx-auto justify-content-center">
		<button id="deleteall" class="btn btn-danger mb-3">Delete All</button>
	</div> -->



	<!-- List -->
	<!-- <div id="list" class="container-fluid col-10 mt-4">
		<div class="row">
				<ul id="team-listTop" class="list-group col-12">
					<li class="list-group-item active d-flex justify-content-between">
						<div class="todo-item">ID</div>
						<div class="todo-item"><strong>Player</strong></div>
						<div class="todo-item">Region</div>
						<div class="todo-item">Team</div>
						<div class="todo-item">Role</div>
						<div class="todo-item">Agent</div>
						<div class="todo-item">Rating</div>
						<div class="todo-info">
							<span class="btn btn-danger btn-remove" title="Remove">Remove</span>
						</div>
					</li>
				</ul>
				<ul id="team-list" class="list-group col-12">
					<li class="list-group-item d-flex justify-content-between">
						<div class="todo-item"><strong>TenZ</strong></div>
						<div class="todo-item">NA</div>
						<div class="todo-item">Sentinels</div>
						<div class="todo-item">Duelist</div>
						<div class="todo-item">Jett</div>
						<div class="todo-item">95</div>
						<div class="todo-info">
							<span class="btn btn-danger btn-remove" title="Remove">Remove</span>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between">
						<div class="todo-item"><strong>Shroud</strong></div>
						<div class="todo-item">NA</div>
						<div class="todo-item">Cloud9</div>
						<div class="todo-item">Duelist</div>
						<div class="todo-item">Chamber</div>
						<div class="todo-item">80</div>
						<div class="todo-info">
							<span class="btn btn-danger btn-remove" title="Remove">Remove</span>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between">
						<div class="todo-item"><strong>Yay</strong></div>
						<div class="todo-item">NA</div>
						<div class="todo-item">Optic</div>
						<div class="todo-item">Duelist</div>
						<div class="todo-item">Chamber</div>
						<div class="todo-item">99</div>
						<div class="todo-info">
							<span class="btn btn-danger btn-remove" title="Remove">Remove</span>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between">
						<div class="todo-item"><strong>Marved</strong></div>
						<div class="todo-item">NA</div>
						<div class="todo-item">Optic</div>
						<div class="todo-item">Smokes</div>
						<div class="todo-item">Omen</div>
						<div class="todo-item">93</div>
						<div class="todo-info">
							<span class="btn btn-danger btn-remove" title="Remove">Remove</span>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between">
						<div class="todo-item"><strong>Asuna</strong></div>
						<div class="todo-item">NA</div>
						<div class="todo-item">100T</div>
						<div class="todo-item">Duelist</div>
						<div class="todo-item">Raze</div>
						<div class="todo-item">91</div>
						<div class="todo-info">
							<span class="btn btn-danger btn-remove" title="Remove">Remove</span>
						</div>
					</li>

				</ul>
				
				
			</div> 
		</div>

	</div> -->

	<div>
		<h2 id="warning" >*can only delete last player added</h2>
	</div>

	<!-- Footer -->
	<div id="footer">
		Quincy Karns &copy; 2023
	</div> <!-- #footer -->

	<script>
		

		// //removeall button
	    // document.getElementById("deleteall").onclick = () => {
		// 	document.querySelector("#team-list").innerHTML = '';
		// }


		//retrieve list items from local storage
		const listItems = JSON.parse(localStorage.getItem("listItems")) || [];

		//find the element to display the list items
		const teamList = document.getElementById("team-list");

		//for loop to add items
		listItems.forEach((item) => {
			const row = document.createElement("tr");
			row.innerHTML = `
				<td>${item.id}</td>
				<td>${item.name}</td>
				<td>${item.region}</td>
				<td>${item.team}</td>
				<td>${item.role}</td>
				<td>${item.agent}</td>
				<td>${item.rating}</td>
				<td><button class="btn btn-danger">Remove</button></td>
			`;

			teamList.appendChild(row);
			const removeButtons = document.querySelectorAll(".btn-danger");

			removeButtons.forEach(function(button) {
				button.addEventListener("click", function() {
					const row = this.parentNode.parentNode;

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

					//delete item from list array
					listItems.pop(item);

					//store the updated list array in localstorage
					localStorage.setItem("listItems", JSON.stringify(listItems));


					row.parentNode.removeChild(row);

				});
			});
		});

		// //remove buttons functionality
		// const removeButtons = document.querySelectorAll(".btn-danger");

		// removeButtons.forEach(function(button) {
		//     button.addEventListener("click", function() {
		//         const row = this.parentNode.parentNode;

		//         //extract information from row
		// 		const id = row.querySelectorAll("td")[0].textContent;
		// 		const name = row.querySelectorAll("td")[1].textContent;
		// 		const region = row.querySelectorAll("td")[2].textContent;
		// 		const team = row.querySelectorAll("td")[3].textContent;
		// 		const role = row.querySelectorAll("td")[4].textContent;
		// 		const agent = row.querySelectorAll("td")[5].textContent;
		// 		const rating = row.querySelectorAll("td")[6].textContent;

		// 		//create an object representing the item
		// 		const item = {
		// 			id: id,
		// 			name: name,
		// 			region: region,
		// 			team: team,
		// 			role: role,
		// 			agent: agent,
		// 			rating: rating,
		// 		};

		// 		//delete item from list array
		// 		listItems.pop(item);

		// 		//store the updated list array in localstorage
		// 		localStorage.setItem("listItems", JSON.stringify(listItems));

		//         row.parentNode.removeChild(row);

		//     });
		// });
	</script>
</body>
</html>