<?php
echo '<ul>';
foreach ($categories as $category) { ?>
<blockquote>
    <p>
        <?=$category['name']?>
        <a href="/category/edit?id=<?=$category['id']?>">Edit</a>

        <form action="/category/delete" method="POST">
            <input type="hidden" name="id" value="<?=$category['id']?>" />
            <input type="submit" value="Delete" />
        </form>
    </p>
</blockquote>
<?php } ?>