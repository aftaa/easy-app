<?php
/** @var Throwable $exception */
?><!DOCTYPE html>
<html lang="=" ru">
<head>
    <title>500 Internal Server Error</title>

    <link rel="stylesheet" type="text/css" href="/css/errors.css">
    <script src="/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<h1>500 Internal Server Error<br></h1>
<p>Произошла внутренняя ошибка сервера</p>
<p><a href="/">вернуться на главную</a></p>
<?php if (\common\Application::$debugMode == \common\types\DebugMode::true): ?>
    <div class="error">
        <?= $exception->getMessage() ?>
        on line <?= $exception->getLine() ?>
        in file <?= $exception->getFile() ?>
    </div>
<?php endif ?>

<div>
    <?= \common\Application::$serviceContainer->init(\common\http\Response::class)->makeRender('debug/index')->setCode(null)->output() ?>
</div>
</body>
</html>