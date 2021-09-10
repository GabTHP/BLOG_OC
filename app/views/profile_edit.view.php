<tbody>
    <tr class="candidates-list">
    <td class="title">
        <div class="candidate-list-details">
        <div class="candidate-list-info">
            <div class="candidate-list-title">
            <p>Mettre à jour mes infos</p>
            </div>
            <div class="candidate-list-option">
            <ul class="list-unstyled">
                <form action="profile" method="post"  >
                    <p>Pseudo : <input type="text" name="username" value="<?php  echo $_SESSION['username']; ?>"/>
                    <p>Email : <input type="text" name="email" value="<?php  echo $_SESSION['email']; ?>"/><br>
                    <input type="submit" value="Valider" name="Valider" />
                </form>
            </ul>
            </div>
            <div class="candidate-list-title">
            <p>Mettre à jour mon mot de passe</p>
            </div>
            <div class="candidate-list-option">
            <ul class="list-unstyled">
                <form method="post" action="profile_edit">
                    <p>Nouveau mot de passe : <input type="text" name="password"/>
                    <p>Confirmer le mot de passe : <input type="text" name="confirm_password" /><br>
                    <input type="submit"  value="Valider" name="submit_mdp" />
                </form>
            </ul>
            </div>
        <button> Retour </button> 
        </div>
        </div>
    </td>
    </tr>
</tbody>
<?php








 

?>