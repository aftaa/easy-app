<?php

return (object)[
    'interfaces' => [
        \app\services\FirstInterface::class => \app\services\FirstRealization::class,
        \common\db\ConnectionInterface::class => \common\db\Connection::class,
    ],
    'container' => (object)[
        'enabled' => true,
        'disabled' => [
//            \common\db\DBAL\QueryBuilder::class,
        ]
    ],
    'router' => (object)[
        'simple' => false,
        'attributes' => true,
    ],
    'debug' => (object)[
        'load_class' => false,
        'container' => false,
        'queries' => false,
        'routes' => false,
    ],
];
