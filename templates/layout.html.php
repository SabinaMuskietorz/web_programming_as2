<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/styles.css" />
	<title><?=$title?></title>
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
					<?php
					foreach ($categories as $category) { 
					if ($category->visibility == 'shown') { ?>
					<li><a href="/dish/list?id=<?=$category->id?>"><?=$category->name?></a></li>
					<?php 
					}
				}
                 ?>
				</ul>
			</li>
			<li><a href="/page/aboutus">About Us</a></li>
			<li><a href="/page/faq">FAQ</a></li>
			<?php
			if(isset($_SESSION['loggedin'])) {
				if(isset($_SESSION ['admin'])) { ?>
			<li><a href="/page/admin">Admin</a></li>
			<?php
				}}
				else {
					 ?>
			<li><a href="/user/edit">Sign in</a></li>
			<?php
			}
			
			/* variables to change the text from log in to log out accordingly
			if person is logged in or logged out, and to change the file that 
			user is accesing by clicking on that label */
			//is person is logged in, set variable to that
			if(isset($_SESSION['loggedin'])) {
            $logfilechange = '/user/logout';
            $loglabelchange = 'Log out';
			}
			//else if person is not logged in, set variable to that
            else {
            $logfilechange = '/user/login';
            $loglabelchange = 'Log in';
			}
			//print 
			echo '<li><a href="' .$logfilechange . '">' . $loglabelchange . '</a></li>';
			?>
			</li>
			</ul>
			</nav>
	<img src="/images/randombanner.php" />
	<main class="sidebar">
		<?=$output?>
		</main>
		<footer>
		<!--updating the copyright so it will be always the current year-->
		&copy; Kate's Kitchen 2017 - <?= date("Y");?>
	</footer>
</body>
</html>