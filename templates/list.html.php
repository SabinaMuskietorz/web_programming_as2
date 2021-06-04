<ul>
    <h1><?=$title?></h2>
        <?php

foreach ($dishes as $dish) { 
    if ($dish->visibility == 'shown') { ?>
        <li>
            <div class="details">
                <h3><?= '£' . $dish->price; ?></h3>
                <h2><?= $dish->name; ?></h2>
                <!--nl2br — Inserts HTML line breaks before all newlines in a string
                https://www.php.net/manual/en/function.nl2br.php-->
                <p><?= nl2br($dish->description); ?></p>
                <a href="/dish/show?id=<?=$dish->id?>"> Display reviews </a>
            </div>
        </li>
        <?php
    }
} 
?>
</ul>