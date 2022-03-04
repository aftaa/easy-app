<!DOCTYPE html>
<html lang="=ru">
<head>
    <title>500 Internal Server Error</title>
    <style>
        body, html {
            margin: 0;
            height: 100%;
            padding: 0;
        }

        body {
            background: #6f096f;
            color: #ffef8f;
            font-size: 42px;
        }

        body {
            display: table;
            height: 100%;
            width: 100%;
        }

        h1 {
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }

        p {
            font-size: 23px;
        }

        .error {
            font-size: 23px;
        }
    </style>
</head>
<body>
<h1>
    500 Internal Server Error<br>
    <p>Произошла внутренняя ошибка сервера</p>
    <p><a style="color: #ffef8f" href="/">вернуться на главную</a></p>
    <?php if (\common\Application::$debugMode == \common\types\DebugMode::true): ?>
        <div class="error">
            <?= $e->getMessage() ?>
            <?= $e->getLine() ?>
            <?= $e->getFile() ?>
        </div>
    <?php endif ?>
</h1>
<?php require_once 'app/views/debug/index.php' ?>
</body>
</html>