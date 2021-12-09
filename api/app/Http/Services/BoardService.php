<?php

namespace App\Http\Services;

use App\Exceptions\InvalidParameterException;
use App\Models\Board;
use App\Models\Player;
use App\Util\Random;


class BoardService implements BoardInterface
{
    /**
     * @var ConfigService
     */
    private $configService;

    /**
     * @var RulesService
     */
    private $rulesService;

    /**
     * @var Board
     */
    private $board;


    /**
     * //TODO: use interfaces instead classes int the construct
     *
     * BoardService constructor.
     * @param Board|null $board
     * @throws InvalidParameterException
     */
    public function __construct(ConfigService $configService, RulesService $rulesService, Board $board = null)
    {
        $this->configService = $configService;
        $this->rulesService = $rulesService;
        $this->setBoard($board);
    }

    /**
     * @param Board|null $board
     *
     * @throws InvalidParameterException
     */
    public function setBoard(?Board $board)
    {
        if (null === $board) {
            $this->board = $this->getBoardStart();
        } else {
            $this->board = $board;
        }
    }


    /**
     * @return Board
     */
    public function getBoard(): Board
    {
        return $this->board;
    }

    /**
     * @return Board
     *
     * @throws InvalidParameterException
     */
    public function getBoardStart(): Board
    {
        $board = $this->getBoardCreate();
        $board->setCurrentPlayer($this->getStartPlayer());

        return $board;
    }


    public function nextMove($currentBoard, $player, $position): void
    {
        $this->rulesService->validateMove($currentBoard, $player, $position);
        // TODO: method to set new board
    }


    /**
     * TODO: this sould be protected
     * @return array
     *
     * @throws InvalidParameterException
     */
    public function getFilledItems(): array
    {
        $filledExcluded = [];
        $filledResult = [];
        foreach ($this->configService->getPlayers() as $name) {
            $filled = Random::getRandomList(0, $this->configService->getBoardItems(), $this->configService->getFilledBoard(), $filledExcluded);
            $filledExcluded += $filled;
            $filledResult[$name] = $filled;
        }

        return $filledResult;
    }

    /**
     * TODO: this should be protected
     * @return Board
     *
     * @throws InvalidParameterException
     */
    public function getBoardCreate(): Board
    {
        $board = new Board($this->configService->getBoardItems());
        foreach ($this->getFilledItems() as $playerName => $filledPositions) {
            $player = new Player($playerName);
            foreach ($filledPositions as $position) {
                $board->setPlayer($position, $player);
            }
        }

        return $board;
    }


    /**
     * TODO: this should be protected
     * @return Player
     *
     * @throws InvalidParameterException
     */
    public function getStartPlayer(): Player
    {
        return new Player($this->configService->getStartPlayer());
    }

}