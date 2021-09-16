<?php

function blog_all()
{
    require '../app/models/postModel.php';
    $all_posts = get_all_posts();
    require '../app/views/blog_all.view.php';
}

function blog_single()
{
    require '../app/views/default.layout.view.php';
    require '../app/models/postModel.php';
    $post = get_one_post();
    $post_comments = get_comments();
    require '../app/views/blog_single.view.php';
}

function post_create()
{
    require '../app/db/connDb.php';
    require '../app/models/postModel.php';
    require '../app/models/categoryModel.php';
    $all_categories = get_all_categories();
    require '../app/views/form_post.view.php';

    if (isset($_POST["submit"])) 
        {
        $title = $_POST['title'];
        $content = $_POST['content'];
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


