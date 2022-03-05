<?php
/** @var \Throwable $exception */
?><!DOCTYPE html>
<html lang="=" ru">
<head>
    <title>404 Not Found</title>
    <link rel="stylesheet" type="text/css" href="/css/errors.css">
    <script src="/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<h1>404 Not Found</h1>>
<p>Документ <?= $_SERVER['REQUEST_URI'] ?> не найден на сервере</p>
<p><a href="/">вернуться на главную</a></p>
<?php if (\common\Application::$debugMode == \common\types\DebugMode::true): ?>
    <div class="error">
        <?= $exception->getMessage() ?>
        on line <?= $exception->getLine() ?>
        in file <?= $exception->getFile() ?>
    </div>
<?php endif ?>
<?= \common\Application::$serviceContainer->init(\common\View::class)->render('debug/index') ?>
</body>
</html>