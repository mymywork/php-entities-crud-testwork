<form action="/book/save">
    <input type="hidden" name="id" value="<?= $book->id ?>">
    <h2>Edit book: <input type="text" name="name" value="<?= $book->name ?>"/></h2>
    <textarea name="body"><?= $book->body ?></textarea>
    <br/><br/>
    <button type="submit">Save</button>
</form>

