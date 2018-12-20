<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="ManyMeanings">
    <title>管理员后台</title>
    <link href="../assets/css/table.css" rel="stylesheet" type="text/css">
    <link href="../assets/image/club.ico" rel="short icon">
    <script src="../assets/js/function.js"></script>
    <script>
        window.onload = function () {
            altRows('alternatecolor1');
            altRows('alternatecolor2');
            altRows('alternatecolor3');
            altRows('alternatecolor4');
            altRows('alternatecolor5');
        }
    </script>
</head>

<body>
<?php
    require_once '../inc/db.php';
    require_once '../inc/common.php';
    require_once '../inc/session.php';

    is_user_right(1) ?: redirect_to("../");

    $users_query = $db->query("select * from users");
    $articles_query = $db->query("select * from articles inner join users on user_id=author_id where article_is_delete = 0 order by article_updated_time desc");
    $articles_delete_query = $db->query("select * from articles inner join users on user_id=author_id where article_is_delete = 1 order by article_updated_time desc");
    $comments_query = $db->query("select * from comments inner join users on user_id=commentator_id where comment_is_delete = 0 order by comment_update_time desc");
    $comments_delete_query = $db->query("select * from comments inner join users on user_id=commentator_id where comment_is_delete = 1 order by comment_update_time desc");

?>
<table class="altrowstable" id="alternatecolor1">
    <thead style="margin-left: 20px;">Users Table</thead>
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
</table>

<table class="altrowstable" id="alternatecolor2">
    <thead style="margin-left: 20px;">Exist Articles Table</thead>
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
</table>

<table class="altrowstable" id="alternatecolor3">
    <thead style="margin-left: 20px;">Deleted Articles Table</thead>
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
</table>
<table class="altrowstable" id="alternatecolor4">
    <thead style="margin-left: 20px;">Exist Comments Table</thead>
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
</table>
<table class="altrowstable" id="alternatecolor5">
    <thead style="margin-left: 20px;">Deleted Comments Table</thead>
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
</table>
</body>

</html>