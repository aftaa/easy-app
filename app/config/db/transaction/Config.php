<?php

namespace app\config\db\transaction;

use common\types\DTO;

class Config extends DTO
{
    public bool $autoCommit = false;
}