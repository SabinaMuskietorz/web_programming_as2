<?php
require 'adminnav.html.php';
?>
<section class="right">
    <h2>Users</h2>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th style="width: 5%">&nbsp;</th>
                <th style="width: 5%">&nbsp;</th>
                <th style="width: 5%">&nbsp;</th>
                <th style="width: 5%">&nbsp;</th>
            </tr>
            <?php
            foreach ($users as $user) { 
                ?>
            <tr>
                <td><?=$user->username?></td>
                <?php
                //if user is not an admin, you can give him permissions
                if ($user->role == '') { ?>
                <td>
                    <form action="/user/allow" method="POST">
                        <input type="hidden" name="id" value="<?=$user->id?>" />
                        <input type="submit" value="Allow" />
                    </form>
                </td>
                <?php } 
                //if user is currently an admin, you can block his permissions
                if ($user->role == 'admin') { ?>
                <td>
                    <form action="/user/block" method="POST">
                        <input type="hidden" name="id" value="<?=$user->id?>" />
                        <input type="submit" value="Block" />
                    </form>
                </td>
                <?php } ?>
                <td>
                    <!--button to delete the user-->
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