<?php
require '../app/views/default.layout.view.php';

function blog_all()
{
    require '../app/models/postModel.php';
    require '../app/db/connDb.php';
    $all_posts = get_all_posts();
    require '../app/views/blog_all.view.php';

    if(isset($_POST['delete'])) 
    {
        $id = $_POST['id'];
        $pdo->exec("DELETE FROM posts WHERE id = '{$id}' ") ;

        ?>
        <script type="text/javascript">
        window.alert("La publication a été supprimée")
        </script>
        <?php
    }
}

function blog_single()
{
    
    require '../app/db/connDb.php';
    require '../app/models/postModel.php';
    $post = get_one_post();
    $comments = get_comments();
    require '../app/views/blog_single.view.php';


}

function post_create()
{
    require '../app/db/connDb.php';
    require '../app/models/postModel.php';
    require '../app/views/form_post.view.php';

    if (isset($_POST["submit"])) 
        {
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);
        $featured_image = $_POST['featured_image'];
        $date = date("Y-m-d H:i:s"); ;
        $user_id = $_SESSION['id'];

        $pdo->exec("INSERT INTO posts 
		    SET title='{$title}',
		    	content='{$content}',
		    	slug='{$title}',
		    	featured_image='{$featured_image}',
		    	created_at = '{$date}',
		    	is_valid = False, 
                user_id = $user_id
		    	");
        $posts[] = $pdo->lastInsertId();
        }
}

function post_edit()
{
    require '../app/db/connDb.php';
    require '../app/models/postModel.php';
    $post = get_one_post();
    require '../app/views/post_edit.view.php';
    

    if (isset($_POST["update"])) 
    {
    $title = addslashes($_POST['title']);
    $content = addslashes($_POST['content']);
    $featured_image = $_POST['featured_image'];
    $date = date("Y-m-d H:i:s");
    $is_valid = $post['is_valid'] ;
    $post_id = $post['id'];
    

    $pdo->exec("UPDATE posts 
        SET title='{$title}',
            content='{$content}',
            slug='{$title}',
            featured_image='{$featured_image}',
            updated_at = '{$date}',
            is_valid = 1 
        WHERE posts.id = {$post_id}");

    }
}






