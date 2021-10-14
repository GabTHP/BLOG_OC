<?php
require '../app/views/default.layout.view.php';


function blog_all()
{
    require '../app/models/postModel.php';
    require '../app/db/connDb.php';
    $all_posts = get_all_posts();
    require '../app/views/blog_all.view.php';

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $pdo->exec("DELETE FROM posts WHERE id = '{$id}' ");

?>
        <script type="text/javascript">
            window.alert("La publication a été supprimée")
        </script>
    <?php
    }
}

function blog_single()
{
    require '../app/models/postModel.php';
    require '../app/db/connDb.php';
    $post = get_one_post();
    $comments = get_comments();
    require '../app/views/blog_single.view.php';
}

function post_create()
{
    require '../app/db/connDb.php';
    require '../app/models/postModel.php';
    require '../app/views/form_post.view.php';

    if (isset($_POST["submit"])) {
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);
        $featured_image = $_FILES['featured_image']['name'];
        $date = date("Y-m-d H:i:s");;
        $user_id = $_SESSION['id'];


        if (isset($_FILES['featured_image'])) {
            $errors = array();
            $file_name = $_FILES['featured_image']['name'];
            $file_size = $_FILES['featured_image']['size'];
            $file_tmp = $_FILES['featured_image']['tmp_name'];
            $file_type = $_FILES['featured_image']['type'];
            $tmp = explode('.', $file_name);
            $file_extension = end($tmp);
            $expensions = array(
                "jpeg", "jpg", "png"
            );

            if (in_array($file_extension, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if ($file_size > 2097152666655) {
                $errors[] = 'File size must be excately 2 MB';
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "../upload/" . $file_name);
            } else {
            }
        }
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

    ?>

    <?php
    }
}

function post_edit()
{
    require '../app/db/connDb.php';
    require '../app/models/postModel.php';
    $post = get_one_post();
    require '../app/views/post_edit.view.php';


    if (isset($_POST["update"])) {
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);
        $featured_image = $_POST['featured_image'];
        $date = date("Y-m-d H:i:s");
        $is_valid = $post['is_valid'];
        $post_id = $post['id'];


        $pdo->exec("UPDATE posts 
        SET title='{$title}',
            content='{$content}',
            slug='{$title}',
            featured_image='{$featured_image}',
            updated_at = '{$date}',
            is_valid = 1 
        WHERE posts.id = {$post_id}");

    ?>
        <script type="text/javascript">
            alert("La publication a été mise à jour");
            window.location.href = "/Blog_Oc/post/<?php echo $post_id ?>";
        </script>
<?php
    }
}
