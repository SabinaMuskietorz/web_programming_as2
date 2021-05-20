<?php
require 'adminnav.html.php';
?>
<section class="right">
    <h2>Users</h2>
    <table>
        <thead>
            <tr>
                <th style="width: 5%">&nbsp;</th>
                <th style="width: 15%">&nbsp;</th>
                <th style="width: 5%">&nbsp;</th>
                <th style="width: 5%">&nbsp;</th>
            </tr>
            <?php

foreach ($users as $user) { 
    ?>
            <tr>
                <td><?=$user->username?></td>
                <td><?=$user->role?></td>


                <td><a style="float: right" href="/user/edit?id=<?=$user->id?>">Edit</a></td>
                <td>
                    <form action="/user/delete" method="POST">
                        <input type="hidden" name="id" value="<?=$user->id?>" />
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