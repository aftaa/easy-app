<?php

namespace app\config\db\connection;

use common\types\DTO;

class Config extends DTO
{
    public string $hostname = 'localhost';
    public string $username = 'symfony';
    public string $password = 'symfony';
    public string $database = 'symfony';
}
