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
