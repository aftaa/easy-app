<?php
/** @var $this \common\Layout The Layout */

/** @var $title string title */

use common\Router;

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'welcome' ?></title>
    <link rel="stylesheet" type="text/css" href="/js/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/js/jquery-ui/jquery-ui.structure.min.css">
    <link rel="stylesheet" type="text/css" href="/js/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" type="text/css" href="/css/site.css">
    <script src="/js/jquery.js" type="text/javascript"></script>
    <script src="/js/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
</head>

<body>
<header>
    <a href="<?= $this->route('index') ?>" class="ui-button">index</a>
    <a href="<?= $this->route('add') ?>" class="ui-button">add</a>
    <a href="<?= $this->route('test') ?>" class="ui-button">test</a>
    <a href="<?= $this->route('deleted_list') ?>" class="ui-button">deleted</a>
    <a href="<?= $this->route('users') ?>" class="ui-button">users</a>
</header>
<?php echo $this->content ?>
<?php //throw new \Exception ?>
<?php require_once 'app/views/debug/index.php' ?>
</body>
</html>
