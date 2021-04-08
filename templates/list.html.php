<ul class="listing">
    <?php
    $stmt = $pdo->prepare('SELECT * FROM menu WHERE categoryId = $_GET[categoryId]');
    $stmt->execute();
    foreach ($stmt as $record) { ?>
    <li>
        <div class="details">
            <h3><?php echo '£' . $record['price']; ?></h3>
            <h2><?php echo $record['name']; ?></h2>;
            <p><?php echo nl2br($record['description']); ?> </p>;
        </div>
    </li>
    <?php
} ?>
</ul>

