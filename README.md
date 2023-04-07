![PHP Composer](https://github.com/jeyroik/extas-configs-telegram-keyboard/workflows/PHP%20Composer/badge.svg?branch=master)
![codecov.io](https://codecov.io/gh/jeyroik/extas-configs-telegram-keyboard/coverage.svg?branch=master)

[![Latest Stable Version](https://poser.pugx.org/jeyroik/extas-configs-telegram-keyboard/v)](//packagist.org/packages/jeyroik/extas-configs-telegram-keyboard)
[![Total Downloads](https://poser.pugx.org/jeyroik/extas-configs-telegram-keyboard/downloads)](//packagist.org/packages/jeyroik/extas-configs-telegram-keyboard)
[![Dependents](https://poser.pugx.org/jeyroik/extas-configs-telegram-keyboard/dependents)](//packagist.org/packages/jeyroik/extas-configs-telegram-keyboard)


# extas-configs-telegram-keyboard

Данный диспетчер позволяет создавать разметку клавиатуры для сообщений в Телеграме по конфигурации.

Пример конфигурации можно найти в `/resources/config.example.php`.

# Использование

```php

$config = ...;// получение конфига
$dispatcher = new TelegramKeyboardDispatcher($config);
$result = $dispatcher();

if ($result->hasError()) {
    list($message, $code) = $result->getError();
    echo $message . '(' . $code . ')';
} else {
    $command = ...// создание команды на основе Longman\TelegramBot\Commands\Command
    $command->replyToChat(
        'Пример клавиатуры',
        $result
    );
}
