<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="ManyMeanings">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>管理员后台</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.3/cerulean/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link href="../assets/image/club.ico" rel="short icon">
</head>
<style>
    .container table a {
        color: #37a;
        text-decoration-line: none;
    }
    .container table a:hover {
        color: #f2f2f2;
        background-color: #37a;
    }
    .container table {
        margin-bottom: 30px;
        margin-top: 10px;
    }
</style>
<body>
<?php
    require_once '../inc/session.php';

    is_user_right(1) ?: redirect_to("../");

    $users_query = $db->query("select * from users");
    $articles_query = $db->query("select * from articles inner join users on user_id=author_id where article_is_delete = 0 order by article_updated_time desc");
    $articles_delete_query = $db->query("select * from articles inner join users on user_id=author_id where article_is_delete = 1 order by article_updated_time desc");
    $comments_query = $db->query("select * from comments inner join users on user_id=commentator_id where comment_is_delete = 0 order by comment_update_time desc");
    $comments_delete_query = $db->query("select * from comments inner join users on user_id=commentator_id where comment_is_delete = 1 order by comment_update_time desc");

?>
<div class="container">
    <h2 class="text-muted">Users Table</h2>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>
                User_id
            </th>
            <th>
                Nickname
            </th>
            <th>
                Truename
            </th>
            <th>
                E-mail
            </th>
            <th>
                Registered_time
            </th>
            <th>
                Writed_articles
            </th>
            <th>
                Geted_read
            </th>
            <th>
                Geted_stars
            </th>
            <th>
                Star_light
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($user = $users_query->fetchObject()) {
                ?>
                <tr>
                    <td>
                        <?php echo $user->user_id; ?>
                    </td>
                    <td>
                        <a href="../user/show.php?id=<?php print $user->user_id ?>"><?php echo $user->nickname; ?></a>
                    </td>
                    <td>
                        <?php echo $user->real_name; ?>
                    </td>
                    <td>
                        <?php echo $user->e_mail; ?>
                    </td>
                    <td>
                        <?php echo $user->registered_time; ?>
                    </td>
                    <td>
                        <?php echo $user->write_number; ?>
                    </td>
                    <td>
                        <?php echo $user->get_read_number; ?>
                    </td>
                    <td>
                        <?php echo $user->had_geted_stars; ?>
                    </td>
                    <td>
                        <?php echo $user->star_light; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2 class="text-muted">Exist Articles Table</h2>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>
                Title
            </th>
            <th>
                Author
            </th>
            <th>
                created_time
            </th>
            <th>
                updated_time
            </th>
            <th>
                Geted_read
            </th>
            <th>
                Geted_stars
            </th>
            <th>
                Operate
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($article = $articles_query->fetchObject()) {
                ?>
                <tr>
                    <td>
                        <a href="../articles/show.php?id=<?php print $article->article_id ?>"><?php echo $article->title; ?></a>
                    </td>
                    <td>
                        <a href="../user/show.php?id=<?php print $article->author_id ?>"><?php echo $article->nickname; ?></a>
                    </td>
                    <td>
                        <?php echo $article->article_created_time; ?>
                    </td>
                    <td>
                        <?php echo $article->article_updated_time; ?>
                    </td>
                    <td>
                        <?php echo $article->get_read; ?>
                    </td>
                    <td>
                        <?php echo $article->get_stars; ?>
                    </td>
                    <td>
                        <a href="article_delete.php?id=<?php print $article->article_id ?>">delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2 class="text-muted">Deleted Articles Table</h2>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>
                Title
            </th>
            <th>
                Author
            </th>
            <th>
                created_time
            </th>
            <th>
                updated_time
            </th>
            <th>
                Geted_read
            </th>
            <th>
                Geted_stars
            </th>
            <th>
                Operate
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($article = $articles_delete_query->fetchObject()) {
                ?>
                <tr>
                    <td>
                        <a href="../articles/show.php?id=<?php print $article->article_id ?>"><?php echo $article->title; ?></a>
                    </td>
                    <td>
                        <a href="../user/show.php?id=<?php print $article->author_id ?>"><?php echo $article->nickname; ?></a>
                    </td>
                    <td>
                        <?php echo $article->article_created_time; ?>
                    </td>
                    <td>
                        <?php echo $article->article_updated_time; ?>
                    </td>
                    <td>
                        <?php echo $article->get_read; ?>
                    </td>
                    <td>
                        <?php echo $article->get_stars; ?>
                    </td>
                    <td>
                        <a href="article_restore.php?id=<?php print $article->article_id ?>">restore</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2 class="text-muted">Exist Comments Table</h2>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>
                Content
            </th>
            <th>
                Author
            </th>
            <th>
                created_time
            </th>
            <th>
                updated_time
            </th>
            <th>
                Operate
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($comment = $comments_query->fetchObject()) {
                ?>
                <tr>
                    <td>
                        <a href="../articles/show.php?id=<?php print $comment->article_id_in_comment ?>"><?php echo subtext($comment->comment_body, 25); ?></a>
                    </td>
                    <td>
                        <a href="../user/show.php?id=<?php print $comment->commentator_id ?>"><?php echo $comment->nickname; ?></a>
                    </td>
                    <td>
                        <?php echo $comment->comment_created_time; ?>
                    </td>
                    <td>
                        <?php echo $comment->comment_update_time; ?>
                    </td>
                    <td>
                        <a href="comment_delete.php?id=<?php print $comment->comment_id ?>">delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2 class="text-muted">Deleted Comments Table</h2>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>
                Content
            </th>
            <th>
                Author
            </th>
            <th>
                created_time
            </th>
            <th>
                updated_time
            </th>
            <th>
                Operate
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($comment = $comments_delete_query->fetchObject()) {
                ?>
                <tr>
                    <td>
                        <a href="../articles/show.php?id=<?php print $comment->article_id_in_comment ?>"><?php echo subtext($comment->comment_body, 25); ?></a>
                    </td>
                    <td>
                        <a href="../user/show.php?id=<?php print $comment->commentator_id ?>"><?php echo $comment->nickname; ?></a>
                    </td>
                    <td>
                        <?php echo $comment->comment_created_time; ?>
                    </td>
                    <td>
                        <?php echo $comment->comment_update_time; ?>
                    </td>
                    <td>
                        <a href="comment_restore.php?id=<?php print $comment->comment_id ?>">restore</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>

</html>