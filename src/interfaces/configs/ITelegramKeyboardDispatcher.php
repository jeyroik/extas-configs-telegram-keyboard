<?php
namespace extas\interfaces\configs;

interface ITelegramKeyboardDispatcher
{
    public function getKeyboardClass(): string;

    public function getButtons(): array;

    public function getConfig(): array;
}
