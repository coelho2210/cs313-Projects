<?php
session_start();
require('dbConnect.php');
$db = dbConnect();
?>
<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>"Social Media"</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
<header>
<h1>"Social Media"</h1>
<hr>
    <nav>
        <?php
        if(isset($_SESSION["user"]))
        {
            echo "Welcome " . $_SESSION["user"];
            echo '<br/><a href="logout.php">Logout</a>';
        }
        else
        {
            echo '<a href="login.php">Login</a>';
        }
        ?>
    </nav>
</header>
<main>


    <?php
    if(isset($_SESSION["user_id"]))
    {
       echo '<form action="post.php" method="post">
            <textarea name="content"></textarea>
            <input id="create" type="submit" value="Post">
            </form>';
    }
    foreach ($db->query('SELECT p.id, p.content, p.date, a.display_name FROM post AS p
JOIN author AS a
ON p.author_id = a.id ORDER BY p.date DESC') as $row)
    {
        echo '<article>
<h2>' . $row['display_name'] . '</h2>
<p>' . $row['content'] . '</p>
<div class="date">'. $row['date'] . ' </div>';
        foreach ($db->query('SELECT c.content, a.display_name, c.date FROM comment AS c
JOIN author AS a
ON c.author_id = a.id
JOIN post AS p
ON c.post_id = p.id
WHERE c.post_id ='. $row['id']) as $comment)
        {
            echo '<div class="comment">
                  <h3>' . $comment['display_name']. '</h3>
                  <p>' . $comment['content'] . '</p>
                  <div class="date">' . $comment['date']. '</div></div>';
        }
        if(isset($_SESSION["user_id"]))
        {
            echo '<form action="comment.php" method="post">
            <input type="hidden" name="post_id" value="'.  $row['id'].'"/>
    <textarea name="content" class="work"></textarea>
    <input class="workBtn" type="submit" value="Comment">
    </form>';
        }
echo '</article>';
    }
    ?>

</main>
</body>

</html>