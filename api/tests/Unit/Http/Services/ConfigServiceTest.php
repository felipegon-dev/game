<?php

namespace Tests\Unit\Http\Services;

use App\Exceptions\InvalidParameterException;
use App\Http\Services\BoardService;
use App\Http\Services\ConfigService;
use App\Models\Board;
use App\Models\Player;
use Mockery;
use PHPUnit\Framework\TestCase;

class ConfigServiceTest extends TestCase
{

    public function testValidatePlayers()
    {
        try {
            new class () extends ConfigService {
                public function getConfig(): array
                {
                    return [
                        ConfigService::PLAYERS => ['X', 'Y', 'Z'],
                        ConfigService::START_PLAYER => 'T',
                        ConfigService::BOARD_ITEMS => 20,
                        ConfigService::FILLED_BOARD =>  4,
                    ];
                }
            };
        } catch (\Exception $exception) {}

        $this->assertInstanceOf(InvalidParameterException::class, $exception);
    }

    public function testValidateFilledBoard()
    {

        try {
            new class () extends ConfigService {
                public function getConfig(): array
                {
                    return [
                        ConfigService::PLAYERS => ['X', 'Y', 'Z'],
                        ConfigService::START_PLAYER => 'X',
                        ConfigService::BOARD_ITEMS => 10,
                        ConfigService::FILLED_BOARD =>  4,
                    ];
                }
            };
        } catch (\Exception $exception) {}

        $this->assertInstanceOf(InvalidParameterException::class, $exception);
    }

}