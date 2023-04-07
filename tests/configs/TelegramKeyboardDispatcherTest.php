<?php

use extas\components\configs\TelegramKeyboardDispatcher;
use extas\interfaces\configs\IConfigResult;
use Longman\TelegramBot\Entities\Keyboard;
use PHPUnit\Framework\TestCase;

class TelegramKeyboardDispatcherTest extends TestCase
{
    public function testDefault()
    {
        $cfg = include __DIR__ . '/../../resources/config.example.php';

        $dispatcher = new TelegramKeyboardDispatcher($cfg);

        /**
         * @var IConfigResult $result
         */
        $result = $dispatcher();

        $this->assertEquals(IConfigResult::STATUS__SUCCESS, $result->getStatus());
        $markup = $result->getValue();

        $this->assertIsArray($markup);
        $this->assertArrayHasKey('reply_markup', $markup);

        /**
         * @var Keyboard $keyboard
         */
        $keyboard = $markup['reply_markup'];
        $this->assertNotNull($keyboard);
        $this->assertInstanceOf(Keyboard::class, $keyboard);
        $this->assertTrue($keyboard->getResizeKeyboard());
        $this->assertTrue($keyboard->getOneTimeKeyboard());
        $this->assertTrue($keyboard->getSelective());
    }
}
