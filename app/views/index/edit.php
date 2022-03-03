<?php

/** @var \app\entities\GuestbookEntdy $entry */

?>
<h1><?= $entry->id ?></h1>
<form method="post" action="<?= $this->route('edit', ['id' => $entry->id]) ?>">
    <table>
        <tr></tr>
        <td>Author:</td>
        <td><input type="text" name="form[author]" value="<?= $entry->author ?>"></td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="form[title]" value="<?= $entry->title ?>"></td>
        </tr>
        <tr>
            <td>Author:</td>
            <td><input type="text" name="form[text]" value="<?= $entry->text ?>"></td>
        </tr>
        <tr>
            <td>Created at:</td>
            <td><input type="text" name="form[created_at]" value="<?= $entry->created_at->format('d.m.Y H:i') ?>"></td>
        </tr>
    </table>
    <input type="submit" value="save">
</form>