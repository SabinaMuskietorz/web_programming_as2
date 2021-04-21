<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title><?php 
        echo $title; ?>
        </title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening times:</h3>
				<p>Sun-Thu: 12:00-22:00</p>
				<p>Fri-Sat: 12:00-23:30</p>
			</aside>
			<h1>Kate's Kitchen</h1>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li>Menu
				<ul>
					<li><a href="/starters">Starters</a></li>
					<li><a href="/mains">Mains</a></li>
					<li><a href="/dessert">Dessert</a></li>

				</ul>
			</li>
			<li><a href="index.php?pages=home">About Us</a></li>
			<li><a href="index.php?pages=faq">FAQ</a></li>
			<li>
			<?php
			/* variables to change the text from log in to log out accordingly
			if person is logged in or logged out, and to change the file that 
			user is accesing by clicking on that label */
			//is person is logged in, set variable to that
			if(isset($_SESSION['loggedin'])) {
            $logfilechange = 'logout.php';
            $loglabelchange = 'Log out';
			}
			//else if person is not logged in, set variable to that
            else {
            $logfilechange = 'login.php';
            $loglabelchange = 'Log in';
			}
			//print 
			echo '<li><a href="' .$logfilechange . '">' . $loglabelchange . '</a></li>';
			?>
			</li>


		</ul>

	</nav>
<img src="/images/randombanner.php"/>
	<main class="home">
        <?php
        echo $output; ?>

	</main>


	<footer>
		&copy; Kate's Kitchen 2021
	</footer>
</body>
</html>
