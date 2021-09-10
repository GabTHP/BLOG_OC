<tbody>
    <tr class="candidates-list">
    <td class="title">
        <form method="UPDATE" action="">
        <div class="candidate-list-details">
        <div class="candidate-list-info">
            <div class="candidate-list-title">
            <h5 class="mb-0"><a href="#"><?php echo $_SESSION['username' ]; ?></a></h5>
            </div>
            <div class="candidate-list-option">
            <ul class="list-unstyled">
                <p>Pseudo : <?php echo $_SESSION['username' ]; ?></p>
                <p>Email : <?php echo $_SESSION['email']; ?></p>
                <p>Role :<?php echo $_SESSION['role']; ?></p>
                <p>Statut du compte : <?php  echo $_SESSION['is_valid'];?></p>
                <button> Supprimer mon Compte </button> 
                <button> Modifier mon Compte </button>
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