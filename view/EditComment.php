<form action="/comment/save">
    <input type="hidden" name="id" value="<?= $comment->id ?>">
    <h2>Edit comment: <input type="text" name="name" value="<?= $comment->name ?>"/></h2>
    <textarea name="body"><?= $comment->body ?></textarea>
    <br/><br/>
    <button type="submit">Save</button>
</form>

