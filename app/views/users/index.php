<?php
/** @var \app\entities\User[] $users */
/** @var \common\View $this */
?>

<?php foreach ($users as $user): ?>
    <hr size="1">
    ><?= $user->username ?> <a href="<?= $this->route('user_entries', [
        'id' => $user->id,
    ]) ?>">entries</a>
    <hr size="1">
<?php endforeach ?>
