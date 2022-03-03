<?php

/** @var $this \common\View */
/** @var $data array|\app\entities\GuestbookEntry[] */
/** @var $limit int */
/** @var $count int */
/** @var $page int */

?>
Count: <?= $count ?>
<form action="<?= $this->route('delete') ?>" method="post">
    <table border="1">
        <?php foreach ($data as $entry): ?>
            <tr>
                <td><b><?= $entry->id ?></b></td>
                <td><?= $entry->author ?></td>
                <td><a href="<?= $this->route('edit', ['id' => $entry->id]) ?>"><?= $entry->title ?></a></td>
                <td><?= $entry->text ?></td>
                <td><?= $entry->created_at->format('d.m.Y H:i') ?></td>
                <td><?= $entry->status->value ?></td>
                <td><?= $entry->user_id ?></td>
                <td><?= $entry->getUser()->username ?></td>
                <td><input type="checkbox" name="deleteId[]" value="<?= $entry->id ?>"></td>
            </tr>
        <?php endforeach ?>
    </table>
    <input type="submit" name="delete" value="delete">
</form>

<?php for ($i = 1; $i <= ceil($count / $limit); $i++): ?>
    <?php if ($page == $i): ?><b><?php endif ?>
    <a href="<?= $this->route($this->getActiveRoute()->name == 'test' ?: 'deleted_list', ['page' => $i]) ?>"><?= $i ?></a>
    <?php if ($page == $i): ?></b><?php endif ?>

<?php endfor ?>
