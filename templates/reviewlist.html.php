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
                //if review has not yet been aproved
                if($review->visibility !== 'shown') {
                    ?>
            <tr>
                <td><?=$review->reviewText?></td>

                <td>
                    <!--button to approve the review-->
                    <form action="/review/approve" method="POST">
                        <input type="hidden" name="id" value="<?=$review->id?>" />
                        <input type="submit" value="Approve" />
                    </form>
                </td>
                <td>
                    <!--button to delete the review pernamently-->
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