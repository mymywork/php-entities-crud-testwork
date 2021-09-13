<form action="/article/save">
    <input type="hidden" name="id" value="<?= $article->id ?>">
    <h2>Edit article: <input type="text" name="name" value="<?= $article->name ?>"/></h2>
    <textarea name="body"><?= $article->body ?></textarea>
    <br/><br/>
    <button type="submit">Save</button>
</form>

