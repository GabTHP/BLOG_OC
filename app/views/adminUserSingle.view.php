<tbody>
    <tr class="candidates-list">
    <td class="title">
        <form method="UPDATE" action="">
        <div class="candidate-list-details">
        <div class="candidate-list-info">
            <div class="candidate-list-title">
            <h5 class="mb-0"><a href="#"><?php echo $user['username']; ?></a></h5>
            </div>
            <div class="candidate-list-option">
            <ul class="list-unstyled">
                <p>Pseudo : <input type="text" name="Username" placeholder="<?php  echo $user['username']; ?>"/>
                <p>Email : <input type="text" name="email" placeholder="<?php  echo $user['email']; ?>"/>
                <p>Role : <input type="text" name="email" placeholder="<?php  echo $user['role']; ?>"/>
                <p>Utilisateur Valide : <input type="text" name="is_valid" placeholder="<?php  echo $user['is_valid']; ?>"/>
                <input type="submit" value="Valider" name="submit" />
                <button> Supprimer </button> 
            </ul>
            </div>
        <button> Retour </button> 
        </div>
        </div>
    </td>
    </tr>
    <?php  ?>
</tbody>
<?php

if(isset($_POST['submit'])) 
 {
    $username =  $_POST['username'];
    $email = $_POST['email'];
    

	$pdo->exec("UPDATE users WHERE id='id'
		    SET username='{$username}',
		    	password='{$hash_password}',
		    	slug='{$username}',
		    	email='{$email}',
		    	created_at='{$date}',
		    	is_valid = False
		    	");
	$users[] = $pdo->lastInsertId();


echo 'users created';


 }

?>