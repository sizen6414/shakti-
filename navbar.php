		 <style type="text/css">
		 	.navbar {
		 		width: 85%;
		 		margin: auto;
		 		padding: 35px 0;
		 		display: flex;
		 		align-items: center;
		 		justify-content: space-between;
		 	}

		 	.navbar ul li {
		 		list-style: none;
		 		display: inline-block;
		 		margin: 0 20px;
		 		position: relative;
		 	}

		 	.navbar ul li a {
		 		text-decoration: none;
		 		color: #fff;
		 		text-transform: uppercase;
		 	}

		 	.navbar ul li::after {
		 		content: '';
		 		height: 3px;
		 		width: 0;
		 		background: #5eaaf2;
		 		position: absolute;
		 		left: 0;
		 		bottom: -10px;
		 		transition: 0.5s;
		 	}

		 	.navbar ul li:hover::after {
		 		width: 100%;

		 	}

		 	.navbar-brand {
		 		color: white;
		 	}
		 </style>
		 <nav class="navbar">
		 	<a href="about.php" class="navbar-brand" style="font-size:25px"><b>SHAKTI GROUP</b></a>
		 	<div>
		 		<ul>
		 			<li><a class="nav-link" href="admininvoicelist.php">DASHBOARD</a></li>

		 			<li><a class="nav-link" href="action.php?action=logout">LOGOUT</a></li>
		 		</ul>
		 	</div>
		 </nav>