<?php

function blog_all()
{
    require '../app/models/postModel.php';
    $all_posts = get_all_posts();
    require '../app/views/blog_all.view.php';
}

function blog_single()
{
    
    require '../app/db/connDb.php';
    require '../app/views/default.layout.view.php';
    require '../app/models/postModel.php';
    $post = get_one_post();
    $comments = get_comments();
    require '../app/views/blog_single.view.php';

    if (isset($_POST["submit"])) 
    {
    $pseudo = $_SESSION['username'];
    $content = addslashes($_POST['content']);
    $date = date("Y-m-d H:i:s"); ;
    $user_id = $_SESSION['id'];
    $post_id = $url[1];

    $pdo->exec("INSERT INTO comments 
        SET content='{$content}',
            pseudo='{$pseudo}',
            created_at = '{$date}',
            is_valid = False, 
            user_id = $user_id,
            post_id = $post_id,
            title = ' '
            ");
    }
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




