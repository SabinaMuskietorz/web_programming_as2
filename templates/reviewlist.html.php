<?php
require 'adminnav.html.php';
?>
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
    if($review->visibility !== 'shown') {
    ?>
            <tr>
                <td><?=$review->reviewText?></td>

                <td>
                        <form action="/review/approve" method="POST">
                        <input type="hidden" name="id" value="<?=$review->id?>" />
                        <input type="submit" value="Approve" />
                    </form>
</td>
                <td>
                    <form action="/review/delete" method="POST">
                        <input type="hidden" name="id" value="<?=$review->id?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
            <?php
    }
}
    ?>
        </thead>
    </table>
</section>