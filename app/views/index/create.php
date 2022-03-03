<?php
/** @var \common\View $this */
/** @var \app\entities\GuestbookEntry $entry */
?>
<table>
    <tr>
        <td>Author:</td>
        <td><?= $entry->author ?></td>
    </tr>
    <tr>
        <td>Title:</td>
        <td><?= $entry->title ?></td>
    </tr>
    <tr>
        <td>Text:</td>
        <td><?= $entry->text ?></td>
    </tr>
    <tr>
        <td>Created at:</td>
        <td><?= $entry->created_at->format('d.m.Y'); ?></td>
    </tr>
</table>

<a href="<?= $this->route('test') ?>">view all records</a>