<form action="/comment/insert">
    <input type="hidden" name="type" value="<?= $type ?>">
    <input type="hidden" name="assignId" value="<?= $assignId ?>">

    <h2>Add comment: <input type="text" name="name" /></h2>
    <textarea name="body"></textarea>
    <br/><br/>
    <button type="submit">Save</button>
</form>