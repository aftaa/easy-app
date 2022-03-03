<?php

/** @var $this \common\View */

?>


<form action="<?= $this->route('create') ?>">
    <table>
        <tr>
            <td>Author:</td>
            <td><input type="text" name="author" required></td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title" required></td>
        </tr>
        <tr>
            <td>Text:</td>
            <td><input type="text" name="text" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Add" value="Добавить" class="ui-button"></td>
        </tr>
    </table>
</form>
