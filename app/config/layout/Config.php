<?php

namespace app\config\layout;

use common\types\DTO;

class Config extends DTO
{
    public string $layoutPath = 'app/layouts';
    public string $layout = 'layout';
    public bool $enabled = true;
}
