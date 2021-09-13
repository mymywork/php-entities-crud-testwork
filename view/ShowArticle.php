<a href="/main/index">back</a>
<h2>Article: <?= $article->name ?></h2>
<span><?= $article->body ?></span>
<br />
<h4>Comments:</h4>
<?php
foreach ( $comments as $c ) { ?>
    <div style="background-color: lavender;margin-bottom: 10px;padding: 5px;">
        <div style="margin-bottom: 10px;">
            <span><?=  $c->name ?></span><br />
            <span><?= $c->body ?></span>
        </div>
        <div>
            <span style="background-color: seashell;  padding:5px; margin:5px;"><a href="/comment/edit?id=<?= $c->id?>">Edit</a></span>
            <span style="background-color: seashell;  padding:5px; margin:5px;"><a href="/comment/delete?id=<?= $c->id?>">Delete</a></span>
        </div>
    </div>

<?php } ?>
<div><span style="background-color: lavender;  padding:5px; margin:5px;"><a href="/comment/add?type=<?= get_class($article) ?>&assignId=<?= $article->id ?>">Add comment</a></span></div>

