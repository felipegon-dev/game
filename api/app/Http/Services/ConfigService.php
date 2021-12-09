<?php

namespace App\Http\Services;

use App\Exceptions\InvalidParameterException;

class ConfigService implements ConfigInterface
{
    // Config KEYS
    const PLAYERS = 'players';
    const START_PLAYER = 'startPlayer';
    const BOARD_ITEMS = 'boardItems';
    const FILLED_BOARD = 'filledBoard';


    private $config;

    /**
     * ConfigService constructor.
     * @throws InvalidParameterException
     */
    public function __construct()
    {
        $this->config = $this->getConfig();
        $this->validateConfig();
    }

    /**
     * @return int
     */
    public function getFilledBoard(): int
    {
        return $this->config[ConfigService::FILLED_BOARD];
    }

    /**
     * @return int
     */
    public function getBoardItems(): int
    {
        return $this->config[ConfigService::BOARD_ITEMS];
    }

    /**
     * @return array
     */
    public function getPlayers(): array
    {

        return $this->config[ConfigService::PLAYERS];
    }

    /**
     * @return string
     */
    public function getStartPlayer(): string
    {
        return $this->config[ConfigService::START_PLAYER];
    }

    /**
     * @return array
     */
    protected function getConfig(): array
    {
        return config('game');
    }

    /**
     * @throws InvalidParameterException
     */
    protected function validateConfig(): void
    {
        $this->validatePlayers();
        $this->validateFilledBoard();
    }

    /**
     * @throws InvalidParameterException
     */
    protected function validatePlayers(): void
    {
        if (array_search($this->config[ConfigService::START_PLAYER], $this->config[ConfigService::PLAYERS]) === false) {
            throw new InvalidParameterException('wrong config');
        }
    }

    /**
     * @throws InvalidParameterException
     */
    protected function validateFilledBoard(): void
    {
        if (($this->config[ConfigService::FILLED_BOARD] * count($this->config[ConfigService::PLAYERS])) > $this->config[ConfigService::BOARD_ITEMS]) {
            throw new InvalidParameterException('wrong config');
        }
    }
}