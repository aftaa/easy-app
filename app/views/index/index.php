<?php
/** @var $this \common\View */
$this->title = 'Главная страница';
?>
Приветствуем вас на нашей гостевой книге!!!
<br>
<a href="<?= $this->route(name: 'add') ?>">Добавить сообщение</a>