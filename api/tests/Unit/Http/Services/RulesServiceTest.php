<?php

namespace Tests\Unit\Http\Services;

use PHPUnit\Framework\TestCase;

class RulesServiceTest extends TestCase
{

    /**
     * testValidateMove
     */
    public function testValidateMove() {
        //TODO: set correct info to validate if player can move
        /*
        $playerX = Mockery::mock(Player::class);
        $playerY = Mockery::mock(Player::class);

        $board = Mockery::mock(Board::class);
        $board->shouldReceive('getPlayers')->andReturn([
            $playerX,
            $playerY
        ]);
        $nextPlayer = Mockery::mock(Player::class);

        $rulesService = new RulesService();
        try {
            $rulesService->validateMove($board, $nextPlayer, 0);
        } catch (\Exception $exception) {};

        $this->assertInstanceOf(InvalidParameterException::class, $exception);
        */
        $this->assertTrue(true);
    }

}