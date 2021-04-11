<ul>
<?php
foreach ($templateVars['menus'] as $menu) { 
    if ($menu['visibility'] == 'shown') { ?>
    <li>
    <div class="details">
    <h3><?= '£' . $menu['price']; ?></h3>
    <h2><?= $menu['name']; ?></h2>
    <p><?= nl2br($menu['description']); ?></p>
    </div>
    </li>
    <?php
    }
} ?>
</ul>
