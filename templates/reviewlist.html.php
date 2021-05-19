<section class="left">
    <ul>
        <li><a href="/page/admin">Menu</a></li>
        <li><a href="/page/categories">Categories</a></li>
        <li><a href="/page/controlreviews">Reviews</a></li>



    </ul>
</section>
<section class="right">
    <h2>Reviews</h2>
    <table>
        <thead>
            <tr>
                <th style="width: 5%">&nbsp;</th>
                <th style="width: 15%">&nbsp;</th>
                <th style="width: 5%">&nbsp;</th>
                <th style="width: 5%">&nbsp;</th>
            </tr>
            <?php

foreach ($reviews as $review) { 
    ?>
            <tr>
                <td><?=$review->reviewText?></td>

                <td><a style="float: right" href="/review/edit?id=<?=$review->id?>">Edit</a></td>
                <td>
                    <form action="/review/delete" method="POST">
                        <input type="hidden" name="id" value="<?=$review->id?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
            <?php
    }
    ?>
        </thead>
    </table>
</section>