<?php

namespace App\Models;


use App\Exceptions\InvalidParameterException;

class Board
{
    /**
     * @var int
     */
    private $elements;

    /*
     * Player[]
     */
    private $players;

    /**
     * @var Player
     */
    private $currentPlayer;

    /**
     * Board constructor.
     * @param int $elements
     */
    public function __construct(int $elements)
    {
        $this->elements = $elements;
        $this->initBoard();
    }

    /**
     * startBoard
     */
    public function initBoard(): void
    {
        $this->players = array_fill(0, $this->elements, null);
    }

    /**
     * @param int $position
     *
     * @return Player|null
     *
     * @throws InvalidParameterException
     */
    public function getPosition(int $position): ?Player
    {
        $this->validatePosition($position);

        return $this->players[$position];
    }

    /**
     * @param int $position
     * @param Player $player
     *
     * @return Board
     *
     * @throws InvalidParameterException
     */
    public function setPlayer(int $position, Player $player): Board
    {
        $this->validatePosition($position);

        $this->players[$position] = $player;

        return $this;
    }

    /**
     * @return int
     */
    public function getElements(): int
    {
        return $this->elements;
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @return Player
     */
    public function getCurrentPlayer(): Player
    {
        return $this->currentPlayer;
    }

    /**
     * @param Player $currentPlayer
     *
     * @return Board
     */
    public function setCurrentPlayer(Player $currentPlayer): Board
    {
        $this->currentPlayer = $currentPlayer;

        return $this;
    }

    /**
     * @param int $position
     * @throws InvalidParameterException
     */
    protected function validatePosition(int $position): void
    {
        if ($this->elements < $position) {
            throw new InvalidParameterException('wrong position');
        }
    }
}