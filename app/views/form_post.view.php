



<section class="signup-form">
    <h2>Créer un post</h2>

    <form  method="post" action="post_create">
        <input type="text" name="title" placeholder="titre"/><br>
        <input type="text" name="content" placeholder="Texte"/><br>
        <input type="file" name="featured_image" placeholer="Image"/><br>
        <label for="cars">Sélectionner une catégorie:</label>
        <select name="categories" id="categories">
            <?php foreach($all_categories as $key => $category) {
                ?><option value="<?php echo $category['title']?>"><?php echo $category['title']?></option>
            <?php } ?>
            
        </select>
        <input type="submit" value="Publier" name="submit" />
    </form>
</section>