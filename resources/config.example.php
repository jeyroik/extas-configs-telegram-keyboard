<?php

return [
    'class' => 'Longman\\TelegramBot\\Entities\\Keyboard',
    'config' => [
        'resize'    => true,
        'one_time'  => true,
        'selective' => true
    ],
    'buttons' => [
        [
            ['text' => 'Кнопка 1 столбец 1 ряд'],
            ['text' => 'Кнопка 2 столбец 1 ряд'],
        ],
        [
            ['text' => 'Кнопка 1 столбец 2 ряд'],
            ['text' => 'Кнопка 2 столбец 2 ряд'],
        ]
    ]
];
