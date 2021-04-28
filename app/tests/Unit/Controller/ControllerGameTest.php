<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Form.
 */
class ControllerGameTest extends TestCase
{
    public function start()
    {
        $session = array('key' => 'value');
        $post = array('key' => 'value');
        $_SESSION["dices"] = 0;
        $_SESSION["computer"] = 0;
        $_SESSION["user"] = 0;
        $_SESSION["compScore"] = 0;
        $_SESSION["score"] = 0;
        $_POST["action"] = "";
    }

    public function testCreateTheControllerClass()
    {
        $controller = new GameController();
        $this->assertInstanceOf("App\Http\Controllers", $controller);
    }

    public function testControllerProcessAction()
    {
        $this->start();
        $action = ["start", "Roll again", "Stop", "New round", "Start over"];
        $game = new GameController();

        $_POST["action"] = $action[0];
        $_POST["dices"] = 1;
        $game->startGame();
        $this->assertEquals($_SESSION["dices"], 1);

        $_POST["action"] = $action[1];
        $game->startGame();

        $_POST["action"] = $action[2];
        $_POST["score"] = 0;
        $game->startGame();
        $this->assertEquals($_SESSION["computer"], 1);

        $_POST["action"] = $action[2];
        $_POST["score"] = 30;
        $game->startGame();
        $this->assertEquals($_SESSION["computer"], 2);

        $_POST["action"] = $action[2];
        $_POST["score"] = 21;
        $game->startGame();
        $this->assertEquals($_SESSION["user"], 1);

        $_POST["action"] = $action[3];
        $game->startGame();
    }
}
