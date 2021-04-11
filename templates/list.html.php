<ul>
<?php
foreach ($stmt as $record) { 
    if ($record['visibility'] == 'shown') { ?>
    <li>
    <div class="details">
    <h3><?= '£' . $record['price']; ?></h3>
    <h2><?= $record['name']; ?></h2>
    <p><?= nl2br($record['description']); ?></p>
    </div>
    </li>
    <?php
    }
} ?>
</ul>
