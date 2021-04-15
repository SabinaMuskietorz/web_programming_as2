<p>Welcome to Kate Kitchen, we are a family run resturaunt in northampton. Take a look around our site to see our
    menu!</a></p>
<h2>Take a look at our menu:</h2>
<?php

	echo '<ul>';
	foreach ($categories as $category) {
		echo '<li><a href="menu.php?id='. $row['id'] . '">' . $row['name'] . '</a></li>';
	}
	echo '</ul>';
    ?>
    
