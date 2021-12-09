<?php

namespace Tests\Unit\Http\Services;

use App\Exceptions\InvalidParameterException;
use App\Http\Services\BoardService;
use App\Http\Services\ConfigService;
use App\Http\Services\RulesService;
use App\Models\Board;
use App\Models\Player;
use Mockery;
use PHPUnit\Framework\TestCase;

class BoardServiceTest extends TestCase
{
    /**
     * @throws InvalidParameterException
     */
    public function testBoardStart()
    {
        $configService = Mockery::mock(ConfigService::class);
        $rulesService = Mockery::mock(RulesService::class);
        $configService->shouldReceive('getBoardItems')->andReturn(20);
        $configService->shouldReceive('getPlayers')->andReturn(['X', 'Y', 'Z']);
        $configService->shouldReceive('getFilledBoard')->andReturn(4);
        $configService->shouldReceive('getStartPlayer')->andReturn('X');

        $board = new BoardService($configService, $rulesService);
        $board = $board->getBoardStart();
        $this->assertInstanceOf(Board::class, $board);
    }

    /**
     * @throws InvalidParameterException
     */
    public function testGetStartPlayer()
    {
        $configService = Mockery::mock(ConfigService::class);
        $rulesService = Mockery::mock(RulesService::class);
        $configService->shouldReceive('getBoardItems')->andReturn(20);
        $configService->shouldReceive('getPlayers')->andReturn(['X', 'Y', 'Z']);
        $configService->shouldReceive('getFilledBoard')->andReturn(4);
        $configService->shouldReceive('getStartPlayer')->andReturn('X');

        $board = new BoardService($configService, $rulesService);
        $player = $board->getStartPlayer();
        $this->assertInstanceOf(Player::class, $player);
        $this->assertEquals('X', $player->getName());
    }


    /**
     * @throws InvalidParameterException
     */
    public function testGetFilledItems()
    {
        $configService = Mockery::mock(ConfigService::class);
        $rulesService = Mockery::mock(RulesService::class);
        $configService->shouldReceive('getBoardItems')->andReturn(20);
        $configService->shouldReceive('getPlayers')->andReturn(['X', 'Y', 'Z']);
        $configService->shouldReceive('getFilledBoard')->andReturn(4);
        $configService->shouldReceive('getStartPlayer')->andReturn('X');

        $board = new BoardService($configService, $rulesService);
        $items = $board->getFilledItems();
        foreach ($items as $item) {
            $this->assertEquals(4, count($item));
        }
    }


    /**
     * testGetBoard
     */
    public function testGetBoard()
    {
        $configService = Mockery::mock(ConfigService::class);
        $rulesService = Mockery::mock(RulesService::class);
        $configService->shouldReceive('getBoardItems')->andReturn(10);
        $configService->shouldReceive('getPlayers')->andReturn(['X', 'Y']);
        $configService->shouldReceive('getFilledBoard')->andReturn(2);
        $configService->shouldReceive('getStartPlayer')->andReturn('X');

        $boardService = new BoardService($configService, $rulesService);

        $count = 0;
        $board = $boardService->getBoard();
        $this->assertEquals($board->getElements(), 10);
        foreach ($board->getPlayers() as $player) {
            if (null !== $player) {
                $this->assertInstanceOf(Player::class, $player);                ;
                $this->assertTrue(array_search($player->getName(), $configService->getPlayers()) !== false);
                $count++;
            }

        }
        $this->assertEquals($count, 4);
    }

}