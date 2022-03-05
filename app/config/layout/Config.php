<?php

namespace app\config\layout;

use common\types\DTO;

class Config extends DTO
{
    public string $layoutPath = 'app/layouts';
    public string $layout = 'layout';
    public bool $enabled = true;

    public array $layoutsDisabled = [
        'errors/500',
        'errors/400',
        'debug/index',
    ];

    /**
     * @param string $filename
     * @return bool
     */
    public function layoutEnabled(string $filename): bool
    {
        return !in_array($filename, $this->layoutsDisabled);
    }
}
