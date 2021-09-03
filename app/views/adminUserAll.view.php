<?php



// On affiche chaque entrée une à une
foreach($all_users as $key => $user) {

?>

<tbody>
    <tr class="candidates-list">
    <td class="title">
        <div class="candidate-list-details">
        <div class="candidate-list-info">
            <div class="candidate-list-title">
            <h5 class="mb-0"><a href="#"><?php echo $user['username']; ?></a></h5>
            </div>
            <div class="candidate-list-option">
            <ul class="list-unstyled">
                <li><i class="fas fa-filter pr-1"></i><?php  echo $user['email']; ?></li>
                <li><i class="fas fa-map-marker-alt pr-1"></i><?php echo $user['role']; ?></li>
                <li><i class="fas fa-map-marker-alt pr-1"></i><?php echo $user['is_valid']; ?></li>
                <?php $user_id=$user['id']; ?>

            </ul>
        </div>
        <form method="post" action="users_all" >
            <input type="submit" name="validate" value="validate">
        </form>
        <form method="post" action="users_all" >
            <input type="submit" name="delete" value="delete">
        </form>
        </div>
        </div>
    </td>
    </tr>
    <?php } ?>
</tbody>




