<table>
    <tr>
        <h2>Articles:</h2>
        <div><span style="background-color: lavender;  padding:5px; margin:5px;"><a href="/article/add">Add</a></span></div><br/>
            <?php foreach ( $articles as $a ) { ?>
                <div>
                    <span style="background-color: lavender; padding:5px; margin:5px;"><?= $a->id ?></span>
                    <span style="background-color: lavender;  padding:5px; margin:5px;">
                        <a href="/article/show?id=<?= $a->id?>"><?= $a->name ?></a>
                    </span>
                    <span style="background-color: lavender;  padding:5px; margin:5px;"><a href="/article/edit?id=<?= $a->id?>">Edit</a></span>
                    <span style="background-color: lavender;  padding:5px; margin:5px;"><a href="/article/delete?id=<?= $a->id?>">Delete</a></span>
                </div>
                <br/>
            <?php } ?>
    </tr>
    <tr>
        <h2>Books:</h2>
        <div><span style="background-color: lavender;  padding:5px; margin:5px;"><a href="/book/add">Add</a></span></div><br/>

            <?php foreach ( $books as $a ) { ?>
                <div>
                    <span style="background-color: lavender; padding:5px; margin:5px;"><?= $a->id ?></span>
                    <span style="background-color: lavender;  padding:5px; margin:5px;">
                        <a href="/book/show?id=<?= $a->id?>"><?= $a->name ?></a>
                    </span>
                    <span style="background-color: lavender;  padding:5px; margin:5px;"><a href="/book/edit?id=<?= $a->id?>">Edit</a></span>
                    <span style="background-color: lavender;  padding:5px; margin:5px;"><a href="/book/delete?id=<?= $a->id?>">Delete</a></span>

                </div>
                <br/>
            <?php } ?>
    </tr>
</table>