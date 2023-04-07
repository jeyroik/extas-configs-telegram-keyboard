<?php
namespace extas\components\configs;

use extas\interfaces\configs\IConfigResult;
use extas\interfaces\configs\ITelegramKeyboardDispatcher;

class TelegramKeyboardDispatcher extends ConfigDispatcher implements ITelegramKeyboardDispatcher
{
    /**
     * @return array
     */
    public function __invoke(): IConfigResult
    {
        $class    = $this->getKeyboardClass();
        $buttons  = $this->getButtons();
        $keyboard = new $class(...$buttons);
        $options  = $this->getConfig();

        if ($options['resize'] ?? false) {
            $keyboard->setResizeKeyboard(true);
        }

        if ($options['one_time'] ?? false) {
            $keyboard->setOneTimeKeyboard(true);
        }

        if ($options['selective'] ?? false) {
            $keyboard->setSelective(true);
        }

        return $this->createSuccessResult(['reply_markup' => $keyboard]);
    }

    public function getKeyboardClass(): string
    {
        return $this->getAttribute('class', 'Longman\\TelegramBot\\Entities\\Keyboard');
    }

    public function getButtons(): array
    {
        return $this->getAttribute('buttons', []);
    }

    public function getConfig(): array
    {
        return $this->getAttribute('config', []);
    }
}
